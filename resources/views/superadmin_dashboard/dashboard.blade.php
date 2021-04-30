@extends('superadmin_layouts.master')
@section('content')
<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <h5>Getting things ready!</h5>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-block">
                                                    <form id="send_emails_form" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="file" name="sec_students">

                                                            <button class="btn btn-primary" type="button">Send emails</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-university bg-c-blue card1-icon"></i>
                                                        <span class="text-c-blue f-w-600">Schools</span>
                                                        <h4>2</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-blue f-16 icofont icofont-university m-r-10"></i>Schools added till now
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-building bg-c-pink card1-icon"></i>
                                                        <span class="text-c-pink f-w-600">Corporates</span>
                                                        <h4>0</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-pink f-16 icofont icofont-building m-r-10"></i>Corporates added till now
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-list bg-c-green card1-icon"></i>
                                                        <span class="text-c-green f-w-600">Tests</span>
                                                        <h4>4</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-green f-16 icofont icofont-list m-r-10"></i>Tests created till now
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-users bg-c-yellow card1-icon"></i>
                                                        <span class="text-c-yellow f-w-600">Users</span>
                                                        <h4>+50</h4>
                                                        <div>
                                                            <span class="f-left m-t-10 text-muted">
                                                                <i class="text-c-yellow f-16 icofont icofont-users m-r-10"></i>Users enrolled till now
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->

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

    <!-- am chart -->
    <script src="{{asset('sources/assets/pages/widget/amchart/amcharts.min.js')}}"></script>
    <script src="{{asset('sources/assets/pages/widget/amchart/serial.min.js')}}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{asset('sources/bower_components/chart.js/js/Chart.js')}}"></script>
    <!-- Todo js -->
    <script type="text/javascript" src="{{asset('sources/assets/pages/todo/todo.js')}} "></script>


    
@stop