<?php
namespace App\Helpers;

use App\Models\SyAccess;
use App\Models\SyLink;
use App\Models\SyMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class MeHelper
{
    private static $strreason;
    public static function get_select2($q)
    {
        $data = \App\Models\SyGroup::where('name', 'like', "%$q%")->get();
        $res  = [];
        foreach ($data as $v) {
            $res[] = ["id" => $v->id, "text" => $v->name];
        }
        return response()->json($res);
    }

    public static function parsys($key)
    {
        $data = DB::table('sy_parsys')->where('name', $key)->first();
        echo empty($data) ? '' : $data->value;
    }

    public static function getMenu($page = "B")
    {
        $userid  = Auth::user()->id;
        $recMenu = SyLink::select('key2')->where('rel', 'GROUP-MENU')->whereIn('key1', function ($q2) use ($userid) {
            $q2->select('key2')->from('sy_link')->where('rel', 'USER-GROUP')->where('key1', $userid)->whereNull('deleted_at');
        })->whereNull('deleted_at')->get();
        $arrMenu = [];
        foreach ($recMenu as $key => $v) {
            $arrMenu[] = $v->key2;
        }

        return $data = SyMenu::where('parent', 1)->where('page', $page)
            ->with(['rel_symenu' => function ($q1) use ($arrMenu) {
                $q1->whereIn('id', $arrMenu)->with(['rel_symenu' => function ($q2) use ($arrMenu) {
                    $q2->whereIn('id', $arrMenu)->with(['rel_symenu' => function ($q3) use ($arrMenu) {
                        $q3->whereIn('id', $arrMenu)->with(['rel_symenu'])->whereNull('deleted_at');
                    }])->whereNull('deleted_at');
                }])->whereNull('deleted_at');
            }])->whereNull('deleted_at')
            ->whereIn('id', $arrMenu)
            ->orderBy('order_no')
            ->get();
        // print_r($data);die("xxx");
        // return $data;

    }

    public static function getGuestMenu($page = "F")
    {
        return $data = SyMenu::where([['parent', '=', 1], ['page', '=', $page], ['deleted_at', '=', null]])->orderBy('order_no', 'ASC')->get();
    }
    public static function getSubMenu1($id, $page = "B")
    {
        return $data = SyMenu::where([['parent', '=', $id], ['page', '=', $page], ['deleted_at', '=', null]])->get();

    }

    public static function hitCounter($tbl = 'parsys')
    {
        return DB::table($tbl)->where('name', 'VISIT_COUNTER')->value('value');
    }

    public static function fileUpload($file, $path, $mime = ['image'])
    {

        $contents    = File::get($file);
        $filename    = $file->getClientOriginalName();
        $destination = $path . "/" . $filename;

        $mimetype = File::mimeType($file->getRealPath());
        $ex       = explode("/", $mimetype);
        $prefix   = isset($ex[0]) ? $ex[0] : '';

        if (!in_array($prefix, $mime)) {
            return false;
        }

        if (Storage::disk('ftp')->put($destination, $contents)) {
            return $path . "/" . $filename;
        } else {
            return false;
        }
    }

    public static function strLike($key, $word)
    {
        if (strpos($key, $word) === false) {
            return false;
        } else {
            return true;
        }
    }

    public static function autonumber($prefix, $length, $conn, $field, $table, $where = "")
    {
        if ($conn == "") {
            $conn = "mysql";
        }
        $query = "SELECT MAX(CONVERT(MID($field," . (strlen($prefix) + 1) . "," . ($length - strlen($prefix)) . "),UNSIGNED INTEGER))+1 AS NOMOR
                        FROM $table WHERE LEFT($field," . (strlen($prefix)) . ")='$prefix' $where";
        $data = DB::connection($conn)->select(DB::raw($query));

        if ($data == false) {
            $last = 0;
        } else {
            $last = @$data[0]->NOMOR;
        }

        $num  = $length - strlen($prefix) - strlen($last);
        $zero = "";
        for ($i = 0; $i < $num; $i++) {
            $zero = $zero . "0";
        }
        return $prefix . $zero . $last;
    }

    public static function getBulan()
    {
        return [
            '1'  => 'Januari',
            '2'  => 'Februari',
            '3'  => 'Maret',
            '4'  => 'April',
            '5'  => 'Mei',
            '6'  => 'Juni',
            '7'  => 'Juli',
            '8'  => 'Agustus',
            '9'  => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
    }

    public static function getKategori($name)
    {
        return \App\Models\SyCategory::where(['name' => $name])->get();
    }

    public static function allowed($accessid, $userid = '')
    {
        if ($userid == '') {
            $userid = Auth::user()->id;
        }
        $sy_access = SyAccess::where('accessname', '=', $accessid)->first();
        // dd($sy_access);
        if ($sy_access == false) {
            self::$strreason = "Anda tidak punya akses ";
            return false;
        }

        if ($sy_access->accessgroup == 'USER') {
            // die('a');
            $sy_link = SyLink::where('rel', 'USER-ACCESS')
                ->where('key1', $userid)
                ->where('key2', $sy_access->id);
        } else if ($sy_access->accessgroup == 'GROUP') {
            // die('b');
            $sy_link = SyLink::where('rel', 'GROUP-ACCESS')
                ->whereIn('key1', function ($q) use ($userid) {
                    $q->select('key2')->from('sy_link')->where('rel', 'USER-GROUP')->where('key1', $userid)->whereNull('deleted_at');
                })
                ->where('key2', $sy_access->id);
            // DB::enableQueryLog();
            // $sy_link->get();
            // dd(DB::getQueryLog());
        }

        $ttl = $sy_link->count();
        // dd($ttl);
        if ($ttl > 0) {
            return true;
        } else {
            self::$strreason = "Anda  (" . $sy_access->accessgroup . ")  tidak punya akses " . $accessid;
            logsystem("system", $accessid, "Failure access : " . $accessid, "auth", request()->ip());
            return false;
        }

    }

    public static function reason()
    {
        return self::$strreason;
    }

}
