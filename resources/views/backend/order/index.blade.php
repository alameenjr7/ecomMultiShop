@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
                        <i class="fa fa-arrow-left"></i>
                        </a>Users
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Order</li>
                        {{-- <li class="breadcrumb-item active">Add users</li> --}}
                    </ul>
                    <p class="float-right"> Total Orders : {{$orders->count()}}</p>
                </div>
            </div>
        </div>

        <div class="block-header">
            <div class="row">
                <div class="col-lg-12">
                    @include('backend.layouts.notification')
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Order</strong> List</h2>
                        </div>
                        <div class="body">
                                {{-- <table class="table table-bordered table-striped table-hover dataTable js-exportable"> --}}
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped ">
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
                                                                    title="view" class="float-left ml-1 btn btn-sm btn-outline-warning"
                                                                    data-placement="bottom"><i class="icon-eye"></i>
                                                                </a>
                                                                <form class="float-left ml-1"
                                                                    action="{{route('order.destroy', $order->id)}}" method="post">
                                                                    @csrf
                                                                    @method('order.delete')
                                                                    <a href="" data-toggle="tooltip" title="delete"
                                                                        data-id="{{$order->id}}"
                                                                        class="dltBtn btn btn-sm btn-outline-danger"
                                                                        data-placement="bottom"><i class="icon-trash"></i></a>
                                                                </form>
                                                            </div>
                                                        </td>
                                                </tr>
                                                @empty
                                                    <td colspan="8" class="text-center">No orders</td>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $('input[name=toogle]').change(function(){
        var mode = $(this).prop('checked');
        var id=$(this).val();
        // alert(id);
        $.ajax({
            url:"{{route('user.status')}}",
            type:"POST",
            data:{
                _token:'{{csrf_token()}}',
                mode:mode,
                id:id,
            },
            success:function(response){
                if(response.status){
                    alert(response.msg);
                }
                else{
                    alert('Please try again!')
                }
            }
        })
    });
</script>
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
