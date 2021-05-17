<?php

namespace App\Http\Controllers\Mesys;

use App\Http\Controllers\Controller;
use App\Models\SyAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CrudController extends Controller
{

    public function index()
    {
        return view("mesys/crud/crud_frm");
    }

    function fn($fn, Request $request) {
        return $this->$fn($request);
    }

    public function getDatabases(Request $request)
    {
        $data_dbs  = DB::select("SELECT table_schema FROM information_schema.TABLES GROUP BY table_schema");
        $databases = [];
        foreach ($data_dbs as $key => $v) {
            $databases[] = $v->table_schema;
        }
        return response()->json(compact(['databases']));
    }

    public function getTables(Request $request)
    {
        $h = json_decode($request->h);
        // print_r($h);die();
        $data_dbs = DB::select("SELECT table_name FROM information_schema.TABLES a WHERE table_schema=? AND table_type=? GROUP BY table_name", [$h->db, 'BASE TABLE']);
        $tables   = [];
        foreach ($data_dbs as $key => $v) {
            $tables[] = $v->table_name;
        }
        return response()->json(compact(['tables']));
    }

    public function getFields(Request $request)
    {
        // $h = json_decode($request->h);
        $request = json_decode(file_get_contents('php://input'));
        $h       = $request->h;
        try {
            $data_dbs = DB::select("SELECT * FROM information_schema.COLUMNS a WHERE table_schema=? AND table_name=?", [$h->db, $h->tbl]);
            $fields   = [];
            $pk       = "";

            foreach ($data_dbs as $key => $v) {
                if (in_array($v->COLUMN_NAME, ['created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'])) {
                    $v->ELEMENT = "none";
                } elseif (in_array($v->EXTRA, ['auto_increment'])) {
                    $v->ELEMENT = "text readonly";
                } else {
                    $v->ELEMENT = "text";
                }
                $v->CAPTION  = ucwords(str_replace('_', ' ', $v->COLUMN_NAME));
                $v->REQUIRED = "";
                $fields[]    = $v;
                if ($pk == "" && $v->COLUMN_KEY == 'PRI') {
                    $pk = $v->COLUMN_NAME;
                }

            }
            return response()->json(compact(['fields', 'pk']));
            // return $fields;

        } catch (\Exception $e) {
            return [];
        }
    }

    /*    private function getPk($h)
    {
    $pk = DB::select("SELECT column_name FROM information_schema.COLUMNS a WHERE table_schema=? AND table_name=? AND extra=?", [$h->db, $h->tbl, 'auto_increment']);
    return $pk[0]->column_name;
    } */

    public function previewScript(Request $request)
    {
        $request = json_decode(file_get_contents('php://input'));
        $h       = $request->h;
        $dataset = $request->dataset;
        $h->pk   = $h->pk;

        $h->pageTitle      = str_replace('_', ' ', ucwords($h->tbl, "_"));
        $h->tblUper        = str_replace('_', '', ucwords($h->tbl, "_"));
        $h->tblLower       = strtolower($h->tbl);
        $h->tblAllUper     = Str::upper($h->tbl);
        $script_route      = htmlspecialchars(view("mesys.crud.crud_template_route", compact(['h'])));
        $script_controller = htmlspecialchars(view("mesys.crud.crud_template_controller", compact(['h'])));
        // $dataFields        = $this->getFields($request);
        $dataFields      = $dataset->fields;
        $script_model    = htmlspecialchars(view("mesys.crud.crud_template_model", compact(['h', 'dataFields'])));
        $script_view     = htmlspecialchars(view("mesys.crud.crud_template_view", compact(['h', 'dataFields'])));
        $path_route      = "\\routes\\web_part\\" . $h->tbl . ".php";
        $path_controller = "\\app\\Http\\Controllers\\" . $h->tblUper . "Controller.php";
        $path_model      = "\\app\\Models\\" . $h->tblUper . ".php";
        $path_view       = "\\resources\\views\\" . $h->tbl . "\\" . $h->tbl . "_frm.blade.php";
        $menu            = [
            'label'     => $h->tblUper,
            'redirect'  => 1,
            'url'       => $h->tbl,
            'parent'    => 1, //master
            'nm_parent' => 'master',
            'icon'      => 'fa-flash',
            'order_no'  => 1,
            'note'      => 'NEW',
            'page'      => 'B',
        ];
        $acs = [
            'create' => $h->tblAllUper . "_C",
            'read'   => $h->tblAllUper . "_R",
            'update' => $h->tblAllUper . "_U",
            'delete' => $h->tblAllUper . "_D",
        ];

        $msg = "Lakukan generate Route, Model, Controller, Form dan Security (Menu dan Access)";
        return response()->json(compact(['script_route', 'script_controller', 'script_model', 'script_view', 'path_route', 'path_controller', 'path_model', 'path_view', 'acs', 'menu', 'msg']));
    }

    public function createAccess(Request $request)
    {
        $h   = (object) $request->h;
        $tbl = Str::upper($h->tbl);
        //create, read, update, delete, web, export
        foreach (['C', 'R', 'U', 'D'] as $key => $v) {
            $syaccess              = new SyAccess();
            $syaccess->accessname  = $tbl . "_" . $v;
            $syaccess->accessgroup = $h->accessgroup;
            $syaccess->created_by  = Auth::user()->id;
            $syaccess->save();
        }
        $msg = "Akses berhasil dibuat";
        return response()->json(compact(['msg']));
    }

    public function deleteAccess(Request $request)
    {
        $h = (object) $request->h;
        print_r($h);die();
        foreach ($h as $key => $v) {
            // print_r($v);die();
            DB::enableQueryLog();
            SyAccess::where(['accessname' => $v])->forceDelete();
            $r = DB::getQueryLog();
            dd($r);
        }
        $msg = "Akses berhasil dihapus";
        return response()->json(compact(['msg']));

    }

    public function writeScript(Request $request)
    {
        $h    = $request->h;
        $path = base_path() . $request->path;
        if (file_exists($path)) {
            return response()->json("File $request->id sudah ada sebelumnya", 404);
        } else {
            if (!file_exists(dirname($path))) {
                mkdir(dirname($path), 0755, true);
            }
            $myfile = fopen($path, "w") or die("Gagal memuat file!");
            fwrite($myfile, html_entity_decode($request->script));
            fclose($myfile);
            $msg = "File $path berhasil dibuat!";
            return response()->json(compact(['msg']));
        }
    }

    public function delFileExist(Request $request)
    {
        $path = base_path() . $request->path;
        if (file_exists($path)) {
            unlink($path);
            $msg = "File $path berhasil dihapus!";
            return response()->json(compact(['msg']));
        } else {
            return response()->json('File tidak ditemukan', 404);
        }

    }

}
