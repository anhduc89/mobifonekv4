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

        $listProduct = DB::select("SELECT * FROM `products` WHERE highlight = 1 ORDER BY `id` DESC LIMIT 0,3");

        $path = public_path() . '/frontEnd/img/partner/';

        $files = File::allFiles($path);


        return view('frontEnd.page.home', compact('listNews', 'listProduct', 'files'));

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

        $insert = DB::table('contact')->insert([

            'name' => $request->name,

            'email' => $request->email,

            'number_phone' => $request->number_phone,

            'message' => $request->message,

            'type' => 1,
            // Liên hệ

        ]);

        // dd($insert);

        return view('frontEnd.page.contact', compact('insert'));

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

        $url_return_page = route("tuyenDungFrontEnd");

        $file_path = $destinationPath = 'uploads/CV/';

        // Tạo thư mục
        if (!file_exists($destinationPath))     mkdir($destinationPath, 0755, true);
        
        // Upload file
        if ($request->hasFile('fileCv')) {

            $extension = $request->file('fileCv')->getClientOriginalExtension();

            $name = $request->file('fileCv')->getClientOriginalName();

            // Valid extensions
            $validextensions = array("pdf");

            if (in_array(strtolower($extension), $validextensions)) {

                $fileName = time() . "_" . $request->name . ".pdf";

                $request->file('fileCv')->move($destinationPath, $fileName);

                $file_path .= $fileName;

            }else{

                return redirect($url_return_page)->with('message',  "Gửi Cv Thất bại, Vui lòng thử lại");

            }

        }

        $insert = DB::table('candidates_apply')->insert([

            'name' => $request->name,

            'email' => $request->mail,

            'number_phone' => $request->number_phone,

            'vitri' => $request->vitri,

            'files' => $file_path,

        ]);

        if( $insert)    return redirect($url_return_page)->with('message',  "Gửi Cv Thành công");

        else return redirect($url_return_page)->with('message',  "Gửi Cv Thất bại, Vui lòng thử lại");

    }
}