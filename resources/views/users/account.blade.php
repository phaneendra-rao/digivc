@extends('user_layouts.master')
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
                                                    <h4>User basic info</h4>
                                                    <span style="text-transform:none;">Manage your profile!</span>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="{{url('/home')}}">
                                                            <i class="icofont icofont-home"></i>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item">
                                                        <a href="{{url('/account')}}">Account</a>
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
                                                        
                                                         
                                                    </div>

                                                    <div class="card-block">

                                                        <form id="account_info_form">
            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Phone</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Gender</label>
                                                                <div class="col-sm-10">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label for="male">
                                                                                <input type="radio" name="gender" value="1" id="male">
                                                                                Male
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label for="female">
                                                                                <input type="radio" name="gender" value="0" id="female">
                                                                                Female
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
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
<style>
.custom-btn
{
    border-radius: 50%;
}
</style>
@stop

@section('page-scripts')


<script>

    get_account_details();

    function get_account_details()
    {
        $.ajax({
            url:"{{url('/get_account_details')}}",
            method:"GET",
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success:(data)=>{
                console.log(data);
                
                if(data.status=='Success')
                {
                    $('#name').val(data.response.name);

                    if(data.response.phone!=null)
                    {
                        $('#phone').val(data.response.phone);
                    }

                    $('#male').removeAttr('checked');
                    $('#female').removeAttr('checked');

                    if(data.response.gender==1)
                    {
                        $('#male').attr('checked','checked')
                    }

                    if(data.response.gender==0)
                    {
                        $('#female').attr('checked','checked')
                    }

                    $('#email').val(data.response.email);


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
            url:"{{url('/save_profile')}}",
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
                    if(data.errors.name!=undefined)
                    {
                        toastr.error(data.errors.name[0]);
                    }

                    if(data.errors.email!=undefined)
                    {
                        toastr.error(data.errors.email[0]);
                    }
                }

                if(data.status=='Success')
                {
                    toastr.success(data.response);

                    get_account_details();
                }
                else if(data.status=='Error')
                {
                    toastr.error(data.response);
                }
            },
            complete:(data)=>{
                $('#overlay').addClass('d-none');
            }
        });
    });

    $('#save_password').click(()=>{
        $.ajax({
            url:"{{url('/save_password')}}",
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
                    if(data.errors.old_password!=undefined)
                    {
                        toastr.error(data.errors.old_password[0]);
                    }

                    if(data.errors.password!=undefined)
                    {
                        toastr.error(data.errors.password[0]);
                    }

                }

                if(data.status=='Success')
                {
                    toastr.success(data.response);

                    $('#change_password_form')[0].reset();
                }
                else if(data.status=='Error')
                {
                    toastr.error(data.response);
                }
            },
            complete:(data)=>{
                $('#overlay').addClass('d-none');
            }
        });
    });
</script>
@stop