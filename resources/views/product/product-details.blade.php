@extends('layout.layout_2')
@section('content')
    <div class="site-main">
        <div class="container">
            <!--  -->
            <div class="site-main__productDetail">
                <ul class="crumb">
                    <p class="crumb-home">Home</p>
                    <li>
                        Shop
                    </li>
                    <li>
                        {{$product->Title}}
                    </li>
                </ul>
                <!--  -->
                <div class="product">
                    <p class="d-none" id="product_id">{{$product->id}}</p>
                    <div class="product-image ">
                        <div class="product-image__nav" id="product-image__small">
                            @foreach (json_decode($product->thumb) as $thumb)
                                <img src="{{ asset('storage/images/products/'. $thumb) }}" alt="">
                            @endforeach
                        </div>
                        <div class="product-image__for">
                            @foreach (json_decode($product->thumb) as $thumb)
                                <img src="{{ asset('storage/images/products/'. $thumb) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                    <div class="product-infor">
                        <p class="producer">
                            365 by Whole Foods Market
                        </p>
                        <h1 class="name" id="nameProduct">
                            {{$product->Title}}
                        </h1>
                        <p class="sku">SKU:   1234567</p>
                        <p class="origin">ORIGIN:   Germany</p>
                        <div class="price flex-center-left">
                            <h1 class="price-decrease" id="priceProduct">
                                ${{$product->discount}}.00
                            </h1>
                            <h2 class="price-origin" id="discountProduct">
                                ${{$product->price}}.00
                            </h2>
                        </div>
                        <form method="post" action="{{ route('AddToCart', ['id' => $product->id]) }}" enctype="multipart/form-data" class="addCart" id="form_addCart">
                            @csrf
                            <div class="number">
                                <button type="button" id="decreaseButton">-</button>
                                <input name="quanity" type="number" inputmode="numeric" id="numberInput" value="0" min="0">
                                <button type="button" id="increaseButton">+</button>
                            </div>
                            <button class="btn-add" id="add_to_cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
                <!--  -->

                <div class="inforDetails">
                    <ul class="cates d-flex">
                        <li class="cates-item active" onclick="changeTab(0)">Description</li>
                        <li class="cates-item" onclick="changeTab(1)">Ingredients</li>
                        <li class="cates-item" onclick="changeTab(2)">Nutrition</li>
                        <li class="cates-item" onclick="changeTab(3)">Cautions</li>
                    </ul>

                    <div class="cates-content">
                        <div class="contentCate active " >
                        {{--          Hiển thị TEXT thay vì HTML                      --}}
                            {!! $product->content !!}
                        </div>
                        <div class="contentCate" >
                            Nội dung Tab 2
                        </div>
                        <div class="contentCate" >
                            Nội dung Tab 3
                        </div>
                        <div class="contentCate" >
                            Nội dung Tab 4
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
        <div class="site-main__AccomProducts">
            <div class="container">
                <h1 class="title">
                    Accompanying products
                </h1>
                <div class="products flex-center flex-center-between">
                    <div class="products-item  flex-column flex-column-between">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="/temp/images/gooddeals/Bitmap4.jpg" alt="">
                        </a>
                        <div class="Accom-content">
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
                        <div class="price">
                            <p class="price-dis">
                                $8.00
                            </p>
                            <p class="price-origin">
                                $11.00
                            </p>
                        </div>
                    </div>
                    <div class="products-item flex-column flex-column-between">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="/temp/images/gooddeals/Bitmap5.jpg" alt="">
                        </a>
                        <div class="Accom-content">
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
                        <div class="price">
                            <p class="price-dis">
                                $8.00
                            </p>
                            <p class="price-origin">
                                $11.00
                            </p>
                        </div>
                    </div>
                    <div class="products-item flex-column flex-column-between ">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="/temp/images/gooddeals/Bitmap6.jpg"  alt="">
                        </a>
                        <div class="Accom-content">
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
                        <div class="price">
                            <p class="price-dis">
                                $8.00
                            </p>
                            <p class="price-origin">
                                $11.00
                            </p>
                        </div>
                    </div>
                    <div class="products-item flex-column flex-column-between">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="/temp/images/gooddeals/Bitmap7.jpg" alt="">
                        </a>
                        <div class="Accom-content">
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
                        <div class="price">
                            <p class="price-dis">
                                $8.00
                            </p>
                            <p class="price-origin">
                                $11.00
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="site-main__AccomProducts">
            <div class="container">
                <h1 class="title">
                    Related products
                </h1>
                <div class="products flex-center flex-center-between">
                    <div class="products-item  flex-column flex-column-between">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="/temp/images/gooddeals/Bitmap4.jpg" alt="">
                        </a>
                        <div class="Accom-content">
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
                        <div class="price">
                            <p class="price-dis">
                                $8.00
                            </p>
                            <p class="price-origin">
                                $11.00
                            </p>
                        </div>
                    </div>
                    <div class="products-item flex-column flex-column-between">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="/temp/images/gooddeals/Bitmap5.jpg" alt="">
                        </a>
                        <div class="Accom-content">
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
                        <div class="price">
                            <p class="price-dis">
                                $8.00
                            </p>
                            <p class="price-origin">
                                $11.00
                            </p>
                        </div>
                    </div>
                    <div class="products-item flex-column flex-column-between ">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="/temp/images/gooddeals/Bitmap6.jpg"  alt="">
                        </a>
                        <div class="Accom-content">
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
                        <div class="price">
                            <p class="price-dis">
                                $8.00
                            </p>
                            <p class="price-origin">
                                $11.00
                            </p>
                        </div>
                    </div>
                    <div class="products-item flex-column flex-column-between">
                        <a href="/" class="products-item__link">
                            <img class="img-fluid" src="/temp/images/gooddeals/Bitmap7.jpg" alt="">
                        </a>
                        <div class="Accom-content">
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
                        <div class="price">
                            <p class="price-dis">
                                $8.00
                            </p>
                            <p class="price-origin">
                                $11.00
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
