<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
// use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Menu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::all(); // Lấy tất cả các menu từ cơ sở dữ liệu
        return view('admin.menu.index', compact('menus'),[
            'title'=>'Quản lý Menu'
        ]); // Truyền biến 'menus' sang View
    }
    public function create(){
        $menus = Menu::all(); // Lấy tất cả các menu từ cơ sở dữ liệu
        return view('admin.menu.create', compact('menus'),[
            'title'=>'Tạo menu'
        ]);
    }
    //Khi tạo form request rồi thì Phải đổi (Request $request) -> ($CreateFormRequest)
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'slug'=>'required'
        ],[
            'name.required' => 'Vui lòng nhập tên danh mục !',
            'slug.required' => 'Vui lòng nhập Slug !'
        ]
    );
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->parent_id = $request->parentid;
        $menu->description = $request->desc;
        $menu->slug = $request->slug;
        $menu->content = "";
        $menu->active = $request->active ? 1 : 0;;
        $menu->save();

        // Chuyển hướng về trang hiển thị danh sách menu hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('MenuAdmin');
    }
    public function edit($id){
        $menu = Menu::find($id); //Tìm danh mục theo id
        return view('admin.menu.edit',compact('menu'),[
            'title'=>'Chỉnh sửa Menu'
        ]);
    }
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);// Tìm menu dựa trên ID
        
        // Kiểm tra và xử lý dữ liệu gửi từ form
        $request->validate([
            'name.required'=>'Vui lòng nhập tên Menu',
            'slug.required'=>'Vui lòng nhập Slug'
            // Các validation rules khác tùy theo yêu cầu của bạn
        ]);
        $menu->name = $request->name;
        $menu->parent_id = $request->parentid;
        $menu->description = $request->desc;
        $menu->slug = $request->slug;
        $menu->content = "";
        $menu->active = $request->active ? 1 : 0;;
        $menu->save();

        return redirect()->route('MenuAdmin');
    }
    public function delete(Request $request, $id){
        $menu = Menu::find($id);
        $menu->delete();
        
        // Chuyển hướng về trang danh sách menu hoặc trang khác (tuỳ ý)
        return redirect()->route('MenuAdmin')->with('success', 'Menu đã được xóa thành công.');
    }
}
