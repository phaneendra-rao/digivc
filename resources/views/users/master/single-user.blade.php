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
                                <i class="icofont icofont-user bg-c-pink"></i>
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
                                        <a href="{{url('/')}}/{{auth()->user()->account_type}}/dashboard">
                                            <i class="icofont icofont-dashboard-web"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{url('/')}}/{{auth()->user()->account_type}}/all-users">Users List</a>
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
                                    <li class="nav-item">
                                        <a class="nav-link inner_tabs" style="cursor:pointer;" id="wallet_trans" role="tab">Wallet Balance <span class="badge badge-primary" style="font-weight:400;padding:8px;">₹ {{number_format($wallet_balance)}} /-</span></a>
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
                                                            <img class="img img-fluid" style="padding:10px;" src="" id="dp" alt="logo">
                                                        </center>

                                                        <p>
                                                            <form id="change_dp_form">
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
                                                                    <form id="user_form" autocomplete="off">
                                                                        <input type="text" name="user_id" class="d-none" value="{{$user_id}}" readonly>

                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Full Name <sup>*</sup></label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Phone No <sup>*</sup></label>
                                                                            <div class="col-sm-10">
                                                                                <input type="tel" name="phone_no" id="phone_no" class="form-control">
                                                                                <input type="text" id="country_code" class="d-none" name="country_code">
                                                                                <input type="text" id="dail_code" class="d-none" name="dail_code">
                                                                                <input type="text" id="country_name" class="d-none" name="country_name">
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

                                                                        <br>
                                                                        <div class="form-group">
                                                                            <button type="button" id="update-user-submit" class="btn btn-primary pull-right">Update Profile</button>
                                                                        </div>
                                                                    </form>
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

                                <!-- tab pane info start -->
                                <div class="tab-pane inner_tabs_open d-none" id="wallet_trans_open" role="tabpanel">
                                    <!-- info card start -->
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-lg-12">

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

                <div class="mx-auto" id="upload-demo"></div>

                <button class="btn btn-block btn-primary" id="upload-result"> Crop And Upload</button>

            </div>

        </div>
    </div>
</div>

@endsection

@section('page-css')
<link rel="stylesheet" href="{{asset('/web_sources/tele/build/css/intlTelInput.css')}}">
<style>
    .iti {
        width: 100%;
    }
</style>
<style>
    .btn-primary .file-upload {
        width: 100%;
        padding: 10px 0px;
        position: absolute;
        left: 0;
        opacity: 0;
        cursor: pointer;
    }

    #delete_dp {
        margin-top: -10px;
        margin-left: -15px;
        position: absolute;
        height: 30px;
        width: 30px;
        padding-top: 8px;
        float: right;
        padding-left: 9px;
        cursor: pointer;
        border-radius: 50%;
        background-color: #ef4036;
        color: white;
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


    #upload-demo {
        width: 400px;
    }

    #cards_table_filter {
        float: right;
    }

    .nav-tabs .slide {
        width: calc(100% / 3) !important;
    }

    .color_picker_size {
        width: 300px;
        height: 200px;
    }
</style>
@stop

@section('page-scripts')
<script src="{{asset('/web_sources/tele/build/js/intlTelInput.js')}}"></script>
<script>
    $('.dob').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        autoclose: true,
    });

    $('.inner_tabs').click(function() {
        var id = this.id;

        $('.inner_tabs').removeClass('active');
        $('#' + id).addClass('active');

        $('.inner_tabs_open').removeClass('active');
        $('.inner_tabs_open').addClass('d-none');
        $('#' + id + '_open').removeClass('d-none');
        $('#' + id + '_open').addClass('active');
    });

    $('#change_dp').on('change', function() {

        function validate() {
            if ($('#change_dp').val().trim() != '') {
                var allowed_extensions = new Array("png", "jpg", "jpeg");
                var file_extension = $('#change_dp').val().split('.').pop();
                for (var i = 0; i <= allowed_extensions.length; i++) {
                    if (allowed_extensions[i] == file_extension) {
                        return true;
                    }
                }
                return false;
            } else {
                return false;
            }
        }

        if (validate) {
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
            reader.onload = function(e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    // console.log('jQuery bind complete');

                });
            }
            reader.readAsDataURL(this.files[0]);

            $('#change_dp_form')[0].reset();
        } else {
            Swal.fire({
                type: 'error',
                text: 'Invalid Input.'
            });
        }
    });

    $('#upload-result').on('click', function(ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(resp) {

            $.ajax({
                url: "{{url('/')}}/{{auth()->user()->account_type}}/change_user_profile_pic",
                method: "POST",
                data: {
                    id: "{{$user_id}}",
                    image: resp
                },
                beforeSend: () => {
                    $('#overlay').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status == 'Success') {

                        $('#change_dp_close').trigger('click');
                        $('#change_dp_form')[0].reset();

                        get_single_user();

                        Swal.fire({
                            type: 'success',
                            text: data.response
                        });
                    }

                    if (data.status == 'Error') {
                        Swal.fire({
                            type: 'error',
                            text: data.response
                        });
                    }
                },
                complete: () => {
                    $('#overlay').addClass('d-none');
                }
            });
        });
    });

    $('#delete_dp').click(() => {
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
                    url: "{{url('/')}}/{{auth()->user()->account_type}}/delete_user_profile_pic",
                    method: "POST",
                    data: {
                        id: "{{$user_id}}"
                    },
                    beforeSend: () => {
                        $('#overlay').removeClass('d-none');
                    },
                    success: (data) => {
                        if (data.status == 'Success') {
                            Swal.fire({
                                text: data.response,
                                type: 'success',
                            })

                            get_single_user();

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
                    

    get_single_user();

    function get_single_user() {
        $.ajax({
            url: "{{url('/')}}/{{auth()->user()->account_type}}/get_single_user",
            method: "GET",
            data: {
                user_id: "{{$user_id}}"
            },
            beforeSend: () => {
                $('#overlay').removeClass('d-none');
            },
            success: (data) => {
                if (data.status == 'Success') {
                    var asset = "{{asset('sources/assets/images/users/profile_pics')}}";

                    var logo = data.response.profile_pic != null ? data.response.profile_pic : data.response.gender ? 'male_pic.png' : 'female_pic.png';

                    $('#dp').attr('src', asset + '/' + logo);

                    $('#full_name').val(data.response.full_name);

                    iti.setNumber('+' + data.response.dail_code + '' + data.response.phone_no);

                    $('#dail_code').val(data.response.dail_code);
                    $('#country_code').val(data.response.country_code);
                    $('#country_name').val(data.response.country_name);

                    $('#male').removeAttr('checked');
                    $('#female').removeAttr('checked');

                    if (data.response.gender == 'm') {
                        $('#male').attr('checked', 'checked')
                    }

                    if (data.response.gender == 'f') {
                        $('#female').attr('checked', 'checked')
                    }

                    $('#email').val(data.response.email);
                    $('#dob').val(format_date(data.response.dob));

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

    $('#update-user-submit').click(() => {
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

                    if (data.errors.gender != undefined) {
                        toastr.error(data.errors.gender[0]);
                    }
                }

                if (data.status == 'Success') {
                    swal.fire({
                        type: 'success',
                        text: data.response
                    });

                    get_single_user();

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
    });
</script>


@stop