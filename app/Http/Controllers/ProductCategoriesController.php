<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    private $productCategories;
    public function __construct(ProductCategories $productCategories)
    {
        $this->productCategories = $productCategories;
    }

    public function index()
    {
        $dataProductCategory = $this->productCategories->all();
        return view('admin.productCategories.index', compact('dataProductCategory'));
    }
    public function create()
    {
        return view('admin.productCategories.add');
    }

    public function addProductCategories(Request $request)
    {
        $dataInsert = array(
            'name' => $request->name,
            'slug'  => str_slug($request->name)
        );

        $this->productCategories->create($dataInsert);

        return redirect()->route('productCategories.index');
    }
}
