<header class="site-header">
    <div class="site-header__top ">
        <div class="header flex-center">
            <div class="header-left"></div>
            <div class="header-center text-center">
                Get Free Shipping - Free 30 Day Money Back Guarantee. Use Promo Code
                <a href="/" class="header-center__link"> SEANEW25</a>
            </div>
            <div class="header-support flex-center">
                <a href="/" class="header-support__item">
                    Help
                </a>
                <a href="/" class="header-support__item">
                    Find a store
                </a>
                <a href="/" class="header-support__icon flex-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="arrow" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M182.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128z"/></svg>

                </a>
            </div>
        </div>
    </div>
    <div class="site-header__nav flex-center" id="header_nav">
        <div class="flex-center">
            <div class="action-respon d-none" id="header_action_respon">
                <i class="fa-solid fa-bars"></i>
            </div>
            <!--  -->
            <div class="action-respon__contain" id="header_action_show" >
                <button type="" class="exit">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
                <div class="flex-center flex-center-between">
                    <img class="" src="/temp/images/logo2.jpg" width="120" alt="">
                    <div class="other-search flex-center flex-center-between">
                        <input type="text" placeholder="Search for all products..." class="other-search__input">
                        <button type="button" class="other-search__icon" id="icon_searh_nav">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
                <ul class="">
                    <li>
                        <a href="/" class="action-item active"> Home</a>
                    </li>
                    <li>
                        <a href="/" class="action-item">Our roots</a>
                    </li>
                    <li>
                        <a href="/" class="action-item">shop</a>
                    </li>
                    <li>
                        <a href="/" class="action-item">recipe</a>
                    </li>
                </ul>
            </div>
            <!--  -->
            <a href="/" class="logo">
                <img class="" src="/temp/images/root logo-01.png" width="85" alt="" id="logo">
            </a>
           </div>
            <div class="action flex-center">
                <a href="/" class="action-item active"> Home</a>
                <a href="/" class="action-item">Our roots</a>
                <a href="/" class="action-item">shop</a>
                <a href="/" class="action-item">recipe</a>
            </div>
            <div class="other flex-center">
                <div class="other-search flex-center flex-center-between">
                    <input type="text" placeholder="Search for all products..." class="other-search__input">
                    <button type="button" class="other-search__icon" id="icon_searh_nav">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
                @if (Auth::check())
                    <a href="/admin/main" type="button" class="other-user">
                @else
                    <a href="/login" type="button" class="other-user">
                @endif
                        <i class="fa-regular fa-circle-user" id="user_headerNav"></i>
                    </a>
                <a href="/carts" class="other-cart">
                    <i class="fa-solid fa-cart-shopping" id="cart_headerNav"></i>
                </a>
            </div>
    </div>


    <div class="site-header__slide">
        <ul class="container categories " id="cate_slide_header">
            <li class="categories-item">
                <a href="/">
                    Food & Drink
                </a>
            </li>
            <li class="categories-item">
                <a href="/">
                    Health & Wellbeing
                </a>
            </li>
            <li class="categories-item">
                <a href="/">
                    Mother & Baby Care
                </a>
            </li>
            <li class="categories-item">
                <a href="/">
                    Narutal Skincare & Beauty
                </a>
                <ul class="categories-item__details">
                    <li class="details-cate">
                        <a href="" class="">
                            Skincare & Makeup
                        </a>
                    </li>
                    <li class="details-cate">
                        <a href="" class="">
                            Haircare
                        </a>
                    </li>
                    <li class="details-cate">
                        <a href="" class="">
                            Toiletries
                        </a>
                    </li>
                    <li class="details-cate">
                        <a href="" class="">
                            Haircare
                        </a>
                    </li>
                </ul>
            </li>
            <li class="categories-item">
                <a href="/">
                    Organic Lifestyle
                </a>
            </li>
            <li class="categories-item">
                <a href="/">
                    Seals & Deals
                </a>
            </li>
        </ul>
        <div class="swiper SwiperSlide">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="img-fluid" src="temp/images/slide.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="img-fluid" src="temp/images/slide.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="img-fluid" src="temp/images/slide.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="img-fluid" src="temp/images/slide.png" alt="">
                </div>
            </div>
            <div class="swiper-pagination"></div>
      </div>
    </div>
</header>
