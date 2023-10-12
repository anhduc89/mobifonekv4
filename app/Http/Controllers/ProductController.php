<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\ProductCategories;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;

class ProductController extends Controller
{
    use StorageImageTrait;
    private $productCategories;
    private $products;
    public function __construct(ProductCategories $productCategories, Products $products)
    {
        $this->productCategories = $productCategories;
        $this->products = $products;
    }

    public function index()
    {
        $products = $this->products->latest()->paginate(10);
        // dd($products);
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $categories = $this->productCategories->all();
        return view('admin.product.add', compact('categories'));
    }

    public function addProduct(ProductsRequest $productsRequest)
    {
        $dataInsert = array(
            'name' => $productsRequest->name,
            'product_categories'    => $productsRequest->product_categories,
            'contents' => $productsRequest->contents,
            'slug' => str_slug($productsRequest->name) . '-' . date("dmY", time()) . time() . '.html'
        );

        $dataUploadImage = $this->storageTraitUpload($productsRequest, 'image_path', 'products');
        if (!empty($dataUploadImage)) {
            $dataInsert['image_name'] = $dataUploadImage['file_name'];
            $dataInsert['image_path'] = $dataUploadImage['file_path'];
        }

        $this->products->create($dataInsert);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $dataProduct = $this->products->find($id);
        $categories = $this->productCategories->all();
        return view('admin.product.edit', compact('dataProduct','categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $dataOld = $this->products->find($id);
        $image_name_old = $dataOld->image_name;
        $image_path_old = $dataOld->image_path;


        $dataUpdate = array(
            'name' => $request->name,
            'product_categories'    => $request->product_categories,
            'contents' => $request->contents,
            'slug' => str_slug($request->name) . '-' . date("dmY", time()) . time() . '.html'
        );

        $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'products');
        if (!empty($dataUploadImage)) {
            $dataUpdate['image_name'] = $dataUploadImage['file_name'];
            $dataUpdate['image_path'] = $dataUploadImage['file_path'];
        }
        else
        {
            $dataUpdate['image_name'] = $image_name_old;
            $dataUpdate['image_path'] = $image_path_old;
        }

        $this->products->find($id)->update($dataUpdate);

        return redirect()->route('products.index');
    }
}
