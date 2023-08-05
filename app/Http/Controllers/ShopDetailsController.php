<?php

namespace App\Http\Controllers;
use App\Models\countries;
use App\Models\Products;
use App\Models\addresses;
use App\Models\carts;
use App\Models\vouchers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\save;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\HttpFoundation\Session\Storage\save;

session_start();
class ShopDetailsController extends Controller
{
    public function product($slug,$id){
        $product = Products::findOrFail($id);
        $title = $product->Title;
        return view('product.product-details',compact('product'),[
            'title'=>$title
        ]);
    }
    public function addToCart(Request $request, $id)
    {
        // Tìm sản phẩm dựa trên ID
        $product = Products::find($id);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        $cartItem = carts::where('product_id', $product->id)->first();

        if ($cartItem) {
            // Nếu sản phẩm đã tồn tại, cập nhật lại quanity
            $cartItem->quanity += $request->input('quanity');
            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            // Lấy ảnh đầu tiên từ cột "thumb" của sản phẩm
            $thumbImages = json_decode($product->thumb);
            $firstThumb = $thumbImages[0] ?? '';

            $cartItem = new carts;
            $cartItem->thumb = $firstThumb;
            $cartItem->product_id = $product->id;
            $cartItem->nameProduct = $product->Title;
            $cartItem->price = $product->discount;
            $cartItem->quanity = $request->input('quanity');
            $cartItem->subtotal = $cartItem->quanity * $cartItem->price;
            $cartItem->save();
        }
        return redirect()->route('carts')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    public function deleteCartItem($id)
    {
        // Thực hiện xóa sản phẩm từ cơ sở dữ liệu
        carts::destroy($id);

        // Hoặc sử dụng các logic xóa sản phẩm tương ứng với $id

        return redirect()->route('carts')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    }
    public function updateCart(Request $request)
    {
        $quantities = $request->input('quantities');
        foreach ($quantities as $productId => $quantity) {
            // Truy vấn sản phẩm trong giỏ hàng dựa trên product_id
            $cartItem = carts::where('product_id', $productId)->first();

            // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
            if ($cartItem) {
                // Cập nhật số lượng sản phẩm
                $cartItem->quanity = $quantity;
                $cartItem->save();
            }
        }
        return redirect()->route('carts')->with('updateCart_success', 'Giỏ hàng đã được cập nhật');
    }
    public function cart(){
        $carts = carts::all();
        $addresses = addresses::all();
        $country = countries::all();
        $vouchers = vouchers::all();
        return view('product.cart',compact('carts','addresses','country','vouchers'),[
            'title'=>'carts'
        ]);
    }

    public function applyVoucher(Request $request){
        $voucher = $request->input('voucher');
        $voucherCode = vouchers::where('codeName', $voucher)->first();

        if ($voucherCode) {
            $price = $voucherCode->price;
            session(['price' => $price]);
            session(['voucher' => $voucher]);
            return response()->json(['success' => true, 'price' => $price]);
        }else{
            return response()->json(['success' => false]);
        }
    }

    public function getCities($Country)
    {
        $addresses = addresses::where('Country', $Country)->get();
        return response()->json(['addresses' => $addresses]);
    }

    public function saveShippingDetails(Request $request)
    {
        $selectedMethod = $request->input('selectedMethod');
        $country = $request->input('country');
        $city = $request->input('city');
        $townCity = $request->input('townCity');
        $zip = $request->input('zip');

        Session::put('selectedMethod', $selectedMethod);
        Session::put('country', $country);
        Session::put('city', $city);
        Session::put('townCity', $townCity);
        Session::put('zip', $zip);

        return response()->json(['success' => true]);
    }
}
