<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class FrontendProductController extends Controller
{
    public function index()
    {

        $listProduct =  DB::select("SELECT * FROM `products` ORDER BY `id` DESC");
        $listCategories = DB::select("SELECT * FROM `product_categories` ");
        return view('frontEnd.page.products.list',  compact('listProduct','listCategories'));

    }

    public function detail(Request $request, $slug){


        $detailProduct = collect(DB::select(" SELECT * FROM `products` WHERE slug = '$slug' "))->first()  ;

        if(empty($detailProduct )){
            abort(404);
        }

        // danh mục tin tức
        $listNewsCategory = DB::select(" SELECT a.*, COUNT(b.id) total_news
                        FROM `news_categories` a
                        LEFT JOIN news b
                        ON a.id = b.category_id
                        GROUP BY a.id;");

        return view('frontEnd.page.products.detail',  compact('detailProduct', 'listNewsCategory'));

    }
}
