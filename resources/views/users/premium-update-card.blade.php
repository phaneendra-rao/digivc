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
                                <a href="#" style="color:white;"><i class="icofont icofont-card bg-c-pink"></i></a>
                                <div class="d-inline">
                                    <h4>{{$card_details['card_type']}} Card</h4>
                                    <span style="text-transform:none;">You can manage your card and enquiry messages!</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        <a href="{{url('/preview')}}/{{$card_details['template']}}/{{$card_details['user_id']}}/{{$card_details['id']}}" target="_blank" class="btn btn-sm btn-primary float-right">Preveiw Card</a>
                        <br><br>
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="{{url('/home')}}">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{url()->previous()}}">Go Back</a>
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
                                        <img class="img img-fluid" style="padding:10px;" src="{{asset('sources/assets/images/user_card/company_logo/nologo.png')}}" id="profile_dp" alt="logo">	
                                    </center>

                                    <p>
                                        <form id="change_profile_dp_form">
                                            <input type="text" name="id" class="d-none" value="{{$card_details->id}}" readonly>
                                            <center>
                                                <div class="btn btn-primary">
                                                    <input type="file" class="file-upload" id="change_profile_dp" name="contact_profile_picture" accept="image/*">
                                                    Upload Photo
                                                </div>
                                            </center>
                                        </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Contact Person Info</h5>
                                    <hr style="margin-bottom:0px;">
                                </div>

                                <div class="card-block">
                                    <form id="contact_person_info_form">
                                    <input type="text" name="id" class="d-none" value="{{$card_details->id}}" readonly>
                                    <input type="text" name="user_id" class="d-none" value="{{$card_details->user_id}}" readonly>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Designation</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="designation" id="designation" class="form-control" placeholder="designation">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Phone</label>
                                            <div class="col-sm-9">
                                                <small>Note: Please add country code before number (eg: +91 for india)</small>
                                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">WhatsApp No</label>
                                            <div class="col-sm-9">
                                                <small>Note: Please add country code before number (eg: +91 for india)</small>
                                                <input type="number" name="whatsapp_no" id="whatsapp_no" class="form-control" placeholder="WhatsApp No">
                                            </div>
                                        </div>                                                            

                                        <div class="form-group">
                                            <button type="button" id="save_contact_person_info_btn" class="btn btn-primary pull-right">Save changes</button>
                                        </div>  
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- tab header start -->
                            <div class="tab-header card">
                                <ul class="nav nav-tabs md-tabs nav-justified tab-timeline" role="tablist" id="mytab">
                                    <li class="nav-item">
                                        <a class="nav-link inner_tabs active" style="cursor:pointer;" id="company_info" role="tab">Company Info</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inner_tabs" style="cursor:pointer;" id="products" role="tab">Products</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inner_tabs" style="cursor:pointer;" id="videos_gallery" role="tab">Videos, Gallery & More</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inner_tabs" style="cursor:pointer;" id="payment_options" role="tab">Payment options</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inner_tabs" style="cursor:pointer;" id="shareable_links" role="tab">Shareable Links </a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inner_tabs" style="cursor:pointer;" id="messages" role="tab">Messages </a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                            </div>

                                <div class="tab-content">
                                    
                                    <div class="tab-pane inner_tabs_open active" id="company_info_open" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div id="account-edit-photo" class="card">
                                                    <div id="profile_pic">

                                                        <span style="float:right;">
                                                            <i class="fa fa-trash" id="delete_dp"></i>
                                                        </span>                                

                                                        <center>
                                                            <img class="img img-fluid" style="padding:10px;" src="{{asset('sources/assets/images/user_card/company_logo/nologo.png')}}" id="dp" alt="logo">	
                                                        </center>

                                                        <p>
                                                            <form id="change_dp_form">
                                                                <input type="text" name="id" class="d-none" value="{{$card_details->id}}" readonly>
                                                                <center>
                                                                    <div class="btn btn-primary">
                                                                        <input type="file" class="file-upload" id="change_dp" name="profile_picture" accept="image/*">
                                                                        Upload New Logo
                                                                    </div>
                                                                </center>
                                                            </form>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="form-group">
                                                            <div class="col-sm-10 row">
                                                                <h6 style="font-size:1rem;margin-top:8px;" id="slug"></h6><button type="button" class="btn btn-primary btn-sm" style="margin-left:30px;" id="copy_btn" onclick="copyToClipboard('#slug')">Copy URL</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card d-none" id="qr_code_head">
                                                    <div class="card-block">
                                                        <h4 class="text-center">Click QR Code to download</h4>
                                                        <div class="visible-print text-center" id="qr_code">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Company Info</h5>
                                                        <button type="button" class="btn btn-primary f-right" style="margin-top:-10px;" id="save_company_info_btn_top">Save Changes</button>
                                                        <hr style="margin-bottom:0px;">
                                                    </div>
                                                    
                                                    <div class="card-block">
                                                        <form id="company_info_form">
                                                        <input type="text" name="id" class="d-none" value="{{$card_details->id}}" readonly>
                                                        <input type="text" name="user_id" class="d-none" value="{{$card_details->user_id}}" readonly>
                                                             
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Primary Color</label>
                                                                <div class="col-sm-10">
                                                                    <small>Note: Please select your theme color by clicking here</small>
                                                                    <input type="text" name="primary_color" id="primary_color" class="form-control jscolor">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Expiry On</label>
                                                                <div class="col-sm-10">
                                                                    <input type="date" name="expiry_on" id="expiry_on" class="form-control" placeholder="Expiry On" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Logo Shape</label>
                                                                <div class="col-sm-10">
                                                                    <select name="logo_shape" class="form-control" id="logo_shape">
                                                                        <option value="round">Round</option>
                                                                        <option value="square">Square</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Company Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Tag Line</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="tag_line" id="tag_line" class="form-control" placeholder="Tag Line">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Phone</label>
                                                                <div class="col-sm-10">
                                                                    <small>Note: Please add country code before number (eg: +91 for india)</small>
                                                                    <input type="number" name="company_phone" id="company_phone" class="form-control" placeholder="Company Phone">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Whatsapp No</label>
                                                                <div class="col-sm-10">
                                                                    <small>Note: Please add country code before number (eg: +91 for india)</small>
                                                                    <input type="number" name="company_whatsapp_no" id="company_whatsapp_no" class="form-control" placeholder="Company Whatsapp No">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" name="company_email" id="company_email" class="form-control" placeholder="Company Email">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Website</label>
                                                                <div class="col-sm-10">
                                                                    <input type="url" name="company_website" id="company_website" class="form-control" placeholder="Company Website">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">About Company</label>
                                                                <div class="col-sm-10">
                                                                    <small>Note: Give short and crisp info about your company - max characters 400</small>
                                                                    <textarea name="about_company" id="about_company" placeholder="About Company" maxlength="400" rows="3" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Offer Description</label>
                                                                <div class="col-sm-10">
                                                                    <small>Note: Give short and crisp description of offer - max characters 200</small>
                                                                    <input name="company_offer" id="company_offer" placeholder="Company Offer" maxlength="200" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Services</label>
                                                                <input type="number" class="d-none" value="1" id="service_no" readonly/>
                                                                <div class="col-sm-10">
                                                                    <div id="attach_services">
                                                                        <div class="row">
                                                                            <div class="col-sm-10">
                                                                                <input type="text" name="service[]" id="service_1" class="form-control" placeholder="Add Service/Product" />
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <button type="button" onclick="add_service()" class="btn btn-sm btn-primary"><i style="padding-left:5px;" class="fa fa-plus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Clients</label>
                                                                <input type="number" class="d-none" value="1" id="client_no" readonly/>
                                                                <div class="col-sm-10">
                                                                    <div id="attach_clients">
                                                                        <div class="row">
                                                                            <div class="col-sm-10">
                                                                                <input type="text" name="clients[]" id="client_1" class="form-control" placeholder="Add Client" />
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <button type="button" onclick="add_client()" class="btn btn-sm btn-primary"><i style="padding-left:5px;" class="fa fa-plus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">GST No</label>
                                                                <input type="number" class="d-none" value="1" id="gst_no" readonly/>
                                                                <div class="col-sm-10">
                                                                    <div id="attach_gst">
                                                                        <div class="row">
                                                                            <div class="col-sm-5">
                                                                                <input type="text" name="company_gst_company_name[]" id="company_gst_company_name_1" class="form-control" placeholder="Company Name (Optional)">
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <input type="text" name="company_gst_no[]" id="company_gst_no_1" class="form-control" placeholder="Company GST No">
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <button type="button" onclick="add_gst()" class="btn btn-sm btn-primary"><i style="padding-left:5px;" class="fa fa-plus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Address & Map Location</label>
                                                                <input type="number" class="d-none" value="1" id="address_no" readonly/>
                                                                <div class="col-sm-10">
                                                                    <div id="attach_address_map">
                                                                        <div class="row">
                                                                            <div class="col-sm-10">
                                                                                <input type="text" name="branch_name[]" id="branch_name_1" class="form-control" maxlength="150" placeholder="Branch Name (Optional)">
                                                                                <br>
                                                                                <input type="text" name="company_address[]" id="company_address_1" class="form-control" placeholder="Company Address">
                                                                                <br>
                                                                                <input type="text" name="map_link[]" id="map_link_1" class="form-control" placeholder="Location Map Link">
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <button type="button" onclick="add_address()" class="btn btn-sm btn-primary"><i style="padding-left:5px;" class="fa fa-plus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>
                                                            <button class="btn btn-primary btn-block" id="save_company_info_btn_bottom" type="button">Save Changes</button>
                                                        </form>
                                                     </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane inner_tabs_open d-none" id="products_open" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Products</h5>
                                                <button type="button" class="btn btn-primary f-right" style="margin-top:-10px;" id="add_products_btn">Add Product</button>
                                                <hr style="margin-bottom:0px;">
                                            </div>
                                            <div class="card-block">
                                                <div id="attach_products" class="row">
                                                    <p style="margin-left:20px;"><i>No Products</i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane inner_tabs_open d-none" id="videos_gallery_open" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Videos</h5>
                                                <button type="button" class="btn btn-primary f-right" style="margin-top:-10px;" id="add_videos_btn">Add Videos</button>
                                                <hr style="margin-bottom:0px;">
                                            </div>
                                            <div class="card-block">

                                                    <div id="attach_videos" class="row">
                                                        <p style="margin-left:20px;"><i>No Videos</i></p>
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Gallery Images</h5>
                                                <button type="button" class="btn btn-primary f-right" style="margin-top:-10px;" id="add_gallery_images_btn">Add Images</button>
                                                <hr style="margin-bottom:0px;">
                                            </div>
                                            <div class="card-block">

                                                    <div id="attach_images" class="row">
                                                        <p style="margin-left:20px;"><i>No Images</i></p>
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Downloadable Content</h5>
                                                <button type="button" class="btn btn-primary f-right" style="margin-top:-10px;" id="add_dc_btn">Add Item</button>
                                                <hr style="margin-bottom:0px;">
                                            </div>
                                            <div class="card-block">
                                                <div id="attach_downloadable_content" class="row">
                                                    <p style="margin-left:20px;"><i>No Downloadable Content</i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane inner_tabs_open d-none" id="payment_options_open" role="tabpanel">
                                        
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Bank Details</h5>
                                                <button type="button" class="btn btn-primary f-right" style="margin-top:-10px;" id="bank_details_save_btn">Save Changes</button>
                                                <hr style="margin-bottom:0px;">
                                            </div>
                                            <div class="card-block">
                                                <input type="number" class="d-none" name="bank_no" id="bank_no" value="1" readonly>
                                                <form id="bank_details_form">
                                                    <input type="text" name="id" class="d-none" value="{{$card_details->id}}" readonly>
                                                    <input type="text" name="user_id" class="d-none" value="{{$card_details->user_id}}" readonly>
                                                    <div id="attach_bank_details">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Bank Name</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="bank_name[]" id="bank_name_1" class="form-control" placeholder="Bank Name (Optional)">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <button type="button" onclick="add_bank()" class="btn btn-sm btn-primary"><i style="padding-left:5px;" class="fa fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Full Name</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="full_name[]" id="full_name_1" class="form-control" placeholder="Full Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Account No</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="account_no[]" id="bank_account_no_1" class="form-control" placeholder="Account No">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">IFSC Code</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="ifsc[]" id="bank_ifsc_1" class="form-control" placeholder="IFSC Code">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Branch</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="branch[]" id="bank_branch_1" class="form-control" placeholder="Branch">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Online Payment Options or Wallets</h5>
                                                <button type="button" class="btn btn-primary f-right" style="margin-top:-10px;" id="online_payments_save_btn">Save Changes</button>
                                                <hr style="margin-bottom:0px;">
                                            </div>
                                            <div class="card-block">
                                                <form id="online_payments_form">
                                                <input type="text" name="id" class="d-none" value="{{$card_details->id}}" readonly>
                                                    <input type="text" name="user_id" class="d-none" value="{{$card_details->user_id}}" readonly>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Paytm</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="paytm" id="online_paytm" class="form-control" placeholder="Paytm number">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Phonepe</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="phonepe" id="online_phonepe" class="form-control" placeholder="Phonepe number">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Google pay</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="googlepay" id="online_googlepay" class="form-control" placeholder="Googlepay number">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">UPI Link</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="upi_link" id="online_upi_link" class="form-control" placeholder="UPI Link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Paypal Link</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="paypal_link" id="online_paypal_link" class="form-control" placeholder="Paypal Link">
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane inner_tabs_open d-none" id="shareable_links_open" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Shareable Links</h5>
                                                <button type="button" class="btn btn-primary f-right" style="margin-top:-10px;" id="shareable_links_save_btn">Save Changes</button>
                                                <hr style="margin-bottom:0px;">
                                            </div>
                                            <div class="card-block">
                                                <form id="shareable_links_form">
                                                <input type="text" name="id" class="d-none" value="{{$card_details->id}}" readonly>
                                                    <input type="text" name="user_id" class="d-none" value="{{$card_details->user_id}}" readonly>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Facebook</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="facebook" id="facebook_link" class="form-control" placeholder="Facebook Link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Twitter</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="twitter" id="twitter_link" class="form-control" placeholder="Twitter Link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Youtube</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="youtube" id="youtube_link" class="form-control" placeholder="Youtube Link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">LinkedIn</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="linkedin" id="linkedin_link" class="form-control" placeholder="LinkedIn Link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Googleplus</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="googleplus" id="googleplus_link" class="form-control" placeholder="GooglePlus Link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Instagram</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="instagram" id="instagram_link" class="form-control" placeholder="Instagram Link">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Others</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="d-none" value="1" id="others_no" readonly/>
                                                            <div id="attach_other_links">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <input type="text" name="other_name[]" id="other_name_1" class="form-control" placeholder="Name">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" name="other_link[]" id="other_link_1" class="form-control" placeholder="Link">
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <button class="btn btn-sm btn-primary" onclick="add_other_link()" type="button"><i style="padding-left:5px;" class="fa fa-plus"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane inner_tabs_open d-none" id="messages_open" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Messages</h5>
                                            </div>
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="data_table_main table-responsive dt-responsive">
                                                            <table id="messages_table" style="width:100%;" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sno</th>
                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Phone</th>
                                                                        <th>Message</th>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="ChangeDpModal" tabindex="-1" role="dialog" aria-labelledby="ChangeDpModal" aria-hidden="true">
    <button type="button" class="close float-close-pro" id="change_dp_close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-size:1.5rem;">Crop and uplaod</h2>
            </div>

            <div class="modal-body-pro">
            
            <div class="mx-auto"  id="upload-demo"></div>
                
            <button class="btn btn-block btn-primary" id="upload-result"> Crop And Upload</button>
            
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
            
            <div class="mx-auto"  id="upload-profile-demo"></div>
                
            <button class="btn btn-block btn-primary" id="upload-profile-result"> Crop And Upload</button>
            
            </div> 

        </div>
    </div>
</div>


<button type="button" class="d-none" id="add-videos" data-toggle="modal" data-target="#add-videos-modal"></button>

<div class="modal fade" id="add-videos-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_videos_form_head">Add Youtube Video Link</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="videos_form">
                            @csrf
                            <input type="text" name="id" class="d-none" value="{{$card_details->id}}" readonly>
                            <input type="text" name="user_id" class="d-none" value="{{$card_details->user_id}}" readonly>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" name="video_id" id="video_id" class="d-none">
                                        <input type="text" name="video" id="video" class="form-control" placeholder="Youtube Video Link">
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" id="add-video-close" data-dismiss="modal">Close</button>
                <button type="button" id="add-video-submit" class="btn btn-primary waves-effect waves-light ">Add Video Link</button>
                <button type="button" id="update-video-submit" class="btn btn-primary waves-effect waves-light d-none">Update Video Link</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="d-none" id="add-images" data-toggle="modal" data-target="#add-images-modal"></button>

<div class="modal fade" id="add-images-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_images_form_head">Add Gallery Image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="images_form">
                            @csrf
                            <input type="text" name="id" class="d-none" value="{{$card_details->id}}" readonly>
                            <input type="text" name="user_id" class="d-none" value="{{$card_details->user_id}}" readonly>
                            <input type="text" name="image_id" id="image_id" class="d-none" />

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" placeholder="Title" class="form-control" name="title" id="title" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" name="gallery_image" id="gallery_image" accept="image/png, image/jpeg">
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" id="add-image-close" data-dismiss="modal">Close</button>
                <button type="button" id="add-image-submit" class="btn btn-primary waves-effect waves-light ">Add Image</button>
                <button type="button" id="update-image-submit" class="btn btn-primary waves-effect waves-light d-none">Update Image</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="d-none" id="add-dc" data-toggle="modal" data-target="#add-dc-modal"></button>

<div class="modal fade" id="add-dc-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_dc_form_head">Add Downloadable Content</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="dc_form">
                            @csrf
                            <input type="text" name="id" class="d-none" value="{{$card_details->id}}" readonly>
                            <input type="text" name="user_id" class="d-none" value="{{$card_details->user_id}}" readonly>
                            <input type="text" name="dc_id" id="dc_id" class="d-none" />

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <select name="attachment_type" id="dc_type" class="form-control" style="margin-bottom:20px;">
                                            <option value="brochure">Brochure</option>
                                            <option value="catalog">Catalog</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Title" class="form-control" style="margin-bottom:20px;" name="title" id="dc_title" />
                                    </div>

                                    <div class="col-sm-12">
                                        <input type="file" name="attachment" id="dc_attachment" accept="application/pdf">
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" id="add-dc-close" data-dismiss="modal">Close</button>
                <button type="button" id="add-dc-submit" class="btn btn-primary waves-effect waves-light ">Add Item</button>
                <button type="button" id="update-dc-submit" class="btn btn-primary waves-effect waves-light d-none">Update Item</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="d-none" id="add-products" data-toggle="modal" data-target="#add-products-modal"></button>

<div class="modal fade" id="add-products-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_products_form_head">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="products_form">
                            @csrf
                            <input type="text" name="id" class="d-none" value="{{$card_details->id}}" readonly>
                            <input type="text" name="user_id" class="d-none" value="{{$card_details->user_id}}" readonly>
                            <input type="text" name="product_id" id="product_id" class="d-none" />

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Product Name" class="form-control" name="product_name" id="product_name" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label>Image</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="file" name="product_image" id="product_image" accept="image/png, image/jpeg" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label>Description</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <textarea placeholder="Product Description (Optional)" class="form-control" name="product_description" id="product_description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label>Price</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Price (Optional)" class="form-control" name="product_price" id="product_price" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label>Purchase Link</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Purchase Link (Optional)" class="form-control" name="product_payment_link" id="product_payment_link" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <small>Note: Please add country code before number (eg: +91 for india)</small>
                                        <input type="text" placeholder="Phone (Optional)" class="form-control" name="product_phone" id="product_phone" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label>Whatsapp</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <small>Note: Please add country code before number (eg: +91 for india)</small>
                                        <input type="text" placeholder="Whatsapp (Optional)" class="form-control" name="product_whatsapp" id="product_whatsapp" />
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" id="add-product-close" data-dismiss="modal">Close</button>
                <button type="button" id="add-product-submit" class="btn btn-primary waves-effect waves-light ">Add Product</button>
                <button type="button" id="update-product-submit" class="btn btn-primary waves-effect waves-light d-none">Update Product</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-css')
<style>
.card-header p
{
    line-height:18px;
    margin:0px;
    padding:0px;
}

.social
{
    font-size:1.2rem;
}

.btn-primary .file-upload {
    width: 100%;
    padding: 10px 0px;
    position: absolute;
    left: 0;
    opacity: 0;
    cursor: pointer;
}

#messages_table_filter
{
    float:right;
}

.note-editor
{
    box-shadow:none;
}

.b-l-primary
{
    border-left:5px solid #4680ff !important;
}

#delete_dp
{
	margin-top:-10px;
	margin-left:-15px;
	position:absolute;
	height:30px;
	width:30px;
    padding-top:8px;
    float:right;
	padding-left:9px;
	cursor:pointer;
	border-radius:50%;
	background-color:#ef4036;
	color:white;
}

#delete_profile_dp
{
	margin-top:-10px;
	margin-left:-15px;
	position:absolute;
	height:30px;
	width:30px;
    padding-top:8px;
    float:right;
	padding-left:9px;
	cursor:pointer;
	border-radius:50%;
	background-color:#ef4036;
	color:white;
}


#upload-demo
{
	width:400px;
}

#upload-profile-demo
{
	width:400px;
}

.nav-tabs .slide {
    width: calc(100% / 6) !important;
}

.card .card-block ul
{
    list-style-type:disc;
    padding-left:30px;
}
.video
{
    display: inline-block;
}

.video .edit
{
    height: 50px;
    width: 50px;
    border-radius: 50%;
    background-color: orange;
    color:white;
    padding: 6px;
    cursor:pointer;
    margin-right:4px;
    /* padding-left:9px;
    padding-top:3px;    */
}

.video .delete
{
    height: 50px;
    width: 50px;
    border-radius: 50%;
    background-color: red;
    color:white;
    padding: 6px;
    cursor:pointer;
    /* padding-left:9px;
    padding-top:3px;    */
}

iframe
{
    border:0px !important;
}

</style>
@stop

@section('page-scripts')


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

$('#add_videos_btn').click(()=>{
    // $('#add_videos_form_head'products(form_headoutube Video Link');

    $('#add-video-submit').removeClass('d-none');
    $('#update-video-submit').addClass('d-none');

    $('#videos_form')[0].reset();
    $('#add-videos').click();

});

$('#add-video-submit').click(()=>{
    $.ajax({
        url:"{{url('/add_video_link')}}",
        method:"POST",
        data:new FormData($('#videos_form')[0]),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:(data)=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{

            if(data.errors!=undefined)
            {
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }

                if(data.errors.user_id!=undefined)
                {
                    toastr.error(data.errors.user_id[0]);
                }

                if(data.errors.video!=undefined)
                {
                    toastr.error(data.errors.video[0]);
                }
            }

            if(data.status=='Success')
            {
                $('#videos_form')[0].reset();
                $('#add-video-close').click();

                Swal.fire({
                    type: 'success',
                    text: data.response
                });

                get_card_details();
            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }

        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
});

$('#update-video-submit').click(()=>{
    $.ajax({
        url:"{{url('/update_video_link')}}",
        method:"POST",
        data:new FormData($('#videos_form')[0]),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:(data)=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{

            if(data.errors!=undefined)
            {
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }

                if(data.errors.user_id!=undefined)
                {
                    toastr.error(data.errors.user_id[0]);
                }

                if(data.errors.video_id!=undefined)
                {
                    toastr.error(data.errors.video_id[0]);
                }

                if(data.errors.video!=undefined)
                {
                    toastr.error(data.errors.video[0]);
                }
            }

            if(data.status=='Success')
            {
                $('#videos_form')[0].reset();
                $('#add-video-close').click();

                Swal.fire({
                    type: 'success',
                    text: data.response
                });

                get_card_details();
            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }

        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
});

$('#add_gallery_images_btn').click(()=>{
    $('#add_images_form_head').html('Add Image');

    $('#add-image-submit').removeClass('d-none');
    $('#update-image-submit').addClass('d-none');

    $('#images_form')[0].reset();

    $('#add-images').click();
});

$('#add-image-submit').click(()=>{
    $.ajax({
        url:"{{url('/add_gallery_image')}}",
        method:"POST",
        data:new FormData($('#images_form')[0]),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:(data)=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{

            if(data.errors!=undefined)
            {
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }

                if(data.errors.user_id!=undefined)
                {
                    toastr.error(data.errors.user_id[0]);
                }

                if(data.errors.title!=undefined)
                {
                    toastr.error(data.errors.title[0]);
                }

                if(data.errors.gallery_image!=undefined)
                {
                    toastr.error(data.errors.gallery_image[0]);
                }
            }

            if(data.status=='Success')
            {
                $('#images_form')[0].reset();
                $('#add-image-close').click();

                Swal.fire({
                    type: 'success',
                    text: data.response
                });

                get_card_details();
            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }

        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
});

$('#update-image-submit').click(()=>{
    $.ajax({
        url:"{{url('/update_gallery_image')}}",
        method:"POST",
        data:new FormData($('#images_form')[0]),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:(data)=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{

            if(data.errors!=undefined)
            {
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }

                if(data.errors.user_id!=undefined)
                {
                    toastr.error(data.errors.user_id[0]);
                }

                if(data.errors.image_id!=undefined)
                {
                    toastr.error(data.errors.image_id[0]);
                }

                if(data.errors.title!=undefined)
                {
                    toastr.error(data.errors.title[0]);
                }

                if(data.errors.gallery_image!=undefined)
                {
                    toastr.error(data.errors.gallery_image[0]);
                }
            }

            if(data.status=='Success')
            {
                $('#images_form')[0].reset();
                $('#add-image-close').click();

                Swal.fire({
                    type: 'success',
                    text: data.response
                });

                get_card_details();
            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }

        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
});

$('#add_dc_btn').click(()=>{
    $('#add_dc_form_head').html('Add Downloadable Content');

    $('#add-dc-submit').removeClass('d-none');
    $('#update-dc-submit').addClass('d-none');

    $('#dc_form')[0].reset();
    $('#add-dc').click();
});

$('#add-dc-submit').click(()=>{
    $.ajax({
        url:"{{url('/add_dc')}}",
        method:"POST",
        data:new FormData($('#dc_form')[0]),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:(data)=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{

            if(data.errors!=undefined)
            {
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }

                if(data.errors.user_id!=undefined)
                {
                    toastr.error(data.errors.user_id[0]);
                }

                if(data.errors.attachment_type!=undefined)
                {
                    toastr.error(data.errors.attachment_type[0]);
                }

                if(data.errors.title!=undefined)
                {
                    toastr.error(data.errors.title[0]);
                }

                if(data.errors.attachment!=undefined)
                {
                    toastr.error(data.errors.attachment[0]);
                }
            }

            if(data.status=='Success')
            {
                $('#dc_form')[0].reset();
                $('#add-dc-close').click();

                Swal.fire({
                    type: 'success',
                    text: data.response
                });

                get_card_details();
            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }

        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
});

$('#update-dc-submit').click(()=>{
    $.ajax({
        url:"{{url('/update_dc')}}",
        method:"POST",
        data:new FormData($('#dc_form')[0]),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:(data)=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{

            if(data.errors!=undefined)
            {
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }

                if(data.errors.user_id!=undefined)
                {
                    toastr.error(data.errors.user_id[0]);
                }

                if(data.errors.dc_id!=undefined)
                {
                    toastr.error(data.errors.dc_id[0]);
                }

                if(data.errors.attachment_type!=undefined)
                {
                    toastr.error(data.errors.attachment_type[0]);
                }

                if(data.errors.title!=undefined)
                {
                    toastr.error(data.errors.title[0]);
                }

                if(data.errors.attachment!=undefined)
                {
                    toastr.error(data.errors.attachment[0]);
                }
            }

            if(data.status=='Success')
            {
                $('#dc_form')[0].reset();
                $('#add-dc-close').click();

                Swal.fire({
                    type: 'success',
                    text: data.response
                });

                get_card_details();
            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }

        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
});

$('#add_products_btn').click(()=>{
    $('#add_products_form_head').html('Add Product');

    $('#add-product-submit').removeClass('d-none');
    $('#update-product-submit').addClass('d-none');

    $('#products_form')[0].reset();
    $('#add-products').click();

});

$('#add-product-submit').click(()=>{
    $.ajax({
        url:"{{url('/add_product')}}",
        method:"POST",
        data:new FormData($('#products_form')[0]),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:(data)=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{

            if(data.errors!=undefined)
            {
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }

                if(data.errors.user_id!=undefined)
                {
                    toastr.error(data.errors.user_id[0]);
                }

                if(data.errors.product_name!=undefined)
                {
                    toastr.error(data.errors.product_name[0]);
                }

                if(data.errors.product_image!=undefined)
                {
                    toastr.error(data.errors.product_image[0]);
                }
            }

            if(data.status=='Success')
            {
                $('#products_form')[0].reset();
                $('#add-product-close').click();

                Swal.fire({
                    type: 'success',
                    text: data.response
                });

                get_card_details();
            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }

        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
});

$('#update-product-submit').click(()=>{
    $.ajax({
        url:"{{url('/update_product')}}",
        method:"POST",
        data:new FormData($('#products_form')[0]),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:(data)=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{

            if(data.errors!=undefined)
            {
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }

                if(data.errors.user_id!=undefined)
                {
                    toastr.error(data.errors.user_id[0]);
                }

                if(data.errors.product_id!=undefined)
                {
                    toastr.error(data.errors.product_id[0]);
                }

                if(data.errors.product_name!=undefined)
                {
                    toastr.error(data.errors.product_name[0]);
                }

            }

            if(data.status=='Success')
            {
                $('#products_form')[0].reset();
                $('#add-product-close').click();

                Swal.fire({
                    type: 'success',
                    text: data.response
                });

                get_card_details();
            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }

        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
});

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();

    $('#copy_btn').html('Copied!');

  setInterval(() => {
    $('#copy_btn').html('Copy URL');
  }, 1500);
}

function add_client()
{
    var client_no = $('#client_no').val();

    client_no++;

    $('#client_no').val(client_no);

    var item = '<div class="row temp_rows" style="margin-top:10px;" id="client__'+client_no+'">';
    item = item.concat('<div class="col-sm-10">');
    item = item.concat('<input type="text" name="clients[]" id="client_'+client_no+'" class="form-control" placeholder="Add Client" />');
    item = item.concat('</div>');
    item = item.concat('<div class="col-sm-2">');
    item = item.concat('<button type="button" onclick="remove_client(\''+client_no+'\')" class="btn btn-sm btn-danger"><i style="padding-left:5px;" class="fa fa-minus"></i></button>');
    item = item.concat('<button type="button" onclick="add_client()" class="btn btn-sm btn-primary" style="margin-left:4px;"><i style="padding-left:5px;" class="fa fa-plus"></i></button>');
    item = item.concat('</div>');
    item = item.concat('</div>');

    $('#attach_clients').append(item);
}

function remove_client(id)
{
    $('#client__'+id).remove();
}

function add_service()
{
    var service_no = $('#service_no').val();

    service_no++;

    $('#service_no').val(service_no);

    var item = '<div class="row temp_rows" style="margin-top:10px;" id="service__'+service_no+'">';
    item = item.concat('<div class="col-sm-10">');
    item = item.concat('<input type="text" name="service[]" id="service_'+service_no+'" class="form-control" placeholder="Add Service/Product" />');
    item = item.concat('</div>');
    item = item.concat('<div class="col-sm-2">');
    item = item.concat('<button type="button" onclick="remove_service(\''+service_no+'\')" class="btn btn-sm btn-danger"><i style="padding-left:5px;" class="fa fa-minus"></i></button>');
    item = item.concat('<button type="button" onclick="add_service()" class="btn btn-sm btn-primary" style="margin-left:4px;"><i style="padding-left:5px;" class="fa fa-plus"></i></button>');
    item = item.concat('</div>');
    item = item.concat('</div>');

    $('#attach_services').append(item);
}

function remove_service(id)
{
    $('#service__'+id).remove();
}

function add_gst()
{
    var gst_no = $('#gst_no').val();

    gst_no++;

    $('#gst_no').val(gst_no);

    var item = '<div class="row temp_rows" style="margin-top:10px;" id="gst__'+gst_no+'">';
    item = item.concat('<div class="col-sm-5">');
    item = item.concat('<input type="text" name="company_gst_company_name[]" id="company_gst_company_name_'+gst_no+'" class="form-control" placeholder="Company Name (Optional)" />');
    item = item.concat('</div>');
    item = item.concat('<div class="col-sm-5">');
    item = item.concat('<input type="text" name="company_gst_no[]" id="company_gst_no_'+gst_no+'" class="form-control" placeholder="Company GST No" />');
    item = item.concat('</div>');
    item = item.concat('<div class="col-sm-2">');
    item = item.concat('<button type="button" onclick="remove_gst(\''+gst_no+'\')" class="btn btn-sm btn-danger"><i style="padding-left:5px;" class="fa fa-minus"></i></button>');
    item = item.concat('<button type="button" onclick="add_gst()" class="btn btn-sm btn-primary" style="margin-left:4px;"><i style="padding-left:5px;" class="fa fa-plus"></i></button>');
    item = item.concat('</div>');
    item = item.concat('</div>');

    $('#attach_gst').append(item);
}

function remove_gst(gst_no)
{
    $('#gst__'+gst_no).remove();
}

function add_address()
{
    var address_no = $('#address_no').val();

    address_no++;

    $('#address_no').val(address_no);

    var item = '<div class="row temp_rows" style="margin-top:10px;" id="address__'+address_no+'">';
    item = item.concat('<div class="col-sm-10">');
    item = item.concat('<input type="text" name="branch_name[]" id="branch_name_'+address_no+'" class="form-control" maxlength="150" placeholder="Branch Name (Optional)" />');
    item = item.concat('<br>');
    item = item.concat('<input type="text" name="company_address[]" id="company_address_'+address_no+'" class="form-control" placeholder="Company Address" />');
    item = item.concat('<br>');
    item = item.concat('<input type="text" name="map_link[]" id="map_link_'+address_no+'" class="form-control" placeholder="Location Map Link">');
    item = item.concat('</div>');
    item = item.concat('<div class="col-sm-2">');
    item = item.concat('<button type="button" onclick="remove_address(\''+address_no+'\')" class="btn btn-sm btn-danger"><i style="padding-left:5px;" class="fa fa-minus"></i></button>');
    item = item.concat('<button type="button" onclick="add_address()" class="btn btn-sm btn-primary" style="margin-left:4px;"><i style="padding-left:5px;" class="fa fa-plus"></i></button>');
    item = item.concat('</div>');
    item = item.concat('</div>');

    $('#attach_address_map').append(item);
}

function remove_address(address_no)
{
    $('#address__'+address_no).remove();
}

function add_bank()
{
    var bank_no = $('#bank_no').val();

    bank_no++;

    $('#bank_no').val(bank_no);

    var item = '<div class="temp_rows" style="margin-top:10px;" id="bank__'+bank_no+'"><hr>';

    item = item.concat('<div class="form-group row">');
    item = item.concat('<label class="col-sm-2 col-form-label">Bank Name</label>');
    item = item.concat('<div class="col-sm-8">');
    item = item.concat('<input type="text" name="bank_name[]" id="bank_name_'+bank_no+'" class="form-control" placeholder="Bank Name (Optional)">');
    item = item.concat('</div>');
    item = item.concat('<div class="col-sm-2">');
    item = item.concat('<button type="button" onclick="remove_bank(\''+bank_no+'\')" style="margin-right:6px;" class="btn btn-sm btn-danger"><i style="padding-left:5px;" class="fa fa-minus"></i></button>');
    item = item.concat('<button type="button" onclick="add_bank()" class="btn btn-sm btn-primary"><i style="padding-left:5px;" class="fa fa-plus"></i></button>');
    item = item.concat('</div>');
    item = item.concat('</div>');

    item = item.concat('<div class="form-group row">');
    item = item.concat('<label class="col-sm-2 col-form-label">Full Name</label>');
    item = item.concat('<div class="col-sm-8">');
    item = item.concat('<input type="text" name="full_name[]" id="full_name_'+bank_no+'" class="form-control" placeholder="Full Name">');
    item = item.concat('</div>');
    item = item.concat('</div>');

    item = item.concat('<div class="form-group row">');
    item = item.concat('<label class="col-sm-2 col-form-label">Account No</label>');
    item = item.concat('<div class="col-sm-8">');
    item = item.concat('<input type="text" name="account_no[]" id="bank_account_no_'+bank_no+'" class="form-control" placeholder="Account No">');
    item = item.concat('</div>');
    item = item.concat('</div>');

    item = item.concat('<div class="form-group row">');
    item = item.concat('<label class="col-sm-2 col-form-label">IFSC Code</label>');
    item = item.concat('<div class="col-sm-8">');
    item = item.concat('<input type="text" name="ifsc[]" id="bank_ifsc_'+bank_no+'" class="form-control" placeholder="IFSC Code">');
    item = item.concat('</div>');
    item = item.concat('</div>');

    item = item.concat('<div class="form-group row">');
    item = item.concat('<label class="col-sm-2 col-form-label">Branch</label>');
    item = item.concat('<div class="col-sm-8">');
    item = item.concat('<input type="text" name="branch[]" id="bank_branch_'+bank_no+'" class="form-control" placeholder="Branch">');
    item = item.concat('</div>');
    item = item.concat('</div>');


    item = item.concat('</div>');

    $('#attach_bank_details').append(item);
}


function remove_bank(bank_no)
{
    $('#bank__'+bank_no).remove();
}


function add_other_link()
{
    var others_no = $('#others_no').val();

    others_no++;

    $('#others_no').val(others_no);

    // alert('hello');

    var item = '<div class="row temp_rows" style="margin-top:10px;" id="others_'+others_no+'">';
    item = item.concat('<div class="col-sm-4">');
    item = item.concat('<input type="text" name="other_name[]" id="other_name_'+others_no+'" class="form-control" placeholder="Name" />');
    item = item.concat('</div>');
    item = item.concat('<div class="col-sm-6">');
    item = item.concat('<input type="text" name="other_link[]" id="other_link_'+others_no+'" class="form-control" placeholder="Link" />');
    item = item.concat('</div>');
    item = item.concat('<div class="col-sm-2">');
    item = item.concat('<button type="button" onclick="remove_other_link(\''+others_no+'\')" class="btn btn-sm btn-danger"><i style="padding-left:5px;" class="fa fa-minus"></i></button>');
    item = item.concat('<button type="button" onclick="add_other_link()" class="btn btn-sm btn-primary" style="margin-left:4px;"><i style="padding-left:5px;" class="fa fa-plus"></i></button>');
    item = item.concat('</div>');
    item = item.concat('</div>');

    $('#attach_other_links').append(item);

}

function remove_other_link(id)
{
    $('#others_'+id).remove();
}




$('#change_dp').on('change', function () { 

    function validate()
    {
        if($('#change_dp').val().trim()!='')
        {
            var allowed_extensions = new Array("png","jpg","jpeg");
            var file_extension = $('#change_dp').val().split('.').pop();
            for(var i = 0; i <= allowed_extensions.length; i++)
            {
                if(allowed_extensions[i]==file_extension)
                {
                    return true;
                }
            }
            return false;
        }
        else
        {
            return false;
        }
    }

    if(validate)
    {
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
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                // console.log('jQuery bind complete');
                
            });
        }
        reader.readAsDataURL(this.files[0]);

        $('#change_dp_form')[0].reset();
    }
    else
    {
        Swal.fire({
            type: 'error',
            text: 'Invalid Input.'
        });
    }
});

$('#change_profile_dp').on('change', function () { 

    function validate()
    {
        if($('#change_profile_dp').val().trim()!='')
        {
            var allowed_extensions = new Array("png","jpg","jpeg");
            var file_extension = $('#change_profile_dp').val().split('.').pop();
            for(var i = 0; i <= allowed_extensions.length; i++)
            {
                if(allowed_extensions[i]==file_extension)
                {
                    return true;
                }
            }
            return false;
        }
        else
        {
            return false;
        }
    }

    if(validate)
    {
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
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                // console.log('jQuery bind complete');
                
            });
        }
        reader.readAsDataURL(this.files[0]);

        $('#change_profile_dp_form')[0].reset();
    }
    else
    {
        Swal.fire({
            type: 'error',
            text: 'Invalid Input.'
        });
    }
});

$('#upload-result').on('click', function (ev) {
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        
        $.ajax({
            url: "/change_user_card_company_logo",
            method: "POST",
            data: {"id":"{{$card_details->id}}","image":resp},
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success: function (data) {
                if(data.status=='Success')
                {
                    $('#change_dp_close').trigger('click');
                    $('#change_dp_form')[0].reset();

                    get_card_details();

                    Swal.fire({
                        type: 'success',
                        text: data.response
                    });

                }
                
                if(data.status=='Error')
                {
                    Swal.fire({
                        type: 'error',
                        text: data.response
                    });
                }
            },
            complete:()=>{
                $('#overlay').addClass('d-none');
            }
        });
    });
});


$('#upload-profile-result').on('click', function (ev) {
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        
        $.ajax({
            url: "/change_user_card_profile_dp",
            method: "POST",
            data: {"id":"{{$card_details->id}}","image":resp},
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success: function (data) {
                if(data.status=='Success')
                {
                    $('#change_profile_dp_close').trigger('click');
                    $('#change_profile_dp_form')[0].reset();

                    get_card_details();

                    Swal.fire({
                        type: 'success',
                        text: data.response
                    });

                }
                
                if(data.status=='Error')
                {
                    Swal.fire({
                        type: 'error',
                        text: data.response
                    });
                }
            },
            complete:()=>{
                $('#overlay').addClass('d-none');
            }
        });
    });
});

$('#delete_dp').click(()=>{
    Swal.fire({
            text: 'Are you sure, you want to delete the logo ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d11a2a',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:"{{url('/delete_user_card_company_logo')}}",
                    method:"POST",
                    data:{id:"{{$card_details->id}}"},
                    beforeSend:()=>{
                        $('#overlay').removeClass('d-none');
                    },
                    success:(data)=>{
                        if(data.status=='Success')
                        {
                            Swal.fire({
                                text: data.response,
                                type: 'success',
                            })

                            get_card_details();

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
});

$('#delete_profile_dp').click(()=>{
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
                    url:"{{url('/delete_user_card_profile_dp')}}",
                    method:"POST",
                    data:{id:"{{$card_details->id}}"},
                    beforeSend:()=>{
                        $('#overlay').removeClass('d-none');
                    },
                    success:(data)=>{
                        if(data.status=='Success')
                        {
                            Swal.fire({
                                text: data.response,
                                type: 'success',
                            })

                            get_card_details();

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
});

$('#save_contact_person_info_btn').click(()=>{
    $.ajax({
        url:"{{url('/save_contact_person_info')}}",
        method:"POST",
        data:new FormData($('#contact_person_info_form')[0]),
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
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }

                if(data.errors.name!=undefined)
                {
                    toastr.error(data.errors.name[0]);
                }
            }

            if(data.status=='Success')
            {
                Swal.fire({
                    type: 'success',
                    text: data.response
                });
            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }
            
            get_card_details();
        },
        complete:(data)=>{
            $('#overlay').addClass('d-none');
        }
    });
});

$('#save_company_info_btn_top,#save_company_info_btn_bottom').click(()=>{
    $.ajax({
        url:"{{url('/save_company_info')}}",
        method:"POST",
        data:new FormData($('#company_info_form')[0]),
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
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }

                if(data.errors.company_name!=undefined)
                {
                    toastr.error(data.errors.company_name[0]);
                }

                if(data.errors.expiry_on!=undefined)
                {
                    toastr.error(data.errors.expiry_on[0]);
                }
            }

            if(data.status=='Success')
            {
                Swal.fire({
                    type: 'success',
                    text: data.response
                });

                $('#service_no').val(1);
                $('#gst_no').val(1);
                $('#address_no').val(1);
            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }
            
            get_card_details();
        },
        complete:(data)=>{
            $('#overlay').addClass('d-none');
        }
    });
});

$('#bank_details_save_btn').click(()=>{
    $.ajax({
        url:"{{url('/save_bank_details')}}",
        method:"POST",
        data:new FormData($('#bank_details_form')[0]),
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
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }
            }

            if(data.status=='Success')
            {
                Swal.fire({
                    type: 'success',
                    text: data.response
                });

            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }

            get_card_details();
        },
        complete:(data)=>{
            $('#overlay').addClass('d-none');
        }
    });
});


$('#online_payments_save_btn').click(()=>{
    $.ajax({
        url:"{{url('/save_online_payments')}}",
        method:"POST",
        data:new FormData($('#online_payments_form')[0]),
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
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }
            }

            if(data.status=='Success')
            {
                Swal.fire({
                    type: 'success',
                    text: data.response
                });

            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }

            get_card_details();
        },
        complete:(data)=>{
            $('#overlay').addClass('d-none');
        }
    });
});

$('#shareable_links_save_btn').click(()=>{
    $.ajax({
        url:"{{url('/save_shareable_links')}}",
        method:"POST",
        data:new FormData($('#shareable_links_form')[0]),
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
                if(data.errors.id!=undefined)
                {
                    toastr.error(data.errors.id[0]);
                }
            }

            if(data.status=='Success')
            {
                Swal.fire({
                    type: 'success',
                    text: data.response
                });

            }
            else if(data.status=='Error')
            {
                Swal.fire({
                    type: 'error',
                    text: data.response
                });
            }

            get_card_details();
        },
        complete:(data)=>{
            $('#overlay').addClass('d-none');
        }
    });
});

get_card_details();

function get_card_details()
{
    var id = "{{$card_details->id}}";
    var user_id = "{{$card_details->user_id}}";

    $.ajax({
        url:"/get_user_card_details",
        method:"GET",
        data:{id:id,user_id:user_id},
        beforeSend:()=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{
            console.log(data);
            if(data.status=='Success')
            {
                $('.temp_rows').remove();

                var asset = "{{asset('sources/assets/images/user_card/company_logo/')}}";

                var logo = data.response.company_logo!=null ? data.response.company_logo : 'nologo.png' ;

                $('#dp').attr('src',asset+'/'+logo);

                var profile_asset = "{{asset('sources/assets/images/user_card/contact_profile_pic/')}}";

                var profile_pic = data.response.contact_profile_pic!=null ? data.response.contact_profile_pic : 'nologo.png' ;

                $('#profile_dp').attr('src',profile_asset+'/'+profile_pic);

                // alert(data.response.slug);
                if(data.response.slug!=null)
                {
                    $('#slug').html("{{asset('/')}}"+data.response.slug);
                    // var slug = "{{url('/')}}/"+data.response.slug;

                    // var qr_code = "";

                    // $('#qr_code').html('<a href="data:image/png;base64, '+data.response.qr_code+'" download><img alt="" src="data:image/png;base64, '+data.response.qr_code+'" ></a>');
                    // console.log('hello');
                    
                    // console.log(data.response.qr_code);
                    
                    $('#qr_code').html(data.qr_code);

                    $('#qr_code_head').removeClass('d-none');
                }
                else
                {
                    $('#qr_code_head').addClass('d-none');
                    $('#slug').html("{{url('/')}}/-");
                }

                $('#expiry_on').val(data.response.expiry_on);
                $('#logo_shape').val(data.response.logo_shape);
                $('#name').val(data.response.contact_person_name);
                $('#designation').val(data.response.contact_person_designation);
                $('#phone').val(data.response.contact_person_phone);
                $('#whatsapp_no').val(data.response.contact_person_whatsapp_no);

                $('#primary_color').val(data.response.primary_color);

                jscolor.installByClassName("jscolor");

                $('#company_name').val(data.response.company_name);
                $('#tag_line').val(data.response.tag_line);
                $('#company_phone').val(data.response.company_phone);
                $('#company_whatsapp_no').val(data.response.company_whatsapp_no);
                $('#company_email').val(data.response.company_email);
                $('#company_website').val(data.response.company_website);
                $('#about_company').val(data.response.company_about);
                $('#company_offer').val(data.response.company_offer);

                $('#bank_no').val(1);
                $('#service_no').val(1);
                $('#client_no').val(1);
                $('#gst_no').val(1);
                $('#address_no').val(1);

                var services_length = data.company_services.length;

                if(data.company_services.length)
                {
                    var sno = 1;
                    data.company_services.forEach(service => {
                        
                        $('#service_'+sno).val(service.service);

                        if(services_length!=1)
                        {
                            add_service();

                            services_length--;
                        }
                        
                        sno++;
                    });
                }

                var clients_length = data.company_clients.length;

                if(data.company_clients.length)
                {
                    var sno = 1;
                    data.company_clients.forEach(client => {
                        
                        $('#client_'+sno).val(client.client_name);

                        if(clients_length!=1)
                        {
                            add_client();

                            clients_length--;
                        }
                        
                        sno++;
                    });
                }

                var company_address_length = data.company_addresses.length;

                if(data.company_addresses.length)
                {
                    var sno = 1;
                    data.company_addresses.forEach(address => {
                        
                        $('#branch_name_'+sno).val(address.branch_name);
                        $('#company_address_'+sno).val(address.company_address);
                        $('#map_link_'+sno).val(address.map_link);

                        if(company_address_length!=1)
                        {
                            add_address();

                            company_address_length--;
                        }
                        
                        sno++;
                    });
                }

                var gst_nos_length = data.company_gst_nos.length;
                if(data.company_gst_nos.length)
                {
                    var sno = 1;
                    data.company_gst_nos.forEach(gst => {
                        
                        $('#company_gst_company_name_'+sno).val(gst.company_name);
                        $('#company_gst_no_'+sno).val(gst.gst_no);

                        if(gst_nos_length!=1)
                        {
                            add_gst();

                            gst_nos_length--;
                        }
                        
                        sno++;
                    });

                }

                var bank_details_length = data.bank_details.length;
                if(data.bank_details.length)
                {
                    var sno = 1;
                    data.bank_details.forEach(bank => {
                        
                        $('#bank_name_'+sno).val(bank.bank_name);
                        $('#full_name_'+sno).val(bank.name);
                        $('#bank_account_no_'+sno).val(bank.account_no);
                        $('#bank_ifsc_'+sno).val(bank.ifsc);
                        $('#bank_branch_'+sno).val(bank.branch);

                        if(bank_details_length!=1)
                        {
                            add_bank();

                            bank_details_length--;
                        }
                        
                        sno++;
                    });
                }

                if(data.online_payments.length)
                {
                    data.online_payments.forEach(payment => {
                        if(payment.payment_type=='paytm')
                        {
                            $('#online_paytm').val(payment.phone);
                        }                        
                        else if(payment.payment_type=='phonepe')
                        {
                            $('#online_phonepe').val(payment.phone);
                        }
                        else if(payment.payment_type=='googlepay')
                        {
                            $('#online_googlepay').val(payment.phone);
                        }
                        else if(payment.payment_type=='upi')
                        {
                            $('#online_upi_link').val(payment.link);
                        }
                        else if(payment.payment_type=='paypal')
                        {
                            $('#online_paypal_link').val(payment.link);
                        }
                    });
                }

                $('#others_no').val(1);

                if(data.shareable_links.length)
                {
                    var sno = 1;
    
                    data.shareable_links.forEach(link => {

                        if(link.type=='social')
                        {
                            if(link.name=='facebook')
                            {
                                $('#facebook_link').val(link.link);
                            }                        
                            else if(link.name=='twitter')
                            {
                                $('#twitter_link').val(link.link);
                            }
                            else if(link.name=='youtube')
                            {
                                $('#youtube_link').val(link.link);
                            }
                            else if(link.name=='linkedin')
                            {
                                $('#linkedin_link').val(link.link);
                            }
                            else if(link.name=='googleplus')
                            {
                                $('#googleplus_link').val(link.link);
                            }
                            else if(link.name=='instagram')
                            {
                                $('#instagram_link').val(link.link);
                            }
                        }
                        else if(link.type=='business')
                        {
                            $('#other_name_'+sno).val(link.name);
                            $('#other_link_'+sno).val(link.link);

                            add_other_link();

                            sno++;
                        }
                    });

                    remove_other_link(sno);
                }

                if(data.video_links.length)
                {
                    $('#attach_videos').html('');

                    var video_no = 1;


                    var item = '';
                    data.video_links.forEach(link => {

                        // if(video_no==1)
                        // {
                        //     item = item.concat('<div class="col-md-12">');
                        // }

                        item = item.concat('<div class="col-md-4">');
                        item = item.concat('<div class="video" style="margin-top:20px;">');
                        item = item.concat('<iframe src="'+link.link+'" style="max-width:300px;"  allowfullscreen></iframe><br>');
                        item = item.concat('<center><span class="edit" onclick="edit_video(\''+link.id+'\')"><i class="fa fa-pencil"></i></span><span class="delete" onclick="delete_video(\''+link.id+'\')"><i class="fa fa-trash"></i></span></center>');
                        item = item.concat('</div>');
                        item = item.concat('</div>');

                        // if(video_no==3)
                        // {
                        //     item = item.concat('</div>');

                        //     video_no = 0;
                        // }

                        // video_no++;

                    });
                    item = item.concat('');

                    $('#attach_videos').append(item);
                }
                else
                {
                    $('#attach_videos').html('<p style="margin-left:20px;"><i>No Videos</i></p>');
                }

                if(data.gallery_images.length)
                {
                    $('#attach_images').html('');

                    var item = '';
                    data.gallery_images.forEach(image => {

                        var asset = "{{asset('sources/assets/images/user_card/company_gallery_images/')}}";

                        item = item.concat('<div class="col-md-4">');
                        item = item.concat('<div class="video" style="margin-top:20px;">');
                        item = item.concat('<img src="'+asset+'/'+image.image+'"  class="img img-responsive" style="max-height:200px;max-width:200px;" />');
                        item = item.concat('<p style="text-align:center;">'+image.title+'</p>');
                        item = item.concat('<center><span class="edit" onclick="edit_image(\''+image.id+'\')"><i class="fa fa-pencil"></i></span><span class="delete" onclick="delete_image(\''+image.id+'\')"><i class="fa fa-trash"></i></span></center>');
                        item = item.concat('</div>');
                        item = item.concat('</div>');

                    });
                    item = item.concat('');

                    $('#attach_images').append(item);
                }
                else
                {
                    $('#attach_images').html('<p style="margin-left:20px;"><i>No Images</i></p>');
                }

                if(data.company_attachments.length)
                {
                    $('#attach_downloadable_content').html('');

                    var item = '';
                    data.company_attachments.forEach(attachment => {

                        var asset = "{{asset('sources/assets/user_files/company_attachments/')}}";

                        item = item.concat('<div class="col-md-4">');
                        item = item.concat('<div class="video" style="margin-top:20px;width:100%;">');
                        item = item.concat('<div class="card"><a target="_blank" href="'+asset+'/'+attachment.brochure+'">');
                        item = item.concat('<div class="card-block">');
                        item = item.concat('<h6 class="text-center" style="color:black;">'+attachment.title+'</h6>');
                        item = item.concat('<center><small style="color:black;">'+ucwords(attachment.type)+'</small></center>');
                        item = item.concat('</div>');
                        item = item.concat('</a></div>');
                        item = item.concat('<center><span class="edit" onclick="edit_attachment(\''+attachment.id+'\')"><i class="fa fa-pencil"></i></span><span class="delete" onclick="delete_attachment(\''+attachment.id+'\')"><i class="fa fa-trash"></i></span></center>');
                        item = item.concat('</div>');
                        item = item.concat('</div>');

                    });
                    item = item.concat('');

                    $('#attach_downloadable_content').append(item);
                }
                else
                {
                    $('#attach_downloadable_content').html('<p style="margin-left:20px;"><i>No Downloadable Content</i></p>');
                }

                if(data.company_products.length)
                {
                    $('#attach_products').html('');

                    var item = '';
                    data.company_products.forEach(product => {

                        var description = (product.description!=null)?product.description.substring(0, 20)+'...':'';
                        var price = (product.price!=null)?'Rs: '+product.price:'';
                        var payment_link = (product.payment_link!=null)?'<a href="'+product.payment_link+'">'+product.payment_link.substring(0, 20)+'...</a>':'';
                        var phone = (product.phone!=null)?product.phone:'';
                        var whatsapp = (product.whatsapp!=null)?product.whatsapp:'';

                        var asset = "{{asset('sources/assets/images/user_card/company_product_images/')}}";

                        item = item.concat('<div class="col-md-4">');
                        item = item.concat('<div class="video card" style="padding:12px;">');
                        item = item.concat('<img src="'+asset+'/'+product.image+'"  class="img img-responsive" style="max-height:200px;max-width:200px;" />');
                        item = item.concat('<hr>');
                        item = item.concat('<ul style="list-style-type:none;padding-left:0px;margin-bottom:15px;">');
                        item = item.concat('<li><b>Name:</b> '+product.name+'</li>');
                        item = item.concat('<li><b>Description:</b> '+description+'</li>');
                        item = item.concat('<li><b>Price:</b> '+price+'</li>');
                        item = item.concat('<li><b>Purchase Link:</b> '+payment_link+'</li>');
                        item = item.concat('<li><b>Phone:</b> '+phone+'</li>');
                        item = item.concat('<li><b>Whatsapp:</b> '+whatsapp+'</li>');
                        item = item.concat('</ul>');
                        item = item.concat('<center><span class="edit" onclick="edit_product(\''+product.id+'\')"><i class="fa fa-pencil"></i></span><span class="delete" onclick="delete_product(\''+product.id+'\')"><i class="fa fa-trash"></i></span></center>');
                        item = item.concat('</div>');
                        item = item.concat('</div>');

                    });
                    item = item.concat('');

                    $('#attach_products').append(item);
                }
                else
                {
                    $('#attach_products').html('<p style="margin-left:20px;"><i>No Products</i></p>');
                }

            }
            else if(data.status=='Error')
            {
                Swal.fire({
                        type: 'error',
                        title: data.response
                    });
            }
        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
}

function edit_video(id)
{
    $.ajax({
        url:"{{url('/get_video_link')}}",
        method:"GET",
        data:{id:id},
        beforeSend:()=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{
            if(data.status=='Success')
            {
                $('#add_videos_form_head').html('Update Youtube Video Link');

                $('#add-video-submit').addClass('d-none');
                $('#update-video-submit').removeClass('d-none');

                $('#videos_form')[0].reset();
                $('#video_id').val(id);
                $('#video').val(data.response.link);

                $('#add-videos').click();
            }
        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
}

function edit_image(id)
{
    $.ajax({
        url:"{{url('/get_gallery_image')}}",
        method:"GET",
        data:{id:id},
        beforeSend:()=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{
            if(data.status=='Success')
            {
                $('#add_images_form_head').html('Update Gallery Image');

                $('#add-image-submit').addClass('d-none');
                $('#update-image-submit').removeClass('d-none');
                $('#images_form')[0].reset();
                $('#image_id').val(data.response.id);
                $('#title').val(data.response.title);

                $('#add-images').click();
            }
        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
}

function edit_attachment(id)
{
    $.ajax({
        url:"{{url('/get_dc')}}",
        method:"GET",
        data:{id:id},
        beforeSend:()=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{
            if(data.status=='Success')
            {
                $('#add_dc_form_head').html('Update Downloadable Content');

                $('#add-dc-submit').addClass('d-none');
                $('#update-dc-submit').removeClass('d-none');
                $('#dc_form')[0].reset();
                $('#dc_id').val(data.response.id);
                $('#dc_type').val(data.response.type);
                $('#dc_title').val(data.response.title);

                $('#add-dc').click();
            }
        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
}

function edit_product(id)
{
    $.ajax({
        url:"{{url('/get_product')}}",
        method:"GET",
        data:{id:id},
        beforeSend:()=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{
            if(data.status=='Success')
            {
                $('#add_products_form_head').html('Update Product');

                $('#add-product-submit').addClass('d-none');
                $('#update-product-submit').removeClass('d-none');

                $('#products_form')[0].reset();
                $('#product_id').val(id);
                $('#product_name').val(data.response.name);
                $('#product_description').val(data.response.description);
                $('#product_price').val(data.response.price);
                $('#product_payment_link').val(data.response.payment_link);
                $('#product_phone').val(data.response.phone);
                $('#product_whatsapp').val(data.response.whatsapp);

                $('#add-products').click();
            }
        },
        complete:()=>{
            $('#overlay').addClass('d-none');
        }
    });
}

function delete_video(id)
{
    if(confirm('Are you sure ? you want to delete the video'))
    {
        $.ajax({
            url:"{{url('/delete_video')}}",
            method:"POST",
            data:{id:id},
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success:(data)=>{
                if(data.status=='Success')
                {
                    Swal.fire({
                        type: 'success',
                        title: data.response
                    });

                    get_card_details();
                }
                else if(data.status=='Warning')
                {
                    Swal.fire({
                        type: 'warning',
                        title: data.response
                    });
                }
                else if(data.status=='Error')
                {
                    Swal.fire({
                        type: 'error',
                        title: data.response
                    });
                }
            },
            complete:(data)=>{
                $('#overlay').addClass('d-none');
            }
        });
    }
}

function delete_image(id)
{
    if(confirm('Are you sure ? you want to delete the image'))
    {
        $.ajax({
            url:"{{url('/delete_gallery_image')}}",
            method:"POST",
            data:{id:id},
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success:(data)=>{
                if(data.status=='Success')
                {
                    Swal.fire({
                        type: 'success',
                        title: data.response
                    });

                    get_card_details();
                }
                else if(data.status=='Warning')
                {
                    Swal.fire({
                        type: 'warning',
                        title: data.response
                    });
                }
                else if(data.status=='Error')
                {
                    Swal.fire({
                        type: 'error',
                        title: data.response
                    });
                }
            },
            complete:(data)=>{
                $('#overlay').addClass('d-none');
            }
        });
    }
}

function delete_attachment(id)
{
    if(confirm('Are you sure ? you want to delete the attachment'))
    {
        $.ajax({
            url:"{{url('/delete_dc')}}",
            method:"POST",
            data:{id:id},
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success:(data)=>{
                if(data.status=='Success')
                {
                    Swal.fire({
                        type: 'success',
                        title: data.response
                    });

                    get_card_details();
                }
                else if(data.status=='Warning')
                {
                    Swal.fire({
                        type: 'warning',
                        title: data.response
                    });
                }
                else if(data.status=='Error')
                {
                    Swal.fire({
                        type: 'error',
                        title: data.response
                    });
                }
            },
            complete:(data)=>{
                $('#overlay').addClass('d-none');
            }
        });
    }
}

function delete_product(id)
{
    if(confirm('Are you sure ? you want to delete the product'))
    {
        $.ajax({
            url:"{{url('/delete_product')}}",
            method:"POST",
            data:{id:id},
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success:(data)=>{
                if(data.status=='Success')
                {
                    Swal.fire({
                        type: 'success',
                        title: data.response
                    });

                    get_card_details();
                }
                else if(data.status=='Warning')
                {
                    Swal.fire({
                        type: 'warning',
                        title: data.response
                    });
                }
                else if(data.status=='Error')
                {
                    Swal.fire({
                        type: 'error',
                        title: data.response
                    });
                }
            },
            complete:(data)=>{
                $('#overlay').addClass('d-none');
            }
        });
    }
}


var messages_table = $('#messages_table').DataTable({

    processing: true,
    stateSave: true,
    serverSide: true,
    ajax: {
        url: "{{url('/get_all_user_card_messages')}}",
        dataType: "json",
        type: "POST",
        data:{ _token: "{{csrf_token()}}",card_id:"{{$card_details->id}}",user_id:"{{$card_details->user_id}}"}
    },
    columns: [
        
        {data: 'sno'},

        {data: 'name'},

        {data: 'email'},

        {data: 'phone'},

        {data: 'message'},

        {data: 'date_time'},

        {data: 'action', orderable: false, searchable: false},

    ]

});

function delete_message(message_id)
{
    if(confirm('Are you sure ? you want to delete the message'))
    {
        $.ajax({
            url:"{{url('/delete_card_message')}}",
            method:"POST",
            data:{id:message_id},
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success:(data)=>{
                if(data.status=='Success')
                {
                    Swal.fire({
                        type: 'success',
                        title: data.response
                    });

                    messages_table.draw(false);
                }
                else if(data.status=='Warning')
                {
                    Swal.fire({
                        type: 'warning',
                        title: data.response
                    });
                }
                else if(data.status=='Error')
                {
                    Swal.fire({
                        type: 'error',
                        title: data.response
                    });
                }
            },
            complete:(data)=>{
                $('#overlay').addClass('d-none');
            }
        });
    }
}



</script>

    
@stop