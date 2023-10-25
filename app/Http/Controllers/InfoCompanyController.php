<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequest;
use App\Http\Requests\InforCompanyResquest;
use App\Http\Requests\SocialNetworkRequest;
use App\Models\AboutUs;
use App\Models\InfoCompany;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;


class InfoCompanyController extends Controller
{

    use StorageImageTrait;
    private $infoCompany;
    private $aboutUs;
    private $branch;
    public function __construct(InfoCompany $infoCompany, AboutUs $aboutUs, Branch $branch)
    {
        $this->infoCompany = $infoCompany;
        $this->aboutUs = $aboutUs;
        $this->branch = $branch;
    }
    public function infor()
    {
        // dùng chung hàm này cho 2 url : thông tin công ty và mạng xã hội nên dùng uri để check
        // thông tin công ty : /infoCompany
        // mạng xã hội : /infoCompany/socialNetwork

        $current_uri = request()->segments();
        $uri_part_one = $current_uri[1];

        if (empty($current_uri[2])) {
            $uri_part_two = '';
        } else {
            $uri_part_two = $current_uri[2];
        }

        $infor = $this->infoCompany->first();
        $aboutUs = $this->aboutUs->first();


        if (empty($infor)) {
            $inforCompany = [];
        } else {
            $inforCompany = $infor->toArray();
        }

        if (empty($aboutUs)) {
            $aboutUs = [];
        } else {
            $aboutUs = $aboutUs->toArray();
        }


        // echo "<pre>"; print_r($inforCompany);
        if ($uri_part_one == 'infoCompany' && $uri_part_two == '') {
            return view('admin.information.index', compact('inforCompany'));
        } else if ($uri_part_one == 'infoCompany' && $uri_part_two == 'socialNetwork') {
            return view('admin.information.socialNetwork', compact('inforCompany'));
        }
        else if($uri_part_one == 'infoCompany' && $uri_part_two == 'aboutUs') {
            return view('admin.information.aboutUs',compact('aboutUs'));
        }

    }

    // ------------------- phần thông tin công ty ----------------------
    public function addInfor(InforCompanyResquest $inforCompanyResquest)
    {
        try {
            DB::beginTransaction();
            $dataInsert = array(
                'address' => $inforCompanyResquest->address,
                'email' => $inforCompanyResquest->email,
                'phone' => $inforCompanyResquest->phone,
                'map' => $inforCompanyResquest->map,
            );

            //upload logo
            $dataUploadImgLogo = $this->storageTraitUpload($inforCompanyResquest, 'image_logo_path', 'logo');

            if (!empty($dataUploadImgLogo)) {
                $dataInsert['image_logo'] = $dataUploadImgLogo['file_name'];
                $dataInsert['image_logo_path'] = $dataUploadImgLogo['file_path'];
            }

            //upload favicon
            $dataUploadImgFavicon = $this->storageTraitUpload($inforCompanyResquest, 'image_favicon_path', 'logo');
            if (!empty($dataUploadImgFavicon)) {
                $dataInsert['favicon'] = $dataUploadImgFavicon['file_name'];
                $dataInsert['image_favicon_path'] = $dataUploadImgFavicon['file_path'];
            }

            $this->infoCompany->create($dataInsert);

            DB::commit();
            return redirect()->route('infoCompany.infor');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function updateInfor(InforCompanyResquest $inforCompanyResquest, $id)
    {
        try {
            DB::beginTransaction();
            $dataUpdate = array(
                'address' => $inforCompanyResquest->address,
                'email' => $inforCompanyResquest->email,
                'phone' => $inforCompanyResquest->phone,
                'map' => $inforCompanyResquest->map,
            );

            //upload logo
            $dataUploadImgLogo = $this->storageTraitUpload($inforCompanyResquest, 'image_logo_path', 'logo');

            if (!empty($dataUploadImgLogo)) {
                $dataUpdate['image_logo'] = $dataUploadImgLogo['file_name'];
                $dataUpdate['image_logo_path'] = $dataUploadImgLogo['file_path'];
            }

            //upload favicon
            $dataUploadImgFavicon = $this->storageTraitUpload($inforCompanyResquest, 'image_favicon_path', 'logo');
            if (!empty($dataUploadImgFavicon)) {
                $dataUpdate['favicon'] = $dataUploadImgFavicon['file_name'];
                $dataUpdate['image_favicon_path'] = $dataUploadImgFavicon['file_path'];
            }

            $this->infoCompany->find($id)->update($dataUpdate);

            DB::commit();
            return redirect()->route('infoCompany.infor');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    // ------------------- phần social network -------------------
    public function updateSocialNetwork(SocialNetworkRequest $inforCompanyResquest, $id)
    {
        try {
            DB::beginTransaction();
            $dataUpdate = array(
                'facebook' => $inforCompanyResquest->facebook,
                'tiktok' => $inforCompanyResquest->tiktok,
                'zalo' => $inforCompanyResquest->zalo,
                'youtube' => $inforCompanyResquest->youtube,
            );

            $this->infoCompany->find($id)->update($dataUpdate);

            DB::commit();
            return redirect()->route('infoCompany.infor');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }


    // -------------------------- về chúng tôi -------------------------
    public function addAboutUs(AboutUsRequest $aboutUsRequest)
    {
        try {
            DB::beginTransaction();
            $dataInsertAboutUs = array(
                'content' => $aboutUsRequest->content,
                'slug'  => 've-chung-toi.html'
            );

            //upload image
            $dataUploadImage = $this->storageTraitUpload($aboutUsRequest, 'image_path', 'about_us');
            if (!empty($dataUploadImage)) {
                $dataInsertAboutUs['photo_about'] = $dataUploadImage['file_name'];
                $dataInsertAboutUs['image_path'] = $dataUploadImage['file_path'];
            }
            #echo "<pre>"; print_r($dataInsertAboutUs); exit;
            $this->aboutUs->create($dataInsertAboutUs);
            DB::commit();
            return redirect()->route('infoCompany.aboutus');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function updateAboutUs(Request $aboutUsRequest, $id)
    {
        try {
            DB::beginTransaction();
            $dataUpdate = array(
                'content' => $aboutUsRequest->content,
            );

            //upload image
            $dataUploadImage = $this->storageTraitUpload($aboutUsRequest, 'image_path', 'about_us');

            if (!empty($dataUploadImage)) {
                $dataUpdate['photo_about'] = $dataUploadImage['file_name'];
                $dataUpdate['image_path'] = $dataUploadImage['file_path'];
            }

            $this->aboutUs->find($id)->update($dataUpdate);

            DB::commit();
            return redirect()->route('infoCompany.aboutus');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }


    // -------------------------- chi nhánh công ty -------------------------
    public function branch()
    {
        $listBranch = $this->branch->all();
        return view('admin.branch.index',compact('listBranch'));
    }
    public function createBranch()
    {
        return view('admin.branch.add');
    }

    public function addBranch(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'address' => $request->address,
            // 'phone' => $request->phone
        );
        $this->branch->create($data);

        return redirect()->route('infoCompany.branch');
    }
}
