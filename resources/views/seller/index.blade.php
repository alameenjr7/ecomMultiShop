@extends('seller.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>
                        <a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
                            <i class="fa fa-arrow-left"></i>
                        </a>Dashboard
                    </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('seller')}}">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">eCommerce</li>
                    </ul>
                </div>
                <div class="text-right col-lg-7 col-md-4 col-sm-12">
                    <div class="text-center inlineblock m-r-15 m-l-15 hidden-sm">
                        <div class="text-left sparkline" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#00c5dc"
                            data-fill-Color="transparent">3,5,1,6,5,4,8,3
                        </div>
                        <span>Visitors</span>
                    </div>
                    <div class="text-center inlineblock m-r-15 m-l-15 hidden-sm">
                        <div class="text-left sparkline" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#f4516c"
                            data-fill-Color="transparent">4,6,3,2,5,6,5,4
                        </div>
                        <span>Visits</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            @include('seller.layouts.notification')
        </div>

        <div class="clearfix row">
            <div class="col-lg-3 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        <h3>{{App\Models\Product::where('status','active')->where('created_at','>',now()->subDays(30)->endOfDay())->count()}} <i class="float-right icon-briefcase"></i></h3>
                        <span>Total products: {{App\Models\Product::where('status','active')->count()}}</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                        <div class="progress-bar" data-transitiongoal="89"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        <h3>{{App\Models\User::where('status','active')->where('created_at','>',now()->subDays(30)->endOfDay())->count()}} <i class="float-right icon-user-follow"></i></h3>
                        <span>New Customers (last month)</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                        <div class="progress-bar" data-transitiongoal="67"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        <h3>{{Helper::currency_converter(App\Models\Product::where('status','active')->sum('offer_price'))}} <i class="float-right"></i></h3>
                        <span>Total product active</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                        <div class="progress-bar" data-transitiongoal="64"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        <h3>{{Helper::currency_converter(App\Models\Order::where('payment_status','paid')->sum('total_amount'))}}<i class="float-right"></i></h3>
                        <span>Total Product Paid</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                        <div class="progress-bar" data-transitiongoal="68"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix row">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Annual Report <small>Description text here...</small></h2>
                        <ul class="header-dropdown">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="clearfix row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <span class="text-muted">Sales Report</span>
                                <h3 class="text-warning">$4,516</h3>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <span class="text-muted">Annual Revenue </span>
                                <h3 class="text-info">$6,481</h3>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <span class="text-muted">Total Profit</span>
                                <h3 class="text-success">$3,915</h3>
                            </div>
                        </div>
                        <div id="area_chart" class="graph"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Income Analysis<small>8% High then last month</small></h2>
                    </div>
                    <div class="body">
                        <div class="text-center sparkline-pie">6,4,8</div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2>Sales Income</h2>
                    </div>
                    <div class="body">
                        <h6>Overall <b class="text-success">7,000</b></h6>
                        <div class="sparkline" data-type="line" data-spot-Radius="2" data-highlight-Spot-Color="#445771" data-highlight-Line-Color="#222"
                            data-min-Spot-Color="#445771" data-max-Spot-Color="#445771" data-spot-Color="#445771"
                            data-offset="90" data-width="100%" data-height="95px" data-line-Width="1" data-line-Color="#ffcd55"
                            data-fill-Color="#ffcd55">2,4,3,1,5,7,3,2
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Recent Orders</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Payment Methode</th>
                                        <th>Condition</th>
                                        <th>Order Status</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                    <tr>
                                            <td>{{$order->order_number}}</td>
                                            <td>{{$order->first_name}} {{$order->last_name}}</td>
                                            <td>{{$order->email}}</td>
                                            <td>{{$order->payment_method=="cod" ? "Cash on Delivery" : $order->payment_method}}</td>
                                            @if ($order->condition=='pending')
                                                <td><span class="badge badge-info">{{ucfirst($order->condition)}}</span></td>
                                            @elseif ($order->condition=='processing')
                                                <td><span class="badge badge-warning">{{ucfirst($order->condition)}}</span></td>
                                            @elseif ($order->condition=='delivered')
                                                <td><span class="badge badge-primary">{{ucfirst($order->condition)}}</span></td>
                                            @else
                                                <td><span class="badge badge-danger">{{ucfirst($order->condition)}}</span></td>
                                            @endif
                                            @if ($order->payment_status=='paid')
                                                <td><span class="badge badge-success">{{ucfirst($order->payment_status)}}</span></td>
                                            @else
                                                <td><span class="badge badge-danger">{{ucfirst($order->payment_status)}}</span></td>
                                            @endif
                                            <td>$ {{number_format($order->total_amount,2)}}</td>
                                            <td style="text-align: center;">
                                                <div class="row">
                                                    <a href="{{route('order.show',$order->id)}}" data-target="#userID{{$order->id}}" data-toggle="tooltip"
                                                        title="view" class="float-left ml-1 btn btn-sm btn-outline-secondary"
                                                        data-placement="bottom"><i class="icon-eye"></i>
                                                    </a>
                                                    <form class="float-left ml-1"
                                                        action="{{route('order.destroy', $order->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="" data-toggle="tooltip" title="delete"
                                                            data-id="{{$order->id}}"
                                                            class="dltBtn btn btn-sm btn-outline-danger"
                                                            data-placement="bottom"><i class="icon-trash"></i></a>
                                                    </form>
                                                </div>
                                            </td>
                                    </tr>
                                    @empty
                                        <td colspan="6" class="text-center">No orders</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>New Orders</h2>
                    </div>
                    <div class="body">
                        <table class="table table-hover">
                            <thead class="thead-success">
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Customers</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>IPONE-7</td>
                                    <td>
                                        <ul class="list-unstyled team-info margin-0">
                                            <li><img src="{{asset('backend/assets/images/xs/avatar1.jpg')}}" title="Avatar" alt="Avatar"></li>
                                            <li><img src="{{asset('backend/assets/images/xs/avatar6.jpg')}}" title="Avatar" alt="Avatar"></li>
                                        </ul>
                                    </td>
                                    <td>$ 356</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>NOKIA-8</td>
                                    <td>
                                        <ul class="list-unstyled team-info margin-0">
                                            <li><img src="{{asset('backend/assets/images/xs/avatar1.jpg')}}" title="Avatar" alt="Avatar"></li>
                                            <li><img src="{{asset('backend/assets/images/xs/avatar5.jpg')}}" title="Avatar" alt="Avatar"></li>
                                            <li><img src="{{asset('backend/assets/images/xs/avatar9.jpg')}}" title="Avatar" alt="Avatar"></li>
                                        </ul>
                                    </td>
                                    <td>$ 542</td>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>IPONE-7</td>
                                    <td>
                                        <ul class="list-unstyled team-info margin-0">
                                            <li><img src="{{asset('backend/assets/images/xs/avatar5.jpg')}}" title="Avatar" alt="Avatar"></li>
                                        </ul>
                                    </td>
                                    <td>$ 356</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>NOKIA-8</td>
                                    <td>
                                        <ul class="list-unstyled team-info margin-0">
                                            <li><img src="{{asset('backend/assets/images/xs/avatar3.jpg')}}" title="Avatar" alt="Avatar"></li>
                                            <li><img src="{{asset('backend/assets/images/xs/avatar2.jpg')}}" title="Avatar" alt="Avatar"></li>
                                        </ul>
                                    </td>
                                    <td>$ 542</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Top Selling Country</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="world-map-markers" class="jvector-map" style="height: 300px"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.dltBtn').click(function(e) {
        var form = $(this).closest('form');
        var dataID = $(this).data('id');
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete)=>{
            if(willDelete){
                form.submit();
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success"
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    });
</script>

@endsection
