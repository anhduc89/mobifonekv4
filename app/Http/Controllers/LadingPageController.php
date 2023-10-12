<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use Illuminate\Http\Request;

class LadingPageController extends Controller
{
    private $landingPage;
    public function __construct(LandingPage $landingPage)
    {
        $this->landingPage = $landingPage;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function index()
    {
        $listLDP = $this->landingPage->latest()->paginate(5);
        return view('admin.landingpage.index',compact('listLDP'));
    }

    public function create()
    {
        return view('admin.landingpage.add');
    }

    public function addLandingPage()
    {
        echo 'test';
    }
}
