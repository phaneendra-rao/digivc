@extends('user_layouts.master')
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
                                <i class="icofont icofont-users bg-c-pink"></i>
                                <div class="d-inline">
                                    <h4>All Users</h4>
                                    <span style="text-transform:none;">You can manage all users</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="{{url('/')}}/{{auth()->user()->account_type}}/dashboard">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{url('/')}}/{{auth()->user()->account_type}}/all-users">All Users</a>
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
                                        <a class="nav-link inner_tabs" style="cursor:pointer;" id="add_new_user" role="tab">Add new user</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                            </div>
                            <!-- tab header end -->
                            <!-- tab content start -->
                            <div class="tab-content">

                                <div class="tab-pane inner_tabs_open active" id="users_open" role="tabpanel">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="data_table_main table-responsive dt-responsive">
                                                        <table id="users_table" style="width:100%;" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sno</th>
                                                                    <th>User Info</th>
                                                                    <th>Cards</th>
                                                                    <th>Wallet Balance</th>
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

                                <div class="tab-pane inner_tabs_open d-none" id="add_new_user_open" role="tabpanel">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form id="user_form" autocomplete="off">
                                                        <input type="text" id="user_id" name="user_id" class="d-none" readonly>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Full Name <sup>*</sup></label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Phone No <sup>*</sup></label>
                                                            <div class="col-sm-10">
                                                                <input type="tel" name="phone_no" id="phone_no" class="form-control" class="form-control">
                                                                <input type="text" id="country_code" class="d-none" name="country_code" readonly>
                                                                <input type="text" id="dail_code" class="d-none" name="dail_code" readonly>
                                                                <input type="text" id="country_name" class="d-none" name="country_name" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Gender <sup>*</sup></label>
                                                            <div class="col-sm-10">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label for="male">
                                                                            <input type="radio" name="gender" value="m" id="male">
                                                                            Male
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="female">
                                                                            <input type="radio" name="gender" value="f" id="female">
                                                                            Female
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Dob <sup>*</sup></label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="dob" id="dob" class="form-control dob" placeholder="DOB (DD-MM-YYYY)">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Email <sup>*</sup></label>
                                                            <div class="col-sm-10">
                                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Password </label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password (Optional)">
                                                                <small><b>Note:</b> Default password will be phone number.</small>
                                                            </div>

                                                        </div>

                                                        <br>
                                                        <div class="form-group">
                                                            <button type="button" id="add_user_btn" class="btn btn-primary pull-right">Add User</button>
                                                            <button type="button" id="update_user_btn" style="margin-right:5px;" class="btn btn-primary pull-right d-none">Update User</button>
                                                            <button type="button" id="cancel_user_btn" style="margin-right:5px;" class="btn btn-danger pull-right d-none">Cancel</button>
                                                        </div>
                                                    </form>
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

@endsection

@section('page-css')
<link rel="stylesheet" href="{{asset('/web_sources/tele/build/css/intlTelInput.css')}}">
<style>
    /* .iti {
        width: 100%;
    } */
</style>
<style>
    #users_table_filter {
        float: right;
    }

    #requests_table_filter {
        float: right;
    }

    .nav-tabs .slide {
        width: calc(100% / 2) !important;
    }

    .custom-btn {
        border-radius: 50%;
        height: 30px;
        width: 30px;
    }

    #basic_card_count {
        padding: 0px 10px;
    }

    #premium_card_count {
        padding: 0px 10px;
    }

    .custom-btn .fa {
        margin-left: -4px;
        padding-bottom: -10px;
    }
</style>
@stop

@section('page-scripts')

<!-- <script src="{{asset('sources/assets/pages/user-profile.js')}}"></script> -->
<script src="{{asset('/web_sources/tele/build/js/intlTelInput.js')}}"></script>

<script>
    $('.inner_tabs').click(function() {
        var id = this.id;

        $('.inner_tabs').removeClass('active');
        $('#' + id).addClass('active');

        $('.inner_tabs_open').removeClass('active');
        $('.inner_tabs_open').addClass('d-none');
        $('#' + id + '_open').removeClass('d-none');
        $('#' + id + '_open').addClass('active');
    });

    $('.dob').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight: true,
    autoclose: true,
  });

    var input = document.querySelector("#phone_no");

    var iti = window.intlTelInput(input, {
        allowDropdown: true,
        autoHideDialCode: false,
        customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
            $('#country_code').val(selectedCountryData['iso2']);
            $('#country_name').val(selectedCountryData['name']);
            $('#dail_code').val(selectedCountryData['dialCode']);
            return "e.g. " + selectedCountryPlaceholder;
        },
        dropdownContainer: document.body,
        //   excludeCountries: [],
        formatOnDisplay: true,
        geoIpLookup: function(callback) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";

                callback(countryCode);
            });
        },
        initialCountry: "auto",
        //   localizedCountries: { 'de': 'Deutschland' },
        nationalMode: true,
        //   onlyCountries: [],
        placeholderNumberType: "MOBILE",
        //   preferredCountries: [],
        separateDialCode: true,
        utilsScript: "{{asset('/web_sources/tele/build/js/utils.js')}}",
    });


    var users_table = $('#users_table').DataTable({

        processing: true,
        stateSave: true,
        serverSide: true,
        ajax: {
            url: "{{url('/')}}/{{auth()->user()->account_type}}/get_all_users",
            dataType: "json",
            type: "POST",
            data: {
                _token: "{{csrf_token()}}"
            }
        },
        columns: [{
                data: 'sno'
            },

            {
                data: 'name_email_phone_gender',
                orderable: false,
            },
            {
                data: 'cards',
                orderable: false,
            },
            {
                data: 'wallet_balance',
            },
            {
                data: 'action',
                orderable: false,
                searchable: false
            },

        ]

    });

    function reset_user_form()
    {
        $('#user_id').val('');
        $('#full_name').val('');
        $('#phone_no').val('');

        $('#male').removeAttr('checked');
        $('#female').removeAttr('checked');

        $('#dob').val('');
        $('#email').val('');
        $('#password').val('');
    }

    $('#add_user_btn,#update_user_btn').click(() => {
        if (iti.isValidNumber()) {
            if (iti.getNumberType() === intlTelInputUtils.numberType.MOBILE) {
                $.ajax({
                    url: "{{url('/')}}/{{auth()->user()->account_type}}/add_update_user",
                    method: "POST",
                    data: new FormData($('#user_form')[0]),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: () => {
                        $('#overlay').removeClass('d-none');
                    },
                    success: (data) => {

                        if (data.errors != undefined) {
                            if (data.errors.user_id != undefined) {
                                toastr.error(data.errors.user_id[0]);
                            }

                            if (data.errors.full_name != undefined) {
                                toastr.error(data.errors.full_name[0]);
                            }

                            if (data.errors.email != undefined) {
                                toastr.error(data.errors.email[0]);
                            }

                            if (data.errors.phone_no != undefined) {
                                toastr.error(data.errors.phone_no[0]);
                            }

                            if (data.errors.country_code != undefined) {
                                toastr.error(data.errors.country_code[0]);
                            }

                            if (data.errors.dail_code != undefined) {
                                toastr.error(data.errors.dail_code[0]);
                            }

                            if (data.errors.country_name != undefined) {
                                toastr.error(data.errors.country_name[0]);
                            }

                            if (data.errors.gender != undefined) {
                                toastr.error(data.errors.gender[0]);
                            }

                            if (data.errors.dob != undefined) {
                                toastr.error(data.errors.dob[0]);
                            }
                        }

                        if (data.status == 'Success') {

                            // reset_user_form();

                            swal.fire({
                                type: 'success',
                                text: data.response
                            });

                            users_table.draw(false);

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

            } else {
                toastr.error('Invalid Phone Number!');
            }
        } else {
            toastr.error('Invalid Phone Number!');
        }
    });

    function change_user_status(user_id, status) {
        var text = status == 1 ? 'deactivate' : status == 0 ? 'activate' : '';

        Swal.fire({
            title: 'Are you sure!',
            text: 'You want to ' + text + ' the account?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d11a2a',
            confirmButtonText: ucwords(text),
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{url('/')}}/{{auth()->user()->account_type}}/change_user_status",
                    data: {
                        user_id: user_id,
                        status: status
                    },
                    method: "POST",
                    beforeSend: () => {
                        $('#overlay').removeClass('d-none');
                    },
                    success: (data) => {

                        if (data.status == 'Success') {
                            Swal.fire({
                                type: 'success',
                                text: data.response
                            });

                            users_table.draw(false);
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

    function delete_user(user_id) {
        Swal.fire({
            title: 'Are you sure!',
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
                    url: "{{url('/')}}/{{auth()->user()->account_type}}/delete_user",
                    data: {
                        user_id: user_id
                    },
                    method: "POST",
                    beforeSend: () => {
                        $('#overlay').removeClass('d-none');
                    },
                    success: (data) => {
                        if (data.status == 'Success') {
                            Swal.fire({
                                type: 'success',
                                text: data.response
                            });

                            users_table.draw(false);
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

</script>


@stop