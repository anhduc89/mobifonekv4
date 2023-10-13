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
        // $listNews = $this->news->latest()->paginate(5); //
        //  echo "<pre>"; print_r($listNews); exit;
        // return view('admin.news.index', compact('listNews'));

        $listNews =  DB::select("SELECT * FROM `news` ORDER BY `id` DESC LIMIT 0,3 ;");

        $listProduct =  DB::select("SELECT * FROM `products` ORDER BY `id` DESC LIMIT 0,3 ;");
        // If you would like to retrieve a list of 
        // all files within a given directory including all sub-directories   
        
        $path = public_path() . '/frontEnd/img/partner/';

        // dd($path);
        
        $files = File::allFiles($path); 


        return view('frontEnd.page.home',  compact('listNews', 'listProduct', 'files'));

    }
}
