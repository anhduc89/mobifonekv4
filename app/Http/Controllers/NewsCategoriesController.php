<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;


class NewsCategoriesController extends Controller
{
    private $newsCategories ;
    public function __construct(NewsCategory $newsCategories)
    {
        $this->newsCategories = $newsCategories;
    }
    public function index()
    {
        $dataDisplay = $this->newsCategories->all()->sortByDesc("id")->latest()->paginate(5);
        #echo "<pre>"; print_r($dataDisplay); exit;
        return view('admin.newsCategories.index',compact('dataDisplay'));
    }
    public function create()
    {
        return view('admin.newsCategories.add');
    }

    public function addNewsCategories(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'slug_name' => str_slug($request->name) // laravel 9 bỏ hàm str_slug trong core. add thêm bằng câu lệnh "composer require laravel/helpers"
        );

        $this->newsCategories->create($data);

        return view('newsCategories.index');
    }


    // public function
}
