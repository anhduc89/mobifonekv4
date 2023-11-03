<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class FrontendProductController extends Controller
{
    public function index()
    {

        $listProduct =  DB::select("SELECT * FROM `products` WHERE status = 1 ORDER BY `id` DESC");
        $listCategories = DB::select("SELECT * FROM `product_categories` ");
        return view('frontEnd.page.products.list',  compact('listProduct','listCategories'));

    }

    public function detail(Request $request, $slug){


        $detailProduct = collect(DB::select(" SELECT * FROM `products` WHERE slug = '$slug' "))->first()  ;

        if(empty($detailProduct )){
            abort(404);
        }

        // danh mục tin tức
        $listProduct = DB::select(" SELECT * FROM `products`WHERE `product_categories` = 1 AND slug != '$slug' limit 5");

        // dd($listProduct) ;

        return view('frontEnd.page.products.detail',  compact('detailProduct', 'listProduct'));

    }
}
