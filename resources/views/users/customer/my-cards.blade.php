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
                                <i class="icofont icofont-ui-v-card bg-c-pink"></i>
                                <div class="d-inline">
                                    <h4>My Cards</h4>
                                    <span style="text-transform:none;">You can view and manage all the cards you purchased.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <!-- <a  href="#!" onclick="select_card()" class="btn btn-primary waves-effect" >Request Card <i class="icofont icofont-id-card"></i> </a> -->

                                <!-- <a  href="{{url('/create-card')}}" class="btn btn-primary waves-effect" id="create-card">Create Card <i class="icofont icofont-id-card"></i> </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <div class="page-body">
                    <div class="row">
                        @foreach($cards as $card)
                            <div class="col-md-12 col-xl-4">
                                <div class="card card-contact-box ">
                                    <div class="card-block ">
                                        <div class="card-contain text-center ">
                                            <h5 class="text-muted p-b-10">{{ucfirst($card->card_type)}} Card</h5>
                                            @if($card->company_logo==null)
                                                <img src="{{asset('/sources/assets/images/user_card/company_logo/nologo.png')}}" class="img img-fluid" alt="Digivc card logo">
                                            @else
                                                <img src="{{asset('/sources/assets/images/user_card/company_logo')}}/{{$card->company_logo}}" alt="Digivc card logo">
                                            @endif
                                            
                                            @if($card->company_name==null)
                                                <h6 class="f-w-400 f-20 p-b-5 m-0 p-t-15 ">Untitled Company Name</h6>
                                                <p class="text-muted p-b-10 m-0 p-t-5 ">Untitled Company Tag line</p>
                                            @else
                                                <h6 class="f-w-400 f-20 p-b-5 m-0 p-t-15 ">{{ucfirst($card->company_name)}}</h6>
                                                <p class="text-muted p-b-10 m-0 p-t-5 ">{{ucfirst($card->tag_line)}}</p>
                                            @endif
                                            <div class="contain-card p-t-15 p-b-10 ">
                                                @if($card->contact_profile_pic==null)
                                                    <a href="javascript:void(0);"><img src="{{asset('/sources/assets/images/user_card/contact_profile_pic/nologo.png')}}" style="height:50px;width:50px;" class="img img-fluid" data-toggle="tooltip" title="Contact Person Pic" alt="" class="img-40"></a>
                                                @else
                                                    <a href="javascript:void(0);"><img src="{{asset('/sources/assets/images/user_card/contact_profile_pic')}}/{{$card->contact_profile_pic}}" style="height:50px;width:50px;" class="img img-fluid" data-toggle="tooltip" title="Contact Person Pic" alt="" class="img-40"></a>
                                                @endif
                                                <br>
                                                <br>
                                                <span class="text-muted p-b-10 m-0 p-t-5 ">Valid Till: {{date('d-m-Y',strtotime($card->expiry_on))}}</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="b-t-default">
                                        <div class="row m-0">
                                            <div class="col-sm-3 col-xs-3 col-md-3 f-btn text-center b-r-default p-t-15 p-b-15 ">
                                                @if($card->status==0)
                                                    <a href="javascript:void(0);" class="text-center" onClick="change_card_status('{{$card->id}}','{{$card->status}}')">
                                                        <i class="fa fa-toggle-off f-18 m-r-10" style="color:red;"></i>
                                                        <p class="text-muted m-0 f-10 text-uppercase d-inline-block">In Active</p>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);" class="text-center" onClick="change_card_status('{{$card->id}}','{{$card->status}}')">
                                                        <i class="fa fa-toggle-on f-18 m-r-10" style="color:green;"></i>
                                                        <p class="text-muted m-0 f-10 text-uppercase d-inline-block">Active</p>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-sm-3 col-xs-3 col-md-3 f-btn text-center b-r-default p-t-15 p-b-15 ">
                                                <a href="{{url('/')}}/{{auth()->user()->account_type}}/my-card/{{$card->id}}/edit"  class="text-center">
                                                    <i class="icofont icofont-ui-edit text-muted m-r-10 "></i>
                                                    <p class="text-muted m-0 f-10 text-uppercase d-inline-block ">Edit Card</p>
                                                </a>                                                
                                            </div>
                                            <div class="col-sm-3 col-xs-3 col-md-3 f-btn text-center b-r-default p-t-15 p-b-15 ">
                                                @if($card->card_type=='basic')
                                                    <a href="javascript:void(0);" onClick="upgrade_card('{{$card->id}}')" class="text-center">
                                                        <i class="icofont icofont-hand-drawn-up f-20 m-r-10"></i>
                                                        <p class="text-muted m-0 f-10 text-uppercase d-inline-block">Upgrade</p>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);" onClick="downgrade_card('{{$card->id}}')" class="text-center">
                                                        <i class="icofont icofont-hand-drawn-down f-18 m-r-10"></i>
                                                        <p class="text-muted m-0 f-10 text-uppercase d-inline-block">Downgrade</p>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-sm-3 col-xs-3 col-md-3 f-btn text-center p-t-15 p-b-15">
                                                <a href="javascript:void(0);" onClick="renew_card('{{$card->id}}','{{$card->card_type}}')" class="text-center">
                                                    <i class="icofont icofont-refresh text-muted m-r-10 "></i>
                                                    <p class="text-muted m-0 f-10 text-uppercase d-inline-block ">Renew</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<button type="button" class="d-none" id="check-out-open" data-toggle="modal" data-target="#check-out-modal"></button>

<div class="modal fade" id="check-out-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Checkout</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card-block" style="padding-top:0px;">
                    <h5>Available Credits: <b id="main-credits"></b></h5>
                    <span id="insufficient_balance"></span>
                    <hr style="margin-bottom:10px;">

                    <div id="attach_checkout_info"></div>

                    <small><b>Note:</b> You cannot undo the process once you click proceed to pay! Credits will be debited from your wallet.</small>
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default waves-effect" id="check-out-close" data-dismiss="modal">Cancel</button>
                <button type="button" id="proceed-btn" class="btn btn-primary waves-effect waves-light">Proceed to pay</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="d-none" id="check-out-renew-open" data-toggle="modal" data-target="#check-out-renew-modal"></button>

<div class="modal fade" id="check-out-renew-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Checkout</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card-block" style="padding-top:0px;">
                    <h5>Available Credits: <b id="main-renew-credits"></b></h5>
                    <span id="insufficient_renew_balance"></span>
                    <hr style="margin-bottom:10px;">

                    <div id="attach_checkout_renew_info"></div>

                    <small><b>Note:</b> You cannot undo the process once you click proceed to pay! Credits will be debited from your wallet.</small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" id="check-out-renew-close" data-dismiss="modal">Cancel</button>
                <button type="button" id="proceed-renew-btn" class="btn btn-primary waves-effect waves-light">Proceed to pay</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-css')
<style>
    .delete_card {
        height: 30px;
        width: 30px;
        border-radius: 50%;
        background-color: red;
        color: white;
        float: right;
        cursor: pointer;
    }

    .delete_card .fa {
        margin-left: 9px;
        margin-top: 8px;
    }

    .card_status {
        margin-top: 5px;
        font-size: 1.4rem;
        cursor: pointer;
    }
</style>
@stop

@section('page-scripts')
<script>
    $('#main-credits').html('₹ {{number_format($my_credits,2)}} /-');
    $('#main-renew-credits').html('₹ {{number_format($my_credits,2)}} /-');

    function change_card_status(id, status) {
        var status_text = (status == '1')?'Deactivate':'Activate';

        Swal.fire({
            text: 'Are you sure, you want to ' + status_text + ' the card ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d11a2a',
            confirmButtonText: status_text,
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{url('/')}}/{{auth()->user()->account_type}}/change_card_status",
                    method: "POST",
                    data: {
                        id: id,
                        status: status
                    },
                    beforeSend: () => {
                        $('#overlay').removeClass('d-none');
                    },
                    success: (data) => {
                        if (data.status == 'Success') {

                            swal.fire({
                                type: 'success',
                                text: data.response,
                                timer: 6000,
                                allowOutsideClick: false,
                                // showConfirmButton: false
                            }).then((result)=>{
                                if(result.value) {
                                    location.reload();
                                }
                            });

                            setTimeout(() => {
                                location.reload();
                            }, 5000);

                        } else if (data.status == 'Warning') {
                            toastr.warning(data.response);
                        } else if (data.status == 'Error') {
                            toastr.error(data.response);
                        }
                    },
                    complete: (data) => {
                        $('#overlay').addClass('d-none');
                    }
                });
            }
        });
    }

    function upgrade_card(id)
    {
        var basic_credits = "{{env('BASIC_CARD_1_YEAR')}}";
        var premium_credits = "{{env('PREMIUM_CARD_1_YEAR')}}";

        var item = '<div class="row">';
        item = item.concat('<div class="col-6 text-left">');
        item = item.concat('<i class="icofont icofont-ui-v-card text-c-yellow f-50" style="margin:0px;padding:0px;"></i>');
        item = item.concat('<p class="text-muted m-0">Digivc Basic Card to Premium Card</p>');
        item = item.concat('</div>');
        item = item.concat('<div class="col-6 text-right">');
        item = item.concat('<h3 class="text-c-yellow">₹ ' + comma_separator((premium_credits-basic_credits).toFixed(2)) + '</h3>');
        item = item.concat('<p class="text-muted">Total Credits will be charged to upgrade!</p>');
        item = item.concat('</div>');
        item = item.concat('</div>');
        item = item.concat('<hr>');
        item = item.concat('<div class="row">');
        item = item.concat('<div class="col-sm-12 col-xs-12 text-left">');
        item = item.concat('<p style="font-size:1rem;"><b>Card details:</b> Digivc Basic card will get updated to Premium card! </p>');
        item = item.concat('</div>');
        item = item.concat('</div>');
        item = item.concat('<form id="upgrade_form" class="d-none">');
        item = item.concat('<input type="text" name="card_id" value="'+id+'" readonly>');
        item = item.concat('</form>');

        if ((premium_credits-basic_credits).toFixed(2) > parseFloat("{{$my_credits}}")) {
            $('#insufficient_balance').html('<small style="color:red;">Please top-up your wallet to checkout!</small>');
            $('#proceed-btn').addClass('disabled');
            $('#proceed-btn').attr('disabled', 'disabled');
        } else {
            $('#insufficient_balance').html('');
            $('#proceed-btn').removeClass('disabled');
            $('#proceed-btn').removeAttr('disabled');
        }

        $('#attach_checkout_info').html(item);
        $('#check-out-open').click();
    }

    $('#proceed-btn').click(() => {

        $('#check-out-close').click();

        Swal.fire({
            text: 'Are you sure, you want to procced to pay ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d11a2a',
            confirmButtonText: 'Yes Procced',
            cancelButtonText: 'Cancel',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{url('/')}}/{{auth()->user()->account_type}}/upgrade_product",
                    method: "POST",
                    data: new FormData($('#upgrade_form')[0]),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: () => {
                        $('#overlay').removeClass('d-none');
                    },
                    success: (data) => {
                        if (data.errors != undefined) {
                            if (data.errors.card_id != undefined) {
                                toastr.error(data.errors.card_id[0]);
                            }
                        }

                        if (data.status == 'Success') {
                            $('#check-out-close').click();

                            swal.fire({
                                type: 'success',
                                text: data.response,
                                timer: 6000,
                                allowOutsideClick: false,
                                // showConfirmButton: false
                            }).then((result)=>{
                                if(result.value) {
                                    location.reload();
                                }
                            });

                            setTimeout(() => {
                                location.reload();
                            }, 5000);
                        } else if (data.status == 'Error') {
                            toastr.error(data.response);
                            $('#check-out-open').click();
                        } else if (data.status == 'Warning') {
                            toastr.warning(data.response);
                            $('#check-out-open').click();
                        }
                    },
                    complete: () => {
                        $('#overlay').addClass('d-none');
                    }
                });
            } else {
                $('#check-out-open').click();
            }
        });
    });

    function downgrade_card(id)
    {
        Swal.fire({
            title: 'Are you sure, you want to downgrade the card ?',
            text: 'Once you proceed, you cannot undo the process!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d11a2a',
            confirmButtonText: 'Proceed',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{url('/')}}/{{auth()->user()->account_type}}/downgrade_card",
                    method: "POST",
                    data: {
                        id: id
                    },
                    beforeSend: () => {
                        $('#overlay').removeClass('d-none');
                    },
                    success: (data) => {
                        if (data.status == 'Success') {
                            swal.fire({
                                type: 'success',
                                text: data.response,
                                timer: 6000,
                                allowOutsideClick: false,
                                // showConfirmButton: false
                            }).then((result)=>{
                                if(result.value) {
                                    location.reload();
                                }
                            });

                            setTimeout(() => {
                                location.reload();
                            }, 5000);

                        } else if (data.status == 'Warning') {
                            toastr.warning(data.response);
                        } else if (data.status == 'Error') {
                            toastr.error(data.response);
                        }
                    },
                    complete: (data) => {
                        $('#overlay').addClass('d-none');
                    }
                });
            }
        });
    }

    function renew_card(id,card_type)
    {
        if(card_type=='basic')
        {
            var credits = "{{env('BASIC_CARD_1_YEAR')}}";
        }
        else
        {
            var credits = "{{env('PREMIUM_CARD_1_YEAR')}}";
        }

        var item = '<div class="row">';
        item = item.concat('<div class="col-6 text-left">');
        item = item.concat('<i class="icofont icofont-ui-v-card text-c-'+((card_type=='basic')?'blue':'yellow')+' f-50" style="margin:0px;padding:0px;"></i>');
        item = item.concat('<p class="text-muted m-0">Digivc '+ucwords(card_type)+' Card - Renew</p>');
        item = item.concat('</div>');
        item = item.concat('<div class="col-6 text-right">');
        item = item.concat('<form id="renew_form">');
        item = item.concat('<input type="text" class="d-none" name="card_id" value="'+id+'" readonly>');
        item = item.concat('<input type="text" class="d-none" id="card_type" name="card_type" value="'+card_type+'" readonly>');
        
        item = item.concat('<select id="renew_package" name="renew_package" class="form-control">');
        if(card_type=='basic')
        {
            item = item.concat('<option value="1">1 Year @ ₹ {{env("BASIC_CARD_1_YEAR")}}</option>');
            item = item.concat('<option value="2">2 Year @ ₹ {{env("BASIC_CARD_2_YEAR")}}</option>');
            item = item.concat('<option value="3">3 Year @ ₹ {{env("BASIC_CARD_3_YEAR")}}</option>');
        }
        else
        {
            item = item.concat('<option value="1">1 Year @ ₹ {{env("PREMIUM_CARD_1_YEAR")}}</option>');
            item = item.concat('<option value="2">2 Year @ ₹ {{env("PREMIUM_CARD_2_YEAR")}}</option>');
            item = item.concat('<option value="3">3 Year @ ₹ {{env("PREMIUM_CARD_3_YEAR")}}</option>');
        }
        item = item.concat('</select>');
        
        item = item.concat('</form>');
        // item = item.concat('<h3 class="text-c-'+((card_type=='basic')?'blue':'yellow')+'">₹ ' + comma_separator(parseFloat(credits).toFixed(2)) + '</h3>');
        item = item.concat('<p class="text-muted">Total Credits will be charged to renew!</p>');
        item = item.concat('</div>');
        item = item.concat('</div>');
        item = item.concat('<hr>');
        item = item.concat('<div class="row">');
        item = item.concat('<div class="col-sm-12 col-xs-12 text-left">');
        item = item.concat('<p style="font-size:1rem;"><b>Card details:</b> Digivc '+ucwords(card_type)+' Card will get renewed! </p>');
        item = item.concat('</div>');
        item = item.concat('</div>');


        update_cart(parseFloat(credits));

        $('#attach_checkout_renew_info').html(item);
        $('#check-out-renew-open').click();
    }

    function update_cart(credits)
    {
        if (credits.toFixed(2) > parseFloat("{{$my_credits}}")) {
            $('#insufficient_renew_balance').html('<small style="color:red;">Please top-up your wallet to checkout!</small>');
            $('#proceed-renew-btn').addClass('disabled');
            $('#proceed-renew-btn').attr('disabled', 'disabled');
        } else {
            $('#insufficient_renew_balance').html('');
            $('#proceed-renew-btn').removeClass('disabled');
            $('#proceed-renew-btn').removeAttr('disabled');
        }
    }

    $('#proceed-renew-btn').click(()=>{
        $('#check-out-renew-close').click();

        Swal.fire({
            text: 'Are you sure, you want to procced to pay ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d11a2a',
            confirmButtonText: 'Yes Procced',
            cancelButtonText: 'Cancel',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{url('/')}}/{{auth()->user()->account_type}}/renew_product",
                    method: "POST",
                    data: new FormData($('#renew_form')[0]),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: () => {
                        $('#overlay').removeClass('d-none');
                    },
                    success: (data) => {
                        if (data.errors != undefined) {
                            if (data.errors.card_id != undefined) {
                                toastr.error(data.errors.card_id[0]);
                            }

                            if (data.errors.card_type != undefined) {
                                toastr.error(data.errors.card_type[0]);
                            }

                            if (data.errors.renew_package != undefined) {
                                toastr.error(data.errors.renew_package[0]);
                            }
                        }

                        if (data.status == 'Success') {
                            $('#check-out-renew-close').click();

                            swal.fire({
                                type: 'success',
                                text: data.response,
                                timer: 6000,
                                allowOutsideClick: false,
                                // showConfirmButton: false
                            }).then((result)=>{
                                if(result.value) {
                                    location.reload();
                                }
                            });

                            setTimeout(() => {
                                location.reload();
                            }, 5000);
                        } else if (data.status == 'Error') {
                            toastr.error(data.response);
                            $('#check-out-renew-open').click();
                        } else if (data.status == 'Warning') {
                            toastr.warning(data.response);
                            $('#check-out-renew-open').click();
                        }
                    },
                    complete: () => {
                        $('#overlay').addClass('d-none');
                    }
                });
            } else {
                $('#check-out-renew-open').click();
            }
        });
    });

</script>
@stop