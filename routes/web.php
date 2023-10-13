<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CKEditorController;

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('homeFrontEnd');



// dùng cái này để làm chức năng login logout
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [AdminController::class, 'postLogin'])->name('login');

// logout
Route::get('/logout', [AdminController::class, 'postLogout'])->name('logout');

//Route::middleware('auth')->group(function () {
    Route::get('/homeAdmin', function () {
        return view('homeAdmin');
    })->name('homeAdmin');
//});


Route::prefix('admin')->group(function () {

    // ------------------------------------------------------------------------------------------
    // route dành cho danh mục bài viết
    Route::prefix('newsCategories')->group(function () {
        Route::get('/', [
            NewsCategoriesController::class,
            'as' => 'newsCategories.index',
            'uses' => 'NewsCategoriesController@index'
        ]);

        // -----------------------------------------------
        // hiển thị view tạo mới
        Route::get('/create', [
            NewsCategoriesController::class,
            'as' => 'newsCategories.create',
            'uses' => 'NewsCategoriesController@create'
        ]);

        // thêm mới
        Route::post('/addNewsCategories', [
            NewsCategoriesController::class,
            'as' => 'newsCategories.addNewsCategories',
            'uses' => 'NewsCategoriesController@addNewsCategories'
        ]);

        // -----------------------------------------------
        // hiển thị view cập nhật
        Route::get('/edit/{id}', [
            NewsCategoriesController::class,
            'as' => 'newsCategories.edit',
            'uses' => 'NewsCategoriesController@edit'
        ]);

        // cập nhật
        Route::post('/updateNewsCategories/{id}', [
            NewsCategoriesController::class,
            'as' => 'newsCategories.updateNewsCategories',
            'uses' => 'NewsCategoriesController@updateNewsCategories'
        ]);

        // -----------------------------------------------
        // xóa
        Route::get('/del/{id}', [
            NewsCategoriesController::class,
            'as' => 'newsCategories.del',
            'uses' => 'NewsCategoriesController@del'
        ]);
    });

    // route dành cho bài tin
    Route::prefix('news')->group(function () {
        Route::get('/', [
            NewsController::class,
            'as' => 'news.index',
            'uses' => 'NewsController@index'
        ]);

        // -----------------------------------------------
        // hiển thị view tạo mới
        Route::get('/create', [
            NewsController::class,
            'as' => 'news.create',
            'uses' => 'NewsController@create'
        ]);

        // thêm mới
        Route::post('/addNews', [
            NewsController::class,
            'as' => 'news.addNews',
            'uses' => 'NewsController@addNews'
        ]);

        // -----------------------------------------------
        // hiển thị view cập nhật
        Route::get('/edit/{id}', [
            NewsController::class,
            'as' => 'news.edit',
            'uses' => 'NewsController@edit'
        ]);

        // cập nhật
        Route::post('/updateNews/{id}', [
            NewsController::class,
            'as' => 'news.updateNews',
            'uses' => 'NewsController@updateNews'
        ]);

    });

    // ------------------------------------------------------------------------------------------
    // route dành cho danh mục sản phẩm - dịch vụ
    Route::prefix('productCategories')->group(function () {
        Route::get('/', [
            ProductCategoriesController::class,
            'as' => 'productCategories.index',
            'uses' => 'ProductCategoriesController@index'
        ]);

        // -----------------------------------------------
        // hiển thị view tạo mới
        Route::get('/create', [
            ProductCategoriesController::class,
            'as' => 'productCategories.create',
            'uses' => 'ProductCategoriesController@create'
        ]);

        // thêm mới
        Route::post('/addProductCategories', [
            ProductCategoriesController::class,
            'as' => 'productCategories.addProductCategories',
            'uses' => 'ProductCategoriesController@addProductCategories'
        ]);

        // -----------------------------------------------
        // hiển thị view cập nhật
        // Route::get('/edit/{id}', [
        //     NewsCategoriesController::class,
        //     'as' => 'newsCategories.edit',
        //     'uses' => 'NewsCategoriesController@edit'
        // ]);

        // // cập nhật
        // Route::post('/updateNewsCategories/{id}', [
        //     NewsCategoriesController::class,
        //     'as' => 'newsCategories.updateNewsCategories',
        //     'uses' => 'NewsCategoriesController@updateNewsCategories'
        // ]);

        // // -----------------------------------------------
        // // xóa
        // Route::get('/del/{id}', [
        //     NewsCategoriesController::class,
        //     'as' => 'newsCategories.del',
        //     'uses' => 'NewsCategoriesController@del'
        // ]);
    });

    // ------------------------------------------------------------------------------------------
    // route dành cho sản phẩm
    Route::prefix('products')->group(function () {
        Route::get('/', [
            ProductController::class,
            'as' => 'products.index',
            'uses' => 'ProductController@index'
        ]);
        // hiển thị view thêm mới sản phẩm
        Route::get('/create', [
            ProductController::class,
            'as' => 'products.create',
            'uses' => 'ProductController@create'
        ]);

        // phương thức thêm mới
        Route::post('/addProduct', [
            ProductController::class,
            'as' => 'products.addProduct',
            'uses' => 'ProductController@addProduct'
        ]);

        // hiển thị view cập nhật sản phẩm
        Route::get('/edit/{id}', [
            ProductController::class,
            'as' => 'products.edit',
            'uses' => 'ProductController@edit'
        ]);

        // phương thức update
        Route::post('/updateProduct/{id}', [
            ProductController::class,
            'as' => 'products.updateProduct',
            'uses' => 'ProductController@updateProduct'
        ]);

        // phương thức xóa sản phẩm
        Route::get('/del/{id}', [
            ProductController::class,
            'as' => 'products.del',
            'uses' => 'ProductController@del'
        ]);

    });

    // ------------------------------------------------------------------------------------------
    // route dành cho photo
    Route::prefix('image')->group(function () {
        Route::get('/', [
            ImageController::class,
            'as' => 'image.index',
            'uses' => 'ImageController@index'
        ]);

        // hiển thị view thêm mới ảnh
        Route::get('/create', [
            ImageController::class,
            'as' => 'image.create',
            'uses' => 'ImageController@create'
        ]);

        // phương thức thêm mới
        Route::post('/addImage', [
            ImageController::class,
            'as' => 'image.addImage',
            'uses' => 'ImageController@addImage'
        ]);

        // hiển thị view cập nhật
        Route::get('/edit/{id}', [
            ImageController::class,
            'as' => 'image.edit',
            'uses' => 'ImageController@edit'
        ]);

        // phương thức thêm mới
        Route::post('/updateImage/{id}', [
            ImageController::class,
            'as' => 'image.updateImage',
            'uses' => 'ImageController@updateImage'
        ]);

        // phương thức xóa slider
        Route::get('/del/{id}', [
            ImageController::class,
            'as' => 'image.del',
            'uses' => 'ImageController@del'
        ]);


    });

    // ------------------------------------------------------------------------------------------
    // route tuyển dụng
    Route::prefix('recruitment')->group(function () {
        Route::get('/', [
            Recruitment::class,
            'as' => 'recruitment.index',
            'uses' => 'RecruitmentController@index'
        ]);

        Route::get('/create', [
            Recruitment::class,
            'as' => 'recruitment.create',
            'uses' => 'RecruitmentController@create'
        ]);

        // thêm mới
        Route::post('/addRecruitment', [
            Recruitment::class,
            'as' => 'recruitment.addRecruitment',
            'uses' => 'RecruitmentController@addRecruitment'
        ]);

        Route::get('/edit/{id}', [
            Recruitment::class,
            'as' => 'recruitment.edit',
            'uses' => 'RecruitmentController@edit'
        ]);


        Route::post('/updateRecruitment/{id}', [
            Recruitment::class,
            'as' => 'recruitment.updateRecruitment',
            'uses' => 'RecruitmentController@updateRecruitment'
        ]);
    });

    // ------------------------------------------------------------------------------------------
    // route landing page
    Route::prefix('landingpage')->group(function () {
        Route::get('/', [
            LadingPage::class,
            'as' => 'landingpage.index',
            'uses' => 'LadingPageController@index'
        ]);

        Route::get('/create', [
            LadingPage::class,
            'as' => 'landingpage.create',
            'uses' => 'LadingPageController@create'
        ]);

        // thêm mới
        Route::post('/addLandingPage', [
            LadingPage::class,
            'as' => 'landingpage.addLandingPage',
            'uses' => 'LadingPageController@addLandingPage'
        ]);

        Route::get('/edit/{id}', [
            LadingPage::class,
            'as' => 'landingpage.edit',
            'uses' => 'LadingPageController@edit'
        ]);

        Route::post('/updateLandingPage/{id}', [
            LandingPage::class,
            'as' => 'landingpage.updateLandingPage',
            'uses' => 'LadingPageController@updateLandingPage'
        ]);
    });


    // ------------------------------------------------------------------------------------------
    // route thông tin công ty
    Route::prefix('infoCompany')->group(function () {
        Route::get('/', [
            InfoCompany::class,
            'as' => 'infoCompany.infor',
            'uses' => 'InfoCompanyController@infor'
        ]);

        // thêm mới
        Route::post('/addInfor', [
            NewsController::class,
            'as' => 'infoCompany.addInfor',
            'uses' => 'InfoCompanyController@addInfor'
        ]);
        // cập nhật
        Route::post('/updateInfor/{id}', [
            InfoCompany::class,
            'as' => 'infoCompany.updateInfor',
            'uses' => 'InfoCompanyController@updateInfor'
        ]);


        // socail network
        Route::get('/socialNetwork', [
            InfoCompany::class,
            'as' => 'infoCompany.socialNetwork',
            'uses' => 'InfoCompanyController@infor'
        ]);

        Route::post('/updateSocialNetwork/{id}', [
            InfoCompany::class,
            'as' => 'infoCompany.updateSocialNetwork',
            'uses' => 'InfoCompanyController@updateSocialNetwork'
        ]);

        // về chúng tôi
        Route::get('/aboutUs', [
            InfoCompany::class,
            'as' => 'infoCompany.aboutus',
            'uses' => 'InfoCompanyController@infor'
        ]);

        // thêm mới
        Route::post('/addAboutUs', [
            InfoCompany::class,
            'as' => 'infoCompany.addAboutUs',
            'uses' => 'InfoCompanyController@addAboutUs'
        ]);
        // cập nhật
        Route::post('/updateAboutUs/{id}', [
            InfoCompany::class,
            'as' => 'infoCompany.updateAboutUs',
            'uses' => 'InfoCompanyController@updateAboutUs'
        ]);

    });


    // ------------------------------------------------------------------------------------------
    // route dành cho menu website
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            MenusController::class,
            'as' => 'menus.index',
            'uses' => 'MenusController@index'
        ]);

        // -----------------------------------------------
        // hiển thị view tạo mới menu
        Route::get('/create', [
            MenusController::class,
            'as' => 'menus.create',
            'uses' => 'MenusController@create'
        ]);

        // thêm mới 1 menu
        Route::post('/addMenu', [
            MenusController::class,
            'as' => 'menus.addMenu',
            'uses' => 'MenusController@addMenu'
        ]);

        // -----------------------------------------------
        // hiển thị view cập nhật menu
        Route::get('/edit/{id}', [
            MenusController::class,
            'as' => 'menus.edit',
            'uses' => 'MenusController@edit'
        ]);

        // cập nhật menu
        Route::post('/updateMenu/{id}', [
            MenusController::class,
            'as' => 'menus.updateMenu',
            'uses' => 'MenusController@updateMenu'
        ]);

        // -----------------------------------------------
        // xóa menu
        Route::get('/del/{id}', [
            MenusController::class,
            'as' => 'menus.del',
            'uses' => 'MenusController@del'
        ]);
    });


    // setting - thông tin công ty
    // Route::prefix('settings')->group(function () {
    //     Route::get('/', [
    //         AdminSettingsController::class,
    //         'as' => 'settings.index',
    //         'uses' => 'AdminSettingsController@index'
    //     ]);

    //     // view hiển thị thêm mới setting
    //     Route::get('/create', [
    //         AdminSettingsController::class,
    //         'as' => 'settings.create',
    //         'uses' => 'AdminSettingsController@create'
    //     ]);

    //     // phương thức thêm mới
    //     Route::post('/addSettings', [
    //         AdminSettingsController::class,
    //         'as' => 'settings.addSettings',
    //         'uses' => 'AdminSettingsController@addSettings'
    //     ]);

    //     // view hiển thị cập nhật setting
    //     Route::get('/edit/{id}', [
    //         AdminSettingsController::class,
    //         'as' => 'settings.edit',
    //         'uses' => 'AdminSettingsController@edit'
    //     ]);

    //     // phương thức cập nhật
    //     Route::post('/updateSettings/{id}', [
    //         AdminSettingsController::class,
    //         'as' => 'settings.updateSettings',
    //         'uses' => 'AdminSettingsController@updateSettings'
    //     ]);
    // });

});
