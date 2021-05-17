<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = "";
        return view("backend.dashboard", compact(['a']));
    }

    public function cek(Request $req)
    {
        // $captcha = $_POST['g-recaptcha-response'] ?? '';
        // if (!$captcha) {
        //     echo '<h2>Please check the the captcha form.</h2>';
        //     exit;
        // }
        //         $secretKey = "6LeTdVAaAAAAACDG0OtYwnJD9T-5Z74n28tx-kPn";
        //         $ip        = $_SERVER['REMOTE_ADDR'];
        // // post request to server
        //         $url          = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);
        //         $response     = file_get_contents($url);
        //         $responseKeys = json_decode($response, true);
        // should return JSON with success as true
        // if ($responseKeys["success"]) {
        //     echo '<h2>Thanks for posting comment</h2>';
        // } else {
        //     echo '<h2>You are spammer ! Get the @$%K out</h2>';
        // }

        $countRaw = DB::table('users')->whereRaw('email = ? and password=?', [$req->email, $req->password])->get()->count();
        if ($countRaw > 0) {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }

    public function logout()
    {
        return redirect('/', 'refresh');

    }
}
