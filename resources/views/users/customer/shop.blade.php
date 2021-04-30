@extends('user_layouts.master')
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-6">
                            <div class="page-header-title">
                                <i class="icofont icofont-grocery bg-c-yellow"></i>
                                <div class="d-inline">
                                    <h4>Shop</h4>
                                    <span style="text-transform:none;">Use your credits to shop Digi vc cards and sms.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <div class="page-body">
                    <div class="alert alert-primary">
                        <button type="button" class="close" style="margin-top:2px" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                        </button>
                        <ul style="list-style-type:disc;padding-left:12px;">
                            <li>Get 10% cash back and referral link on your first Digivc card!</li>
                            <li>Refer a friend by sharing your referral link and get 10% free credits on purchase of his/her first Digivc card!</li>
                        </ul>
                        @if(auth()->user()->referral_code!=null)
                        <button type="button" class="btn btn-primary btn-sm" style="margin-top:10px;" id="copy_referral_link_btn" onclick="copy_referral_link()">Copy Referral Link!</button>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card feature-card-box">
                                <div class="card-block-big text-center">
                                    <div class="feature-icon bg-c-blue">
                                        <i class="icofont icofont-ui-v-card"></i>
                                    </div>
                                    <h4 class="f-w-400 m-b-10 m-t-30">₹ {{number_format(env('BASIC_CARD_1_YEAR'))}}</h4>
                                    <p class="text-muted f-16 m-b-0">Basic Card</p>

                                    <div class="row">
                                        <div class="col-sm-12 m-t-15">
                                            <select name="basic_card" class="m-b-20" id="basic_card">
                                                <option value="1">1 Year @ ₹{{number_format(env('BASIC_CARD_1_YEAR'))}}</option>
                                                <option value="2">2 Years @ ₹{{number_format(env('BASIC_CARD_2_YEAR'))}}</option>
                                                <option value="3">3 Years @ ₹{{number_format(env('BASIC_CARD_3_YEAR'))}}</option>
                                            </select>
                                            <button type="button" id="basic_card_buy_btn" class="btn btn-sm btn-block btn-primary waves-effect waves-light">Buy Basic Card</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card feature-card-box">
                                <div class="card-block-big text-center">
                                    <div class="feature-icon bg-c-yellow">
                                        <i class="icofont icofont-ui-v-card"></i>
                                    </div>
                                    <h4 class="f-w-400 m-b-10 m-t-30">₹ {{number_format(env('PREMIUM_CARD_1_YEAR'))}}</h4>
                                    <p class="text-muted f-16 m-b-0">Premium Card</p>

                                    <div class="row">
                                        <div class="col-sm-12 m-t-15">
                                            <select name="premium_card" class="m-b-20" id="premium_card">
                                                <option value="1">1 Year @ ₹{{number_format(env('PREMIUM_CARD_1_YEAR'))}}</option>
                                                <option value="2">2 Years @ ₹{{number_format(env('PREMIUM_CARD_2_YEAR'))}}</option>
                                                <option value="3">3 Years @ ₹{{number_format(env('PREMIUM_CARD_3_YEAR'))}}</option>
                                            </select>
                                            <button type="button" id="premium_card_buy_btn" class="btn btn-sm btn-block btn-warning waves-effect waves-light">Buy Premium Card</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card feature-card-box">
                                <div class="card-block-big text-center">
                                    <div class="feature-icon bg-c-pink">
                                        <i class="icofont icofont-ui-text-chat"></i>
                                    </div>
                                    <h4 class="f-w-400 m-b-10 m-t-30">₹ {{number_format(env('SMS_PACKAGE_1_PRICE'))}}</h4>
                                    <p class="text-muted f-16 m-b-0">{{number_format(env('SMS_PACKAGE_1_SMS'))}} SMS</p>

                                    <div class="row">
                                        <div class="col-sm-12 m-t-15">
                                            <select name="sms" class="m-b-20" id="sms">
                                                <option value="1">{{number_format(env('SMS_PACKAGE_1_SMS'))}} SMS @ ₹{{number_format(env('SMS_PACKAGE_1_PRICE'))}}</option>
                                                <option value="2">{{number_format(env('SMS_PACKAGE_2_SMS'))}} SMS @ ₹{{number_format(env('SMS_PACKAGE_2_PRICE'))}}</option>
                                                <option value="3">{{number_format(env('SMS_PACKAGE_3_SMS'))}} SMS @ ₹{{number_format(env('SMS_PACKAGE_3_PRICE'))}}</option>
                                            </select>
                                            <button type="button" id="sms_buy_btn" class="btn btn-sm btn-block btn-danger waves-effect waves-light">Buy Sms Package</button>
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
@endsection

@section('page-css')
<style>

</style>
@stop

@section('page-scripts')
<script>
    $('#main-credits').html('₹ {{number_format($my_credits,2)}} /-');

    $('#basic_card_buy_btn').click(() => {
        var basic_card = $('#basic_card').val();

        if (basic_card == 1) {
            var total_credits = "{{env('BASIC_CARD_1_YEAR')}}";
            var valid_years = '1 year';
        } else if (basic_card == 2) {
            var total_credits = "{{env('BASIC_CARD_2_YEAR')}}";
            var valid_years = '2 years';
        } else if (basic_card == 3) {
            var total_credits = "{{env('BASIC_CARD_3_YEAR')}}";
            var valid_years = '3 years';
        }

        var item = '<div class="row">';
        item = item.concat('<div class="col-6 text-left">');
        item = item.concat('<i class="icofont icofont-ui-v-card text-c-blue f-50" style="margin:0px;padding:0px;"></i>');
        item = item.concat('<p class="text-muted m-0">Digivc Basic Card</p>');
        item = item.concat('</div>');
        item = item.concat('<div class="col-6 text-right">');
        item = item.concat('<h3 class="text-c-blue">₹ ' + comma_separator(total_credits) + '</h3>');
        item = item.concat('<p class="text-muted">Total Credits for ' + valid_years + '</p>');
        item = item.concat('</div>');
        item = item.concat('</div>');
        item = item.concat('<hr>');
        item = item.concat('<div class="row">');
        item = item.concat('<div class="col-sm-12 col-xs-12 text-left">');
        item = item.concat('<p style="font-size:1rem;"><b>Card details:</b> Digivc Basic card / Valid for <b>' + valid_years + '</b> from date of purchase! </p>');
        item = item.concat('</div>');
        item = item.concat('</div>');
        item = item.concat('<form id="shop_form" class="d-none">');
        item = item.concat('<input type="text" name="product" value="basic_card" readonly>');
        item = item.concat('<input type="text" name="package" value="' + basic_card + '" readonly>');
        item = item.concat('</form>');

        if (total_credits > parseFloat("{{$my_credits}}")) {
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
    });

    $('#premium_card_buy_btn').click(() => {
        var premium_card = $('#premium_card').val();

        if (premium_card == 1) {
            var total_credits = "{{env('PREMIUM_CARD_1_YEAR')}}";
            var valid_years = '1 year';
        } else if (premium_card == 2) {
            var total_credits = "{{env('PREMIUM_CARD_2_YEAR')}}";
            var valid_years = '2 years';
        } else if (premium_card == 3) {
            var total_credits = "{{env('PREMIUM_CARD_3_YEAR')}}";
            var valid_years = '3 years';
        }

        var item = '<div class="row">';
        item = item.concat('<div class="col-6 text-left">');
        item = item.concat('<i class="icofont icofont-ui-v-card text-c-yellow f-50" style="margin:0px;padding:0px;"></i>');
        item = item.concat('<p class="text-muted m-0">Digivc Premium Card</p>');
        item = item.concat('</div>');
        item = item.concat('<div class="col-6 text-right">');
        item = item.concat('<h3 class="text-c-yellow">₹ ' + comma_separator(total_credits) + '</h3>');
        item = item.concat('<p class="text-muted">Total Credits for ' + valid_years + '</p>');
        item = item.concat('</div>');
        item = item.concat('</div>');
        item = item.concat('<hr>');
        item = item.concat('<div class="row">');
        item = item.concat('<div class="col-sm-12 col-xs-12 text-left">');
        item = item.concat('<p style="font-size:1rem;"><b>Card details:</b> Digivc Premium card / Valid for <b>' + valid_years + '</b> from date of purchase! </p>');
        item = item.concat('</div>');
        item = item.concat('</div>');
        item = item.concat('<form id="shop_form" class="d-none">');
        item = item.concat('<input type="text" name="product" value="premium_card" readonly>');
        item = item.concat('<input type="text" name="package" value="' + premium_card + '" readonly>');
        item = item.concat('</form>');


        if (total_credits > parseFloat("{{$my_credits}}")) {
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
    });

    $('#sms_buy_btn').click(() => {
        var sms = $('#sms').val();

        if (sms == 1) {
            var total_credits = "{{env('SMS_PACKAGE_1_PRICE')}}";
            var sms_credits = "{{env('SMS_PACKAGE_1_SMS')}}";
        } else if (sms == 2) {
            var total_credits = "{{env('SMS_PACKAGE_1_PRICE')}}";
            var sms_credits = "{{env('SMS_PACKAGE_2_SMS')}}";
        } else if (sms == 3) {
            var total_credits = "{{env('SMS_PACKAGE_1_PRICE')}}";
            var sms_credits = "{{env('SMS_PACKAGE_3_SMS')}}";
        }

        var item = '<div class="row">';
        item = item.concat('<div class="col-6 text-left">');
        item = item.concat('<i class="icofont icofont-ui-text-chat text-c-pink f-50" style="margin:0px;padding:0px;"></i>');
        item = item.concat('<p class="text-muted m-0">Digivc SMS Package</p>');
        item = item.concat('</div>');
        item = item.concat('<div class="col-6 text-right">');
        item = item.concat('<h3 class="text-c-pink">₹ ' + comma_separator(total_credits) + '</h3>');
        item = item.concat('<p class="text-muted">' + comma_separator(sms_credits) + ' SMS at ₹ ' + comma_separator(total_credits) + '</p>');
        item = item.concat('</div>');
        item = item.concat('</div>');
        item = item.concat('<hr>');
        item = item.concat('<div class="row">');
        item = item.concat('<div class="col-sm-12 col-xs-12 text-left">');
        item = item.concat('<p style="font-size:1rem;"><b>SMS Package details:</b> Digivc ' + comma_separator(sms_credits) + ' SMS Credits at <b>₹ ' + comma_separator(total_credits) + '</b>, enable sms alerts option on your card! </p>');
        item = item.concat('</div>');
        item = item.concat('</div>');
        item = item.concat('<form id="shop_form" class="d-none">');
        item = item.concat('<input type="text" name="product" value="sms" readonly>');
        item = item.concat('<input type="text" name="package" value="' + sms + '" readonly>');
        item = item.concat('</form>');

        if (total_credits > parseFloat("{{$my_credits}}")) {
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
    });

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
                    url: "{{url('/')}}/{{auth()->user()->account_type}}/shop_product",
                    method: "POST",
                    data: new FormData($('#shop_form')[0]),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: () => {
                        $('#overlay').removeClass('d-none');
                    },
                    success: (data) => {
                        if (data.errors != undefined) {
                            if (data.errors.product != undefined) {
                                toastr.error(data.errors.product[0]);
                            }

                            if (data.errors.package != undefined) {
                                toastr.error(data.errors.package[0]);
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
                        } else if (data.status == 'Warning') {
                            toastr.warning(data.response);
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
</script>
@stop