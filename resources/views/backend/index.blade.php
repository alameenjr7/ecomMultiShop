@extends('backend.layouts.master')

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
                            <a href="{{route('admin')}}">
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

        <div class="clearfix row">
            <div class="col-lg-3 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        <h3>{{$total_productMonth}} <i class="float-right icon-briefcase"></i></h3>
                        <span>Total products</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                        <div class="progress-bar" data-transitiongoal="{{$total_productMonth/$total_product*100}}"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        <h3>{{$lastCustomer}} <i class="float-right icon-user-follow"></i></h3>
                        <span>New Customers (last month)</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                        <div class="progress-bar" data-transitiongoal="{{$lastCustomer/$totalCustomer*100}}"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        @php
                            $product=App\Models\Product::where('status','active')->sum('offer_price');
                        @endphp
                        <h3>{{Helper::currency_converter($product)}} <i class="float-right fa fa-dollar"></i></h3>
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
                        @php
                            $order=App\Models\Order::where('payment_status','paid')->sum('total_amount');
                        @endphp
                        <h3>{{Helper::currency_converter($order)}}<i class="float-right fa fa-money"></i></h3>
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
                        {{-- <ul class="header-dropdown">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul> --}}
                    </div>
                    <div class="body">
                        <div class="clearfix row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <span class="text-muted">Sales Report</span>
                                <h3 class="text-warning">{{Helper::currency_converter((float) str_replace(',','',$chartData1))}}</h3>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <span class="text-muted">Annual Revenue </span>
                                <h3 class="text-info">{{Helper::currency_converter((float) str_replace(',','',$annuals_revenues))}}</h3>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <span class="text-muted">Total Profit</span>
                                <h3 class="text-success">{{Helper::currency_converter($annuals_revenues - (float) str_replace(',','',$chartData1))}}</h3>
                            </div>
                        </div>
                        <div id="area_chart" class="graph"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Income Analysis<small>{{$diff_percent}}% High then last month</small></h2>
                    </div>
                    <div class="body">
                        <div class="text-center sparkline-pie">{{$chartData}}</div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2>Sales Income</h2>
                    </div>
                    <div class="body">
                        <h6>Overall <b class="text-success">{{Helper::currency_converter($chartData4)}}</b></h6>
                        <div class="sparkline" data-type="line" data-spot-Radius="2" data-highlight-Spot-Color="#445771" data-highlight-Line-Color="#222"
                            data-min-Spot-Color="#445771" data-max-Spot-Color="#445771" data-spot-Color="#445771"
                            data-offset="90" data-width="100%" data-height="95px" data-line-Width="1" data-line-Color="#ffcd55"
                            data-fill-Color="#ffcd55">22,40,3,1,5,7,3,37
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
                        {{-- <ul class="header-dropdown">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul> --}}
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
                                            <td>{{Helper::currency_converter(($order->total_amount))}}</td>
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
                                @if (count($new_orders)>0)
                                @forelse ($new_orders as $key=>$new)
                                    <tr>
                                        <td>{{$new->count_product}}</td>
                                        <td>
                                            @php
                                                $title_product=\App\Models\Product::where('id',$new->product_id)->first();
                                            @endphp
                                            {{$title_product->title}}
                                        </td>
                                        <td>
                                            @php
                                                $photo_user=\App\Models\User::where('id',$new->users_id)->first();
                                            @endphp
                                            <ul class="list-unstyled team-info margin-0">
                                                {{-- <li><img src="{{asset($photo_user->photo)}}" title="Avatar" alt=""></li> --}}
                                            </ul>
                                        </td>
                                        <td>{{Helper::currency_converter($new->total)}}</td>
                                    </tr>
                                @empty
                                    <td colspan="4" class="text-center">No orders</td>
                                @endforelse
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Top Selling Country</h2>
                        {{-- <ul class="header-dropdown">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul> --}}
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

<script>
    $(function() {
        "use strict";
        MorrisArea();
    });
    //======
    function MorrisArea() {


        Morris.Area({
            element: 'area_chart',
            data: {!! $json !!},
        lineColors: ['#ffc107', '#17a2b8', '#28a745'],
        xkey: 'year',
        ykeys: ['total','revenue'],
        labels: ['Sales', 'Revenue', 'Profit'],
        pointSize: 2,
        lineWidth: 1,
        resize: true,
        fillOpacity: 0.5,
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        hideHover: 'auto'
        });

    }

    $(function() {
        "use strict";
        var mapData = {
                "US": 298,
                "AU": 760,
                "CA": 870,
                "SN": 2000000,
                "GB": 120,
            };

        if( $('#world-map-markers').length > 0 ){
            $('#world-map-markers').vectorMap(
            {
                map: 'world_mill_en',
                backgroundColor: 'transparent',
                borderColor: '#fff',
                borderOpacity: 0.25,
                borderWidth: 0,
                color: '#e6e6e6',
                regionStyle : {
                    initial : {
                    fill : '#ebebeb'
                    }
                },

                markerStyle: {
                    initial: {
                                r: 5,
                                'fill': '#fff',
                                'fill-opacity':1,
                                'stroke': '#000',
                                'stroke-width' : 1,
                                'stroke-opacity': 0.4
                            },
                    },

                markers: [
                    { latLng: [37.09,-95.71], name: 'America' },
                    { latLng: [-25.27, 133.77], name: 'Australia' },
                    { latLng: [56.13,-106.34], name: 'Canada' },
                    { latLng: [14.497401,-14.452362], name: 'Senegal' },
                    { latLng: [55.37,-3.43], name: 'United Kingdom' },
                ],

                series: {
                    regions: [{
                        values: {
                            "US": '#bdf3f5',
                            "AU": '#f9f1d8',
                            "SN": '#40ff00',
                            "GB": '#e0eff5',
                            "CA": '#efebf4',
                        },
                        attribute: 'fill'
                    }]
                },
                hoverOpacity: null,
                normalizeFunction: 'linear',
                zoomOnScroll: false,
                scaleColors: ['#000000', '#000000'],
                selectedColor: '#000000',
                selectedRegions: [],
                enableZoom: false,
                hoverColor: '#fff',
            });
        }
    });
    // progress bars
    $('.progress .progress-bar').progressbar({
        display_text: 'none'
    });

    $('.sparkline-pie').sparkline('html', {
        type: 'pie',
        offset: 90,
        width: '155px',
        height: '155px',
        sliceColors: ['#02b5b2', '#445771', '#ffcd55', '#40ff00', '#0040ff']
    })

    $('.sparkbar').sparkline('html', { type: 'bar' });
</script>
@endsection
