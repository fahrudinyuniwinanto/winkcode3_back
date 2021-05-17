<?php

// use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

if (!function_exists('logSystem')) {
    function logSystem($trs, $doc_no, $activity, $tag, $ip_client)
    {
        DB::table('sy_log')->insert([
            'trs'        => $trs,
            'doc_no'     => $doc_no,
            'activity'   => $activity,
            'tag'        => $tag,
            'ip_client'  => $ip_client,
            'created_by' => @Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}

/*
if(!function_exists('cek_captchav2')){
function cek_captchav2($secretKey="6Lef3n8aAAAAALDX_DwRKq730z8KqcLs4QYW0vUU"){
$captcha = $_POST['g-recaptcha-response'] ?? '';
if (!$captcha) {
die("tidak ada post captcha");
}
$ip        = $_SERVER['REMOTE_ADDR'];
// post request to server
$url          = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);
$response     = file_get_contents($url);
$responseKeys = json_decode($response, true);
}
} */

if (!function_exists('parsys')) {
    function parsys($key)
    {
        $data = DB::table('sy_parsys')->where('name', $key)->first();
        return empty($data) ? '' : $data->value;
    }
}

if (!function_exists('get_kategori')) {

    function get_kategori($kategori)
    {
        $h     = DB::table('sy_category')->where('name', $kategori)->get();
        $opt   = [];
        $opt[] = ">> Pilih $kategori";
        foreach ($h as $v) {
            $opt[$v->id] = $v->value;
        }
        return $opt;
    }
}

if (!function_exists('visitCounter')) {
    function visitCounter()
    {
        $num = intval(parsys('VISIT_COUNTER') + 1);
        DB::table('sy_parsys')->where('name', "VISIT_COUNTER")->update(['value' => $num]);
        return parsys("VISIT_COUNTER");
    }
}

if (!function_exists('strLike')) {

    function strLike($key, $word)
    {
        if (strpos($key, $word) === false) {
            return false;
        } else {
            return true;
        }

    }
}

if (!function_exists('fileUpload')) {
    function fileUpload($file, $path, $mime = ['image'])
    {

        // if (!Sf::allowed(strtoupper($path) . '_U')) {
        //     return false;
        // }

        $contents    = File::get($file);
        $filename    = $file->getClientOriginalName();
        $destination = $path . "/" . trim($filename);

        $mimetype = File::mimeType($file->getRealPath());
        $ex       = explode("/", $mimetype);
        $prefix   = isset($ex[0]) ? $ex[0] : '';

        if (!in_array($prefix, $mime)) {
            return false;
        }

        if (Storage::put($destination, $contents)) {
            return $path . "/" . $filename;
        } else {
            return false;
        }
    }
}

//SYSTEM//

if (!function_exists('formDropDown')) {
    function formDropDown($data = '', $options = array(), $selected = array(), $extra = '')
    {
        $defaults = array();

        if (is_array($data)) {
            if (isset($data['selected'])) {
                $selected = $data['selected'];
                unset($data['selected']); // select tags don't have a selected attribute
            }

            if (isset($data['options'])) {
                $options = $data['options'];
                unset($data['options']); // select tags don't use an options attribute
            }
        } else {
            $defaults = array('name' => $data);
        }

        is_array($selected) or $selected = array($selected);
        is_array($options) or $options   = array($options);

        // If no selected state was submitted we will attempt to set it automatically
        if (empty($selected)) {
            if (is_array($data)) {
                if (isset($data['name'], $_POST[$data['name']])) {
                    $selected = array($_POST[$data['name']]);
                }
            } elseif (isset($_POST[$data])) {
                $selected = array($_POST[$data]);
            }
        }

        $extra = _attributes_to_string($extra);

        $multiple = (count($selected) > 1 && stripos($extra, 'multiple') === false) ? ' multiple="multiple"' : '';

        $form = '<select ' . rtrim(_parse_form_attributes($data, $defaults)) . $extra . $multiple . ">\n";

        foreach ($options as $key => $val) {
            $key = (string) $key;

            if (is_array($val)) {
                if (empty($val)) {
                    continue;
                }

                $form .= '<optgroup label="' . $key . "\">\n";

                foreach ($val as $optgroup_key => $optgroup_val) {
                    $sel = in_array($optgroup_key, $selected) ? ' selected="selected"' : '';
                    $form .= '<option value="' . htmlspecialchars($optgroup_key) . '"' . $sel . '>'
                    . (string) $optgroup_val . "</option>\n";
                }

                $form .= "</optgroup>\n";
            } else {
                $form .= '<option value="' . htmlspecialchars($key) . '"'
                . (in_array($key, $selected) ? ' selected="selected"' : '') . '>'
                . (string) $val . "</option>\n";
            }
        }

        return $form . "</select>\n";
    }
}

if (!function_exists('_attributes_to_string')) {
    /**
     * Attributes To String
     *
     * Helper function used by some of the form helpers
     *
     * @param    mixed
     * @return    string
     */
    function _attributes_to_string($attributes)
    {
        if (empty($attributes)) {
            return '';
        }

        if (is_object($attributes)) {
            $attributes = (array) $attributes;
        }

        if (is_array($attributes)) {
            $atts = '';

            foreach ($attributes as $key => $val) {
                $atts .= ' ' . $key . '="' . $val . '"';
            }

            return $atts;
        }

        if (is_string($attributes)) {
            return ' ' . $attributes;
        }

        return false;
    }
}

if (!function_exists('_parse_form_attributes')) {
    /**
     * Parse the form attributes
     *
     * Helper function used by some of the form helpers
     *
     * @param    array    $attributes    List of attributes
     * @param    array    $default    Default values
     * @return    string
     */
    function _parse_form_attributes($attributes, $default)
    {
        if (is_array($attributes)) {
            foreach ($default as $key => $val) {
                if (isset($attributes[$key])) {
                    $default[$key] = $attributes[$key];
                    unset($attributes[$key]);
                }
            }

            if (count($attributes) > 0) {
                $default = array_merge($default, $attributes);
            }
        }

        $att = '';

        foreach ($default as $key => $val) {
            if ($key === 'value') {
                $val = htmlspecialchars($val);
            } elseif ($key === 'name' && !strlen($default['name'])) {
                continue;
            }

            $att .= $key . '="' . $val . '" ';
        }

        return $att;
    }
}

// if(!function_exists('formDropDown')){
//     function formDropDown($name,$options,$default,$attr){
//         $s="";
//         $s.="<select name='$name' $attr>";
//         foreach ($options as $k => $v) {
//             $s.="<option val=''></val>";
//         }
//         $s.="</select>";

//     }
// }
