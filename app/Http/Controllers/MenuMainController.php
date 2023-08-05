<?php

namespace App\Http\Controllers;
use App\Models\Menu;

use Illuminate\Http\Request;

class MenuMainController extends Controller
{
    public function index(){
        $menuItems = Menu::all(); // Lấy tất cả các menu items từ cơ sở dữ liệu
        return view('MenuMain', ['menuItems' => $menuItems]); // Truyền danh sách menu vào View 'home'
    }   
}
