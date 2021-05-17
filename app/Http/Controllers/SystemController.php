<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SystemController extends Controller
{

    public function uploadFile(Request $request)
    {

        $mime = [];
        /** kirim dengan parameter s
         * t : text
         * i : image
         * a : audio
         * v : video
         * p : application
         * x : all mime
         * */

        $arrMime = ['t' => 'text', 'i' => 'image', 'a' => 'audio', 'v' => 'video', 'p' => 'application'];

        foreach ($arrMime as $k => $v) {
            if (strLike(@$request->s, $k) || strLike(@$request->s, 'x')) {
                $mime[] = $v;
            }
        }

        if (@$request->route == '') {
            return response()->json('route belum ditentukan', 500);
        }
        if (isset($request->file)) {
            // dd($request);

            $path = "/assets/uploads/" . @$request->route . "/" . @$request->id . "/";

            if (!Storage::exists($path)) {
                Storage::makeDirectory($path, 0775, true);
            }
            // $path = '/'.@$request->path . "/" . @$request->id . "/";
            $upload = fileUpload($request->file, $path, $mime);
            if ($upload == false) {
                return response()->json("Failure when upload file => " . json_encode($mime), 500);
            }
            // Sf::log(@$request->path, @$request->id, "Upload file : " . @$upload, "file");

            return $upload; //berisi url file terupload
        }
    }

    public function uploadList(Request $request)
    {
        $files = [];
        $path  = "assets/uploads/" . $request->route . "/" . $request->id;
        // $path="assets/uploads/berita/1/";
        $data = Storage::files($path);
        foreach ($data as $key => $file) {
            $files[$key]['name']      = $file;
            $part                     = explode("/", $file);
            $ext                      = explode(".", $file);
            $files[$key]['file_name'] = end($part);
            $files[$key]['extension'] = end($ext);
            $files[$key]['size']      = round(Storage::size($file) / 1024);
        }
        return response()->json(compact(['files', 'path', 'data']));
    }

    public function getUploadList($route, $id)
    {
        $files = [];
        $path  = "assets/uploads/" . $route . "/" . $id;
        // $path="assets/uploads/berita/1/";
        $data = Storage::files($path);
        foreach ($data as $key => $file) {
            $files[$key]['name']      = $file;
            $part                     = explode("/", $file);
            $ext                      = explode(".", $file);
            $files[$key]['file_name'] = end($part);
            $files[$key]['extension'] = end($ext);
            $files[$key]['size']      = round(Storage::size($file) / 1024);
        }
        return compact(['files', 'path', 'data']);
    }

    public function uploadGet($filename, Request $request)
    {
        if (!Storage::exists($filename)) {
            return response("File Not Found : " . $filename, 404);
        }

        $file = Storage::get($filename);
        Storage::put("libftp/" . $filename, $file);
        $mime = Storage::mimeType("libftp/" . $filename);
        Storage::delete("libftp/" . $filename);
        return response($file)->header('Content-Type', $mime)->header('Cache-Control', 'max-age=2592000,public');
    }

    public function about()
    {
        return view('system.system_about');
    }

    public function help()
    {
        return view('system.system_help');
    }
}
