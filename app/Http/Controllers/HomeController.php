<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;

use File;

use DB;

class HomeController extends Controller
{
    use StorageImageTrait;
    public function index()
    {

        $listNews = DB::select("SELECT * FROM `news` ORDER BY `id` DESC LIMIT 0,3");

        $listProduct = DB::select("SELECT * FROM `products` WHERE highlight = 1 ORDER BY `id` DESC LIMIT 0,5");

        $listSlider = DB::select("SELECT * FROM `image` WHERE type = 1 ORDER BY `id`");

        $path = public_path() . '/frontEnd/img/partner/';

        $files = File::allFiles($path);


        return view('frontEnd.page.home', compact('listNews', 'listProduct', 'files', 'listSlider'));

    }

    public function contact(Request $request)
    {

        $token = $request->session()->token();

        # echo "<pre>"; print_r($token); exit;
        // $token = csrf_token();

        $branches = DB::select("SELECT * FROM `branch`");

        return view('frontEnd.page.contact', compact("branches"));

    }

    public function contactForm(Request $request)
    {

        // $token = $request->session()->token();

        // $token = csrf_token();

        // echo $request->name;

        $name =  preg_replace('/[><" ";]/', '', $request->name);
        
        $email =  preg_replace('/[><" ";]/', '', $request->email);

        $number_phone =  preg_replace('/[><" ";]/', '', $request->number_phone);

        $message =  preg_replace('/[><" ";]/', '', $request->message);

        $insert = DB::table('contact')->insert([

            'name' => $name,

            'email' => $email,

            'number_phone' => $number_phone,

            'message' => $message,

            'type' => 1,
            // Liên hệ

        ]);

        // dd($insert);
        $branches = DB::select("SELECT * FROM `branch`");

        return view('frontEnd.page.contact', compact('insert', 'branches'));

    }

    public function aboutUs()
    {
        $aboutUs = collect(DB::select("SELECT * FROM `about_us`"))->first();
        #echo "<pre>"; print_r($aboutUs); exit;
        return view('frontEnd.page.aboutUs', compact('aboutUs'));
    }

    public function tuyenDung()
    {
        $listTuyenDung = DB::select("SELECT * FROM `recruitments` where status = 1 ORDER BY `id` DESC");
        return view('frontEnd.page.tuyendung.list', compact('listTuyenDung'));
    }


    public function tuyenDungDetail(Request $request, $slug)
    {
        $detailTuyenDung = collect(DB::select(" SELECT * FROM `recruitments` WHERE slug = '$slug' "))->first();

        if (empty($detailTuyenDung)) {
            abort(404);
        }

        // danh mục tin tức
        $listTuyenDung = DB::select("SELECT * FROM `recruitments` WHERE slug <> '$slug' and status = 1");

        return view('frontEnd.page.tuyendung.detail', compact('detailTuyenDung', 'listTuyenDung'));
    }
    public function tuyenDungForm(Request $request)
    {
        // dd($request);
        $url_return_page = route("tuyenDungFrontEnd");

        $file_path = $destinationPath = 'uploads/CV/';
        
        $name =  preg_replace('/[><" ";]/', '', $request->name);
        
        $email =  preg_replace('/[><" ";]/', '', $request->mail);

        $number_phone =  preg_replace('/[><" ";]/', '', $request->number_phone);

        $vitri =  preg_replace('/[><" ";]/', '', $request->vitri);
        
        // Tạo thư mục
        if (!file_exists($destinationPath))     mkdir($destinationPath, 0755, true);

        // Upload file
        if ($request->hasFile('fileCv')) {

            $extension = $request->file('fileCv')->getClientOriginalExtension();

            

            // Valid extensions
            $validextensions = array("pdf");

            if (in_array(strtolower($extension), $validextensions)) {

                $fileName = time() . "_" . $name . ".pdf";

                $request->file('fileCv')->move($destinationPath, $fileName);

                $file_path .= $fileName;

            }else{

                return redirect($url_return_page)->with('message',  "Gửi Cv Thất bại, Vui lòng thử lại");

            }

        }

        $insert = DB::table('candidates_apply')->insert([

            'name' => $name,

            'email' => $email,

            'number_phone' => $number_phone,

            'vitri' => $vitri,

            'files' => $file_path,

        ]);

        if( $insert)    return redirect($url_return_page)->with('message',  "Gửi Cv Thành công");

        else return redirect($url_return_page)->with('message',  "Gửi Cv Thất bại, Vui lòng thử lại");

    }
}
