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
                                <i class="icofont icofont-user bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Account info</h4>
                                    <span style="text-transform:none;">Manage your profile!</span>

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
                                        <a href="{{url('/')}}/{{auth()->user()->account_type}}/account">Account</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <div class="page-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div id="profile_pic">

                                    <span style="float:right;">
                                        <i class="fa fa-trash" id="delete_profile_dp"></i>
                                    </span>

                                    <center>
                                        <img class="img img-fluid" style="padding:10px;" src="{{asset('sources/assets/images/male_pic.png')}}" id="profile_dp" alt="logo">
                                    </center>

                                    <p>
                                        <form id="change_profile_dp_form">
                                            <center>
                                                <div class="btn btn-primary">
                                                    <input type="file" class="file-upload" id="change_profile_dp" name="profile_picture" accept="image/*">
                                                    Upload Photo
                                                </div>
                                            </center>
                                        </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Account Info</h5>
                                    <hr style="margin-bottom:0px;">
                                </div>
                                <div class="card-block">
                                    <form id="account_info_form" autocomplete="off">

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
                                            <button type="button" id="save_profile" class="btn btn-primary pull-right">Save changes</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Basic Form Inputs card end -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Change Password</h5>
                                    <hr style="margin-bottom:0px;">
                                </div>

                                <div class="card-block">
                                    <form id="change_password_form">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Old Password <sup>*</sup></label>
                                            <div class="col-sm-8">
                                                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old Password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">New Password <sup>*</sup></label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Confirm New Password <sup>*</sup></label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm New Password">
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-group">
                                            <button type="button" id="save_password" class="btn btn-primary pull-right">Save changes</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Basic Form Inputs card end -->
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="ChangeProfileDpModal" tabindex="-1" role="dialog" aria-labelledby="ChangeProfileDpModal" aria-hidden="true">
    <button type="button" class="close float-close-pro" id="change_profile_dp_close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-size:1.5rem;">Crop and uplaod</h2>
            </div>

            <div class="modal-body-pro">

                <div class="mx-auto" id="upload-profile-demo"></div>

                <button class="btn btn-block btn-primary" id="upload-profile-result"> Crop And Upload</button>

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
    .custom-btn {
        border-radius: 50%;
    }

    .datepicker {
        width: 260px;
        height: 260px;
    }

    .table-condensed {
        width: 250px;
        height: 250px;
    }

    .table-condensed thead tr th {
        padding: 6px 0px;
    }

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

    #delete_profile_dp {
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

    #upload-demo {
        width: 400px;
    }

    #upload-profile-demo {
        width: 400px;
    }
</style>
@stop

@section('page-scripts')
<script>
    $('.dob').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        autoclose: true,
    });
</script>
<script src="{{asset('/web_sources/tele/build/js/intlTelInput.js')}}"></script>
<script>
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

    get_account_details();

    function get_account_details() {
        $.ajax({
            url: "{{url('/')}}/{{auth()->user()->account_type}}/get_account_details",
            method: "GET",
            beforeSend: () => {
                $('#overlay').removeClass('d-none');
            },
            success: (data) => {
                console.log(data);

                if (data.status == 'Success') {

                    var profile_asset = "{{asset('sources/assets/images/users/profile_pics/')}}";

                    if (data.response.profile_pic != null) {
                        var profile_pic = data.response.profile_pic;
                    } else {
                        if (data.response.gender == 'm') {
                            var profile_pic = 'male_pic.png';
                        } else {
                            var profile_pic = 'female_pic.png';
                        }
                    }

                    $('#profile_dp,#side_dp,#header_dp').attr('src', profile_asset + '/' + profile_pic);

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
                } else if (data.status == 'Error') {
                    toastr.error(data.response);
                }
            },
            complete: () => {
                $('#overlay').addClass('d-none');
            }
        });
    }

    $('#change_profile_dp').on('change', function() {

        function validate() {
            if ($('#change_profile_dp').val().trim() != '') {
                var allowed_extensions = new Array("png", "jpg", "jpeg");
                var file_extension = $('#change_profile_dp').val().split('.').pop();
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
            $('#ChangeProfileDpModal').modal();

            $('#upload-profile-demo').croppie('destroy');

            $uploadCrop = $('#upload-profile-demo').croppie({
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

            $('#change_profile_dp_form')[0].reset();
        } else {
            Swal.fire({
                type: 'error',
                text: 'Invalid Input.',
                timer: 6000,
                allowOutsideClick: false
            });
        }
    });

    $('#upload-profile-result').on('click', function(ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(resp) {

            $.ajax({
                url: "{{url('/')}}/{{auth()->user()->account_type}}/change_profile_dp",
                method: "POST",
                data: {
                    "image": resp
                },
                beforeSend: () => {
                    $('#overlay').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status == 'Success') {
                        Swal.fire({
                            type: 'success',
                            text: data.response,
                            timer: 6000,
                            allowOutsideClick: false
                        });

                        $('#change_profile_dp_close').trigger('click');
                        $('#change_profile_dp_form')[0].reset();

                        get_account_details();
                    }

                    if (data.status == 'Error') {
                        Swal.fire({
                            type: 'error',
                            text: data.response,
                            timer: 6000,
                            allowOutsideClick: false
                        });
                    }
                },
                complete: () => {
                    $('#overlay').addClass('d-none');
                }
            });
        });
    });

    $('#delete_profile_dp').click(() => {
        Swal.fire({
            text: 'Are you sure, you want to delete the profile dp ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d11a2a',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{url('/')}}/{{auth()->user()->account_type}}/delete_profile_pic",
                    method: "POST",
                    beforeSend: () => {
                        $('#overlay').removeClass('d-none');
                    },
                    success: (data) => {
                        if (data.status == 'Success') {
                            Swal.fire({
                                type: 'success',
                                text: data.response,
                                timer: 6000,
                                allowOutsideClick: false,
                            })

                            get_account_details();
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

    $('#save_profile').click(() => {
        $.ajax({
            url: "{{url('/')}}/{{auth()->user()->account_type}}/save_profile",
            method: "POST",
            data: new FormData($('#account_info_form')[0]),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: () => {
                $('#overlay').removeClass('d-none');
            },
            success: (data) => {
                if (data.errors != undefined) {
                    if (data.errors.full_name != undefined) {
                        toastr.error(data.errors.full_name[0]);
                    }

                    if (data.errors.email != undefined) {
                        toastr.error(data.errors.email[0]);
                    }

                    if (data.errors.phone_no != undefined) {
                        toastr.error(data.errors.phone_no[0]);
                    }

                    if (data.errors.dail_code != undefined) {
                        toastr.error(data.errors.dail_code[0]);
                    }

                    if (data.errors.country_code != undefined) {
                        toastr.error(data.errors.country_code[0]);
                    }

                    if (data.errors.country_name != undefined) {
                        toastr.error(data.errors.country_name[0]);
                    }

                    if (data.errors.dob != undefined) {
                        toastr.error(data.errors.dob[0]);
                    }

                    if (data.errors.gender != undefined) {
                        toastr.error(data.errors.gender[0]);
                    }
                }

                if (data.status == 'Success') {
                    swal.fire({
                        type: 'success',
                        text: data.response,
                        timer: 6000,
                        allowOutsideClick: false,
                        // showConfirmButton: false
                    });
                } else if (data.status == 'Error') {
                    toastr.error(data.response);
                }
            },
            complete: (data) => {
                $('#overlay').addClass('d-none');
            }
        });
    });

    $('#save_password').click(() => {
        $.ajax({
            url: "{{url('/')}}/{{auth()->user()->account_type}}/save_password",
            method: "POST",
            data: new FormData($('#change_password_form')[0]),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: () => {
                $('#overlay').removeClass('d-none');
            },
            success: (data) => {

                if (data.errors != undefined) {
                    if (data.errors.old_password != undefined) {
                        toastr.error(data.errors.old_password[0]);
                    }

                    if (data.errors.password != undefined) {
                        toastr.error(data.errors.password[0]);
                    }

                }

                if (data.status == 'Success') {

                    $('#change_password_form')[0].reset();

                    swal.fire({
                        type: 'success',
                        text: data.response,
                        timer: 6000,
                        allowOutsideClick: false,
                        // showConfirmButton: false
                    });

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