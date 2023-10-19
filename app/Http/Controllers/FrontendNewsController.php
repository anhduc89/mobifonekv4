<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class FrontendNewsController extends Controller
{
    public function index()
    {

        $listNews = DB::select("
            SELECT
                a.*, b.name category_name, b.slug_name category_slug, c.name user_name
            FROM
                `news` a
            LEFT JOIN
                news_categories b ON a.category_id = b.id
            LEFT JOIN
                users c ON c.id = a.user_id
            ORDER BY a.id DESC;
        ");

        // danh mục tin tức
        $listNewsCategory = DB::select("
            SELECT
                a.*, COUNT(b.id) total_news
            FROM
                `news_categories` a
            LEFT JOIN
                news b ON a.id = b.category_id
            GROUP BY a.id;"
        );

        // danh mục tags
        // $listNewsTags = DB::select("
        //     SELECT
        //         a.*, COUNT(b.id) total_news
        //     FROM
        //         `news_categories` a
        //     LEFT JOIN
        //         news b ON a.id = b.category_id
        //     GROUP BY a.id;"
        // );

        return view('frontEnd.page.news.list', compact('listNews', 'listNewsCategory'));

    }

    public function category(Request $request, $slug)
    {
        $where = '';
        if (isset($slug))
            $where = " Where b.slug_name = '" . $slug . "'";

        $listNews = DB::select("
            SELECT
                a.*, b.name category_name, b.slug_name category_slug, c.name user_name
            FROM
                `news` a
            LEFT JOIN
                news_categories b ON a.category_id = b.id
            LEFT JOIN
                users c ON c.id = a.user_id
               " . $where . "
            ORDER BY a.id DESC;
        ");

        // danh mục tin tức
        $listNewsCategory = DB::select("
            SELECT
                a.*, COUNT(b.id) total_news
            FROM
                `news_categories` a
            LEFT JOIN
                news b ON a.id = b.category_id
            GROUP BY a.id;"
        );

        return view('frontEnd.page.news.category', compact('listNews', 'listNewsCategory'));

    }

    public function detail(Request $request, $slug)
    {

        $detailNews = collect(DB::select("SELECT * FROM `news` WHERE slug = '$slug'"))->first();
        #echo "<pre>"; print_r($detailNews); exit;
        // if (count($detailNews) < 1) {
        //     abort(404);
        // }
        if(empty($detailNews))
        {
            abort(404);
        }

        // danh mục tin tức
        $listNewsCategory = DB::select(" SELECT a.*, COUNT(b.id) total_news
                                    FROM `news_categories` a
                                    LEFT JOIN news b
                                    ON a.id = b.category_id
                                    GROUP BY a.id;");

        return view('frontEnd.page.news.detail', compact('detailNews', 'listNewsCategory'));

    }
}
