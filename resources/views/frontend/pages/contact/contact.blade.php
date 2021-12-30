@extends('frontend.layouts.master')

@section('content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Contact</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Message Now Area -->
    <div class="message_now_area section_padding_100" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="text-center popular_section_heading mb-50">
                        <h5 class="mb-3">{{__('messages.contact_sms')}}</h5>
                        <p>{{__('messages.contactMoreInfo')}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="single-contact-info mb-30">
                        <i class="icofont-phone"></i>
                        <p>+{{get_setting('phone')}} <br> </p>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-contact-info mb-30">
                        <i class="icofont-ui-email"></i>
                        <p>{{get_setting('email')}} <br> </p>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-contact-info mb-30">
                        <i class="icofont-location-pin"></i>
                        <p>{{get_setting('address')}} <br> </p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="contact_from mb-50">
                        <form action="{{route('contact.submit')}}" method="post" id="main_contact_form">
							@csrf
                            <div class="contact_input_area">
                                <div id="success_fail_info"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="f_name" id="f-name" placeholder="{{__('messages.f_name')}}" required value="{{old('f_name')}}">
											@error('f_name')
												<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="l_name" id="l-name" placeholder="{{__('messages.l_name')}}" required value="{{old('l_name')}}">
											@error('l_name')
												<p class="text-danger">{{$message}}</p>
											@enderror
										</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="{{__('messages.e_address')}}" required value="{{old('email')}}">
											@error('email')
												<p class="text-danger">{{$message}}</p>
											@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="py-0 form-control  right w-100" name="subject" id="options">
                                                <option value=" ">{{__('messages.subject')}}</option>
                                                <option value="quality" {{old('subject')=='quality' ? 'selected' : '' }}>{{__('messages.qualite')}}
                                                </option>
                                                <option value="satisfaction" {{old('subject')=='satisfaction' ? 'selected' : '' }}>{{__('messages.satisfaction')}}
                                                </option>
                                                <option value="value" {{old('subject')=='value' ? 'selected' : '' }}>{{__('messages.value')}}
                                                </option>
                                                <option value="design" {{old('subject')=='design' ? 'selected' : '' }}>{{__('messages.design')}}
                                                </option>
                                                <option value="price" {{old('subject')=='price' ? 'selected' : '' }}>{{__('messages.price')}}
                                                </option>
                                                <option value="others" {{old('subject')=='others' ? 'selected' : '' }}>{{__('messages.others')}}
                                                </option>
                                            </select>
                                            {{-- <input type="text" class="form-control" name="subject" id="subject" placeholder="{{__('messages.subject')}}" required value="{{old('subject')}}"> --}}
											@error('subject')
												<p class="text-danger">{{$message}}</p>
											@enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="{{__('messages.yrMessage')}} *" required>{{old('message')}}</textarea>
											@error('message')
												<p class="text-danger">{{$message}}</p>
											@enderror
                                        </div>
                                    </div>
                                    <div class="text-center col-12">
                                        <button type="submit" class="btn btn-primary w-100">{{__('messages.send_mess')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12">
                    <div class="google-map">
                        <iframe src="{{get_setting('map_url')}}" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Message Now Area -->

@endsection
