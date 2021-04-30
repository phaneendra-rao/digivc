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
                                <i class="icofont icofont-wallet bg-c-green"></i>
                                <div class="d-inline">
                                    <h4>My Wallet: <b id="main-credits">₹ {{number_format($my_credits,2)}}/-</b></h4>
                                    <span style="text-transform:none;">You can top up your wallet, add coupon if you have any and can view all the previous transactions.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row  align-items-end">
                        <div class="col-xs-6" style="width:50%;">
                            <div class="page-header-title" id="top-up-open-btn" style="cursor:pointer;padding:8px;margin:2px;border-radius:10px;border:1px solid #cacaca;">
                                <i class="icofont icofont-cur-rupee bg-c-green" style="height:30px;width:30px;font-size:1rem;"></i>
                                <div class="d-inline">
                                    <h4 style="font-size:1rem;">Top Up</h4>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xs-6" style="width:50%;">
                            <div class="page-header-title" id="add-coupon-open-btn" style="cursor:pointer;padding:8px;margin:2px;border-radius:10px;border:1px solid #cacaca;">
                                <i class="icofont icofont-ticket bg-c-green" style="height:30px;width:30px;font-size:1rem;"></i>
                                <div class="d-inline">
                                    <h4 style="font-size:1rem;">Add Coupon</h4>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- Page-header end -->

                <input type="text" id="page" value="0" class="d-none" readonly>
                <div class="row" id="attach_no_trans"></div>
                <div class="row" id="attach_trans"></div>
                <div class="row" id="attach_view_more_btn"></div>

            </div>
        </div>
    </div>
</div>

<button type="button" class="d-none" id="top-up-open" data-toggle="modal" data-target="#top-up-modal"></button>

<div class="modal fade" id="top-up-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Available Credit: <b id="top-up-modal-credits"></b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Top-up your wallet:</p>
                <button type="button" onClick="update_top_up('500')" class="btn btn-sm btn-primary waves-effect waves-light">₹500</button>
                <button type="button" onClick="update_top_up('1,000')" class="btn btn-sm btn-primary waves-effect waves-light">₹1,000</button>
                <button type="button" onClick="update_top_up('1,500')" class="btn btn-sm btn-primary waves-effect waves-light">₹1,500</button>
                <button type="button" onClick="update_top_up('2,000')" class="btn btn-sm  btn-primary waves-effect waves-light">₹2,000</button>

                <form action="{{url('/')}}/{{auth()->user()->account_type}}/top-up" id="top-up-form" method="POST" style="margin-top:30px;">
                    @csrf
                    <div class="form-group">
                        <label>₹ Enter an amount (eg: 1000)</label>
                        <input type="text" class="form-control number" id="top-up-amount" name="amount" placeholder="Enter Top Up Amount">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" id="top-up-close" data-dismiss="modal">Close</button>
                <button type="button" id="top-up-btn" class="btn btn-primary waves-effect waves-light">Top Up</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-css')
<style>

</style>
@stop

@section('page-scripts')
<script>
    // ₹
    function update_top_up(amount) {
        $('#top-up-amount').val(amount);
    }

    $('#top-up-open-btn').click(() => {
        $('#top-up-form')[0].reset();
        $('#top-up-open').click();
    });

    $('#top-up-btn').click(() => {
        var amount = $('#top-up-amount').val();
        amount = amount.replace(/,/g, "");

        if (parseInt(amount) >= 100) {
            $('#top-up-close').click();

            Swal.fire({
                text: 'Are you sure, you want to Top-up amount of ₹' + $('#top-up-amount').val() + ' ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d11a2a',
                confirmButtonText: 'Yes proceed',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.value) {
                    $('#top-up-form').submit();
                } else {
                    $('#top-up-open').click();
                }
            });
        } else {
            toastr.error('Amount should be atleast ₹100');
        }
    });

    get_wallet_transactions();

    function get_wallet_transactions() {
        var page = $('#page').val();
        $.ajax({
            url: "{{url('/')}}/{{auth()->user()->account_type}}/get_wallet_transactions",
            method: "GET",
            data: {
                page: page
            },
            beforeSend: () => {
                $('#overlay').removeClass('d-none');
            },
            success: (data) => {
                if (data.status == 'Success') {

                    $('#attach_no_trans').html('');
                    data.response.forEach(tran => {

                        var item = '<div class="col-lg-12" style="width:100%">';
                        item = item.concat('<div class="card widget-statstic-card">');
                        item = item.concat('<div class="card-header" style="padding:10px 20px;">');
                        item = item.concat('<div class="card-header-left">');
                        item = item.concat('<h4 style="font-size:1rem;">' + wallet_trans_type(tran.type) + '</h4>');

                        if (tran.type == 3) {
                            if(tran.payment_status==1)
                            {
                                item = item.concat('<p class="p-t-10 m-b-0 text-c-green">Payment ID: ' + tran.payment_id + '</p>');
                            }
                            else if(tran.payment_status==2)
                            {
                                item = item.concat('<p class="p-t-10 m-b-0 text-c-pink">Payment ID: ' + tran.payment_id + '</p>');
                            }
                            else
                            {
                                item = item.concat('<p class="p-t-10 m-b-0 text-c-yellow">Payment ID: ' + tran.payment_id + '</p>');
                            }
                        }
                        else if(tran.type==7)
                        {
                            item = item.concat('<p class="p-t-10 m-b-0 text-c-green">Coupon Code: ' + tran.coupon + '</p>');
                        }

                        item = item.concat('</div>');
                        item = item.concat('</div>');
                        item = item.concat('<div class="card-block">');

                        if (tran.type == 1) // signup
                        {
                            item = item.concat('<i class="icofont icofont-emo-wink-smile st-icon bg-c-green txt-lite-color"></i>');
                        } else if (tran.type == 2) // referral
                        {
                            item = item.concat('<i class="icofont icofont-users-alt-5 st-icon bg-c-green txt-lite-color"></i>');
                        } else if (tran.type == 3) // top-up
                        {
                            if(tran.payment_status==1)
                            {
                                item = item.concat('<i class="icofont icofont-credit-card st-icon bg-c-green txt-lite-color"></i>');
                            }
                            else if(tran.payment_status==2)
                            {
                                item = item.concat('<i class="icofont icofont-credit-card st-icon bg-c-pink txt-lite-color"></i>');
                            }
                            else
                            {
                                item = item.concat('<i class="icofont icofont-credit-card st-icon bg-c-yellow txt-lite-color"></i>');
                            }
                        } else if (tran.type == 4) // card purchased
                        {
                            item = item.concat('<i class="icofont icofont-ui-v-card st-icon bg-c-green txt-lite-color"></i>');
                        } else if (tran.type == 5) // sms purchased
                        {
                            item = item.concat('<i class="icofont icofont-ui-text-chat st-icon bg-c-green txt-lite-color"></i>');
                        } else if (tran.type == 6) // renewed card
                        {
                            item = item.concat('<i class="icofont icofont-ui-v-card st-icon bg-c-green txt-lite-color"></i>');
                        } else if (tran.type == 7) // coupon applied
                        {
                            item = item.concat('<i class="icofont icofont-ticket st-icon bg-c-green txt-lite-color"></i>');
                        } else if (tran.type == 8) // cash back
                        {
                            item = item.concat('<i class="icofont icofont-cur-rupee-true st-icon bg-c-green txt-lite-color"></i>');
                        } else if (tran.type == 9) // upgrade card
                        {
                            item = item.concat('<i class="icofont icofont icofont-ui-v-card st-icon bg-c-green txt-lite-color"></i>');
                        }

                        item = item.concat('<div class="text-left">');
                        item = item.concat('<h3 class="d-inline-block">₹' + comma_separator(tran.credits.toFixed(2)) + '</h3>');

                        if(tran.type==1 || tran.type==2 || tran.type==3 || tran.type==7 || tran.type==8)
                        {
                            item = item.concat('<i class="icofont icofont-long-arrow-down text-c-green f-30"></i>');
                        }
                        else if(tran.type==4 || tran.type==5 || tran.type==6 || tran.type==9)
                        {
                            item = item.concat('<i class="icofont icofont-long-arrow-up text-c-green f-30"></i>');
                        }

                        item = item.concat('</div>');
                        item = item.concat('<p style="margin:0px;">' + tran.date_time + '</p>');
                        item = item.concat('</div>');
                        item = item.concat('</div>');
                        item = item.concat('</div>');

                        $('#attach_trans').append(item);
                    });

                    if (data.page != null) {

                        $('#page').val(data.page);

                        var view_more = '<div class="col-md-12"><button onClick="get_wallet_transactions()" class="btn btn-md btn-block btn-success waves-effect waves-light">View More</button></div>';
                        $('#attach_view_more_btn').html(view_more);
                    }
                    else
                    {
                        $('#attach_view_more_btn').html('');
                    }

                } else {

                    $('#attach_trans').html('');

                    var item = '<div class="col-lg-12" style="width:100%">';
                        item = item.concat('<div class="card widget-statstic-card">');
                        item = item.concat('<div class="card-header" style="padding:10px 20px;">');
                        item = item.concat('<div class="card-header-left">');
                        item = item.concat('<h4 style="font-size:1rem;">No Transactions Made</h4>');
                        item = item.concat('</div>');
                        item = item.concat('</div>');
                        item = item.concat('<div class="card-block">');
                        item = item.concat('<i class="icofont icofont-emo-sad st-icon bg-c-green txt-lite-color"></i>');
                        item = item.concat('</div>');
                        item = item.concat('</div>');
                        item = item.concat('</div>');

                        $('#attach_no_trans').append(item);
                }
            },
            complete: () => {
                $('#overlay').addClass('d-none');
            }
        });
    }
</script>
@stop