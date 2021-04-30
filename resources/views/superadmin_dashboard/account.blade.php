@extends('superadmin_layouts.master')
@section('content')
<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                 <!-- Page-header start -->
                                 <div class="page-header card">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <i class="icofont icofont-user bg-c-blue"></i>
                                                <div class="d-inline">
                                                    <h4>Super admin basic info</h4>
                                                    <span style="text-transform:none;">You can change the info as your wish</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="{{url('/superadmin/dashboard')}}">
                                                            <i class="icofont icofont-home"></i>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="{{url('/superadmin/account')}}">Account</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->

                                    <div class="page-body">
                                    <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Basic Info</h5>
                                                        
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="icofont icofont-simple-left "></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <!-- <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li> -->
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="card-block">

                                                        <form id="account_info_form">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Super Admin ID</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="superadmin_id" id="superadmin_id" class="form-control" placeholder="Super Admin ID" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Phone</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <button type="button" id="save_profile" class="btn btn-primary pull-right">Save changes</button>
                                                            </div>  
                                                        </form>

                                                    </div>
                                                </div>
                                                <!-- Basic Form Inputs card end -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Change Password</h5>
                                                        
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="icofont icofont-simple-left "></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <!-- <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li> -->
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="card-block">

                                                        <form id="change_password_form">
                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Old Password</label>
                                                                <div class="col-sm-8">
                                                                    <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old Password">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">New Password</label>
                                                                <div class="col-sm-8">
                                                                    <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-4 col-form-label">Confirm New Password</label>
                                                                <div class="col-sm-8">
                                                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm New Password">
                                                                </div>
                                                            </div>
    
                                                            <br>
                                                            <div class="form-group">
                                                                <button type="button" id="save_password" class="btn btn-primary pull-right">Save changes</button>
                                                            </div>  
                                                        </form>

                                                    </div>
                                                </div>
                                                <!-- Basic Form Inputs card end -->
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
@endsection

@section('page-css')

@stop

@section('page-scripts')


<script>

    get_account_details();

    function get_account_details()
    {
        $.ajax({
            url:"{{url('/superadmin/get_account_details')}}",
            method:"GET",
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success:(data)=>{
                console.log(data);
                
                if(data.status=='Success')
                {
                    $('#superadmin_id').val(data.response.superadmin_id);
                    $('#name').val(data.response.name);
                    $('#email').val(data.response.email);
                    $('#phone').val(data.response.phone);
                }
                else if(data.status=='Error')
                {
                    toastr.error(data.response);
                }

            },
            complete:()=>{
                $('#overlay').addClass('d-none');
            }
        });
    }


    $('#save_profile').click(()=>{
        $.ajax({
            url:"{{url('/superadmin/save_profile')}}",
            method:"POST",
            data:new FormData($('#account_info_form')[0]),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success:(data)=>{
                
                if(data.errors!=undefined)
                {
                    if(data.errors.superadmin_id!=undefined)
                    {
                        toastr.error(data.errors.superadmin_id[0]);
                    }

                    if(data.errors.superadmin_name!=undefined)
                    {
                        toastr.error(data.errors.name[0]);
                    }

                    if(data.errors.superadmin_email!=undefined)
                    {
                        toastr.error(data.errors.email[0]);
                    }

                    if(data.errors.superadmin_phone!=undefined)
                    {
                        toastr.error(data.errors.phone[0]);
                    }
                }

                if(data.status=='Success')
                {
                    Swal.fire({
                        text: data.response,
                        type: 'success'
                    });

                    get_account_details();
                }
                else if(data.status=='Error')
                {
                    Swal.fire({
                        text: data.response,
                        type: 'error'
                    });

                }
            },
            complete:(data)=>{
                $('#overlay').addClass('d-none');
            }
        });
    });

    $('#save_password').click(()=>{
        $.ajax({
            url:"{{url('/superadmin/save_password')}}",
            method:"POST",
            data:new FormData($('#change_password_form')[0]),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success:(data)=>{
                
                if(data.errors!=undefined)
                {
                    if(data.errors.password!=undefined)
                    {
                        toastr.error(data.errors.password[0]);
                    }
                }

                if(data.status=='Success')
                {
                    Swal.fire({
                        text: data.response,
                        type: 'success'
                    });

                    $('#change_password_form')[0].reset();
                }
                else if(data.status=='Error')
                {
                    Swal.fire({
                        text: data.response,
                        type: 'error'
                    });
                }
            },
            complete:(data)=>{
                $('#overlay').addClass('d-none');
            }
        });
    });
</script>
@stop