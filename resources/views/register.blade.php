@extends('layout.layout_3')
@section('content')
    <div class="container">
        <div class="register-contain d-flex">
            <div class="left">
                <div class="left-head d-flex position-relative">
                    <div class="join active w-100">join</div>
                    <div class="sign-in w-100">sign in</div>
                </div>
                <h3 class="title">sign up with...</h3>
                <div class="register-social d-flex">
                    <a href="" class="register-social__btn d-flex">
                        <img src="/temp/images/google.png" width="16" height="16" class="img-socila" alt="">
                        <p>  Google</p>
                    </a>
                    <a href="" class="register-social__btn d-flex">
                        <img src="/temp/images/apple-logo.png" width="16" height="16" class="img-socila" alt="">
                        <p>   Apple</p>
                    </a>
                    <a href="" class="register-social__btn d-flex">
                        <img src="/temp/images/facebook.png" width="16" height="16" class="img-socila" alt="">
                        <p>  Facebook</p>
                    </a>
                </div>
                <p class="desc">
                    Signing up with social is super quick. No extra passwords to remember - no brain fail. Don't worry, we'd never share any of your data or post anything on your behalf #notevil
                </p>
                <h3 class="title">or sign up with email</h3>
                <form class="register-form" action="" method="post">
                    <div class="form-group flex-column register-form__item">
                        <label for="">email address:</label>
                        <input type="email" class="input-item">
                        <p>We'll send your order confirmation here</p>
                    </div>
                    <div class="form-group flex-column register-form__item">
                        <label for="">first name:</label>
                        <input type="text" class="input-item">
                    </div>
                    <div class="form-group flex-column register-form__item">
                        <label for="">last name:</label>
                        <input type="text" class="input-item">
                    </div>
                    <div class="form-group flex-column register-form__item">
                        <label for="">password:</label>
                        <input type="email" class="input-item">
                        <p>must be 10 or more characters</p>
                    </div>
                    <div class="form-group flex-column register-form__item">
                        <label for="">date of birth: </label>
                        <div class="form-group d-flex">
                            <div class="select-contain position-relative">
                                <select name="day" id="day" class="w-100">
                                    <option value="">DD</option>
                                </select>
                                <div class="arrow-down position-absolute"></div>
                            </div>
                            <div class="select-contain position-relative">
                                <select name="month" id="month" class="w-100">
                                    <option value="">Month</option>
                                </select>
                                <div class="arrow-down position-absolute"></div>
                            </div>
                            <div class="select-contain position-relative">
                                <select name="year" id="year" class="w-100">
                                    <option value="">YYYY</option>
                                </select>
                                <div class="arrow-down position-absolute"></div>
                            </div>
                        </div>
                        <p>You need to be 16 or over to use ASOS</p>
                    </div>
                    <div class="form-group flex-column register-form__item">
                        <label class="label-check">mostly interested in:</label>
                       <div class="d-flex">
                           <div class="flex-center-left">
                               <input type="radio" class="womenmale" checked="" name="shipping_method" id="womensware" value="womensware">
                               <label class="check-label" for="flat_rate">Womensware</label>
                           </div>
                           <div class="flex-center-left">
                               <input type="radio" class="menmale" checked="" name="shipping_method" id="Mensware" value="Mensware">
                               <label class="check-label" for="flat_rate">Mensware</label>
                           </div>
                       </div>
                    </div>

                </form>
            </div>
            <div class="right">
                <h1>RIGHT</h1>
            </div>
        </div>
    </div>
    <script >
        var myCartDiv = document.querySelector('.container.MyCart');
        myCartDiv.classList.add('d-none');
    </script>
@endsection
