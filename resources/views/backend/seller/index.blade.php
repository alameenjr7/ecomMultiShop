@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a>Sellers : <a class="btn btn-sm btn-outline-secondary"
                            href="{{route('seller.create')}}"><i class="icon-plus"></i> Create Seller</a> </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Seller</li>
                        {{-- <li class="breadcrumb-item active">Add users</li> --}}
                    </ul>
                    <p class="float-right"> Total Sellers : {{$sellers->count()}}</p>
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
                            <h2><strong>Seller</strong> List</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>S. N.</th>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Is Verified</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S. N.</th>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Is Verified</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($sellers as $item)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <td style="text-align: center">
                                                <img src="{{$item->photo ==null ? Helper::backDefaultImage() : asset($item->photo)}}" alt="banner img" style="height: 60px; width: 60px;">
                                            </td>
                                            <td>{{$item->full_name}}</td>
                                            <td>{{$item->username}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td style="text-align: center;">
                                                <input type="checkbox" name="verified" value="{{$item->id}}"
                                                    data-toggle="switchbutton" {{$item->is_verified ? 'checked' :
                                                ''}}
                                                data-onlabel="Yes" data-offlabel="No" data-size="sm"
                                                data-onstyle="success" data-offstyle="danger">
                                            </td>

                                            <td style="text-align: center;">
                                                <input type="checkbox" name="toogle" value="{{$item->id}}"
                                                    data-toggle="switchbutton" {{$item->status=='active' ? 'checked' :
                                                ''}}
                                                data-onlabel="active" data-offlabel="inactive" data-size="sm"
                                                data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{route('seller.edit', $item->id)}}" data-toggle="tooltip"
                                                        title="edit" class="float-left ml-1 btn btn-sm btn-outline-warning"
                                                        data-placement="bottom"><i class="icon-note"></i></a>
                                                    <form class="float-left ml-1"
                                                        action="{{route('seller.destroy', $item->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="" data-toggle="tooltip" title="delete"
                                                            data-id="{{$item->id}}"
                                                            class="dltBtn btn btn-sm btn-outline-danger"
                                                            data-placement="bottom"><i class="icon-trash"></i></a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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
            url:"{{route('seller.status')}}",
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

<script>
    $('input[name=verified]').change(function(){
        var mode = $(this).prop('checked');
        var id=$(this).val();
        // alert(id);
        $.ajax({
            url:"{{route('seller.verified')}}",
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

@endsection