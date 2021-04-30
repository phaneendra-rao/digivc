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
                                <i class="icofont icofont-ui-v-card bg-instagram"></i>
                                <div class="d-inline">
                                    <h4>All Cards</h4>
                                    <span style="text-transform:none;">You can manage all user cards</span>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="{{url('/')}}/{{auth()->user()->account_type}}/dashboard">
                                            <i class="icofont icofont-dashboard-web"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{url('/')}}/{{auth()->user()->account_type}}/all-cards">All Cards</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <div class="page-body">
                    <div class="row">
                         
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

@stop