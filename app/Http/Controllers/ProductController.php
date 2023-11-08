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
        $products = $this->products->where('status','1')->latest()->paginate(10);
        $productsHidden = $this->products->where('status','0')->latest()->paginate(10);
        // dd($products);
        #echo "<pre>"; print_r($productsHidden); exit;
        return view('admin.product.index',compact('products','productsHidden'));
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
            // 'eng_name' => $productsRequest->eng_name,
            'image_name' =>  date("dmY", time()) . time(). $productsRequest->image_path,
            'image_path'   => $productsRequest->image_path,
            'product_categories'    => $productsRequest->product_categories,
            'contents' => $productsRequest->contents,
            'short_content' => $productsRequest->short_content,
            'highlight' => $productsRequest->highlight,
            'slug' => str_slug($productsRequest->name) . '-' . date("dmY", time()) . time() . '.html'
        );
        // echo "<pre>"; print_r($dataInsert); exit;
        // $dataUploadImage = $this->storageTraitUpload($productsRequest, 'image_path', 'products');
        // if (!empty($dataUploadImage)) {
        //     $dataInsert['image_name'] = $dataUploadImage['file_name'];
        //     $dataInsert['image_path'] = $dataUploadImage['file_path'];
        // }

        $this->products->create($dataInsert);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $dataProduct = $this->products->find($id);
        // dd($dataProduct);
        // echo "<pre>"; print_r($dataProduct); exit;
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
            'image_name' =>  date("dmY", time()) . time(). $request->image_path,
            'image_path'   => $request->image_path,
            'product_categories'    => $request->product_categories,
            'contents' => $request->contents,
            'short_content' => $request->short_content,
            'highlight' => $request->highlight,
            'status' => $request->status,
            // 'slug' => str_slug($request->name) . '-' . date("dmY", time()) . time() . '.html'
        );

        // $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'products');
        // if (!empty($dataUploadImage)) {
        //     $dataUpdate['image_name'] = $dataUploadImage['file_name'];
        //     $dataUpdate['image_path'] = $dataUploadImage['file_path'];
        // }
        // else
        // {
        //     $dataUpdate['image_name'] = $image_name_old;
        //     $dataUpdate['image_path'] = $image_path_old;
        // }

        $this->products->find($id)->update($dataUpdate);

        return redirect()->route('products.index');
    }
}
