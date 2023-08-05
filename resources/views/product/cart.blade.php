@extends('layout.layout_3')
@section('content')
<div class="site-main MyCart">
    <!-- Best Sellers -->
    <div class="site-main__bestSeller">
        <div class="container">
            <!--  -->
            <div class="crumb-main">
                <ol class="crumb-list flex-center">
                    <li>
                        <a href="/carts" id="link_shopping_cart">shopping cart</a>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="/checkout" id="link_checkout">checkout</a>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#" id="link_order_complete">order complete</a>
                    </li>
                </ol>
            </div>
            <div class="products-main d-flex w-100">
                <div class="" style="width: 66%">
                    <div class=" alert-success" style="color: green">
                        {{ session('updateCart_success') }}
                    </div>
                    <form class="productsCart w-100" action="{{ route('updateCart') }}" method="POST">
                        @csrf
                        <table class="productCarts-table w-100">
                            <thead >
                            <tr >
                                <th>product</th>
                                <th>price</th>
                                <th>quanity</th>
                                <th>subtotal</th>
                            </tr>
                            </thead>
                            @php
                                $subtotalAll = 0;
                            @endphp
                            @if (Auth::check())
                                <tbody >
                                @foreach($carts as $cart)
                                    <tr id="cartItem_{{ $cart->id }}" class="cate-cart-item" data-cartid="{{$cart->id}}">
                                        <td class="flex-center-left">
                                            <img width="100" src="{{ asset('storage/images/products/'. $cart->thumb) }}" alt="{{$cart->nameProduct}}">
                                            <a href="/product/{{$cart->product->slug}}/{{$cart->product_id}}.html" class="productsCart-name">{{$cart->nameProduct}}</a>
                                        </td>
                                        <td >
                                            <p class="productsCart-price">${{$cart->price}}.00</p>
                                        </td>
                                        <td >
                                            <div class="addCart">
                                                <div class="number">
                                                    <button type="button" class="decreaseButton" data-id="{{$cart->product_id}}" id="decreaseButton_{{$cart->product_id}}">-</button>
                                                    <input type="hidden" name="product_ids[]" value="{{ $cart->product_id }}">
                                                    <input data-id="{{$cart->product_id}}" class="numberInput" name="quantities[{{ $cart->product_id }}]" type="number" inputmode="numeric" id="numberInput_{{$cart->product_id}}" value="{{$cart->quanity}}" min="0">
                                                    <button type="button" class="increaseButton" data-id="{{$cart->product_id}}" id="increaseButton_{{$cart->product_id}}">+</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @php
                                                $subtotal = $cart->quanity * $cart->price;
                                                $subtotalAll = $subtotalAll + $subtotal ;
                                            @endphp
                                            <p class="productsCart-total">${{$subtotal}}.00</p>
                                        </td>
                                        <td class="exit-X">
                                            <button class="btn deleteButton" type="button" data-cart-id="{{ $cart->id }}" style="background: transparent; border: 0">
                                                <i class="fa-regular fa-circle-xmark"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
                                <tbody id="cart-items">

                                </tbody>
                            @endif
                            <tr id="cate-cart" class="cate-cart-item"></tr>
                        </table>
                        <!--  -->
                        <div class="other-button flex-center-between">
                            <button class="button__back">
                                <i class="fa-solid fa-arrow-left-long"></i>
                                Continue shopping
                            </button>
                            @if(Auth::check())
                                <button class="button__UpdateCart" >
                                    Update cart
                                </button>
                            @else
                                <button class="button__UpdateCart" id="btn_updateCart" >
                                    Update cart
                                </button>
                            @endif
                        </div>
                    </form>
                    <div class="Coupon">
                        <h3 class="Coupon-title">coupon discount</h3>
                        <div  class="flex-column" >
                            <input class="coupon-input" name="codeName" type="text" id="voucher" placeholder="Enter coupon code here... ">
                            <input class="coupon-apply" name="check_coupon" id="coupon_apply" type="submit" value="apply coupon">
                        </div>
                    </div>
                    <h3 id="apply_voucher_mess"></h3>
                    <div class="d-none" id="price_couppon">{{ session('price') }}</div>
                </div>
                <form action="" method="" class="CartsTotal">
                    <h3 class="CartsTotal-title">Cart Totals</h3>
                    <div class="subtotal flex-center-between">
                        <p class="subtotal-text">
                            Subtotal
                        </p>
                        <p class="subtotal-price" id="subtotalAll">
                            ${{$subtotalAll}}.00
                        </p>
                    </div>

                    <div class="calShip">
                        <p class="calShip-text">
                            Calculate shipping
                        </p>
                        <div class="flex-center-left">
                            <input type="radio" class="shipping_method" checked name="shipping_method" id="flat_rate" value="flat_rate" {{ session('selectedMethod') === 'flat_rate' ? 'checked' : '' }}>
                            <label class="check-label" for="flat_rate">Flat rate</label>
                        </div>
                        <div class="flex-center-left">
                            <input type="radio" class="shipping_method" name="shipping_method" id="free_shipping" value="free_shipping" {{ session('selectedMethod') === 'free_shipping' ? 'checked' : '' }}>
                            <label class="check-label" for="free_shipping">Free shipping</label>
                        </div>
                        <div class="flex-center-left">
                            <input type="radio" class="shipping_method" name="shipping_method" id="local_pickup" value="local_pickup" {{ session('selectedMethod') === 'local_pickup' ? 'checked' : '' }}>
                            <label class="check-label" for="local_pickup">Local pickup</label>
                        </div>
                    </div>
                    <div class="Address flex-column">
                        <p>Shipping to <span>{{ session('country') }}</span></p>
                        <div class="position-relative select-contain">
                            <select class="w-100" name="Country" id="country-select">
                                <option value="">--Select Country--</option>
                                @foreach($country as $country)
                                    <option value="{{ $country->id }}" {{ session('country') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <div class="arrow-down position-absolute"></div>
                        </div>
                        <div class="position-relative select-contain" id="addressContainer">
                            <select class="w-100" name="city" id="address-select">
                                <option value="">--Select City--</option>
                                @foreach($addresses as $address)
                                    <option value="{{ $address->id }}" {{ session('city') == $address->id ? 'selected' : '' }}>{{ $address->city }}</option>
                                @endforeach
                            </select>
                            <div class="arrow-down position-absolute"></div>
                        </div>
                        <input type="text" id="townCity" placeholder="Town / City" value="{{ session('townCity') }}">
                        <input type="text" id="zip" placeholder="ZIP" value="{{ session('zip') }}">
                        <button type="button" id="updateTotals">Update Totals</button>
                    </div>

                    <div class="Total flex-center-between">
                        <p class="Total-text">
                            Total
                        </p>
                        @php
                            $totalPrice = $subtotalAll
//                      @endphp
                        <p class="Total-price d-none" id="ToltalPrice"></p>
                        <p class="Total-price" id="ToltalPrice2"></p>
                    </div>
                    <a href="/checkout" class="checkout" id="checkout">proceed to checkout</a>
                </form>

                <!--  -->
            </div>
            <!--  -->
            <div class="other-product">
                <h1 class="title">
                    Product Recommendations
                </h1>
                <div class="products flex-center flex-center-between">
                    <div class="products-item position-relative flex-column flex-column-between">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="temp/images/gooddeals/Bitmap4.jpg" alt="">
                        </a>
                        <div class="bestSeller-content">
                            <p class="products-item__cate">
                                365 by Whole Foods Market
                            </p>
                            <a href="" class="products-item__name">
                                Extra Virgin Olive Oil - Cold Processed, Mediterranean Blend,…
                            </a>
                        </div>
                        <a href="/" class="products-item__addCartSeller">
                            Add to cart
                        </a>
                    </div>
                    <div class="products-item position-relativeflex-column flex-column-between">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="temp/images/gooddeals/Bitmap5.jpg" alt="">
                        </a>
                        <div class="bestSeller-content">
                            <p class="products-item__cate">
                                Rao's Homemade
                            </p>
                            <a href="" class="products-item__name">
                                Rao's Specialty Foods Marinara Sauce (24 Oz)
                            </a>
                        </div>
                        <a href="/" class="products-item__addCartSeller">
                            Add to cart
                        </a>
                    </div>
                    <div class="products-item position-relativeflex-column flex-column-between ">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="temp/images/gooddeals/Bitmap6.jpg"  alt="">
                        </a>
                        <div class="bestSeller-content">
                            <p class="products-item__cate">
                                365 by Whole Foods Market
                            </p>
                            <a href="" class="products-item__name">
                                Organic Extra Virgin Olive Oil - Cold Processed, …
                            </a>
                        </div>
                        <a href="/" class="products-item__addCartSeller">
                            Add to cart
                        </a>
                    </div>
                    <div class="products-item position-relativeflex-column flex-column-between">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="temp/images/gooddeals/Bitmap7.jpg" alt="">
                        </a>
                        <div class="bestSeller-content">
                            <p class="products-item__cate">
                                365 by Whole Foods Market
                            </p>
                            <a href="" class="products-item__name">
                                Organic Dark Maple Syrup, 32 fl oz
                            </a>
                        </div>
                        <a href="/" class="products-item__addCartSeller">
                            Add to cart
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        @foreach ($carts as $cart)
            var decreaseButton_{{$cart->product_id}} = document.getElementById("decreaseButton_{{$cart->product_id}}");
            var increaseButton_{{$cart->product_id}} = document.getElementById("increaseButton_{{$cart->product_id}}");
            var numberInput_{{$cart->product_id}} = document.getElementById("numberInput_{{$cart->product_id}}");
            decreaseButton_{{$cart->product_id}}.addEventListener("click", function () {
            var currentValue = parseInt(numberInput_{{$cart->product_id}}.value);
            numberInput_{{$cart->product_id}}.value = currentValue - 1;
            });
            increaseButton_{{$cart->product_id}}.addEventListener("click", function () {
            var currentValue = parseInt(numberInput_{{$cart->product_id}}.value);
            numberInput_{{$cart->product_id}}.value = currentValue + 1;
            });
        @endforeach
    </script>
@endsection
