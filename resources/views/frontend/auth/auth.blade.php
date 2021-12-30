@extends('frontend.layouts.master')

@section('content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>{{__('messages.login')}} &amp; {{__('messages.register')}}</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('messages.login')}} &amp; {{__('messages.register')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Login Area -->
    <div class="bigshop_reg_log_area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="login_form mb-50">
                        <h5 class="mb-3">{{__('messages.login')}}</h5>

                        <form action="{{route('login.submit')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="{{__('messages.emailUsername')}}" value="{{old('email')}}">
                                @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="{{__('messages.password')}}">
                                @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-check">
                                <div class="pl-1 mb-3 custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customChe">
                                    <label class="custom-control-label" for="customChe">{{__('messages.rembLog')}}</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">{{__('messages.login')}}</button>
                        </form>
                        <!-- Forget Password -->
                        <div class="forget_pass mt-15">
                            <a href="#">{{__('messages.forgetPassword')}}</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="login_form mb-50">
                        <h5 class="mb-3">{{__('messages.register')}}</h5>

                        <form action="{{route('register.submit')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="{{__('messages.full_name')}}" value="{{old('full_name')}}">
                                @error('full_name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="{{__('messages.username')}}" value="{{old('username')}}">
                                @error('username')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="{{__('messages.email')}}" value="{{old('email')}}">
                                @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="{{__('messages.password')}}">
                                @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="{{__('messages.repeatPassword')}}">

                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">{{__('messages.register')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Area End -->

@endsection
