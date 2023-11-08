<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    use StorageImageTrait;
    private $image;
    public function __construct(Image $image)
    {
        $this->image = $image;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function index()
    {
        $listImage = $this->image->latest()->where('status', 1)->latest()->paginate(5);
        $listImageOff = $this->image->latest()->where('status', 0)->latest()->paginate(5);
        // echo "<pre>"; print_r($listimage); exit;
        return view('admin.image.index', compact('listImage','listImageOff'));
    }

    public function create()
    {
        return view('admin.image.add');
    }

    public function addImage(ImageRequest $imageRequest)
    {
        try {
            DB::beginTransaction();
            $dataInsertImage = array(
                'name' => $imageRequest->name,
                'type'  => $imageRequest->type,
                'file_name' => date('dmY_hsi', time()) . '_' . str_random(10) . '.' . $imageRequest->name,
                'path'  => $imageRequest->path,
                'status' => 1,
            );

            //upload image
            // $dataUploadImage = $this->storageTraitUpload($imageRequest, 'path', 'image');
            // if (!empty($dataUploadImage)) {
            //     $dataInsertImage['file_name'] = $dataUploadImage['file_name'];
            //     $dataInsertImage['path'] = $dataUploadImage['file_path'];
            // }
            #echo "<pre>"; print_r($dataInsertImage); exit;
            $this->image->create($dataInsertImage);
            DB::commit();
            return redirect()->route('image.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $itemImage = $this->image->find($id);
        return view('admin.image.edit', compact('itemImage'));
    }

    public function updateImage(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataUpdate = array(
                'name' => $request->name,
                'type' => $request->type,
                'file_name' => date('dmY_hsi', time()) . '_' . str_random(10) . '.' . $request->name,
                'path'  => $request->path,
                'status' => $request->status,
            );

            //upload image
            // $dataUploadImage = $this->storageTraitUpload($request, 'path', 'image');

            // if (!empty($dataUploadImage)) {
            //     $dataUpdate['image_name'] = $dataUploadImage['file_name'];
            //     $dataUpdate['path'] = $dataUploadImage['file_path'];
            // }
            $this->image->find($id)->update($dataUpdate);

            DB::commit();
            return redirect()->route('image.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }
}
