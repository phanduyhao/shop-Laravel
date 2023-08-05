<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cate;

class AdminCategory extends Controller
{
    public function index(){
        $cates = cate::all(); // Lấy tất cả các cate từ cơ sở dữ liệu
        return view('admin.categories.index', compact('cates'),[
            'title'=>'Quản lý cate'
        ]); // Truyền biến 'cates' sang View
    }
    public function create(){
        $cates = cate::all(); // Lấy tất cả các cate từ cơ sở dữ liệu
        return view('admin.categories.create', compact('cates'),[
            'title'=>'Tạo cate'
        ]);
    }
    //Khi tạo form request rồi thì Phải đổi (Request $request) -> ($CreateFormRequest)
    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ],[
                'name.required' => 'Vui lòng nhập tên danh mục !'
            ]
        );
        $cate = new cate;
        $cate->CateName = $request->name;
        $cate->desc = $request->desc;
        $cate->slug = $request->Slug;
        $cate->active = $request->active ? 1 : 0;;
        $cate->save();

        // Chuyển hướng về trang hiển thị danh sách cate hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('cateAdmin');
    }
    public function edit($id){
        $cate =  cate::find($id); //Tìm danh mục theo id
        return view('admin.categories.edit',compact('cate'),[
            'title'=>'Chỉnh sửa cate'
        ]);
    }
    public function update(Request $request, $id)
    {
        $cate =  cate::find($id); //Tìm danh mục theo id

        // Kiểm tra và xử lý dữ liệu gửi từ form
        $request->validate([
            'name.required'=>'Vui lòng nhập tên cate',
            'slug.required'=>'Vui lòng nhập Slug'
            // Các validation rules khác tùy theo yêu cầu của bạn
        ]);
        $cate->CateName = $request->name;
        $cate->desc = $request->desc;
        $cate->slug = $request->Slug;
        $cate->active = $request->active ? 1 : 0;;
        $cate->save();

        return redirect()->route('cateAdmin');
    }
    public function delete(Request $request, $id){
        $cate =  cate::find($id); //Tìm danh mục theo id
        $cate->delete();

        // Chuyển hướng về trang danh sách cate hoặc trang khác (tuỳ ý)
        return redirect()->route('cateAdmin')->with('success', 'cate đã được xóa thành công.');
    }
}
