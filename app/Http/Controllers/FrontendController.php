<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sys    = new SystemController();
        $slides = Berita::get();
        foreach ($slides as $k => $v) {
            $files[$k] = $sys->getUploadList('berita', $v->id_berita);
        }
        $slides->gambar = $files;
        return view("frontend.home_sonar", compact(['slides']));
    }
}
