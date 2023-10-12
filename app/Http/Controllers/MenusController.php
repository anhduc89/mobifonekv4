<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }
    public function index()
    {
        $dataDisplay = $this->menu->all()->toArray(); // trả dữ liệu về dạng mảng
        return view('admin.menus.index',compact('dataDisplay'));
    }

    public function create()
    {
        $menuParent = $this->menuRecusive->menuRecusiveAdd();
        return view('admin.menus.add', compact('menuParent'));
    }

    public function addMenu(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'slug_name' => str_slug($request->name),
            'parent_id' => $request->parent_id
        );
        $this->menu->create($data);

        return redirect()->route('menus.index');

    }
}
