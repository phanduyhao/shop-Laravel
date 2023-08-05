<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="/temp/libs/jquerry.js"></script>
    <script type="text/javascript" src="/temp/libs/slick-1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="/temp/libs/slick-1.8.1/slick/slick.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
	<script type="text/javascript" src="/temp/build/js/main.min.js"></script>
    <script type="text/javascript">
        var swiper = new Swiper(".SwiperSlide", {
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                loop: true,
                autoplay:true,
            },
        });
        $('.slide-footer').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            // arrows:false,
        });
        $('.slide-partner').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            // arrows:false,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
                },
                {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
                },
                {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
                }
            ]
        });
        $('.slide-cate').slick({
            infinite: true,
            slidesToShow: 6,
            // arrows:false,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
                },
                {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    infinite: true,
                }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                }
                },
                {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
                }
            ]
        });
        $('.product-image__for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.product-image__nav'
        });
        $('.product-image__nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.product-image__for',
            dots: false,
            arrows: false,
            centerMode: false,
            focusOnSelect: true,
            vertical: true
        });
        // Delete Cart item
        var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                var cartId = $(this).data('cart-id');
                deleteCartItem(cartId);
            });
            function deleteCartItem(cartId) {
                $.ajax({
                    url: '/cart/' + cartId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    error: function(error) {
                        // Xử lý lỗi (nếu cần)
                        console.log(error);
                        alert('Xóa thành công!');
                        location.reload();

                    }
                });
            }
        });
        // Session Cart
        $(document).ready(function() {
            if(isLoggedIn == false) {
                $('#add_to_cart').click(function (e) {
                    e.preventDefault();
                    var UrlProduct = window.location.href;
                    var idProduct = $('#product_id').text();
                    var firstImage = $("#product-image__small img").first();
                    var firstImagePath = firstImage.attr("src");
                    var quantityProduct = $('#numberInput').val();
                    var nameProduct = $('#nameProduct').text();
                    var priceProduct = $('#priceProduct').text();
                    priceProduct = priceProduct.replace("$"," ").replace(".00"," ");
                    priceProduct = parseInt(priceProduct);

                    var cartItems = sessionStorage.getItem('cartItems');
                    if (cartItems) {
                        cartItems = JSON.parse(cartItems);
                        var existingProductIndex = -1;
                        for (var i = 0; i < cartItems.length; i++) {
                            if (cartItems[i].link === UrlProduct) {
                                existingProductIndex = i;
                                break;
                            }
                        }
                        if (existingProductIndex !== -1) {
                            cartItems[existingProductIndex].imagePath = firstImagePath;
                            cartItems[existingProductIndex].quantity = parseInt(quantityProduct) + parseInt(cartItems[existingProductIndex].quantity);
                            cartItems[existingProductIndex].price = priceProduct;
                        } else {
                            var product = {
                                idProduct: idProduct,
                                link: UrlProduct,
                                imagePath: firstImagePath,
                                quantity: quantityProduct,
                                name: nameProduct,
                                price: priceProduct
                            };
                            cartItems.push(product);
                        }
                    } else {
                        cartItems = [{
                            idProduct: idProduct,
                            link: UrlProduct,
                            imagePath: firstImagePath,
                            quantity: quantityProduct,
                            name: nameProduct,
                            price: priceProduct
                        }];
                    }
                    sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
                    window.location.href = "{{ route('carts') }}";
                });
                function setupProductButtons(product) {
                    var decreaseButton = document.getElementById("decreaseButton_" + product.idProduct);
                    var increaseButton = document.getElementById("increaseButton_" + product.idProduct);
                    var numberInput = document.getElementById("numberInput_" + product.idProduct);

                    decreaseButton.addEventListener("click", function () {
                        var currentValue = parseInt(numberInput.value);
                        if (currentValue > 0) {
                            numberInput.value = currentValue - 1;
                        }
                    });

                    increaseButton.addEventListener("click", function () {
                        var currentValue = parseInt(numberInput.value);
                        numberInput.value = currentValue + 1;
                    });
                }
                var cartItems = sessionStorage.getItem('cartItems');
                if (cartItems) {
                    cartItems = JSON.parse(cartItems);
                    var subtotalAll = 0;
                    for (var i = 0; i < cartItems.length; i++) {
                        var product = cartItems[i];
                        var subtotal = parseInt(product.price) * parseInt(product.quantity);
                        subtotalAll = subtotalAll + subtotal;
                        var productHtml = `
                        <tr>
                            <td class="flex-center-left">
                                <img width="100" src="${product.imagePath}" alt="${product.name}">
                                <a href="${product.link}" class="productsCart-name">${product.name}</a>
                            </td>
                            <td>
                                <p class="productsCart-price">$${product.price}.00</p>
                            </td>
                            <td>
                                <div class="addCart">
                                    <div class="number">
                                        <button type="button" class="decreaseButton" data-id="${product.idProduct}" id="decreaseButton_${product.idProduct}">-</button>
                                        <input type="hidden" name="product_ids[]" value="${product.idProduct}">
                                        <input data-id="${product.idProduct}" class="numberInput" name="quantities[${product.idProduct}]" type="number" inputmode="numeric" id="numberInput_${product.idProduct}" value="${product.quantity}" min="0">
                                        <button type="button" class="increaseButton" data-id="${product.idProduct}" id="increaseButton_${product.idProduct}">+</button>
                                    </div>
                                </div>
                            </td>
                             @php

                            @endphp
                        <td>
                            <p class="productsCart-total">$${subtotal}.00</p>
                            </td>
                            <td class="exit-X">
                                <button class="btn deleteButton" type="button" data-cart-id="${product.idProduct}" style="background: transparent; border: 0">
                                    <i class="fa-regular fa-circle-xmark"></i>
                                </button>
                             </td>
                        </tr>
                        `;
                        // Thêm sản phẩm vào phần tử có ID "cart-items" để hiển thị trên trang HTML
                        $("#cart-items").append(productHtml);
                        setupProductButtons(product);
                        $(".deleteButton").click(function () {
                            var cartItems = sessionStorage.getItem('cartItems');
                            var productId = $(this).data("cart-id");
                            if (cartItems) {
                                cartItems = JSON.parse(cartItems);
                                for (var i = 0; i < cartItems.length; i++) {
                                    var product = cartItems[i];
                                    if (product.idProduct == productId) {
                                        // Xóa sản phẩm khỏi mảng cartItems
                                        cartItems.splice(i, 1);
                                        // Lưu mảng cartItems đã được chỉnh sửa vào session lại
                                        sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
                                        break;
                                    }
                                }
                            }
                            location.reload();
                        });
                        $("#btn_updateCart").click(function () {
                            var cartItems = sessionStorage.getItem('cartItems');
                            if (cartItems) {
                                cartItems = JSON.parse(cartItems);
                                for (var i = 0; i < cartItems.length; i++) {
                                    var product = cartItems[i];
                                    product.quantity = $('#numberInput_' + product.idProduct).val();
                                }
                                // Lưu lại mảng cartItems đã được cập nhật vào sessionStorage
                                sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
                            }
                            location.reload();
                        });
                    }
                    $('#subtotalAll').text('$'+ subtotalAll +'.00')
                }
            }else{
                $('#add_to_cart').submit();
            }
            // Aplly Voucher
            var isApplyVoucherClicked = false;
            var Total = 100; // Giá trị total mặc định, bạn có thể thay đổi giá trị này theo trường hợp thực tế
            // Hàm áp dụng voucher và cập nhật giá
            function applyVoucherAndUpdatePrice() {
                var voucher = $('#voucher').val();
                $.ajax({
                    url: '/apply-voucher', // Thay đổi đường dẫn tới route xử lý apply voucher của bạn
                    type: 'POST',
                    data: {
                        voucher: voucher,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            var price = response.price;
                            $('#apply_voucher_mess').text('Đã áp dụng mã voucher thành công!').css('color', 'green');
                            sessionData = response.price;
                            sessionStorage.setItem('price', price);
                            sessionStorage.setItem('voucher', voucher); // Lưu voucher vào session
                            $('#price_couppon').text(price);
                            updatePriceNumber();
                            // Cập nhật giá trị Total vào session sau khi apply voucher
                            sessionStorage.setItem('total', Total);
                        } else {
                            $('#apply_voucher_mess').text('Mã voucher không hợp lệ!').css('color', 'red');
                            // Xóa session khi voucher không hợp lệ
                            sessionStorage.removeItem('price');
                            sessionStorage.removeItem('voucher');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
            // Sự kiện khi click vào nút "Apply Voucher"
            $('#coupon_apply').click(function (e) {
                e.preventDefault();
                isApplyVoucherClicked = true;
                var voucher = $('#voucher').val();
                // Kiểm tra giá trị voucher đã tồn tại trong session chưa
                var storedVoucher = sessionStorage.getItem('voucher');
                if (storedVoucher && storedVoucher === voucher) {
                    $('#apply_voucher_mess').text('Voucher đã được áp dụng!').css('color', 'blue');
                } else {
                    applyVoucherAndUpdatePrice();
                }
            });
            // Gọi hàm updatePriceNumber khi trang tải xong (sự kiện DOMContentLoaded)
            updatePriceNumber();
            // Kiểm tra nếu đã lưu giá trị Total trong session thì cập nhật vào biến Total
            var storedTotal = sessionStorage.getItem('total');
            // CheckBox Only One & Update Totals
            var totalPrice = $('#subtotalAll').html();
            var subtotal = totalPrice.replace("$", "").replace(".00", "");
            // Kiểm tra giá trị ban đầu của ô radio
            var selectedRadio = $('input[type="radio"].shipping_method:checked');
            if (selectedRadio.length > 0) {
                updateTotalPrice(selectedRadio.val());
            }
            // Xử lý sự kiện khi thay đổi ô radio
            $('.shipping_method').on('change', function() {
                var selectedValue = $(this).val();
                updateTotalPrice(selectedValue);
            });
            // Hàm cập nhật giá trị tổng giá
            function updateTotalPrice(selectedValue) {
                var subtotal2 = parseInt(subtotal);
                if (selectedValue === 'flat_rate') {
                    subtotal2 += 10;
                } else if (selectedValue === 'local_pickup') {
                    subtotal2 += 15;
                }
                Total = subtotal2;
                $('#ToltalPrice').text('$' + Total + '.00');
                if(storedTotal){
                    $('#ToltalPrice2').text('$' + storedTotal + '.00');
                }else{
                    $('#ToltalPrice2').text('$' + Total + '.00');
                }
            }
            function updatePriceNumber() {
                    // Voucher
                    var priceNumber = $('#price_couppon').text();
                    if (priceNumber.includes('k')) {
                        var price = priceNumber.replace("k", "");
                        price = parseInt(price);
                        var newPrice = Total - price;
                        $('#ToltalPrice').text('$' + newPrice + '.00');
                        var displayedTotal = $('#ToltalPrice').text().replace('$', '').replace('.00', '');
                        sessionStorage.setItem('displayedTotal', displayedTotal);
                        var storedDisplayedTotal = sessionStorage.getItem('displayedTotal');
                        if (storedDisplayedTotal !== null) {
                            // Nếu có giá trị trong sessionStorage, thì gán giá trị này vào displayedTotal và in ra HTML
                            var displayedTotal = storedDisplayedTotal;
                            $('#ToltalPrice2').text('$' + displayedTotal + '.00');
                        }else{
                            $('#ToltalPrice2').text('$' + newPrice + '.00');
                        }
                    }
                    if (priceNumber.includes('%')) {
                        var price = priceNumber.replace("%", "");
                        price = parseInt(price);
                        var newPrice = Total - (Total / 100 * price);
                        $('#ToltalPrice').text('$' + newPrice + '.00');
                        var displayedTotal = $('#ToltalPrice').text().replace('$', '').replace('.00', '');
                        sessionStorage.setItem('displayedTotal', displayedTotal);
                        var storedDisplayedTotal = sessionStorage.getItem('displayedTotal');
                        if (storedDisplayedTotal !== null) {
                            // Nếu có giá trị trong sessionStorage, thì gán giá trị này vào displayedTotal và in ra HTML
                            var displayedTotal = storedDisplayedTotal;
                            $('#ToltalPrice2').text('$' + displayedTotal + '.00');
                        }else{
                            $('#ToltalPrice2').text($('#ToltalPrice').text());
                        }
                    }
                }

            // Sự kiện khi bấm Update Totals
            $('#updateTotals').click(function(e) {
                e.preventDefault();
                // Lấy giá trị hiện tại của Total trên trang
                var displayedTotal = $('#ToltalPrice').text().replace('$', '').replace('.00', '');
                // Lưu giá trị hiện tại vào session
                sessionStorage.setItem('total', displayedTotal);
                // Hiển thị giá trị Total lên trang
                $('#ToltalPrice').text('$' + displayedTotal + '.00');
                // Cập nhật lại biến Total
                Total = parseInt(displayedTotal);
            });
        });
        //Select Country
        $(document).ready(function() {
            $('#country-select').change(function() {
                var countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        url: '/get-cities/' + countryId,
                        type: 'GET',
                        success: function(response) {
                            var addresses = response.addresses;
                            var options = '';
                            $.each(addresses, function(key, address) {
                                options += '<option value="' + address.id + '">' + address.city + '</option>';
                            });
                            $('#address-select').html('<option value="">--Select City--</option>' + options);
                        }
                    });
                } else {
                    $('#address-select').html('<option value="">--Select City--</option>');
                }
            });
        });
    //    Save Data Shopping cart to Session
        $(document).ready(function() {
            $('#updateTotals').click(function() {
                var selectedMethod = $('.shipping_method:checked').val();
                var country = $('#country-select').val();
                var city = $('#address-select').val();
                var townCity = $('#townCity').val();
                var zip = $('#zip').val();
                $.ajax({
                    url: '/save-shipping-details',
                    type: 'POST',
                    data: {
                        selectedMethod: selectedMethod,
                        country: country,
                        city: city,
                        townCity: townCity,
                        zip: zip,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            });
        });
    //    Chuyển sang Checkout
        $(document).ready(function() {
            // Xử lý khi click vào nút "Proceed to Checkout"
            $('.checkout').click(function() {
                // Lấy thông tin cần lưu vào sessionStorage
                var productInfos = [];
                var cartItems = $('.cate-cart-item');
                var lastIndex = cartItems.length - 1; // Lấy chỉ số của phần tử cuối cùng
                cartItems.slice(0, lastIndex).each(function() {
                    var productName = $(this).find('.productsCart-name').text();
                    var quantity = $(this).find('.numberInput').val();
                    var subtotal = $(this).find('.productsCart-total').text().replace('$', '');
                    if (productName.trim() !== '') { // Kiểm tra nếu productName không rỗng
                        productInfos.push({ productName: productName, quantity: quantity, subtotal: subtotal });
                    }
                });
                var selectedShippingMethod = $('input[name="shipping_method"]:checked').val();
                var country = $('#country-select').find(":selected").text();
                var city = $('#address-select').find(":selected").text();
                var townCity = $('#townCity').val();
                var zip = $('#zip').val();
                var totalPrice = $('#ToltalPrice2').text().replace('$', '');

                // Lưu các thông tin vào sessionStorage
                sessionStorage.setItem('productInfos', JSON.stringify(productInfos));
                sessionStorage.setItem('selectedShippingMethod', selectedShippingMethod);
                sessionStorage.setItem('country', country);
                sessionStorage.setItem('city', city);
                sessionStorage.setItem('townCity', townCity);
                sessionStorage.setItem('zip', zip);
                sessionStorage.setItem('totalPrice', totalPrice);
            });
        })
        // Hiển thị thông tin được lưu trong session lên trang checkout
        $(document).ready(function() {
            // Lấy thông tin từ sessionStorage
            var productInfos = JSON.parse(sessionStorage.getItem('productInfos'));
            var selectedShippingMethod = sessionStorage.getItem('selectedShippingMethod');
            var country = sessionStorage.getItem('country');
            var city = sessionStorage.getItem('city');
            var townCity = sessionStorage.getItem('townCity');
            var zip = sessionStorage.getItem('zip');
            var totalPrice = sessionStorage.getItem('totalPrice');

            // Hiển thị thông tin lên trang
            var productInfoHTML = '';
            $.each(productInfos, function(index, info) {
                productInfoHTML += '<div class="product flex-center-between"><p class="product-name" name="product_name">'+ info.productName + '  x <span>'+ info.quantity +'</span></p> <p class="product-price" name="product_price">' + '$'+ info.subtotal + '</p></div>'
            });
            $('#product-info__session').html(productInfoHTML);
            $('#calShip .shipping_method').each(function(index, element) {
                var value = $(this).val(); // Lấy giá trị của input hiện tại
                if (value === selectedShippingMethod) {
                    $(this).prop('checked', true); // Đánh dấu thẻ input được chọn
                }
            });
            $('#countryInfo').text(country);
            $('#cityInfo').text(city);
            $('#state').val($('#cityInfo').text())
            $('#townCityInfo').text(townCity);
            $('#town_city').val($('#townCityInfo').text())
            $('#zipInfo').text(zip);
            $('#zipInfor').val($('#zipInfo').text());
            $('#totalPriceInfo').text('$' + totalPrice);

            // if(isLoggedIn == false){
            //     var cartItems = sessionStorage.getItem('cartItems');
            //     if (cartItems) {
            //         cartItems = JSON.parse(cartItems);
            //         for (var i = 0; i < cartItems.length; i++) {
            //             var product = cartItems[i];
            //             productInfoHTML += '<div class="product flex-center-between"><p class="product-name" name="product_name">'+ ${product.name} + '  x <span>'+ ${product.quantity} +'</span></p> <p class="product-price" name="product_price">' + '$'+ `${product.price} * ${product.quantity}` + '</p></div>'
            //         }
            //         $('#product-info__session').html(productInfoHTML);
            //     }
            // }
        });

        // Check  Validate
        $(document).ready(function(){
            $('body form button[type="submit"]').on('click', function(e){
                e.preventDefault();
                let formID = $(this).closest('form').attr('id');
                if (validateForm(`#${formID}`)) {
                    // Kiểm tra xem tất cả các ô input đã nhập dữ liệu chưa
                    let allInputsFilled = true;
                    $(`#${formID} .input-field`).each(function() {
                        let value = $(this).val();
                        if (value.trim() === '') {
                            allInputsFilled = false;
                            $(this).css({'border-color': 'red'});
                            let htmlAlert = `<span class="helper">${$(this).data('require')}</span>`;
                            $(this).parent().append(htmlAlert);
                        }
                    });
                    var test_checkbox = false
                    $('#termsCheckbox').on('change', function() {
                        if ($(this).prop('checked')) {
                            test_checkbox = true;
                        }
                    });
                    if (allInputsFilled ) {
                        // console.log(allInputsFilled)
                        $('#submit_place_order').submit();
                        // Nếu tất cả các ô input đã nhập dữ liệu, hiển thị bảng thanh toán thẻ ngân hàng
                        // $('.confirm-payment__contain').css({
                        //    'transform': 'translate(0)',
                        //     'transition': 'all 0.4s'
                        // })
                    }
                } else {
                    alert('Các trường có dấu * là bắt buộc');
                }
            });
            $('body').on('click','.input-field', function(e){
                e.preventDefault();
                $(this).parent().find('.helper').remove();
            });
            // Sự kiện khi bấm nút "CONFIRM" trong bảng thanh toán thẻ ngân hàng
            $('.confirm').on('click', function(e) {
                e.preventDefault();
                // Thực hiện các thao tác xử lý khi người dùng xác nhận thanh toán
                // Sau khi hoàn tất, bạn có thể chuyển hướng người dùng đến trang xác nhận đơn hàng hoặc trang thanh toán thành công
            });
            // Sự kiện khi bấm nút "BACK" trong bảng thanh toán thẻ ngân hàng
            $('.btn-contain .back').on('click', function(e) {
                e.preventDefault();
                // Ẩn bảng thanh toán thẻ ngân hàng bằng phương thức fadeOut
                $('.confirm-payment__contain').css({
                    'transform': 'translateY(-100%)',
                    'transition': 'all 0.4s'
                })
            });
        });
        function validateForm(formID) {
            let checkValid = true;
            $(formID).find('.input-field').each(function() {
                let value = $(this).val();
                if (value == null || value == '' || value == undefined) {
                    checkValid = false;
                    $(this).css({'border-color': 'red'});
                    let htmlAlert = `<span class="helper">${$(this).data('require')}</span>`;
                    $(this).parent().append(htmlAlert);
                }
            });
            return checkValid;
        }

        //Kiểm tra đăng nhập hay chưa để chọn cách lưu product vào giỏ hàng
        $(document).ready(function() {
        // Processing Checkout
            $(document).ready(function() {
                // Lấy thông tin sản phẩm và gán vào trường ẩn "product_info" khi submit form
                $('#form_checkout').submit(function(event) {
                    event.preventDefault();
                    var products = [];
                    var productDivs = document.querySelectorAll(".product");
                    productDivs.forEach(function(productDiv) {
                        var productName = productDiv.querySelector(".product-name").innerText.trim();
                        var productPrice = productDiv.querySelector(".product-price").innerText.trim();
                        products.push({ name: productName, price: productPrice });
                    });
                    var productInfoJSON = JSON.stringify(products);
                    $('#product_info').val(productInfoJSON);
                    // Submit form bình thường sau khi đã lấy thông tin sản phẩm
                    this.submit();
                });
                $('#submit_place_order').click(function (e) {
                    if (window.Auth && window.Auth.loggedIn) {
                        $('#submit_place_order').submit();
                    }else{
                        e.preventDefault();
                        window.location.href = "{{route('register')}}";
                    }
                })
            });
        })
    </script>
