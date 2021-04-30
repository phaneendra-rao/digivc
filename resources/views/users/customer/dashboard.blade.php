@extends('user_layouts.master')
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-ui-v-card bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Basic cards</span>
                                    <h4>{{$basic_cards}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Get more leads
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-ui-v-card bg-c-yellow card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Premium cards</span>
                                    <h4>{{$premium_cards}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-yellow f-16 icofont icofont-warning m-r-10"></i>Get more leads
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-wallet bg-c-green card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Wallet</span>
                                    <h4>₹ {{number_format($my_credits,2)}} /-</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-warning m-r-10"></i>Use to buy cards and sms
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-ui-text-chat bg-c-pink card1-icon"></i>
                                    <span class="text-c-blue f-w-600">SMS Credits</span>
                                    <h4>{{number_format(auth()->user()->sms_credits)}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-pink f-16 icofont icofont-warning m-r-10"></i>Refil to get sms alerts
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-primary">
                        <!-- <button type="button" class="close" style="margin-top:2px" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                        </button> -->
                        <ul style="list-style-type:disc;padding-left:12px;">
                            <li>Get 10% cash back and referral link on your first Digivc card!</li>
                            <li>Refer a friend by sharing your referral link and get 10% free credits on purchase of his/her first Digivc card!</li>
                        </ul>
                        <button type="button" class="btn btn-primary btn-sm" style="margin-top:10px;" id="copy_referral_link_btn" onclick="copy_referral_link()">Copy Referral Link!</button>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @endsection

    @section('page-css')

    @stop

    @section('page-scripts')

    <!-- am chart -->
    <script src="{{asset('sources/assets/pages/widget/amchart/amcharts.min.js')}}"></script>
    <script src="{{asset('sources/assets/pages/widget/amchart/serial.min.js')}}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{asset('sources/bower_components/chart.js/js/Chart.js')}}"></script>
    <!-- Todo js -->
    <script type="text/javascript" src="{{asset('sources/assets/pages/todo/todo.js')}} "></script>

    @stop