@extends('layout.layout_3')
@section('content')
    <div class="site-main Checkout">
        <!-- Best Sellers -->
        <div class="site-main__bestSeller">
            <div class="container">
                <!--  -->
                <div class="crumb-main">
                    <ol class="crumb-list flex-center">
                        <li>
                            <a href="/carts" >shopping cart</a>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            <a href="/checkout" style="color: #4B845E;">checkout</a>
                            <i class="fa-solid fa-chevron-right"></i>
                        </li>
                        <li>
                            <a href="#" >order complete</a>
                        </li>
                    </ol>
                </div>
                <!--  -->
                <div class="notif-checkout">
                    <div class="notif-checkout_item d-flex">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <p class="notif-text">Returning customer? <a href="#">Click here to login</a></p>
                    </div>
                    <div class="notif-checkout_item d-flex">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <p class="notif-text">Returning customer? <a href="#">Click here to enter your code</a></p>
                    </div>
                </div>
                <!--  -->
               <form action="{{route('saveCheckout')}}" method="post" class="content d-flex" id="form_checkout">
                   <!--  -->
                   @csrf
                   <input type="hidden" name="product_info" id="product_info">
                  <div class="content-left">
                      <div class="bill-details">
                          <h3 class="title">
                              BILLING DETAILS
                          </h3>
                          <!--  -->
                          <div  class="bill-details_form">
                              <div class="form-group d-flex">
                                  <div class="form-group_item w-100 flex-column">
                                      <label for="first_name">First Name *</label>
                                      <input class="w-100 input-data input-field" type="text" name="first_name" data-require="Vui lòng nhập tên">
                                  </div>
                                  <div class="form-group_item w-100 flex-column">
                                      <label for="last_name">Last Name *</label>
                                      <input class="w-100 input-data input-field" type="text" name="last_name" data-require="Vui lòng nhập tên">
                                  </div>
                              </div>
                              <!--  -->
                              <div class="form-group_item w-100 flex-column">
                                  <label for="company_name">Company Name ( Optional )</label>
                                  <input class="w-100 input-data" type="text" name="company_name">
                              </div>
                              <!--  -->
                              <div class="position-relative form-group_item select-contain">
                                  <label for="country">Country / Region *</label>
                                  <select class="w-100 input-data" name="Country" id="country-select">
                                      @foreach($country as $country)
                                          <option id="countryInfo" value="{{ $country->id }}" {{ session('country') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                      @endforeach
                                  </select>
                                  <div class="arrow-down position-absolute"></div>
                              </div>
                              <!--  -->
                              <div class="form-group_item w-100 flex-column">
                                  <label for="address">Street Address *</label>
                                  <input class="w-100 input-data input-field" type="text" name="address_name1" placeholder="House number and street name" data-require="Vui lòng nhập số nhà / tên đường ">
                                  <input class="w-100 input-data " type="text" name="address_name2" placeholder="Apartment, suit, unit, etc, . ( Optional) " style="margin-top: 20px">
                              </div>
                              <!--  -->
                              <div class="form-group d-flex">
                                  <div class="form-group_item w-100 flex-column">
                                      <span class="d-none" id="townCityInfo"></span>
                                      <label for="town_city">Town / City *</label>
                                      <input class="w-100 input-data" type="text" name="town_city" id="town_city">
                                  </div>
                                  <div class="form-group_item w-100 flex-column">
                                      <span class="d-none" id="cityInfo"></span>
                                      <label for="state">State *</label>
                                      <input class="w-100 input-data" type="text" name="state" id="state">
                                  </div>
                              </div>
                              <!--  -->
                              <div class="form-group d-flex">
                                  <div class="form-group_item w-100 flex-column">
                                      <span class="d-none" id="zipInfo"></span>
                                      <label for="zip">Zip *</label>
                                      <input class="w-100 input-data" type="number" name="zip" id="zipInfor">
                                  </div>
                                  <div class="form-group_item w-100 flex-column">
                                      <label for="phone">Phone *</label>
                                      <input class="w-100 input-data input-field" type="text" name="phone" data-require="Vui lòng nhập Sđt">
                                  </div>
                              </div>
                              <!--  -->
                              <div class="form-group_item w-100 flex-column">
                                  <label for="email_address">Email Address *</label>
                                  <input class="w-100 input-data input-field" type="email" name="email_address" data-require="Vui lòng nhập Email">
                              </div>
                              <!--  -->
                              <div class="form-checkbox flex-column">
                                  <label class="checkbox-container">
                                      Create an account?
                                      <input type="checkbox">
                                      <span class="checkmark"></span>
                                  </label>
                                  <label class="checkbox-container">
                                      Ship to a different address?
                                      <input type="checkbox">
                                      <span class="checkmark"></span>
                                  </label>
                                  <label class="checkbox-container">
                                      Saved shipping address
                                      <input type="checkbox">
                                      <span class="checkmark"></span>
                                  </label>
                              </div>
                          </div>
                      </div>
                      <!--  -->
                      <div class="add-infor">
                          <h3 class="title">
                              ADDITIONAL INFORMATION
                          </h3>
                          <div class="form-group">
                              <p class="text-order">Order Notes (Optional)</p>
                              <textarea placeholder="Notes about your order, e.g. special notes for delivery" name="order_notes" id="" cols="89" rows="7"></textarea>
                          </div>
                      </div>
                  </div>
                   <!--  -->
                   <div class="content-right w-100">
                       <h3 class="title">
                           YOUR ORDER
                       </h3>
                       <div class="content-right_item">
                           <h3 class="subtitle sub-product">Product</h3>
                           <div id="product-info__session" name="product"></div>
                       </div>
                       <div class="content-right_item flex-center-between">
                           <h3 class="subtitle sub-subtotal">Subtotal</h3>
                           <h4 class="product-price" id="totalPriceInfo" name="totalPriceInfo"></h4>
                       </div>
                       <div class="content-right_item" id="calShip">
                           <h3 class="subtitle sub-cal">Calculate Shipping</h3>
                           <div class="input-radio flex-center-left">
                               <input type="radio" class="shipping_method" checked="" name="shipping_method" id="flat_rate" value="flat_rate">
                               <label class="check-label" for="flat_rate">Flat rate</label>
                           </div>
                           <div class="input-radio flex-center-left">
                               <input type="radio" class="shipping_method" checked="" name="shipping_method" id="free_shipping" value="free_shipping">
                               <label class="check-label" for="free_shipping">Free Shipping</label>
                           </div>
                           <div class="input-radio flex-center-left">
                               <input type="radio" class="shipping_method" checked="" name="shipping_method" id="local_pickup" value="local_pickup">
                               <label class="check-label" for="local_pickup">Local pickup</label>
                           </div>
                       </div>
                       <div class="content-right_item flex-center-between">
                           <h3 class="subtitle sub-subtotal">Total</h3>
                           <h4 class="product-price total" id="totalPrice" name="total"></h4>
                       </div>
                       <div class="content-right_item" id="payment_chosen">
                           <h4 class=" sub-subtotal">Payment method</h4>
                           <div class="input-radio flex-center-left">
                               <input type="radio" class="payment-method" checked name="payment_method" id="internet_bank" value="Domestic ATM card/Internet Banking (Free of charge)">
                               <label class="check-label" for="internet_bank">Domestic ATM card/Internet Banking (Free of charge)</label>
                           </div>
                           <div class="bank-img">
                               <img src="/temp/images/logo-bank.png" alt="">
                           </div>
                           <div class="input-radio flex-center-left">
                               <input type="radio" class="payment-method" name="payment_method" id="cash_delivery" value="cash_delivery">
                               <label class="check-label" for="cash_delivery">Cash on delivery</label>
                           </div>
                       </div>
                       <div class="content-right_item">
                           <label class="checkbox-container">
                               I have read and agree to the website <b>terms and conditions</b>
                               <input type="checkbox">
                               <span class="checkmark"></span>
                           </label>
                       </div>
                        <button class="w-100 btn-place" type="submit" id="submit_place_order">
                            <h3>PLACE ORDER</h3>
                        </button>
                   </div>
               </form>
            </div>
        </div>
    </div>

    <!-- Pop up Online Payment -->
    <div class="confirm-payment__contain">
        <form class="confirm-payment"action="" method="" id="confirm-payment">
            <div class="overlay"></div>
            <h3 class="title">Domestic ATM card/Internet Banking (Free of charge)</h3>
            <div class="img-bank">
                <img src="/temp/images/vietin.jpg" alt="">
            </div>
            <div class="d-flex payment-contain">
                <div class="confirm-payment__left w-100">
                    <div class="form-group_item w-100 flex-column">
                        <label for="email_address">Card number</label>
                        <input placeholder="ex. 4123 4567 8901 2345 " class="w-100 input-data input-field" type="email" name="email_address" data-require="Vui lòng nhập Email">
                    </div>
                    <div class="form-group_item w-100 flex-column">
                        <label for="email_address">Name prited on the card</label>
                        <input class="w-100 input-data input-field" placeholder="ex. NGUYEN VAN A" type="email" name="email_address" data-require="Vui lòng nhập Email">
                    </div>
                    <div class="form-group_item w-100 flex-column">
                        <label for="email_address">Expiration date</label>
                        <input class="w-100 input-data input-field" placeholder="MM/YY" type="email" name="email_address" data-require="Vui lòng nhập Email">
                    </div>
                    <div class="form-group_item w-100 flex-column">
                        <label for="email_address">Security code</label>
                        <input class="w-100 input-data input-field"  placeholder="Ex. 123" type="email" name="email_address" data-require="Vui lòng nhập Email">
                    </div>
                </div>
                <div class="confirm-payment__right">
                    <img src="/temp/images/Bitmap.png" alt="">
                    <img src="/temp/images/Bitmap_copy.png" alt="">
                </div>
            </div>
            <div class="btn-contain">
                <button type="button" class="back">
                    BACK
                </button>
                <button type="submit" class="confirm">
                    CONFIRM
                </button>
            </div>
        </form>
    </div>
@endsection
