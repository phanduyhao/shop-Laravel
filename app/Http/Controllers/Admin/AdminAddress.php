<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\addresses;
use App\Models\countries;


class AdminAddress extends Controller
{
    public function index(){
        $addresses = addresses::with('countries')->get(); // Lấy tất cả các Product từ cơ sở dữ liệu
        return view('admin.address.index', compact('addresses'),[
            'title'=>'Quản lý address'
        ]); // Truyền biến 'address' sang View
    }
    public function create(){
        $country = countries::all();
        return view('admin.address.create', compact('country'),[
            'title'=>'Tạo address'
        ]);
    }
    //Khi tạo form request rồi thì Phải đổi (Request $request) -> ($CreateFormRequest)
    public function store(Request $request){
        $request->validate([
//            'Country'=>'required',
            'city'=>'required',
            'town'=>'required',
            'zip'=>'required'

        ],[
//                'Country.required' => 'Vui lòng nhập Country !',
                'city.required' => 'Vui lòng nhập City !',
                'town.required' => 'Vui lòng nhập Town !',
                'zip.required' => 'Vui lòng nhập Zip !'
            ]
        );
        $addresses = new addresses;
        $addresses->Country = $request->country;
        $addresses->city = $request->city;
        $addresses->save();

        // Chuyển hướng về trang hiển thị danh sách address hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('addressAdmin');
    }
    public function edit($id){
        $address = addresses::find($id); //Tìm danh mục theo id
        $country = countries::all();
        return view('admin.address.edit',compact('address','country'),[
            'title'=>'Chỉnh sửa address'
        ]);
    }
    public function update(Request $request, $id)
    {
        $addresses = addresses::find($id);// Tìm address dựa trên ID

        // Kiểm tra và xử lý dữ liệu gửi từ form
        $request->validate([
            'name.required'=>'Vui lòng nhập tên address',
            'slug.required'=>'Vui lòng nhập Slug'
            // Các validation rules khác tùy theo yêu cầu của bạn
        ]);
        $addresses->Country = $request->country;
        $addresses->city = $request->city;
        $addresses->save();

        return redirect()->route('addressAdmin');
    }
    public function delete(Request $request, $id){
        $addresses = addresses::find($id);
        $addresses->delete();

        // Chuyển hướng về trang danh sách address hoặc trang khác (tuỳ ý)
        return redirect()->route('addressAdmin')->with('success', 'address đã được xóa thành công.');
    }
}
