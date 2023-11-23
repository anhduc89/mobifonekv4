<?php

namespace App\Http\Controllers;

use App\Components\ProductCategorisRecusive;
use App\Models\ProductCategories;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    private $productCategories;
    private $productCategoriesRecusive;

    public function __construct(ProductCategorisRecusive $productCategoriesRecusive,ProductCategories $productCategories)
    {
        $this->productCategoriesRecusive = $productCategoriesRecusive;
        $this->productCategories = $productCategories;
    }

    public function index()
    {
        $dataProductCategory = $this->productCategories->all();
        return view('admin.productCategories.index', compact('dataProductCategory'));
    }
    public function create()
    {
        $categoryParent = $this->productCategoriesRecusive->ProductCategorisRecusiveAdd();
        return view('admin.productCategories.add',compact('categoryParent'));
    }

    public function addProductCategories(Request $request)
    {
        $dataInsert = array(
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug'  => str_slug($request->name)
        );

        $this->productCategories->create($dataInsert);

        return redirect()->route('productCategories.index');
    }
}
