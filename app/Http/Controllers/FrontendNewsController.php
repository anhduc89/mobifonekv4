<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use DB;

class FrontendNewsController extends Controller
{
    public function index()
    {

        // $listNews = DB::select(" SELECT a.*, b.name category_name, b.slug_name category_slug, c.name user_name
        //     FROM `news` a
        //     LEFT JOIN
        //         news_categories b ON a.category_id = b.id
        //     LEFT JOIN
        //         users c ON c.id = a.user_id
        //     ORDER BY a.id DESC ");

        $listNews = DB::table('news')
            ->leftJoin('news_categories','news_categories.id','=','news.category_id')
            ->leftJoin('users','users.id','=','news.user_id' )
            ->select('news.*','news_categories.name as category_name','news_categories.slug_name as category_slug','users.name as user_name')
            ->where("news.status",1)
            ->orderBy('news.date','desc')
            ->paginate(10);
        // dd($listNews);
        // print_r($listNews->currentPage());die;
        #echo "<pre>"; print_r($listNews); exit;
        // danh mục tin tức
        $listNewsCategory = DB::select(" SELECT a.*, COUNT(b.id) total_news
            FROM `news_categories` a
            LEFT JOIN news b ON a.id = b.category_id
            GROUP BY a.id;" );

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
        // $where = '';
        // if (isset($slug)) { # $where = " Where b.slug_name = '" . $slug . "'";
        //     $where = 'news_categories.slug_name='.$slug.' ';
        // }

        // $listNews = DB::select(" SELECT a.*, b.name category_name, b.slug_name category_slug, c.name user_name
        //     FROM `news` a
        //     LEFT JOIN news_categories b ON a.category_id = b.id
        //     LEFT JOIN users c ON c.id = a.user_id
        //        " . $where . "
        //     ORDER BY a.id DESC;");

        $listNews = DB::table('news')
            ->leftJoin('news_categories','news_categories.id','=','news.category_id')
            ->leftJoin('users','users.id','=','news.user_id' )
            ->orderBy('news.id','desc')
            ->select('news.*','news_categories.name as category_name','news_categories.slug_name as category_slug','users.name as user_name')
            ->where("news.status",1)
            ->where("news_categories.slug_name",$slug)
            ->paginate(5);

        // danh mục tin tức
        $listNewsCategory = DB::select("
            SELECT
                a.*, COUNT(b.id) total_news
            FROM
                `news_categories` a
            LEFT JOIN
                news b ON a.id = b.category_id
            WHERE b.status = 1
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

        // lấy ra 5 bài tin khác để gợi ý
        $listNewsOther = DB::select("SELECT * FROM `news` WHERE `category_id` = ( SELECT category_id FROM `news` WHERE slug = '$slug' )
                                    AND slug != '$slug' limit 5");

        return view('frontEnd.page.news.detail', compact('detailNews', 'listNewsCategory', 'listNewsOther'));

    }
}
