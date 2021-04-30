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
                                <a href="#" style="color:white;"><i class="icofont icofont-ui-v-card bg-c-pink"></i></a>
                                <div class="d-inline">
                                    <h4>{{ucfirst($card->card_type)}} Card</h4>
                                    <span style="text-transform:none;">You can manage your card and enquiry messages!</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        <a href="{{url('/')}}/{{auth()->user()->account_type}}/preview/{{$card->id}}" target="_blank" class="btn btn-sm btn-primary float-right">Preview Card</a>
                        <br><br>
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="{{url('/')}}/{{auth()->user()->account_type}}/dashboard">
                                            <i class="icofont icofont-dashboard-web"></i>
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
                                            <input type="text" name="id" class="d-none" value="{{$card->id}}" readonly>
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
                                                <input type="tel" name="phone" id="contact_person_phone_no" class="form-control" placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">WhatsApp No</label>
                                            <div class="col-sm-9">
                                                <input type="tel" name="whatsapp_no" id="contact_person_whatsapp_no" class="form-control" placeholder="WhatsApp No">
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
                                                                <input type="text" name="id" class="d-none" value="{{$card->id}}" readonly>
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
                                                                <h6 style="font-size:1rem;margin-top:8px;" id="slug"></h6><button type="button" class="btn btn-primary btn-sm" style="margin-left:30px;" id="copy_btn" onclick="copyToClipboard('#slug')">Copy Card URL</button>
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
                                                        <input type="text" name="id" class="d-none" value="{{$card->id}}" readonly>
                                                             
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Primary Color</label>
                                                                <div class="col-sm-10">
                                                                    <small>Note: Please select your theme color by clicking here</small>
                                                                    <input type="text" name="primary_color" id="primary_color" class="form-control jscolor">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2">Template</label>
                                                                <div class="col-sm-10">
                                                                    <select name="template" id="template">
                                                                        <option value="1">Template 1</option>
                                                                        <!-- <option value="2">Template 2</option> -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2">Logo Shape</label>
                                                                <div class="col-sm-10">
                                                                    <select name="logo_shape" id="logo_shape">
                                                                        <option value="round">Round</option>
                                                                        <option value="square">Square</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2">SMS</label>
                                                                <div class="col-sm-10">
                                                                    <select name="sms" id="sms">
                                                                        <option value="enable">Enable</option>
                                                                        <option value="disable">Disable</option>
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
                                                                    <input type="tel" name="company_phone" id="company_phone_no" class="form-control" placeholder="Company Phone">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Whatsapp No</label>
                                                                <div class="col-sm-10">
                                                                    <input type="tel" name="company_whatsapp_no" id="company_whatsapp_no" class="form-control" placeholder="Company Whatsapp No">
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
                                                            <hr>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Services/Products</label>
                                                                <input type="number" class="d-none" value="1" id="service_no" readonly/>
                                                                <div class="col-sm-10">
                                                                    <div id="attach_services">
                                                                        <div class="row">
                                                                            <div class="col-sm-10">
                                                                                <input type="text" name="services[]" id="service_1" class="form-control" placeholder="Add Service/Product" />
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
                                                                            <div class="col-sm-6">
                                                                                <input type="text" name="company_gst_company_name[]" id="company_gst_company_name_1" class="form-control" placeholder="Company Name (Optional)">
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <input type="text" name="company_gst_no[]" id="company_gst_no_1" class="form-control" placeholder="Company GST No">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Address</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="company_address[]" id="company_address_1" class="form-control" placeholder="Company Address">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Location Map Link</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="map_link[]" id="map_link_1" class="form-control" placeholder="Location Map Link">
                                                                </div>
                                                            </div> -->
                                                            <hr>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Address & Map Location</label>
                                                                <input type="number" class="d-none" value="1" id="address_no" readonly/>

                                                                <div class="col-sm-10">
                                                                    <div id="attach_address_map">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <input type="text" name="branch_name[]" id="branch_name_1" class="form-control" maxlength="150" placeholder="Branch Name (Optional)">
                                                                                <br>
                                                                                <input type="text" name="company_address[]" id="company_address_1" class="form-control" placeholder="Company Address">
                                                                                <br>
                                                                                <input type="text" name="map_link[]" id="map_link_1" class="form-control" placeholder="Location Map Link">
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
                                    <div class="tab-pane inner_tabs_open d-none" id="payment_options_open" role="tabpanel">

                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Online Payment Options or Wallets</h5>
                                                <button type="button" class="btn btn-primary f-right" style="margin-top:-10px;" id="online_payments_save_btn">Save Changes</button>
                                                <hr style="margin-bottom:0px;">
                                            </div>
                                            <div class="card-block">
                                                <form id="online_payments_form">
                                                    <input type="text" name="id" class="d-none" value="{{$card->id}}" readonly>
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
                                                    <input type="text" name="id" class="d-none" value="{{$card->id}}" readonly>
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

@endsection

@section('page-css')
<link rel="stylesheet" href="{{asset('/web_sources/tele/build/css/intlTelInput.css')}}">
<style>
    .iti {
        width: 100%;
    }
</style>
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
    width: calc(100% / 4) !important;
}

.card .card-block ul
{
    list-style-type:disc;
    padding-left:30px;
}

</style>
@stop

@section('page-scripts')
<script src="{{asset('/web_sources/tele/build/js/intlTelInput.js')}}"></script>
<script>
    var contact_person_phone_no = document.querySelector("#contact_person_phone_no");
    var contact_person_whatsapp_no = document.querySelector("#contact_person_whatsapp_no");
    var company_phone_no = document.querySelector("#company_phone_no");
    var company_whatsapp_no = document.querySelector("#company_whatsapp_no");
                    
    var contact_person_phone_no_iti = window.intlTelInput(contact_person_phone_no, {
            allowDropdown: true,
            autoHideDialCode: false,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                // $('#country_code').val(selectedCountryData['iso2']);
                // $('#country_name').val(selectedCountryData['name']);
                // $('#dail_code').val(selectedCountryData['dialCode']);
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

    var contact_person_whatsapp_no_iti = window.intlTelInput(contact_person_whatsapp_no, {
            allowDropdown: true,
            autoHideDialCode: false,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                // $('#country_code').val(selectedCountryData['iso2']);
                // $('#country_name').val(selectedCountryData['name']);
                // $('#dail_code').val(selectedCountryData['dialCode']);
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

    var company_phone_no_iti = window.intlTelInput(company_phone_no, {
            allowDropdown: true,
            autoHideDialCode: false,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                // $('#country_code').val(selectedCountryData['iso2']);
                // $('#country_name').val(selectedCountryData['name']);
                // $('#dail_code').val(selectedCountryData['dialCode']);
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

    var company_whatsapp_no_iti = window.intlTelInput(company_whatsapp_no, {
            allowDropdown: true,
            autoHideDialCode: false,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                // $('#country_code').val(selectedCountryData['iso2']);
                // $('#country_name').val(selectedCountryData['name']);
                // $('#dail_code').val(selectedCountryData['dialCode']);
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


$('.inner_tabs').click(function(){
    var id = this.id;

    $('.inner_tabs').removeClass('active');
    $('#'+id).addClass('active');

    $('.inner_tabs_open').removeClass('active');
    $('.inner_tabs_open').addClass('d-none');
    $('#'+id+'_open').removeClass('d-none');
    $('#'+id+'_open').addClass('active');
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
    item = item.concat('<input type="text" name="services[]" id="service_'+service_no+'" class="form-control" placeholder="Add Service/Product" />');
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
            url: "{{url('/')}}/{{auth()->user()->account_type}}/change_user_card_company_logo",
            method: "POST",
            data: {"id":"{{$card->id}}","image":resp},
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
            url: "{{url('/')}}/{{auth()->user()->account_type}}/change_user_card_profile_dp",
            method: "POST",
            data: {"id":"{{$card->id}}","image":resp},
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
                    url:"{{url('/')}}/{{auth()->user()->account_type}}/delete_user_card_company_logo",
                    method:"POST",
                    data:{id:"{{$card->id}}"},
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
                    url:"{{url('/')}}/{{auth()->user()->account_type}}/delete_user_card_profile_dp",
                    method:"POST",
                    data:{id:"{{$card->id}}"},
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

    var name = $('#name').val();
    var designation = $('#designation').val();
    var phone_no = '';
    var whatsapp_no = '';

    if($('#contact_person_phone_no').val().trim()!='')
    {
        if (!contact_person_phone_no_iti.isValidNumber()) {
            toastr.error('Invalid Phone No!');

            return;
        }
        else if(contact_person_phone_no_iti.getNumberType() !== intlTelInputUtils.numberType.MOBILE) {
            toastr.error('Invalid Phone No!');

            return;

        }

        phone_no = contact_person_phone_no_iti.getNumber();
    }

    if($('#contact_person_whatsapp_no').val().trim()!='')
    {
        if (!contact_person_whatsapp_no_iti.isValidNumber()) {
            toastr.error('Invalid Whatsapp No!');

            return;
        }
        else if (contact_person_whatsapp_no_iti.getNumberType() !== intlTelInputUtils.numberType.MOBILE) {
            toastr.error('Invalid Whatsapp No!');

            return;
        }

        whatsapp_no = contact_person_whatsapp_no_iti.getNumber();
    }

    $.ajax({
        url:"{{url('/')}}/{{auth()->user()->account_type}}/save_contact_person_info",
        method:"POST",
        // data:new FormData($('#contact_person_info_form')[0]),
        data:{
            id:"{{$card->id}}",
            name:name,
            designation:designation,
            phone_no:phone_no,
            whatsapp_no:whatsapp_no
        },
        // dataType:'JSON',
        // contentType: false,
        // cache: false,
        // processData: false,
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

    var phone_no = '';
    var whatsapp_no = '';

    if($('#company_phone_no').val().trim()!='')
    {
        if (!company_phone_no_iti.isValidNumber()) {
            toastr.error('Invalid Company Phone No!');

            return;
        }
        else if(company_phone_no_iti.getNumberType() !== intlTelInputUtils.numberType.MOBILE) {
            toastr.error('Invalid Company Phone No!');

            return;

        }

        phone_no = company_phone_no_iti.getNumber();
    }

    if($('#company_whatsapp_no').val().trim()!='')
    {
        if (!company_whatsapp_no_iti.isValidNumber()) {
            toastr.error('Invalid Company Whatsapp No!');

            return;
        }
        else if (company_whatsapp_no_iti.getNumberType() !== intlTelInputUtils.numberType.MOBILE) {
            toastr.error('Invalid Company Whatsapp No!');

            return;
        }

        whatsapp_no = company_whatsapp_no_iti.getNumber();
    }

    var formData = new FormData($('#company_info_form')[0]);
	formData.append('company_phone_no', phone_no);
    formData.append('company_whatsapp_no', whatsapp_no);

    $.ajax({
        url:"{{url('/')}}/{{auth()->user()->account_type}}/save_company_info",
        method:"POST",
        // data:new FormData($('#company_info_form')[0]),
        data:formData,
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
            }

            if(data.status=='Success')
            {
                Swal.fire({
                    type: 'success',
                    text: data.response
                });

                $('#service_no').val(1);
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
        url:"{{url('/')}}/{{auth()->user()->account_type}}/save_online_payments",
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
        url:"{{url('/')}}/{{auth()->user()->account_type}}/save_shareable_links",
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
    var id = "{{$card->id}}";

    $.ajax({
        url:"{{url('/')}}/{{auth()->user()->account_type}}/get_single_card_details",
        method:"GET",
        data:{id:id},
        beforeSend:()=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{
            console.log(data);
            if(data.status=='Success')
            {
                var card_details = data.response.card_details;
                var card_services = data.response.card_services;
                var card_clients = data.response.card_clients;
                var card_gst_nos = data.response.card_gst_nos;
                var card_addresses = data.response.card_addresses;
                var online_payments = data.response.online_payments;
                var shareable_links = data.response.shareable_links;

                $('.temp_rows').remove();

                var asset = "{{asset('sources/assets/images/user_card/company_logo/')}}";

                var logo = card_details.company_logo!=null ? card_details.company_logo : 'nologo.png' ;

                $('#dp').attr('src',asset+'/'+logo);

                var profile_asset = "{{asset('sources/assets/images/user_card/contact_profile_pic/')}}";

                var profile_pic = card_details.contact_profile_pic!=null ? card_details.contact_profile_pic : 'nologo.png' ;

                $('#profile_dp').attr('src',profile_asset+'/'+profile_pic);

                // alert(data.response.slug);
                if(card_details.slug!=null)
                {
                    $('#slug').html("{{url('/')}}/"+card_details.slug);
                    // var slug = "{{url('/')}}/"+data.response.slug;

                    // var qr_code = "";

                    // $('#qr_code').html('<a href="data:image/png;base64, '+data.response.qr_code+'" download><img alt="" src="data:image/png;base64, '+data.response.qr_code+'" ></a>');
                    // console.log('hello');
                    
                    // console.log(data.response.qr_code);
                    
                    $('#qr_code').html(data.response.qr_code);

                    $('#qr_code_head').removeClass('d-none');
                }
                else
                {
                    $('#qr_code_head').addClass('d-none');
                    $('#slug').html("{{url('/')}}/-");
                }

                $('#template').val(card_details.template);
                $('#logo_shape').val(card_details.logo_shape);
                $('#sms').val(card_details.sms);
                $('#name').val(card_details.contact_person_name);
                $('#designation').val(card_details.contact_person_designation);

                if(card_details.contact_person_phone!=null)
                {
                    contact_person_phone_no_iti.setNumber(card_details.contact_person_phone);
                }

                if(card_details.contact_person_whatsapp_no!=null)
                {
                    contact_person_whatsapp_no_iti.setNumber(card_details.contact_person_whatsapp_no);
                }

                $('#primary_color').val(card_details.primary_color);

                jscolor.installByClassName("jscolor");

                $('#company_name').val(card_details.company_name);

                if(card_details.company_phone!=null)
                {
                    company_phone_no_iti.setNumber(card_details.company_phone);
                }

                if(card_details.company_whatsapp_no!=null)
                {
                    company_whatsapp_no_iti.setNumber(card_details.company_whatsapp_no);
                }

                $('#company_email').val(card_details.company_email);
                $('#company_website').val(card_details.company_website);
                $('#about_company').val(card_details.company_about);
                $('#tag_line').val(card_details.tag_line);

                $('#service_no').val(1);
                $('#client_no').val(1);
                $('#gst_no').val(1);
                $('#address_no').val(1);

                var services_length = card_services.length;
                if(card_services.length)
                {
                    var sno = 1;
                    card_services.forEach(service => {
                        $('#service_'+sno).val(service.service);
                        if(services_length!=1)
                        {
                            add_service();

                            services_length--;
                        }
                        
                        sno++;
                    });
                }

                var clients_length = card_clients.length;

                if(card_clients.length)
                {
                    var sno = 1;
                    card_clients.forEach(client => {
                        
                        $('#client_'+sno).val(client.client_name);

                        if(clients_length!=1)
                        {
                            add_client();

                            clients_length--;
                        }
                        
                        sno++;
                    });
                }

                if(card_addresses.length)
                {
                    card_addresses.forEach(address => {
                        $('#branch_name_1').val(address.branch_name);
                        $('#company_address_1').val(address.company_address);
                        $('#map_link_1').val(address.map_link);
                    });
                }

                if(card_gst_nos.length)
                {
                    card_gst_nos.forEach(gst => {
                        $('#company_gst_company_name_1').val(gst.company_name);
                        $('#company_gst_no_1').val(gst.gst_no);
                    });
                }

                // if(data.bank_details.length)
                // {
                //     data.bank_details.forEach(bank => {
                //         $('#bank_name_1').val(bank.name);
                //         $('#bank_account_no_1').val(bank.account_no);
                //         $('#bank_ifsc_1').val(bank.ifsc);
                //         $('#bank_branch_1').val(bank.branch);
                //     });
                // }

                if(online_payments.length)
                {
                    online_payments.forEach(payment => {
                        if(payment.payment_type=='paytm')
                        {
                            $('#online_paytm').val(payment.number);
                        }                        
                        else if(payment.payment_type=='phonepe')
                        {
                            $('#online_phonepe').val(payment.number);
                        }
                        else if(payment.payment_type=='googlepay')
                        {
                            $('#online_googlepay').val(payment.number);
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

                if(shareable_links.length)
                {
                    var sno = 1;
    
                    shareable_links.forEach(link => {

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
                        else
                        {
                            $('#other_name_'+sno).val(link.name);
                            $('#other_link_'+sno).val(link.link);

                            add_other_link();

                            sno++;
                        }
                    });

                    remove_other_link(sno);
                }

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
}

var messages_table = $('#messages_table').DataTable({

    processing: true,
    stateSave: true,
    serverSide: true,
    ajax: {
        url: "{{url('/')}}/{{auth()->user()->account_type}}/get_all_card_messages",
        dataType: "json",
        type: "POST",
        data:{ _token: "{{csrf_token()}}",card_id:"{{$card->id}}"}
    },
    columns: [
        
        {data: 'sno'},

        {data: 'name'},

        {data: 'email'},

        {data: 'phone'},

        {data: 'message'},

        {data: 'date_time', orderable: false, searchable: false},

        {data: 'action', orderable: false, searchable: false},

    ]

});

function delete_message(message_id)
{
    if(confirm('Are you sure ? you want to delete the message'))
    {
        $.ajax({
            url:"{{url('/')}}/{{auth()->user()->account_type}}/delete_card_message",
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
                        text: data.response
                    });

                    messages_table.draw(false);
                }
                else if(data.status=='Warning')
                {
                    Swal.fire({
                        type: 'warning',
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
            },
            complete:(data)=>{
                $('#overlay').addClass('d-none');
            }
        });
    }
}


</script>
    
@stop