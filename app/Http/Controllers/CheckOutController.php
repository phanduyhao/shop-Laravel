<?php

namespace App\Http\Controllers;
use App\Models\countries;
use App\Models\Products;
use App\Models\addresses;
use App\Models\carts;
use App\Models\vouchers;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\save;
use function Symfony\Component\HttpFoundation\Session\Storage\save;

session_start();
class CheckOutController extends Controller
{
    public function checkout(){
        $carts = carts::all();
        $addresses = addresses::all();
        $country = countries::all();
        $vouchers = vouchers::all();
        return view('product.checkout',compact('carts','addresses','country','vouchers'),[
            'title'=>'Checkout'
        ]);
    }

    public function saveCheckout(Request $request)
    {
        // Lấy thông tin sản phẩm từ trường ẩn "product_info" và chuyển đổi từ chuỗi JSON thành mảng PHP
        $products = json_decode($request->input('product_info'), true);
        // Tạo một mảng mới để lưu thông tin sản phẩm
        $productsArray = [];
        foreach ($products as $product) {
            $productName = $product['name'];
            $productPrice = $product['price'];
            // Lưu thông tin sản phẩm vào mảng productsArray
            $productsArray[] = [
                'name' => $productName,
                'price' => $productPrice
            ];
        }
        // Tạo mới đối tượng Order
        $orders = new orders();
        // Gán thông tin sản phẩm vào thuộc tính $orders->product
        $orders->product = json_encode($productsArray);
        // Gán các giá trị khác vào các thuộc tính của đối tượng $orders
        $orders->userID = $request->userID;
        $orders->firstName = $request->first_name;
        $orders->lastName = $request->last_name;
        $orders->company = $request->company_name;
        $orders->country = $request->Country;
        $orders->street_add = $request->address_name1;
        $orders->street_add2 = $request->address_name2;
        $orders->town = $request->town_city;
        $orders->state = $request->state;
        $orders->zip = $request->zip;
        $orders->phone = $request->phone;
        $orders->email = $request->email_address;
        $orders->shipType = $request->shipping_method;
        $orders->payMethod = $request->payment_method;
        $orders->total = $request->total;
        $orders->status = 'Processing';
        $orders->canceled = $request->canceled;
        $orders->paid = $request->paid;
        $orders->payDate = $request->created_at;
        $orders->orderDate = $orders->created_at;
        $orders->save();
        return view('order_complete',[
            "title" => "Order Complete"
        ]);
//        return redirect()->route('checkout');
    }

}
