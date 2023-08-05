<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\countries;

class Admincountry extends Controller
{
    public function index(){
        $country = countries::all(); // Lấy tất cả các countries từ cơ sở dữ liệu
        return view('admin.country.index', compact('country'),[
            'title'=>'Quản lý countries'
        ]); // Truyền biến 'countries' sang View
    }
    public function create(){
        $country = countries::all(); // Lấy tất cả các countries từ cơ sở dữ liệu
        return view('admin.country.create', compact('country'),[
            'title'=>'Tạo countries'
        ]);
    }
    //Khi tạo form request rồi thì Phải đổi (Request $request) -> ($CreateFormRequest)
    public function store(Request $request){
        $request->validate([
            'country'=>'required',

        ],[
                'country.required' => 'Vui lòng nhập tên đất nước !'
            ]
        );
        $country = new countries;
        $country->name = $request->country;
        $country->save();

        // Chuyển hướng về trang hiển thị danh sách countries hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('countryAdmin');
    }
    public function edit($id){
        $country = countries::find($id); //Tìm danh mục theo id
        return view('admin.country.edit',compact('country'),[
            'title'=>'Chỉnh sửa countries'
        ]);
    }
    public function update(Request $request, $id)
    {
        $country = countries::find($id);// Tìm countries dựa trên ID

        // Kiểm tra và xử lý dữ liệu gửi từ form
        $request->validate([
            'name.required'=>'Vui lòng nhập tên countries'
            // Các validation rules khác tùy theo yêu cầu của bạn
        ]);
        $country->name = $request->country;
        $country->save();

        return redirect()->route('countryAdmin');
    }
    public function delete(Request $request, $id){
        $country = countries::find($id);
        $country->delete();

        // Chuyển hướng về trang danh sách countries hoặc trang khác (tuỳ ý)
        return redirect()->route('countryAdmin')->with('success', 'countries đã được xóa thành công.');
    }
    public function getCities($countryId)
    {
        $cities = Address::where('country_id', $countryId)->pluck('city');

        return response()->json($cities);
    }
}
