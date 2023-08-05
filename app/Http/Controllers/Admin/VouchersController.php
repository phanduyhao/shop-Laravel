<?php

namespace App\Http\Controllers\Admin;
use App\Models\vouchers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class VouchersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vouchers = vouchers::all();
        return view('admin.voucher.index', compact('vouchers'), [
            'title' => 'Quản lý Vouchers'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $vouchers = vouchers::all();
        return view('admin.voucher.create', compact('vouchers'),[
            'title'=>'Tạo mới vouchers'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => [
                'required',
                Rule::unique('vouchers', 'codeName')
            ],
            'type' => 'required',
            'contents' => 'required',
            'price' => 'required'
        ], [
            'code.required' => 'Vui lòng nhập mã code voucher!',
            'code.unique' => 'Mã code voucher đã tồn tại!',
            'type.required' => 'Vui lòng nhập loại voucher!',
            'contents.required' => 'Vui lòng nhập nội dung Voucher!',
            'price.required' => 'Vui lòng nhập price!'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //
        $voucher = new vouchers;
        $voucher->codeName = $request->code;
        $voucher->type = $request->type;
        $voucher->content = $request->contents;
        $voucher->price = $request->price;
        $voucher->save();
        return redirect()->route('vouchers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(vouchers $vouchers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( vouchers $voucher)
    {
        $vouchers = vouchers::find($voucher); //Tìm danh mục theo id
            return view('admin.voucher.edit',compact('vouchers', 'voucher'),[
                'title'=>'Chỉnh sửa sản phẩm'
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vouchers $voucher)
    {
//        $vouchers =  vouchers::find($voucher); //Tìm danh mục theo id

        // Kiểm tra và xử lý dữ liệu gửi từ form
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'type' => 'required',
            'contents' => 'required',
            'price' => 'required'
        ], [
            'code.required' => 'Vui lòng nhập mã code voucher!',
            'type.required' => 'Vui lòng nhập loại voucher!',
            'contents.required' => 'Vui lòng nhập nội dung Voucher!',
            'price.required' => 'Vui lòng nhập price!'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $voucher->codeName = $request->code;
        $voucher->type = $request->type;
        $voucher->content = $request->contents;
        $voucher->price = $request->price;
        $voucher->save();

        return redirect()->route('vouchers.index');    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(vouchers $voucher)
    {
        $voucher->delete();
        // Chuyển hướng về trang danh sách Product hoặc trang khác (tuỳ ý)
        return redirect()->route('vouchers.index')->with('success', 'Product đã được xóa thành công.');
    }
}
