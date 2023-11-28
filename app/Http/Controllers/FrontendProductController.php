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
        $listCategories = DB::select("SELECT * FROM `product_categories` WHERE id NOT IN(2)"); // bỏ mục chuyển đổi số. Các sản phẩm thuộc danh mục con của CĐS
        return view('frontEnd.page.products.list',  compact('listProduct','listCategories'));

    }

    public function detail(Request $request, $slug){


        $detailProduct = collect(DB::select(" SELECT * FROM `products` WHERE slug = '$slug' "))->first()  ;

        if(empty($detailProduct )){
            abort(404);
        }

        // lấy ra danh sách 5 sản phẩm khác để gợi ý. Lấy random loại sản phẩm
        $listProduct = DB::select(" SELECT * FROM `products` WHERE `product_categories` = ( SELECT id FROM `product_categories` ORDER BY RAND() LIMIT 1 )
                                    AND status = 1 AND slug != '$slug' limit 5");

        // dd($listProduct) ;
        // SELECT * FROM `products`WHERE `product_categories` = 1
        // AND status = 1 AND slug != '$slug' limit 5

        return view('frontEnd.page.products.detail',  compact('detailProduct', 'listProduct'));

    }

    // public function productCategory(Request $request, $productCategorySlug)
    // {
    //     // lấy sản phẩm theo slug trên đường link
    //     $products = DB::select();
    // }
}
