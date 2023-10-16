<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use File;

use DB;

class HomeController extends Controller
{
    public function index()
    {
        
        $listNews =  DB::select("SELECT * FROM `news` ORDER BY `id` DESC LIMIT 0,3 ;");

        $listProduct =  DB::select("SELECT * FROM `products` ORDER BY `id` DESC LIMIT 0,3");
        
        $path = public_path() . '/frontEnd/img/partner/';
        
        $files = File::allFiles($path);


        return view('frontEnd.page.home',  compact('listNews', 'listProduct', 'files'));

    }

    public function contact(Request $request)
    {

        $token = $request->session()->token();
 
        // $token = csrf_token();

        return view('frontEnd.page.contact');

    }

    public function contactForm(Request $request)
    {

        // $token = $request->session()->token();
 
        // $token = csrf_token();

        // echo $request->name;

        $insert = DB::table('contact')->insert([

            'name' =>  $request->name,

            'email' => $request->email,

            'number_phone' => $request->number_phone,

            'message' => $request->message,

            'type' => 1, // Liên hệ

        ]);

        // dd($insert);
        
        return view('frontEnd.page.contact', compact('insert'));

    }

    public function aboutUs()
    {
        
        $aboutUs = DB::select("SELECT * FROM `about_us`");


        return view('frontEnd.page.aboutUs',  compact('aboutUs'));

    }

    public function tuyenDung()
    {
        
        $listProduct =  DB::select("SELECT * FROM `products` ORDER BY `id` DESC");
        
        return view('frontEnd.page.tuyendung.list',  compact('listProduct'));

    }

    public function tuyenDungForm(Request $request)
    {
        
        dd($request);

        $listProduct =  DB::select("SELECT * FROM `products` ORDER BY `id` DESC");
        
        return view('frontEnd.page.tuyendung.list',  compact('listProduct'));

    }
}
