<?php
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\mainContronller;
use App\Http\Controllers\Admin\AdminCategory;
use App\Http\Controllers\Admin\AdminAddress;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuMainController;
use App\Http\Controllers\ShopDetailsController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\Admincountry;
use App\Http\Controllers\Admin\VouchersController;
use App\Http\Controllers\Admin\adminOrders;
use Illuminate\Support\Facades\Route;
use App\Models\Voucher;
use App\Http\Controllers\register;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\Admin\Users\LoginContronller;

Route::get('/login',[LoginContronller::class,'index'])->name('login');
Route::post('admin/users/login/store', [LoginContronller::class,'store']);
// Xác thực quyền đăng nhập, Muốn vào TRANG QUẢN TRỊ phải qua bước đăng nhập
Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/main',[mainContronller::class,'index'])->name('admin');
        Route::prefix('menu')->group(function(){
            // Menu
            Route::get('add',[MenuController::class,'create'])->name('CreateMenu'); // Link vào giao diện
            Route::get('index',[MenuController::class,'index'])->name('MenuAdmin');
            Route::post('add',[MenuController::class,'store'])->name('InsertMenu'); // Link tạo CSDL Menu
            Route::get('edit/{id}.html',[MenuController::class,'edit'])->name('EditMenu');
            Route::post('edit/{id}',[MenuController::class,'update'])->name('updateMenu');
            Route::delete('delete/{id}',[MenuController::class,'delete'])->name('deleteMenu');
        });
        // Products
        Route::prefix('products')->group(function(){
            Route::get('add',[AdminProductsController::class,'create'])->name('Createproduct'); // Link vào giao diện
            Route::get('index',[AdminProductsController::class,'index'])->name('ProductAdmin');
            Route::post('add',[AdminProductsController::class,'store'])->name('Insertproduct'); // Link tạo CSDL Product
            Route::get('edit/{id}.html',[AdminProductsController::class,'edit'])->name('Editproduct');
            Route::post('edit/{id}',[AdminProductsController::class,'update'])->name('updateproduct');
            Route::delete('delete/{id}',[AdminProductsController::class,'delete'])->name('deleteproduct');
        });
        // Cate
        Route::prefix('categories')->group(function(){
            // Menu
            Route::get('add',[AdminCategory::class,'create'])->name('Createcate'); // Link vào giao diện
            Route::get('index',[AdminCategory::class,'index'])->name('cateAdmin');
            Route::post('add',[AdminCategory::class,'store'])->name('Insertcate'); // Link tạo CSDL Menu
            Route::get('edit/{id}.html',[AdminCategory::class,'edit'])->name('Editcate');
            Route::post('edit/{id}',[AdminCategory::class,'update'])->name('updatecate');
            Route::delete('delete/{id}',[AdminCategory::class,'delete'])->name('deletecate');
        });
        Route::prefix('addresses')->group(function(){
            // Menu
            Route::get('add',[AdminAddress::class,'create'])->name('Createaddress'); // Link vào giao diện
            Route::get('index',[AdminAddress::class,'index'])->name('addressAdmin');
            Route::post('add',[AdminAddress::class,'store'])->name('Insertaddress'); // Link tạo CSDL Menu
            Route::get('edit/{id}.html',[AdminAddress::class,'edit'])->name('Editaddress');
            Route::post('edit/{id}',[AdminAddress::class,'update'])->name('updateaddress');
            Route::delete('delete/{id}',[AdminAddress::class,'delete'])->name('deleteaddress');
        });
        Route::prefix('countries')->group(function(){
            // Menu
            Route::get('add',[Admincountry::class,'create'])->name('Createcountry'); // Link vào giao diện
            Route::get('index',[Admincountry::class,'index'])->name('countryAdmin');
            Route::post('add',[Admincountry::class,'store'])->name('Insertcountry'); // Link tạo CSDL Menu
            Route::get('edit/{id}.html',[Admincountry::class,'edit'])->name('Editcountry');
            Route::post('edit/{id}',[Admincountry::class,'update'])->name('updatecountry');
            Route::delete('delete/{id}',[Admincountry::class,'delete'])->name('deletecountry');
        });
        Route::prefix('vouchers')->group(function() {
            Route::resource('vouchers', VouchersController::class);
        });
        Route::prefix('orders')->group(function() {
            Route::resource('orders', adminOrders::class);
        });
    });
});
Route::post('admin/users/login/logout',[LoginContronller::class,'logout'])->name('logout');
// Trang chủ người dùng
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/menuMain',[MenuMainController::class,'index'])->name('menu');
Route::get('/product/{slug}/{id}.html',[ShopDetailsController::class,'product'])->name('ProductDetails');
Route::get('/carts',[ShopDetailsController::class,'cart'])->name('carts');
Route::post('/addToCart/{id}',[ShopDetailsController::class,'addToCart'])->name('AddToCart');
Route::delete('/cart/{id}', [ShopDetailsController::class, 'deleteCartItem'])->name('deleteCartItem');
Route::post('/updateCart', [ShopDetailsController::class, 'updateCart'])->name('updateCart');
Route::resource('Test', TestController::class);
Route::post('/apply-voucher', [ShopDetailsController::class, 'applyVoucher'])->name('applyVoucher');
//Route::post('/store-total-price', [ShopDetailsController::class, 'storeTotalPrice'])->name('storeTotalPrice');
Route::get('/get-cities/{Country}', [ShopDetailsController::class, 'getCities'])->name('getCities');
Route::post('/save-shipping-details', [ShopDetailsController::class, 'saveShippingDetails'])->name('saveShippingDetails');
// Check Out
Route::get('/checkout',[CheckOutController::class,'checkout'])->name('checkout');
Route::get('/register',[register::class,'register'])->name('register');
Route::post('/saveCheckout',[CheckOutController::class,'saveCheckout'])->name('saveCheckout');
//Route::get('/orderComplete',[register::class,'register'])->name('register');
