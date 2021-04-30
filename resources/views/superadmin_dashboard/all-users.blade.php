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
                                                    <a href="{{url('/superadmin')}}/institution/" style="color:white;"><i class="icofont icofont-users bg-c-pink"></i></a>
                                                    <div class="d-inline">
                                                        <h4>Users List</h4>
                                                        <span style="text-transform:none;">You can manage all users</span>
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
                                                <li class="breadcrumb-item"><a href="{{url('/superadmin')}}/all-users/">Users List</a>
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
                                                            <a class="nav-link inner_tabs active" style="cursor:pointer;" id="users" role="tab">Users</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link inner_tabs" style="cursor:pointer;" id="requests" role="tab">Requests</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link inner_tabs" style="cursor:pointer;" id="all_users_nos" role="tab">Send Bulk SMS</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- tab header end -->
                                                <!-- tab content start -->
                                                <div class="tab-content">

                                                    <div class="tab-pane inner_tabs_open active" id="users_open" role="tabpanel">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <button onclick="add_user()" style="padding-right:10px;" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                                                    <i class="icofont icofont-plus"></i> Add New
                                                                </button>
                                                            </div>
                                                            <div class="card-block">
                                                                <div class="row">                                                                    
                                                                    <div class="col-lg-12">
                                                                        <div class="data_table_main table-responsive dt-responsive">
                                                                            <table id="users_table" style="width:100%;" class="table table-striped table-bordered nowrap">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Sno</th>
                                                                                        <th>User</th>
                                                                                        <th>Basic</th>
                                                                                        <th>Premium</th>
                                                                                        <th>Status</th>
                                                                                        <th>Referred By</th>
                                                                                        <th>Joined At</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane inner_tabs_open d-none" id="requests_open" role="tabpanel">
                                                        <!-- info card start -->
                                                        <div class="card">
                                                            <div class="card-block">
                                                                <div class="row">                                                                    
                                                                    <div class="col-lg-12">
                                                                        <div class="data_table_main table-responsive dt-responsive">
                                                                            <table id="requests_table" style="width:100%;" class="table table-striped table-bordered nowrap">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Sno</th>
                                                                                        <th>User</th>
                                                                                        <th>Date & Time</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane inner_tabs_open d-none" id="all_users_nos_open" role="tabpanel">
                                                        <!-- info card start -->
                                                        <div class="card">
                                                            <div class="card-block">
                                                            <h5 class="text-center">All active user numbers</h5>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" rows="3" placeholder="Type your message..." id="message"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <button class="btn btn-primary" id="send_sms">SEND SMS</button>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">                                                                    
                                                                    <div class="col-lg-12">
                                                                        <div class="data_table_main table-responsive dt-responsive" style="height:500px;overflow-y:scroll;">
                                                                            <table id="user_nos_table" style="width:100%;" class="table table-striped table-bordered nowrap">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th><input type="checkbox" id="customer_select_all" value="All"> ALL</th>
                                                                                        <th>Sno</th>
                                                                                        <th>Name</th>
                                                                                        <th>Phone</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="customer_list" style="">

                                                                                </tbody>
                                                                            </table>
                                                                            <div id="response_row"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="card-block">
                                                                <h5 class="text-center">Shared SMS Phone Numbers</h5>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" rows="3" placeholder="Type your message..." id="message_1"></textarea>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <button class="btn btn-primary" id="send_sms_1">SEND SMS</button>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">                                                                    
                                                                    <div class="col-lg-12">
                                                                        <div class="data_table_main table-responsive dt-responsive" style="height:500px;overflow-y:scroll;">
                                                                            <table id="user_nos_table_1" style="width:100%;" class="table table-striped table-bordered nowrap">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th><input type="checkbox" id="customer_select_all_1" value="All"> ALL</th>
                                                                                        <th>Sno</th>
                                                                                        <th>Phone</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="customer_list_1" style="">

                                                                                </tbody>
                                                                            </table>
                                                                            <div id="response_row_1"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main body end -->
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



@endsection

@section('page-css')
<style>

#users_table_filter
{
    float:right;
}

#requests_table_filter
{
    float:right;
}

.nav-tabs .slide {
    width: calc(100% / 3) !important;
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

var users_table = $('#users_table').DataTable({

    processing: true,
    stateSave: true,
    serverSide: true,
    ajax: {
        url: "{{url('/superadmin/get_all_active_users')}}",
        dataType: "json",
        type: "POST",
        data:{ _token: "{{csrf_token()}}"}
    },
    columns: [
        
        {data: 'sno'},

        {data: 'name_email_phone_gender'},

        {data: 'basic_card_limit'},

        {data: 'premium_card_limit'},

        {data: 'status', orderable: false},

        {data: 'referred_by'},

        {data: 'joined_at'},

        {data: 'action', orderable: false, searchable: false},

    ]

});

var requests_table = $('#requests_table').DataTable({

    processing: true,
    stateSave: true,
    serverSide: true,
    ajax: {
        url: "{{url('/superadmin/get_all_user_requests')}}",
        dataType: "json",
        type: "POST",
        data:{ _token: "{{csrf_token()}}"}
    },
    columns: [
        
        {data: 'sno'},

        {data: 'name_email_phone_gender'},

        {data: 'joined_at'},

        {data: 'action', orderable: false, searchable: false},

    ]

});

function add_user(user_id=null)
{
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
        $('#user_form_head').html('Add User');
        $('#user_id').val('');

        $('#add-user-submit').removeClass('d-none');
        $('#update-user-submit').addClass('d-none');
    }

    $('#add-user-open').click();
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

                users_table.draw(false);
                requests_table.draw(false);
                
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

function change_user_status(user_id,status)
{
    var text = status==1?'deactivate':status==2?'activate':'';

    Swal.fire({
        title:'Are you sure!',
        text: 'You want to '+text+' the account?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d11a2a',
        confirmButtonText: ucwords(text),
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:"{{url('/superadmin/change_user_status')}}",
                data:{user_id:user_id,status:status},
                method:"POST",
                beforeSend:()=>{
                    $('#overlay').removeClass('d-none');
                },
                success:(data)=>{
                    console.log(data);
                    
                    if(data.status=='Success')
                    {
                        Swal.fire({
                            type:'success',
                            text:data.response
                        });

                        users_table.draw(false);
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
}

function delete_user(user_id)
{
    Swal.fire({
        title:'Are you sure!',
        text: 'You want to delete the account?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d11a2a',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:"{{url('/superadmin/delete_user')}}",
                data:{user_id:user_id},
                method:"POST",
                beforeSend:()=>{
                    $('#overlay').removeClass('d-none');
                },
                success:(data)=>{
                    if(data.status=='Success')
                    {
                        Swal.fire({
                            type:'success',
                            text:data.response
                        });

                        users_table.draw(false);
                        requests_table.draw(false);
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
}


$("#customer_select_all").change(function(){ 
  $(".customer_checkbox").prop('checked', $(this).prop("checked"));
});


$('.customer_checkbox').change(function(){

  if(false == $(this).prop("checked")){
      $("#customer_select_all").prop('checked', false);
  }

  if ($('.customer_checkbox:checked').length == $('.customer_checkbox').length ){
      $("#customer_select_all").prop('checked', true);
  }
});

$("#customer_select_all_1").change(function(){ 
  $(".customer_checkbox_1").prop('checked', $(this).prop("checked"));
});


$('.customer_checkbox_1').change(function(){

  if(false == $(this).prop("checked")){
      $("#customer_select_all_1").prop('checked', false);
  }

  if ($('.customer_checkbox_1:checked').length == $('.customer_checkbox_1').length ){
      $("#customer_select_all_1").prop('checked', true);
  }
});



get_all_users();

function get_all_users()
{
      $.ajax({
        method: "GET",
        url: "{{url('/superadmin/get_all_users')}}",
        cache: true,
        beforeSend:()=>{
            $('#response_row').html('<div class="well">Processing data...</div>');
        },
        success: function(data)
        {
            console.log(data);
            if(data.status=='Success')
            {
                $('#response_row').html('');
                $('#customer_list').html('');
                var sno = 1;
                data.response.forEach(element => {
                    $('#customer_list').append('<tr><td><input type="checkbox" class="customer_checkbox" name="filter_customer[]" value="'+element.phone+'" /></td><td>'+sno+'</td><td>'+element.name+'</td><td>'+element.phone+'</td></tr>'); 
                    sno++;   
                });
            }
            else
            {
                $('#customer_list').html('');
                $('#response_row').html('<div class="well">'+data.response+'</div>');
            }
        }
    });
}

get_all_sms_users();

function get_all_sms_users()
{
      $.ajax({
        method: "GET",
        url: "{{url('/superadmin/get_all_sms_users')}}",
        cache: true,
        beforeSend:()=>{
            $('#response_row_1').html('<div class="well">Processing data...</div>');
        },
        success: function(data)
        {
            console.log(data);
            if(data.status=='Success')
            {
                $('#response_row_1').html('');
                $('#customer_list_1').html('');
                var sno = 1;
                data.response.forEach(element => {
                    $('#customer_list_1').append('<tr><td><input type="checkbox" class="customer_checkbox_1" name="filter_customer_1[]" value="'+element.number+'" /></td><td>'+sno+'</td><td>'+element.number+'</td></tr>'); 
                    sno++;   
                });
            }
            else if(data.status=='Warning')
            {
                $('#response_row_1').html('');
                $('#customer_list_1').html('');
                $('#response_row_1').html('<div class="well">'+data.response+'</div>');
            }
        }
    });
}



$('#send_sms').on('click',function (){

    var msg = $('#message').val();
  
    var filter_customer = [];
    $("input[name='filter_customer[]']:checked").each(function ()
    {
        filter_customer.push($(this).val());
    });
  
    if(filter_customer.length)
    {
        if(msg.trim()!='')
        {
            var dataString = 'msg='+msg+'&customer_list='+filter_customer;
  
            //alert(dataString);

            $.ajax({
            method: "POST",
            url: "{{url('/superadmin/send_bulk_sms')}}",
            data: dataString,
            cache: true,
            success: function(data)
            {
              if(data.status == "Success")
              {
                toastr.success(data.response);
              }
              else if(data.status == "Error")
              {
                toastr.error(data.response);
              }
          
              $("#message").val('');
              $('#customer_select_all').click();
              $('#customer_select_all').click();
          
            }
          });
        }
        else
        {
            toastr.error('Invalid Message.');
        }
    
    }
    else
    {
        toastr.error('Please select atleast one customer.');       
    }

  });


  $('#send_sms_1').on('click',function (){

    var msg = $('#message_1').val();
  
    var filter_customer = [];
    $("input[name='filter_customer_1[]']:checked").each(function ()
    {
        filter_customer.push($(this).val());
    });
  
    if(filter_customer.length)
    {
        if(msg.trim()!='')
        {
            var dataString = 'msg='+msg+'&customer_list='+filter_customer;
  
            //alert(dataString);

            $.ajax({
                method: "POST",
                url: "{{url('/superadmin/send_bulk_sms')}}",
                data: dataString,
                cache: true,
                success: function(data)
                {
                if(data.status == "Success")
                {
                    toastr.success(data.response);
                }
                else if(data.status == "Error")
                {
                    toastr.error(data.response);
                }
            
                $("#message_1").val('');
                $('#customer_select_all_1').click();
                $('#customer_select_all_1').click();
            
                }
              });
        }
        else
        {
            toastr.error('Invalid Message.');
        }
    
    }
    else
    {
        toastr.error('Please select atleast one customer.');       
    }

  });

</script>


@stop