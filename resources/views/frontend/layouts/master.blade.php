<!doctype html>
<html lang="en">

<head>
    @include('frontend.layouts.head')
</head>



<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Header Area -->
    <header class="header_area" id="header-ajax">
        @include('frontend.layouts.header')
    </header>
    <!-- Header Area End -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
    </div>

    <!-- Content Area -->
    @yield('content')
    <!-- Content Area -->


    <!-- Footer Area -->
@include('frontend.layouts.footer')
    <!-- Footer Area -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
@include('frontend.layouts.script')
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script>
        $(document).on('click','.cart_delete',function(e){
            e.preventDefault();
            var cart_id = $(this).data('id');

            var token = "{{csrf_token()}}";
            var path = "{{route('cart.delete')}}";

            $.ajax({
                url:path,
                type:"POST",
                dataType:"JSON",
                data:{
                    cart_id:cart_id,
                    _token:token,
                },
                success:function(data){
                    console.log(data);
                    $('body #header-ajax').html(data['header']);
                    $('body #cart_counter').html(data['cart_count']);
                    if(data['status']){
                        swal({
                            title: "Good job !",
                            text: data['message'],
                            icon: "success",
                            button: "OK !",
                        });
                    }
                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            var path="{{route('auto.search')}}";
            $('#search_text').autocomplete({
                source:function(request,response){
                    $.ajax({
                        url:path,
                        dataType:"JSON",
                        data:{
                            term:request.term
                        },
                        success:function(data){
                            response(data);
                        }
                    });
                },
                minLength:1,
            });
        });
    </script>
</body>

</html>
