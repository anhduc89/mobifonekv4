<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use File;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    use StorageImageTrait;
    public function index()
    {

        $listNews = DB::select("SELECT * FROM `news` WHERE highlight = 1 ORDER BY `id` DESC LIMIT 0,3");

        $listProduct = DB::select("SELECT * FROM `products` WHERE highlight = 1 AND status = 1 ORDER BY `id` DESC LIMIT 0,5");

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
        $url_return_page = route("contactFrontEnd");

        $name =  $request->name;

        $email = $request->email;

        $number_phone =  $request->number_phone;

        $message = preg_replace('/[><" ";]/', '', $request->message);

        // list $branches
        $branches = DB::select("SELECT * FROM `branch`");

        if (!$this->validatePhoneNumber($number_phone)) return redirect($url_return_page)->with('message', "Gửi thông tin thất bại, Vui lòng kiểm tra lại 'SỐ ĐIỆN THOẠI'");

        if (!$this->validateEmail($email)) return redirect($url_return_page)->with('message', "Gửi thông tin thất bại, Vui lòng kiểm tra lại 'EMAIL'");

        if (!$this->validateFullName($name)) return redirect($url_return_page)->with('message', "Gửi thông tin thất bại, Vui lòng kiểm tra lại 'HỌ TÊN'");

        $insert = DB::table('contact')->insert([

            'name' => $name,

            'email' => $email,

            'number_phone' => $number_phone,

            'message' => $message,

            'type' => 1,
            // Liên hệ

        ]);

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

        $real_name = $request->name;
        
        $name = $request->name;

        $email =  $request->mail;

        $number_phone =  $request->number_phone;

        $vitri = preg_replace('/[><" ";]/', '', $request->vitri);

        if (!$this->validatePhoneNumber($number_phone)) return redirect($url_return_page)->with('message', "Gửi Cv thất bại, Vui lòng kiểm tra lại 'SỐ ĐIỆN THOẠI'");

        if (!$this->validateEmail($email)) return redirect($url_return_page)->with('message', "Gửi Cv thất bại, Vui lòng kiểm tra lại 'EMAIL'");

        if (!$this->validateFullName($name)) return redirect($url_return_page)->with('message', "Gửi Cv thất bại, Vui lòng kiểm tra lại 'HỌ TÊN'");

        // Tạo thư mục
        if (!file_exists($destinationPath))
            mkdir($destinationPath, 0755, true);

        // Upload file
        if ($request->hasFile('fileCv')) {

            $extension = $request->file('fileCv')->getClientOriginalExtension();

            // Valid extensions
            $validextensions = array("pdf");

            if (in_array(strtolower($extension), $validextensions)) {

                $fileName = date('dmY', time()) .'_'. $name .'_'. $number_phone . ".pdf";

                $request->file('fileCv')->move($destinationPath, $fileName);

                $file_path .= $fileName;

            }
            else
            {
                return redirect($url_return_page)->with('message', "Gửi Cv thất bại> Vui lòng thử lại");
            }
        }

        $insert = DB::table('candidates_apply')->insert([
            'name' => $real_name,
            'email' => $email,
            'number_phone' => $number_phone,
            'vitri' => $vitri,
            'files' => $file_path,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        if ($insert)
            return redirect($url_return_page)->with('message', "Gửi Cv thành công");
        else
            return redirect($url_return_page)->with('message', "Gửi Cv thất bại. Vui lòng thử lại");

    }

    // hình ảnh công ty
    public function gallery()
    {
        $listImage = DB::select('SELECT * FROM `image` WHERE type = 2');
        #echo "<pre>"; print_r($listImage); exit;
        return view('frontEnd.page.gallery', compact("listImage"));
    }


    // chính sách fb
    public function policies_fb()
    {
        return view('policies_fb');
    }

    // Hàm kiểm tra số điện thoại
    function validatePhoneNumber($phoneNumber)
    {
        $regex = '/^[0-9]{9,10}$/';
        return preg_match($regex, $phoneNumber);
    }

    // Hàm kiểm tra email
    function validateEmail($email)
    {
        $regex = '/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9\-\.]+)\.([a-zA-Z]{2,6})$/';
        return preg_match($regex, $email);
    }

    // Hàm kiểm tra họ tên
    function validateFullName($fullName)
    {
        $regex = '/^[a-zA-Z\s]+$/';
        return preg_match($regex, $fullName);
    }

}
