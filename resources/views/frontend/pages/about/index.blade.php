@extends('frontend.layouts.master')

@section('content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>{{__('messages.about_us')}}</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('messages.about_us')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- About Us Area -->
    <section class="about_us_area section_padding_100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="pb-5 about_us_content pb-lg-0">
                        <div class="row">
                            @php
                                $image=explode(',',$about->image)
                            @endphp
                            @if ($about->image!=null)
                                <div class="col-6">
                                    <img src="{{asset($image[0])}}" alt="{{asset($image[0])}}">
                                </div>
                                <div class="col-6">
                                    <img src="{{asset($image[1])}}" alt="{{asset($image[1])}}">
                                </div>
                                <div class="col-6">
                                    <img src="{{asset($image[2])}}" alt="{{asset($image[2])}}">
                                </div>
                                <div class="col-6">
                                    <img src="{{asset($image[3])}}" alt="{{asset($image[3])}}">
                                </div>
                            @else
                                <div class="col-6">
                                    <img src="{{asset($about->image)}}" alt="{{asset($about->image)}}">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="pl-0 about_us_content pl-lg-5">
                        <h5>{{$about->heading}}</h5>
                        <p>{!! html_entity_decode($about->content) !!}</p>
                        <a href="#" class="btn btn-primary mt-30">{{__('messages.learn_more')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Area -->

    <!-- Features Area -->
    <section class="features-area mb-50">
        <div class="container">
            <div class="row">
                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area mb-50">
                        <i class="icofont-ssl-security"></i>
                        <h5>{{__('messages.spg')}}</h5>
                        <p>{{$about->secure_payment_Gat}}</p>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area mb-50">
                        <i class="icofont-badge"></i>
                        <h5>{{__('messages.qp')}}</h5>
                        <p>{{$about->quality_products}}</p>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area mb-50">
                        <i class="icofont-fast-delivery"></i>
                        <h5>{{__('messages.fd')}}</h5>
                        <p>{{$about->fast_delivery}}</p>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area mb-50">
                        <i class="icofont-cash-on-delivery"></i>
                        <h5>{{__('messages.cod')}}</h5>
                        <p>{{$about->cashOn_delivery}}</p>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area mb-50">
                        <i class="icofont-gift"></i>
                        <h5>{{__('messages.freeD')}}</h5>
                        <p>{{$about->free_delivery}}</p>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area mb-50">
                        <i class="icofont-life-bouy"></i>
                        <h5>{{__('messages.cs')}}</h5>
                        <p>{{$about->customer_support}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cool Facts Area -->
    <section class="about_us_one cool_facts_area section_padding_100_70 bg-overlay jarallax" style="background-image: url({{asset('frontend/assets/img/bg-img/deals.jpg')}});">
        <div class="container">
            <div class="row">
                <!-- Single Cool Facts -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="text-center cool_fact_text wow fadeInUp" data-wow-delay="0.2s">
                        <h2><span class="counter">{{$about->exp_years}}</span>+</h2>
                        <h5>{{__('messages.YOE')}}</h5>
                    </div>
                </div>
                <!-- Single Cool Facts -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="text-center cool_fact_text wow fadeInUp" data-wow-delay="0.4s">
                        <h2><span class="counter">{{$about->happy_customer}}</span>+</h2>
                        <h5>{{__('messages.HC')}}</h5>
                    </div>
                </div>
                <!-- Single Cool Facts -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="text-center cool_fact_text wow fadeInUp" data-wow-delay="0.6s">
                        <h2><span class="counter">{{$about->team_advisor}}</span>+</h2>
                        <h5>{{__('messages.TA')}}</h5>
                    </div>
                </div>
                <!-- Single Cool Facts -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="text-center cool_fact_text wow fadeInUp" data-wow-delay="0.8s">
                        <h2><span class="counter">{{$about->return_customer}}</span>%</h2>
                        <h5>{{__('messages.RC')}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cool Facts Area End -->

    <!-- Testimonial Area -->
    <section class="testimonials_area bg-gray section_padding_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="text-center popular_section_heading mb-50">
                        <h5 class="mb-3">{{__('messages.FWFC')}}</h5>
                        <p>{{__('messages.temoin')}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="testimonials_slides owl-carousel">
                        @forelse ($temoins as $temoin)
                            <div class="text-center single_tes_slide">
                                @php
                                    $user=App\Models\User::where('email',$temoin->email)->first();
                                @endphp
                                @if($user)
                                    <img  src="{{asset($user->photo)}}" alt="">
                                @else
                                    <img src="{{Helper::userDefaultImage()}}" alt="default user image">
                                @endif
                                <h6>{{$temoin->message}}</h6>
                                <p>{{$temoin->email}}</p>
                                <span>{{ucfirst($temoin->subject)}}</span>
                            </div>
                        @empty
                            <p class="text-center">{{__('messages.temoins')}}</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End -->

    <!-- Popular Brands Area -->
    @if (count($brands)>0)
        <section class="popular_brands_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="popular_section_heading mb-50">
                            <h5>{{__('messages.pop_brand')}}</h5>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="popular_brands_slide owl-carousel">
                            @foreach ($brands as $brand)
                                <div class="single_brands">
                                    <img src="{{asset($brand->photo)}}" alt="{{$brand->title}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Popular Brands Area -->

@endsection
