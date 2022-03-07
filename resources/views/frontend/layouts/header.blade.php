
        <!-- Top Header Area -->
        <div class="top-header-area" style="background-color: #f8f8ff">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-6">
                        <div class="welcome-note">
                            <span class="popover--text" data-toggle="popover" data-content="Welcome to kaayDeals ecommerce template."><i class="icofont-info-square"></i></span>
                            <span class="text">{{__('messages.welcome')}} {{get_setting('meta_keywords')}}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="language-currency-dropdown d-flex align-items-center justify-content-end">
                            <!-- Language Dropdown -->
                            <div class="language-dropdown">
                                <div class="dropdown">
                                    <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span>
                                        {{ Config::get('languages')[App::getLocale()]['display'] }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        @foreach (Config::get('languages') as $lang => $language)
                                            @if ($lang != App::getLocale())
                                                <a class="dropdown-item" href="{{route('lang.switch', $lang)}}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Currency Dropdown -->
                            {{-- <div class="currency-dropdown">
                                <div class="dropdown">
                                    @php
                                        Helper::currency_load();
                                        $currency_code=session('currency_code');
                                        $currency_symbol=session('currency_symbol');
                                        if($currency_symbol==""){
                                            $system_default_currency_info=session('system_default_currency_info');
                                            $currency_symbol=$system_default_currency_info->symbol;
                                            $currency_code=$system_default_currency_info->code;
                                        }
                                    @endphp
                                    <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$currency_symbol}} {{$currency_code}}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                        @foreach (App\Models\Currency::where('status','active')->get() as $currency)
                                            <a class="dropdown-item" href="javascript:;" onclick="currency_change('{{$currency['code']}}')">{{$currency->symbol}} {{Illuminate\Support\Str::upper($currency->code)}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Menu -->
        <div class="bigshop-main-menu">
            <div class="container">
                <div class="classy-nav-container breakpoint-off">
                    <nav class="classy-navbar" id="bigshopNav">

                        <!-- Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Nav Brand -->
                        <a href="{{route('home')}}" class="nav-brand"><img src="{{asset(get_setting('logo'))}}" alt="logo"></a>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Close -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav -->
                            <div class="classynav">
                                <ul>
                                    <li class="active">
                                        <a href="{{route('home')}}">{{__('messages.home')}}</a>
                                    </li>
                                    <li><a href="{{route('about.us')}}">{{__('messages.about_us')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('shop')}}">{{__('messages.shop')}}</a>
                                    </li>
                                    <li><a href="{{route('blog.detail')}}">{{__('messages.blog')}}</a>
                                    </li>
                                    <li><a href="{{route('contact.us')}}">{{__('messages.contact')}}</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Hero Meta -->
                        <div class="ml-auto hero_meta_area d-flex align-items-center justify-content-end">
                            <!-- Search -->
                            <div class="search-area">
                                <div class="search-btn"><i class="icofont-search"></i></div>
                                <!-- Form -->
                                <form action="{{route('search')}}" method="GET">
                                    <div class="search-form d-flex">
                                        <input type="search" id="search_text" name="query" class="form-control" placeholder="Search">
                                        <input type="submit" class="d-none" value="Send">
                                    </div>
                                </form>
                            </div>

                            <!-- Wishlist -->
                            <div class="cart-area">
                                <div class="cart--btn">
                                    <a href="{{route('wishlist')}}">
                                        <i class="icofont-heart"></i>
                                        <span class="cart_quantity" id="wishlist_counter">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="cart-area">
                                <div class="cart--btn">
                                    <a href="{{route('compare')}}" >
                                        <i class="icofont-exchange"></i>
                                        <span class="cart_quantity" id="compare_counter">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->count()}}</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Cart -->
                            <div class="cart-area">
                                <div class="cart--btn">
                                    <i class="icofont-cart"></i>
                                    <span class="cart_quantity">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</span>
                                </div>

                                <!-- Cart Dropdown Content -->
                                <div class="cart-dropdown-content">
                                    <ul class="cart-list">
                                        @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                            <li>
                                                <div class="cart-item-desc">
                                                    <a href="{{route('user.dashboard')}}" class="image">
                                                        {{-- <img src="{{$item->model->photo}}" class="cart-thumb" alt="{{$item->model->photo}}"> --}}
                                                    </a>
                                                    <div>
                                                        {{-- <a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a> --}}
                                                        <p>{{$item->qty}} x - <span class="price">{{Helper::currency_converter($item->price)}}</span></p>
                                                    </div>
                                                </div>
                                                <span class="dropdown-product-remove cart_delete" data-id="{{$item->rowId}}"><i class="icofont-bin"></i></span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="my-4 cart-pricing">
                                        <ul>
                                            <li>
                                                <span>{{__('messages.subTotal')}}:</span>
                                                <span>{{Helper::currency_converter(\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}}</span>
                                            </li>
                                            <li>
                                                @if(session()->has('coupon'))
                                                    <span>Coupon:</span>
                                                    <span>{{Helper::currency_converter(\Illuminate\Support\Facades\Session::get('coupon')['value'])}}</span>
                                                @endif
                                            </li>
                                            <li>
                                                <span>Total:</span>
                                                @if(session()->has('coupon'))
                                                    <span>{{Helper::currency_converter((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value'])}}</span>
                                                @else
                                                    <span>{{Helper::currency_converter(\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}}</span>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart-box row-cols-2 d-flex">
                                        <a href="{{route('cart')}}" class="btn-sm btn btn-success">{{__('messages.cart')}}</a>
                                        <a href="{{route('checkout1')}}" class="ml-1 btn-sm btn btn-primary">{{__('messages.checkout')}}</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Account -->
                            <div class="account-area">
                                <div class="user-thumbnail">
                                    @auth
                                        @if(auth()->user()->photo)
                                            <img src="{{auth()->user()->photo}}" alt="">
                                        @else
                                            <img src="{{Helper::userDefaultImage()}}" alt="default user image">
                                        @endif
                                    @else
                                        <img src="{{Helper::userDefaultImage()}}" alt="default user image">
                                    @endauth
                                </div>
                                <ul class="user-meta-dropdown">
                                    @auth
                                        @php
                                            $first_name=explode(' ',auth()->user()->full_name);
                                        @endphp
                                        <li class="user-title"><span>{{__('messages.hello')}},</span> {{$first_name[0]}} !</li>
                                        <li><a href="{{route('user.dashboard')}}">{{__('messages.account')}}</a></li>
                                        <li><a href="{{route('user.order')}}">{{__('messages.ordersLists')}}</a></li>
                                        <li><a href="{{route('wishlist')}}">{{__('messages.wishlist')}}</a></li>
                                        <li><a href="{{route('user.logout')}}"><i class="icofont-logout"></i> {{__('messages.logout')}}</a></li>

                                    @else
                                        <li><a href="{{route('user.auth')}}"><i class="fa fa-user"></i><span> {{__('messages.logRegister')}}</span></a></li>

                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    <!-- Header Area End -->
