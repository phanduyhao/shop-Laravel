<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
class HomeController extends Controller
{
    public function home(){
        return view('home',[
            'title'=>'Trang chủ'
        ]);
    }
}
