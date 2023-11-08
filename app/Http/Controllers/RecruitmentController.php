<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;
use App\Http\Requests\RecruimentRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;

class RecruitmentController extends Controller
{
    use StorageImageTrait;
    private $recruiment;
    public function __construct(Recruitment $recruiment)
    {
        $this->recruiment = $recruiment;
    }

    public function index()
    {
        $listRecruimentOn = $this->recruiment->where('status', 1)->latest()->paginate(5);
        $listRecruimentOff = $this->recruiment->where('status', 0)->latest()->paginate(5);

        return view('admin.recruiment.index', compact('listRecruimentOn'), compact('listRecruimentOff'));
    }

    public function create()
    {
        return view('admin.recruiment.add');
    }

    public function addRecruitment(RecruimentRequest $recruimentRequest)
    {
        try {
            DB::beginTransaction();
            $dataInsert = array(
                'title' => $recruimentRequest->title,
                'image_name' => date("dmY", time()).time() . $recruimentRequest->title,
                'image_path' => $recruimentRequest->image_path,
                'contents' => $recruimentRequest->contents,
                'number_of_applicants' => $recruimentRequest->number_of_applicants,
                'application_deadline' => date('Y-m-d', strtotime($recruimentRequest->application_deadline)) . ' 00:00:00',
                'nganhnghe' => $recruimentRequest->nganhnghe,
                'status' => 1, // 1 là cho hiển thị ra ngoài. 0 là ẩn
                'slug'  => str_slug($recruimentRequest->title) .'-'.date("dmY", time()).time().'.html'
            );

            // $dataUploadImage = $this->storageTraitUpload($recruimentRequest, 'image_path', 'recruiment');
            // if (!empty($dataUploadImage)) {
            //     $dataInsert['image_name'] = $dataUploadImage['file_name'];
            //     $dataInsert['image_path'] = $dataUploadImage['file_path'];
            // }

            $this->recruiment->create($dataInsert);
            DB::commit();
            return redirect()->route('recruitment.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $dataUpdate = $this->recruiment->find($id);
        #echo "<pre>"; print_r($dataUpdate); exit;
        return view('admin.recruiment.edit', compact('dataUpdate'));
    }
    public function updateRecruitment(Request $recruimentRequest, $id)
    {
        $dataOld = $this->recruiment->find($id);
        $image_name_old = $dataOld->image_name;
        $image_path_old = $dataOld->image_path;

        try {
            DB::beginTransaction();
            $dataUpdate = array(
                'title' => $recruimentRequest->title,
                'image_name' => date("dmY", time()).time() . $recruimentRequest->title,
                'image_path' => $recruimentRequest->image_path,
                'contents' => $recruimentRequest->contents,
                'number_of_applicants' => $recruimentRequest->number_of_applicants,
                'application_deadline' => date('Y-m-d', strtotime($recruimentRequest->application_deadline)) . ' 00:00:00',
                'nganhnghe' => $recruimentRequest->nganhnghe,
                'status' => $recruimentRequest->status,// 1 là cho hiển thị ra ngoài. 0 là ẩn
                'slug'  => str_slug($recruimentRequest->title) .'-'.date("dmY", time()).time().'.html'
            );

            //upload image
            // $dataUploadImage = $this->storageTraitUpload($recruimentRequest, 'image_path', 'recruiment');

            // if (!empty($dataUploadImage)) {
            //     $dataUpdate['image_name'] = $dataUploadImage['file_name'];
            //     $dataUpdate['image_path'] = $dataUploadImage['file_path'];
            // }
            // else
            // {
            //     $dataUpdate['image_name'] = $image_name_old;
            //     $dataUpdate['image_path'] = $image_path_old;
            // }

            $this->recruiment->find($id)->update($dataUpdate);
            DB::commit();
            return redirect()->route('recruitment.index');
        }
        catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }
}
