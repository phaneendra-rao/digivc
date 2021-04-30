@extends('superadmin_layouts.master')
@section('content')
<div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <!-- Main body start -->
                            <div class="main-body user-profile">
                                <div class="page-wrapper">
                                <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <a href="{{url('/superadmin')}}/all-users" style="color:white;"><i class="icofont icofont-user bg-c-pink"></i></a>
                                                    <div class="d-inline">
                                                        <h4>User and cards</h4>
                                                        <span style="text-transform:none;">You can manage user profile and linked cards</span>
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
                                                <li class="breadcrumb-item"><a href="{{url('/superadmin')}}/all-users">Users List</a>
                                                </li>
                                            </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <!-- Page-body start --> 
                                    <div class="page-body">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <!-- tab header start -->
                                                <div class="tab-header card">
                                                    <ul class="nav nav-tabs md-tabs nav-justified tab-timeline" role="tablist" id="mytab">
                                                        <li class="nav-item">
                                                            <a class="nav-link inner_tabs active" style="cursor:pointer;" id="user_profile" role="tab">User Profile</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link inner_tabs" style="cursor:pointer;" id="user_cards" role="tab">Cards <span class="badge badge-primary" style="font-weight:400;" id="card_count_"></span></a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- tab header end -->
                                                <!-- tab content start -->
                                                <div class="tab-content">
                                                    <!-- tab panel personal start -->
                                                    <div class="tab-pane inner_tabs_open active" id="user_profile_open" role="tabpanel">
                                                        <!-- personal card start -->
                                                                <div class="view-info" id="user-view">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div id="account-edit-photo" class="card">
                                                                                <div id="profile_pic">

                                                                                    <span style="float:right;">
                                                                                        <i class="fa fa-trash" id="delete_dp"></i>
                                                                                    </span>                                

                                                                                    <center>
                                                                                        <img class="img img-fluid" style="padding:10px;" src="{{asset('sources/assets/images/user_profile/male_pic.png')}}" id="dp" alt="logo">	
                                                                                    </center>

                                                                                    <p>
                                                                                        <form id="change_dp_form">
                                                                                            <input type="text" name="id" class="d-none" value="{{$user_details['id']}}" readonly>
                                                                                            <center>
                                                                                                <div class="btn btn-primary">
                                                                                                    <input type="file" class="file-upload" id="change_dp" name="profile_picture" accept="image/*">
                                                                                                    Upload New Pic
                                                                                                </div>
                                                                                            </center>
                                                                                        </form>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-8">
                                                                            <div class="general-info">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="card">
                                                                                            <div class="card-block">
                                                                                                <button class="btn btn-primary btn-sm pull-right" style="margin-top:-8px;" type="button" onclick="edit_user()"><i class="fa fa-pencil-square"></i> Edit</button>
                                                                                                <div class="table-responsive">
                                                                                                    <table class="table m-0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <th scope="row">Name</th>
                                                                                                                <td id="name_data"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th scope="row">Email</th>
                                                                                                                <td id="email_data"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th scope="row">Phone</th>
                                                                                                                <td id="phone_data"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th scope="row">Gender</th>
                                                                                                                <td id="gender_data"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th scope="row">Basic Card</th>
                                                                                                                <td id="basic_card_credit_data"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th scope="row">Premium Card</th>
                                                                                                                <td id="premium_card_credit_data"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th scope="row">Joined On</th>
                                                                                                                <td id="joined_on_data">{{$user_details['joined_on']}}</td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- end of row -->
                                                                            </div>
                                                                            <!-- end of general info -->
                                                                        </div>
                                                                        <!-- end of col-lg-12 -->
                                                                    </div>
                                                                    <!-- end of row -->
                                                                </div>
                                                                <!-- end of view-info -->
                                                            </div>
                                                    <!-- tab pane personal end -->
                                                    
                                                    
                                                    <!-- tab pane info start -->
                                                    <div class="tab-pane inner_tabs_open d-none" id="user_cards_open" role="tabpanel">
                                                        <!-- info card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Basic cards & Premium cards</h5>
                                                                <button onclick="select_card()" style="padding-right:10px;" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                                                    <i class="icofont icofont-plus"></i> Add New
                                                                </button>
                                                            </div>
                                                            <div class="card-block">
                                                                <div class="row">                                                                    
                                                                    <div class="col-lg-12">
                                                                        <div class="data_table_main table-responsive dt-responsive">
                                                                            <table id="cards_table" style="width:100%;" class="table table-striped table-bordered nowrap">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Sno</th>
                                                                                        <th>Card Type</th>
                                                                                        <th>Company name</th>
                                                                                        <th>Contact Person name</th>
                                                                                        <th>Expiry On</th>
                                                                                        <th>Status</th>
                                                                                        <th>Updated At</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- info card end -->
                                                    </div>
                                                    <!-- tab pane info end -->


                                                </div>
                                                <!-- tab content end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main body end -->
                        </div>
                    </div>


<div class="modal" id="ChangeDpModal" tabindex="-1" role="dialog" aria-labelledby="ChangeDpModal" aria-hidden="true">
    <button type="button" class="close float-close-pro" id="change_dp_close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa fa-times"></i></span>
    </button>
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-size:1.5rem;">Crop and uplaod</h2>
            </div>

            <div class="modal-body-pro">
            
            <div class="mx-auto"  id="upload-demo"></div>
                
            <button class="btn btn-block btn-primary" id="upload-result"> Crop And Upload</button>
            
            </div> 

        </div>
    </div>
</div>

<button type="button" class="d-none" id="add-user-open" data-toggle="modal" data-target="#add-user-modal"></button>

<div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="user_form_head">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="user_form">
                            @csrf
                                <input type="text" class="d-none" name="user_id" id="user_id" readonly>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                                <label for="male"><input type="radio" name="gender" id="male" value="1"> Male</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                                <label for="female"><input type="radio" name="gender" id="female" value="0"> Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <center>
                                <label><input type="checkbox" name="check_basic_card" value="1"> Check if you adding basic card</label>
                                </center>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Basic Card</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="d-none" id="basic_card_no" value="1" readonly>
                                        <div id="attach_basic_cards">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="basic_expiry_on[]" />
                                                </div>
                                                <div class="col-sm-4">
                                                    <button type="button" onclick="add_basic()" class="btn btn-sm btn-primary"><i style="padding-left:5px;" class="fa fa-plus"></i></button>
                                                </div>  
                                            </div>
                                        </div>                                    
                                    </div>
                                </div>
                                <hr>
                                <center>
                                <label><input type="checkbox" name="check_premium_card" value="1"> Check if you adding premium card</label>
                                </center>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Premium Card</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="d-none" id="premium_card_no" value="1" readonly>
                                        <div id="attach_premium_cards">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="premium_expiry_on[]" />
                                                </div>
                                                <div class="col-sm-4">
                                                    <button type="button" onclick="add_premium()" class="btn btn-sm btn-primary"><i style="padding-left:5px;" class="fa fa-plus"></i></button>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" id="add-user-close" data-dismiss="modal">Close</button>
                <button type="button" id="add-user-submit" class="btn btn-primary waves-effect waves-light ">Add User</button>
                <button type="button" id="update-user-submit" class="btn btn-primary waves-effect waves-light d-none">Update User</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="d-none" id="select-card-open" data-toggle="modal" data-target="#select-card-modal"></button>

<div class="modal fade" id="select-card-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Card</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn d-none btn-default waves-effect" id="add-card-close" data-dismiss="modal">Close</button>
                <button type="button" id="basic" class="btn btn-primary waves-effect waves-light">Basic card</button>
                <button type="button" id="premium" class="btn btn-primary waves-effect waves-light">Premium Card</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-css')
<style>
.btn-primary .file-upload {
    width: 100%;
    padding: 10px 0px;
    position: absolute;
    left: 0;
    opacity: 0;
    cursor: pointer;
}

#delete_dp
{
    margin-top:-10px;
    margin-left:-15px;
    position:absolute;
    height:30px;
    width:30px;
    padding-top:8px;
    float:right;
    padding-left:9px;
    cursor:pointer;
    border-radius:50%;
    background-color:#ef4036;
    color:white;
}

.custom-btn
{
    border-radius:50%;
    height:30px;
    width:30px;
}

#basic_card_count
{
    padding:0px 10px;
}

#premium_card_count
{
    padding:0px 10px;
}

.custom-btn .fa
{
    margin-left:-4px;
    padding-bottom:-10px;
}


#upload-demo
{
    width:400px;
}

#cards_table_filter
{
    float:right;
}

.nav-tabs .slide {
    width: calc(100% / 2) !important;
}

.color_picker_size
{
    width: 300px;
    height: 200px;
}
</style>
@stop

@section('page-scripts')
<script src="{{asset('sources/assets/pages/ckeditor/ckeditor.js')}}"></script>

<script src="{{asset('sources/assets/pages/chart/echarts/js/echarts-all.js')}}" type="text/javascript"></script>

<script src="{{asset('sources/assets/pages/user-profile.js')}}"></script>

<script>


$('.inner_tabs').click(function(){
    var id = this.id;

    $('.inner_tabs').removeClass('active');
    $('#'+id).addClass('active');

    $('.inner_tabs_open').removeClass('active');
    $('.inner_tabs_open').addClass('d-none');
    $('#'+id+'_open').removeClass('d-none');
    $('#'+id+'_open').addClass('active');
});

$('#basic_inc').click(()=>{
    var val = $('#basic_card').val();
    val++;

    if(val!=0)
    {
        $('#basic_dec').removeAttr('disabled');
    }
    else
    {
        $('#basic_dec').attr('disabled','disabled');
    }

    $('#basic_card').val(val);
    $('#basic_card_count').html(' '+val+' ');
});

$('#basic_dec').click(()=>{
    var val = $('#basic_card').val();
    val--;

    if(val!=0)
    {
        $('#basic_dec').removeAttr('disabled');
    }
    else
    {
        $('#basic_dec').attr('disabled','disabled');
    }

    $('#basic_card').val(val);
    $('#basic_card_count').html(' '+val+' ');
});

$('#premium_inc').click(()=>{
    var val = $('#premium_card').val();
    val++;

    if(val!=0)
    {
        $('#premium_dec').removeAttr('disabled');
    }
    else
    {
        $('#premium_dec').attr('disabled','disabled');
    }

    $('#premium_card').val(val);
    $('#premium_card_count').html(' '+val+' ');
});

$('#premium_dec').click(()=>{
    var val = $('#premium_card').val();
    val--;

    if(val!=0)
    {
        $('#premium_dec').removeAttr('disabled');
    }
    else
    {
        $('#premium_dec').attr('disabled','disabled');
    }

    $('#premium_card').val(val);
    $('#premium_card_count').html(' '+val+' ');
});


function add_basic()
{
    var basic_card_no = $('#basic_card_no').val();

    basic_card_no++;

    $('#basic_card_no').val(basic_card_no);

    var item = '<div class="row temp_rows" style="margin-top:10px;" id="basic_card__'+basic_card_no+'">';
    item = item.concat('<div class="col-sm-8">');
    item = item.concat('<input type="date" name="basic_expiry_on[]" id="basic_card_'+basic_card_no+'" class="form-control" />');
    item = item.concat('</div>');
    item = item.concat('<div class="col-sm-4">');
    item = item.concat('<button type="button" onclick="remove_basic_card(\''+basic_card_no+'\')" class="btn btn-sm btn-danger"><i style="padding-left:5px;" class="fa fa-minus"></i></button>');
    item = item.concat('<button type="button" onclick="add_basic()" class="btn btn-sm btn-primary" style="margin-left:4px;"><i style="padding-left:5px;" class="fa fa-plus"></i></button>');
    item = item.concat('</div>');
    item = item.concat('</div>');

    $('#attach_basic_cards').append(item);
}

function add_premium()
{
    var premium_card_no = $('#premium_card_no').val();

    premium_card_no++;

    $('#premium_card_no').val(premium_card_no);

    var item = '<div class="row temp_rows" style="margin-top:10px;" id="premium_card__'+premium_card_no+'">';
    item = item.concat('<div class="col-sm-8">');
    item = item.concat('<input type="date" name="premium_expiry_on[]" id="premium_card_'+premium_card_no+'" class="form-control" />');
    item = item.concat('</div>');
    item = item.concat('<div class="col-sm-4">');
    item = item.concat('<button type="button" onclick="remove_premium_card(\''+premium_card_no+'\')" class="btn btn-sm btn-danger"><i style="padding-left:5px;" class="fa fa-minus"></i></button>');
    item = item.concat('<button type="button" onclick="add_premium()" class="btn btn-sm btn-primary" style="margin-left:4px;"><i style="padding-left:5px;" class="fa fa-plus"></i></button>');
    item = item.concat('</div>');
    item = item.concat('</div>');

    $('#attach_premium_cards').append(item);
}

function remove_basic_card(id)
{
    $('#basic_card__'+id).remove();
}

function remove_premium_card(id)
{
    $('#premium_card__'+id).remove();
}


$('#change_dp').on('change', function () { 

    function validate()
    {
        if($('#change_dp').val().trim()!='')
        {
            var allowed_extensions = new Array("png","jpg","jpeg");
            var file_extension = $('#change_dp').val().split('.').pop();
            for(var i = 0; i <= allowed_extensions.length; i++)
            {
                if(allowed_extensions[i]==file_extension)
                {
                    return true;
                }
            }
            return false;
        }
        else
        {
            return false;
        }
    }

    if(validate)
    {
        $('#ChangeDpModal').modal();

        $('#upload-demo').croppie('destroy');

        $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 300,
                height: 300,
                type: 'square'
            },
            boundary: {
                width: 350,
                height: 350
            }
        });

        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                // console.log('jQuery bind complete');
                
            });
        }
        reader.readAsDataURL(this.files[0]);

        $('#change_dp_form')[0].reset();
    }
    else
    {
        Swal.fire({
            type: 'error',
            text: 'Invalid Input.'
        });
    }
});

$('#upload-result').on('click', function (ev) {
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        
        $.ajax({
            url: "{{url('/superadmin/change_user_profile_pic')}}",
            method: "POST",
            data: {id:"{{$user_details['id']}}",image:resp},
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success: function (data) {
                if(data.status=='Success')
                {
                    get_single_user();

                    setTimeout(() => {
                        $('#change_dp_close').trigger('click');
                        $('#change_dp_form')[0].reset();

                        Swal.fire({
                            type: 'success',
                            text: data.response
                        });
                    }, 1000);
                }
                
                if(data.status=='Error')
                {
                    Swal.fire({
                        type: 'error',
                        text: data.response
                    });
                }
            },
            complete:()=>{
                $('#overlay').addClass('d-none');
            }
        });
    });
});

function edit_user()
{
    var user_id = "{{$user_details['id']}}";

    $('#user_form')[0].reset();

    if(user_id!=null)
    {
        $('#user_form_head').html('Update User');
        $('#user_id').val(user_id);

        $.ajax({
            url:"{{url('/superadmin/get_single_user')}}",
            method:"GET",
            data:{user_id:user_id},
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success:(data)=>{
                if(data.status=='Success')
                {
                    $('#name').val(data.response.name);
                    $('#phone').val(data.response.phone);                
                    $('#email').val(data.response.email);
                    
                    if(data.response.gender)
                    {
                        $('#male').attr('checked','checked');
                    }
                    else
                    {
                        $('#female').attr('checked','checked');
                    }

                    if(data.response.basic_card_limit==0)
                    {
                        $('#basic_dec').attr('disabled','disabled');
                    }
                    else
                    {
                        $('#basic_dec').removeAttr('disabled');
                    }

                    if(data.response.premium_card_limit==0)
                    {
                        $('#premium_dec').attr('disabled','disabled');
                    }
                    else
                    {
                        $('#premium_dec').removeAttr('disabled');
                    }

                    $('#basic_card').val(data.response.basic_card_limit);
                    $('#premium_card').val(data.response.premium_card_limit);

                    $('#basic_card_count').html(' '+data.response.basic_card_limit+' ');
                    $('#premium_card_count').html(' '+data.response.premium_card_limit+' ');
                }
                else if(data.status=='Warning')
                {
                    toastr.warning(data.response);
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

        $('#add-user-submit').addClass('d-none');
        $('#update-user-submit').removeClass('d-none');
    }
    else
    {
        toastr.error('Invalid user id!');
    }

    $('#add-user-open').click();
}


$('#delete_dp').click(()=>{
    Swal.fire({
            text: 'Are you sure, you want to delete the profile pic ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d11a2a',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:"{{url('/superadmin/delete_user_profile_pic')}}",
                    method:"POST",
                    data:{id:"{{$user_details['id']}}"},
                    beforeSend:()=>{
                        $('#overlay').removeClass('d-none');
                    },
                    success:(data)=>{
                        if(data.status=='Success')
                        {
                            Swal.fire({
                                text: data.response,
                                type: 'success',
                            })

                            get_single_user();

                        }
                        else if(data.status=='Warning')
                        {
                            toastr.warning(data.response);
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
            }
        });
});

get_single_user();

function get_single_user()
{
    var user_id = "{{$user_details['id']}}";

    $.ajax({
        url:"{{url('/superadmin/get_single_user')}}",
        method:"GET",
        data:{user_id:user_id},
        beforeSend:()=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{
            if(data.status=='Success')
            {
                var asset = "{{asset('sources/assets/images/user_profile/')}}";

                var logo = data.response.profile_pic!=null ? data.response.profile_pic : data.response.gender ? 'male_pic.png':'female_pic.png';

                $('#dp').attr('src',asset+'/'+logo);

                $('#name_data').html(ucwords(data.response.name));
                $('#phone_data').html(data.response.phone);                
                $('#email_data').html(data.response.email);
                
                if(data.response.gender)
                {
                    $('#gender_data').html('Male');
                }
                else
                {
                    $('#gender_data').html('Female');
                }

                $('#basic_card_credit_data').html(data.basic_cards);
                $('#premium_card_credit_data').html(data.premium_cards);

                $('#card_count_').html(data.basic_cards+parseInt(data.premium_cards));

            }
            else if(data.status=='Warning')
            {
                toastr.warning(data.response);
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
}

$('#add-user-submit,#update-user-submit').click(()=>{
    $.ajax({
        url:"{{url('/superadmin/add_update_user')}}",
        method:"POST",
        data:new FormData($('#user_form')[0]),
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
                if(data.errors.user_id!=undefined)
                {
                    toastr.error(data.errors.user_id[0]);
                }

                if(data.errors.name!=undefined)
                {
                    toastr.error(data.errors.name[0]);
                }

                if(data.errors.email!=undefined)
                {
                    toastr.error(data.errors.email[0]);
                }

                if(data.errors.phone!=undefined)
                {
                    toastr.error(data.errors.phone[0]);
                }

                if(data.errors.gender!=undefined)
                {
                    toastr.error(data.errors.gender[0]);
                }

                if(data.errors.basic_card!=undefined)
                {
                    toastr.error(data.errors.basic_card[0]);
                }

                if(data.errors.premium_card!=undefined)
                {
                    toastr.error(data.errors.premium_card[0]);
                }
            }

            if(data.status=='Success')
            {   
                swal.fire({
                    type:'success',
                    text:data.response
                });

                get_single_user();
                
                $('#add-user-close').click();
            }
            else if(data.status=='Warning')
            {
                toastr.warning(data.response);
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

var cards_table = $('#cards_table').DataTable({

    processing: true,
    stateSave: true,
    serverSide: true,
    ajax: {
        url: "{{url('/superadmin/get_all_user_cards')}}",
        dataType: "json",
        type: "POST",
        data:{ _token: "{{csrf_token()}}",user_id:"{{$user_details['id']}}"}
    },
    columns: [
        
        {data: 'sno'},

        {data: 'card_type'},

        {data: 'company_name'},

        {data: 'contact_person_name'},

        {data: 'expiry_on'},

        {data: 'status', orderable: false},

        {data: 'updated_at'},

        {data: 'action', orderable: false, searchable: false},

    ]

});

function select_card()
{
    $('#select-card-open').click();
}

$('#basic').click(()=>{

    var user_id = "{{$user_details['id']}}";

    $.ajax({
        url:"{{url('/superadmin/create-card')}}",
        method:"POST",
        data:{user_id:user_id,card_type:'basic'},
        beforeSend:()=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{
            if(data.status=='Success')
            {
                $('#add-card-close').click();

                swal.fire({
                    type:'success',
                    text:data.response
                });

                setTimeout(() => {
                    window.location.replace("{{url('/')}}/superadmin/update-card/"+user_id+"/"+data.card_id);
                }, 1000);
            }
            else if(data.status=='Warning')
            {
                $('#overlay').addClass('d-none');
                toastr.warning(data.response);
            }
            else if(data.status=='Error')
            {
                $('#overlay').addClass('d-none');
                toastr.error(data.response);
            }
        },
        complete:(data)=>{

        }
    });

});

$('#premium').click(()=>{

    var user_id = "{{$user_details['id']}}";

    $.ajax({
        url:"{{url('/superadmin/create-card')}}",
        method:"POST",
        data:{user_id:user_id,card_type:'premium'},
        beforeSend:()=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{
            if(data.status=='Success')
            {
                $('#add-card-close').click();

                swal.fire({
                    type:'success',
                    text:data.response
                });

                setTimeout(() => {
                    window.location.replace("{{url('/')}}/superadmin/update-card/"+user_id+"/"+data.card_id);
                }, 1000);
            }
            else if(data.status=='Warning')
            {
                $('#overlay').addClass('d-none');
                toastr.warning(data.response);
            }
            else if(data.status=='Error')
            {
                $('#overlay').addClass('d-none');
                toastr.error(data.response);
            }
        },
        complete:(data)=>{

        }
    });

});



function change_user_card_status(card_id,user_id,status)
{
    var state = status==1?'deactivate':'activate';

    Swal.fire({
        text: 'Are you sure, you want to '+state+' the card ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d11a2a',
        confirmButtonText: ucwords(state),
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:"{{url('/superadmin/change_user_card_status')}}",
                method:"POST",
                data:{card_id:card_id,user_id:user_id,status:status},
                beforeSend:()=>{
                    $('#overlay').removeClass('d-none');
                },
                success:(data)=>{
                    if(data.status=='Success')
                    {
                        cards_table.draw(false);

                        swal.fire({
                            type:'success',
                            text:data.response
                        });
                    }
                    else if(data.status=='Warning')
                    {
                        toastr.warning(data.response);
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
    });
}

function switch_card(card_id,user_id,card)
{
    var state = card=='basic'?'premium':'basic';

    Swal.fire({
        text: 'Are you sure, you want to switch to '+state+' card ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d11a2a',
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:"{{url('/superadmin/switch_card')}}",
                method:"POST",
                data:{card_id:card_id,user_id:user_id,card:card},
                beforeSend:()=>{
                    $('#overlay').removeClass('d-none');
                },
                success:(data)=>{
                    if(data.status=='Success')
                    {
                        cards_table.draw(false);

                        swal.fire({
                            type:'success',
                            text:data.response
                        });
                    }
                    else if(data.status=='Warning')
                    {
                        toastr.warning(data.response);
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
    });
}

function renew_card(card_id)
{

}

function delete_card(card_id)
{
    Swal.fire({
        text: 'Are you sure, you want to delete the card ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d11a2a',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:"{{url('/superadmin/delete_user_card')}}",
                method:"POST",
                data:{card_id:card_id},
                beforeSend:()=>{
                    $('#overlay').removeClass('d-none');
                },
                success:(data)=>{
                    if(data.status=='Success')
                    {
                        cards_table.draw(false);

                        swal.fire({
                            type:'success',
                            text:data.response
                        });
                    }
                    else if(data.status=='Warning')
                    {
                        toastr.warning(data.response);
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
    });
}
</script>


@stop