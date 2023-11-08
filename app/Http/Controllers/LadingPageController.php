<?php

namespace App\Http\Controllers;

use App\Http\Requests\LandingPageRequest;
use App\Models\LandingPage;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Log;
use DB;

class LadingPageController extends Controller
{
    use StorageImageTrait;
    private $landingPage;
    public function __construct(LandingPage $landingPage)
    {
        $this->landingPage = $landingPage;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function index()
    {
        $listLDP = $this->landingPage->latest()->paginate(5);
        // echo "<pre>"; print_r($listLDP); exit;
        return view('admin.landingpage.index', compact('listLDP'));
    }

    public function create()
    {
        return view('admin.landingpage.add');
    }

    public function addLandingPage(LandingPageRequest $landingPageRequest)
    {
        try {
            DB::beginTransaction();
            $dataInsertLDP = array(
                'name' => $landingPageRequest->name,
                'content' => $landingPageRequest->content,
                'advantage' => $landingPageRequest->advantage,
                'feature' => $landingPageRequest->feature,
                'avatar' => date('dmY', time()) . $landingPageRequest->name,
                'avatar_path' => $landingPageRequest->avatar_path,
                'slug' => str_slug($landingPageRequest->name) . '.html'
            );

            //upload image
            // $dataUploadImage = $this->storageTraitUpload($landingPageRequest, 'avatar_path', 'landing_page');
            // if (!empty($dataUploadImage)) {
            //     $dataInsertLDP['avatar'] = $dataUploadImage['file_name'];
            //     $dataInsertLDP['avatar_path'] = $dataUploadImage['file_path'];
            // }
            #echo "<pre>"; print_r($dataInsertLDP); exit;
            $this->landingPage->create($dataInsertLDP);



            DB::commit();
            return redirect()->route('landingpage.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $itemLDP = $this->landingPage->find($id);
        // echo "<pre>"; print_r($itemLDP);
        return view('admin.landingpage.edit', compact('itemLDP'));
    }

    public function updateLandingPage(Request $landingPageRequest, $id)
    {
        $dataOld = $this->landingPage->find($id);
        // $image_name_old = $dataOld->avatar;
        // $image_path_old = $dataOld->avatar_path;

        try {
            DB::beginTransaction();
            $dataUpdate = array(
                'name' => $landingPageRequest->name,
                'content' => $landingPageRequest->content,
                'advantage' => $landingPageRequest->advantage,
                'feature' => $landingPageRequest->feature,
                'avatar' => date('dmY', time()) . $landingPageRequest->name,
                'avatar_path' => $landingPageRequest->avatar_path,
                'slug' => str_slug($landingPageRequest->name) . '.html'
            );

            //upload image
            // $dataUploadImage = $this->storageTraitUpload($landingPageRequest, 'avatar_path', 'landing_page');

            // if (!empty($dataUploadImage)) {
            //     $dataUpdate['avatar'] = $dataUploadImage['file_name'];
            //     $dataUpdate['avatar_path'] = $dataUploadImage['file_path'];
            // } else {
            //     $dataUpdate['avatar'] = $image_name_old;
            //     $dataUpdate['avatar_path'] = $image_path_old;
            // }

            #echo "<pre>"; print_r($dataUpdate); exit;
            $this->landingPage->find($id)->update($dataUpdate);
            DB::commit();
            return redirect()->route('landingpage.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

}
