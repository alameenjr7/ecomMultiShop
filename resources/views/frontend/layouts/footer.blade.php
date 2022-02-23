    <!-- Footer Area -->
    <footer class="footer_area section_padding_100_0">
        <div class="container">
            <div class="row">
                <!-- Single Footer Area -->
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="single_footer_area mb-100">
                        <div class="mb-4 footer_heading">
                            <h6>{{__('messages.contact_us')}}</h6>
                        </div>
                        <ul class="footer_content">
                            <li><span>{{__('messages.address')}}:</span> {{App\Models\Setting::value('address')}}</li>
                            <li><span>{{__('messages.phone')}}: </span>  +{{App\Models\Setting::value('phone')}}</li>
                            <li><span>{{__('messages.fax')}}:</span> {{App\Models\Setting::value('fax')}}</li>
                            <li><span>{{__('messages.email')}}:</span> {{App\Models\Setting::value('email')}}</li>
                        </ul>
                        <div class="footer_social_area mt-15">
                            <a href="{{App\Models\Setting::value('facebook_url')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="{{App\Models\Setting::value('twitter_url')}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="{{App\Models\Setting::value('linkedin_url')}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="{{App\Models\Setting::value('pinterest_url')}}"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="{{App\Models\Setting::value('instagram_url')}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="{{App\Models\Setting::value('snapchat_url')}}"><i class="fa fa-snapchat" aria-hidden="true"></i></a>
                            <a href="{{App\Models\Setting::value('youtube_url')}}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Area -->
                <div class="col-12 col-sm-6 col-md col-lg-4 col-xl-2">
                    <div class="single_footer_area mb-100">
                        <div class="mb-4 footer_heading">
                            <h6>{{__('messages.acc')}}</h6>
                        </div>
                        <ul class="footer_widget_menu">
                            <li><a href="{{route('user.account')}}"><i class="icofont-rounded-right"></i> {{__('messages.account')}}</a></li>
                            <li><a href="{{route('user.order')}}"><i class="icofont-rounded-right"></i> {{__('messages.f_shop')}}</a></li>
                            <li><a href="{{route('blog.detail')}}"><i class="icofont-rounded-right"></i> {{__('messages.f_blog')}}</a></li>
                            <li><a href="{{route('contact.us')}}"><i class="icofont-rounded-right"></i> {{__('messages.f_contact')}}</a></li>
                            <li><a href="{{route('home')}}"><i class="icofont-rounded-right"></i> {{__('messages.f_home')}}</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Area -->
                <div class="col-12 col-sm-6 col-md col-lg-4 col-xl-2">
                    <div class="single_footer_area mb-100">
                        <div class="mb-4 footer_heading">
                            <h6>{{__('messages.info')}}</h6>
                        </div>
                        <ul class="footer_widget_menu">
                            <li><a href="#"><i class="icofont-rounded-right"></i> {{__('messages.termCond')}}</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> {{__('messages.help')}}</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> {{__('messages.pPol')}}</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> {{__('messages.deliveryInfo')}}</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> {{__('messages.returnPol')}}</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Area -->
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-2">
                    <div class="single_footer_area mb-100">
                        <div class="mb-4 footer_heading">
                            <h6>{{__('messages.support')}}</h6>
                        </div>
                        <ul class="footer_widget_menu">
                            <li><a href="#"><i class="icofont-rounded-right"></i> {{__('messages.payMethod')}}</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> {{__('messages.proSupp')}}</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> {{__('messages.affProg')}}</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> {{__('messages.freeCoupon')}}</a></li>
                            <li><a href="#"><i class="icofont-rounded-right"></i> {{__('messages.freePShipping')}}</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Area -->
                <div class="col-12 col-md-7 col-lg-8 col-xl-3">
                    <div class="single_footer_area mb-50">
                        <div class="mb-4 footer_heading">
                            <h6>{{__('messages.JOML')}}</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="{{route('mailing.list.submit')}}" method="post">
                                @csrf
                                <input type="email" name="email" class="form-control mail" value="{{old('email')}}" required placeholder="{{__('messages.yourMailAddress')}}">
                                <button type="submit" class="submit">
                                    <i class="icofont-long-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="single_footer_area mb-100">
                        <div class="mb-4 footer_heading">
                            <h6>{{__('messages.DOMA')}}</h6>
                        </div>
                        <div class="apps_download">
                            <a href="{{App\Models\Setting::value('playStore_url')}}"><img src="{{asset('frontend/assets/img/core-img/play-store.png')}}" alt="Play Store"></a>
                            <a href="{{App\Models\Setting::value('appStore_url')}}"><img src="{{asset('frontend/assets/img/core-img/app-store.png')}}" alt="Apple Store"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer_bottom_area">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Copywrite -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite_text">
                            <p>{{__('messages.MW')}} <i class="fa fa-heart" aria-hidden="true"></i> {{__('messages.by')}} <a href="https://ameentech.com/" target="_blank">{{App\Models\Setting::value('footer')}}</a></p>
                        </div>
                    </div>
                    <!-- Payment Method -->
                    <div class="col-12 col-md-6">
                        <div class="payment_method">
                            <img src="{{asset('frontend/assets/img/payment-method/paypal.png')}}" alt="">
                            <img src="{{asset('frontend/assets/img/payment-method/maestro.png')}}" alt="">
                            <img src="{{asset('frontend/assets/img/payment-method/western-union.png')}}" alt="">
                            <img src="{{asset('frontend/assets/img/payment-method/discover.png')}}" alt="">
                            <img src="{{asset('frontend/assets/img/payment-method/american-express.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area -->

    <script src="{{asset('backend/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
