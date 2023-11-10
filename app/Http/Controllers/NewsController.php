<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsTag;
use App\Models\Tags;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    use StorageImageTrait;
    private $newsCategory;
    private $news;
    private $tags;
    private $newsTag;
    public function __construct(NewsCategory $newsCategory, News $news, Tags $tags, NewsTag $newsTag)
    {
        $this->newsCategory = $newsCategory;
        $this->news = $news;
        $this->tags = $tags;
        $this->newsTag = $newsTag;

        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function index()
    {
        $listNews = $this->news->where('status',1)->orderBy('id', 'desc')->paginate(5); // bài viết đang hiển thị lên web
        $listNewsHidden = $this->news->where('status',0)->orderBy('id', 'desc')->paginate(5); // bài viết ẩn
       //  echo "<pre>"; print_r($listNews); exit;
        return view('admin.news.index', compact('listNews','listNewsHidden'));
    }

    public function create()
    {
        $listCategory = $this->newsCategory->all()->toArray();
        return view('admin.news.add', compact('listCategory'));
    }

    public function addNews(NewsRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataInsertNews = array(
                'title' => $request->title,
                'short_content' => $request->short_content,
                'content' => $request->contents,
                'date' => date("Y-m-d H:s:i", time()),
                'image_name' => date("Y-m-d H:s:i", time()). $request->image_path,
                'image_path'=> $request->image_path,
                'category_id' => $request->category_id,
                'show_app' => 1, //$request->show_app,
                'status' => 1,
                'highlight' => $request->highlight,
                'user_id' => auth()->id(),
                'slug'  => str_slug($request->title).'-'.date("dmY", time()).time().'.html'
            );

            //upload image
            // $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'news');
            // if (!empty($dataUploadImage)) {
            //     $dataInsertNews['image_name'] = $dataUploadImage['file_name'];
            //     $dataInsertNews['image_path'] = $dataUploadImage['file_path'];
            // }
            #echo "<pre>"; print_r($dataInsertNews); exit;
            $news = $this->news->create($dataInsertNews);

            // insert vào tag cho bài viết
            if (!empty($request->tags)) {
                foreach ($request->tags as $item) {
                    //------- ------ insert vào bảng tags ------- ------
                    // hàm firstOrCreate() kiểm tra xem dữ liệu đã tồn tại trong db chưa
                    $tagInstance = $this->tags->firstOrCreate(
                        array('name' => $item)
                    );
                    $array_tag_id[] = $tagInstance->id;

                    // ------- ------ insert luôn vào bảng news_tags ------- ------
                    // cách 1
                    // $this->newsTag->create(
                    //     [
                    //         'news_id' => $news->id,
                    //         'tag_id'  => $tagInstance->id
                    //     ]
                    // );
                }
            }
            else {
                $array_tag_id[] = 0;
            }
            // cách 2
            $news->tags()->attach($array_tag_id);

            DB::commit();
            return redirect()->route('news.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }


    public function edit(Request $request, $id)
    {
        $itemNews = $this->news->find($id);
        #echo "<pre>"; print_r($itemNews); exit;
        $listCategory = $this->newsCategory->all()->toArray();
        return view('admin.news.edit',compact('itemNews','listCategory'));
    }

    public function updateNews(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataUpdate = array(
                'title' => $request->title,
                'short_content' => $request->short_content,
                'content' => $request->contents,
                'date' => date("Y-m-d H:s:i", time()),
                'image_name' => date("Y-m-d H:s:i", time()). $request->image_path,
                'image_path'=> $request->image_path,
                'category_id' => $request->category_id,
                'show_app' => $request->show_app,
                'status' => $request->status,
                'highlight' => $request->highlight,
                'user_id' => auth()->id(),
                //'slug'  => str_slug($request->title).'-'.date("dmY", time()).time().'.html'
            );

            //upload image
            // $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'upload');

            // if (!empty($dataUploadImage)) {
            //     $dataUpdate['image_name'] = $dataUploadImage['file_name'];
            //     $dataUpdate['image_path'] = $dataUploadImage['file_path'];
            // }

            $this->news->find($id)->update($dataUpdate);
            $news = $this->news->find($id);

            if (!empty($request->tags)) {
                foreach ($request->tags as $item) {
                    $tagInstance = $this->tags->firstOrCreate(
                        array('name' => $item)
                    );
                    $array_tag_id[] = $tagInstance->id;
                }
            }
            else {
                $array_tag_id[] = 0;
            }
            // cách 2
            $news->tags()->sync($array_tag_id);

            DB::commit();
            return redirect()->route('news.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message " . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }
}
