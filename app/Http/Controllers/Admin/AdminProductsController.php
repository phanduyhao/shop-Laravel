<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;// use App\Http\Requests\Product\CreateFormRequest;
use App\Models\Products;
use App\Models\cate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    public function index(){
        $products = Products::with('cate')->get(); // Lấy tất cả các Product từ cơ sở dữ liệu
//        $thumbPath = 'storage/images/products/' . $products->thumb[0]; // Tạo đường dẫn đến ảnh
//        return view('admin.products.index', ['product' => $products, 'thumbPath' => $thumbPath],[
//            'title'=>'Quản lý sản phẩm'
//        ]);
        return view('admin.products.index', compact('products'),[
            'title'=>'Quản lý sản phẩm'
        ]); // Truyền biến 'products' sang View
    }
    public function create(){
//        $products = Products::all(); // Lấy tất cả các Product từ cơ sở dữ liệu
        $cate = cate::all();
        return view('admin.products.create', compact('cate'),[
            'title'=>'Tạo mới sản phẩm'
        ]);
    }
    //Khi tạo form request rồi thì Phải đổi (Request $request) -> ($CreateFormRequest)
    public function store(Request $request){
        $request->validate([
            'Title'=>'required'
        ],[
                'Title.required' => 'Vui lòng nhập tên sản phẩm !'
            ]
        );
        // Kiểm tra xem cate_id có tồn tại trong bảng Cate hay không
        $product = new Products;
        $product->Title = $request->Title;
        $title = $product->Title;
        $thumbs = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($request->hasFile('thumb')) {
            $paths = [];
            foreach ($thumbs as $index => $thumb) {
                $fileName = Str::slug($title) . '-' . ($index + 1).'.jpg'; //Lưu tên ảnh theo Slug Title và thứ tự tăng dần
                $thumb->storeAs( 'public/images/products',$fileName); // Lưu ảnh đã thêm vào đường dẫn này
                $path = $fileName; // Lưu tên file ảnh theo slug Title
                $paths[] = $path;
            }
            // Lưu các đường dẫn vào cột "thumb" trong cơ sở dữ liệu
            $product->thumb = json_encode($paths);
        }
        $product->slug = $request->Slug;
        $product->cate_id = $request->cate_id;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->content = $request->content;
        $product->active = $request->active ? 1 : 0;
        $product->ishot = $request->ishot ? 1 : 0;
        $product->isnewfeed = $request->isnewfeed ? 1 : 0;
        $product->save();

        // Chuyển hướng về trang hiển thị danh sách Product hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->route('ProductAdmin');
    }
    public function edit($id){
        $product = Products::find($id); //Tìm danh mục theo id
        $cate = cate::all();

        return view('admin.products.edit',compact('product','cate'),[
            'title'=>'Chỉnh sửa sản phẩm'
        ]);
    }
    public function update(Request $request, $id)
    {
        $product = Products::find($id);// Tìm Product dựa trên ID

        // Kiểm tra và xử lý dữ liệu gửi từ form
        $request->validate([
            'Title'=>'required'
        ],[
                'Title.required' => 'Vui lòng nhập tên sản phẩm !'
            ]
        );

        $product->Title = $request->Title;
        $title = $product->Title;
        $thumbs = $request->file('thumb'); // Lấy file ảnh từ file Upload
        $oldThumbs = json_decode($product->thumb);
        // Xóa các ảnh cũ
        if (!is_null($oldThumbs)) {
            foreach ($oldThumbs as $oldThumb) {
                Storage::delete($oldThumb);
            }
        }
        if ($request->hasFile('thumb')) {
            $paths = [];
            foreach ($thumbs as $index => $thumb) {
                $fileName = Str::slug($title) . '-' . ($index + 1).'.jpg'; //Lưu tên ảnh theo Slug Title và thứ tự tăng dần
                $thumb->storeAs( 'public/images/products',$fileName); // Lưu ảnh đã thêm vào đường dẫn này
                $path = $fileName; // Lưu tên file ảnh theo slug Title
                $paths[] = $path;
            }
            // Lưu các đường dẫn vào cột "thumb" trong cơ sở dữ liệu
            $product->thumb = json_encode($paths);
        }
        $product->cate_id = $request->cate_id;
        $product->description = $request->desc;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->slug = $request->Slug;
        $product->content = $request->content;
        $product->active = $request->active ? 1 : 0;
        $product->ishot = $request->ishot ? 1 : 0;
        $product->isnewfeed = $request->isnewfeed ? 1 : 0;
        $product->save();

        return redirect()->route('ProductAdmin');
    }
    public function delete(Request $request, $id){
        $product = Products::find($id);
        $product->delete();

        // Chuyển hướng về trang danh sách Product hoặc trang khác (tuỳ ý)
        return redirect()->route('ProductAdmin')->with('success', 'Product đã được xóa thành công.');
    }
}
