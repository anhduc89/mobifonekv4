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

        $listNews = DB::select("SELECT * FROM `news` ORDER BY `id` DESC LIMIT 0,3 ;");

        $listProduct = DB::select("SELECT * FROM `products` ORDER BY `id` DESC LIMIT 0,3");

        $path = public_path() . '/frontEnd/img/partner/';

        $files = File::allFiles($path);


        return view('frontEnd.page.home', compact('listNews', 'listProduct', 'files'));

    }

    public function contact(Request $request)
    {

        $token = $request->session()->token();

        # echo "<pre>"; print_r($token); exit;
        // $token = csrf_token();

        return view('frontEnd.page.contact');

    }

    public function contactForm(Request $request)
    {

        // $token = $request->session()->token();

        // $token = csrf_token();

        // echo $request->name;

        $insert = DB::table('contact')->insert([

            'name' => $request->name,

            'email' => $request->email,

            'number_phone' => $request->number_phone,

            'message' => $request->message,

            'type' => 1,
            // Liên hệ

        ]);

        // dd($insert);

        return view('frontEnd.page.contact', compact('insert'));

    }

    public function aboutUs()
    {
        $aboutUs = collect(DB::select("SELECT * FROM `about_us`"))->first();
        #echo "<pre>"; print_r($aboutUs); exit;
        return view('frontEnd.page.aboutUs', compact('aboutUs'));
    }

    public function tuyenDung()
    {
        $listTuyenDung = DB::select("SELECT * FROM `recruitments` where status = 1 ORDER BY `id` DESC");
        return view('frontEnd.page.tuyendung.list', compact('listTuyenDung'));
    }

    
    public function tuyenDungDetail(Request $request, $slug){
        $detailTuyenDung = collect(DB::select(" SELECT * FROM `recruitments` WHERE slug = '$slug' "))->first()  ;

        if(empty($detailTuyenDung )){
            abort(404);
        }
        // danh mục tin tức
        $listTuyenDung = DB::select("SELECT * FROM `recruitments` WHERE slug <> '$slug' and status = 1");
        return view('frontEnd.page.tuyendung.detail', compact('detailTuyenDung' , 'listTuyenDung'));
    }
    public function tuyenDungForm(Request $request)
    {

        dd($request);

        $listProduct = DB::select("SELECT * FROM `products` ORDER BY `id` DESC");

        return view('frontEnd.page.tuyendung.list', compact('listProduct'));

    }
}
