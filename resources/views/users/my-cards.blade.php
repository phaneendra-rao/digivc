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
                                <i class="icofont icofont-id-card bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>All Cards</h4>
                                    <span style="text-transform:none;">You can view all the cards you created.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <!-- <a  href="#!" onclick="select_card()" class="btn btn-primary waves-effect" >Request Card <i class="icofont icofont-id-card"></i> </a> -->

                                <!-- <a  href="{{url('/create-card')}}" class="btn btn-primary waves-effect" id="create-card">Create Card <i class="icofont icofont-id-card"></i> </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <div class="page-body">
                    <div class="row" id="attach_cards">

                    </div>
                    <div class="row d-none" id="no_cards">
                        <div class="col-lg-12">
                            <div class="card rounded-card">
                                <div class="card-block">
                                    <h6>No records found!</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>

<button type="button" class="d-none" id="select-card-open" data-toggle="modal" data-target="#select-card-modal"></button>

<div class="modal fade" id="select-card-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Card</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn d-none btn-default waves-effect" id="add-card-close" data-dismiss="modal">Close</button>
                <button type="button" id="basic" class="btn btn-primary waves-effect waves-light">Basic card</button>
                <button type="button" id="premium" class="btn btn-primary waves-effect waves-light">Premium Card</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-css')
<style>
.delete_card
{
    height:30px;
    width:30px;
    border-radius:50%;
    background-color:red;
    color:white;
    float:right;
    cursor: pointer;
}

.delete_card .fa
{
    margin-left:9px;
    margin-top:8px;
}

.card_status
{
    margin-top:5px;
    font-size:1.4rem;
    cursor: pointer;
}

</style>
@stop

@section('page-scripts')
<script>
get_all_cards();

function get_all_cards()
{
    $.ajax({
        url:"{{url('/get_all_cards')}}",
        method:"GET",
        beforeSend:()=>{
            $('#overlay').removeClass('d-none');
        },
        success:(data)=>{
            if(data.status=='Success')
            {
                $('#no_cards').addClass('d-none');
                $('#attach_cards').html('');

                data.response.forEach(card => {
                    var item = '';

                    var logo_url = '{{asset("sources/assets/images/user_card/company_logo")}}';
                    var url = '{{url("/update-card")}}';

                    item = item.concat('<div class="col-lg-6 col-xl-3 col-md-6">');
                    item = item.concat('<a href="'+url+'/'+card.id+'">');
                    item = item.concat('<div class="card rounded-card user-card" style="margin-bottom:10px;">');
                    item = item.concat('<div class="card-block">');
                    item = item.concat('<div class="img-hover">');

                    if(card.company_logo!=null)
                    {
                        item = item.concat('<img class="img-fluid img-radius" src="'+logo_url+'/'+card.company_logo+'" alt="round-img">');
                    }
                    else
                    {
                        item = item.concat('<img class="img-fluid img-radius" src="'+logo_url+'/nologo.png" alt="round-img">');
                    }
                   
                    item = item.concat('</div>');
                    item = item.concat('<div class="user-content">');
                    if(card.company_name!=null)
                    {
                        item = item.concat('<h4 style="line-height:25px;">'+card.company_name+'</h4>');
                    }
                    else
                    {
                        item = item.concat('<h4 style="line-height:25px;"><i>Update Card</i></h4>');
                    }

                    item = item.concat('</div>');
                    item = item.concat('</div>');
                    item = item.concat('</div>');
                    item = item.concat('</a>');
                    item = item.concat('<div class="card">');
                    item = item.concat('<div class="card-block" style="padding:5px;">');


                    item = item.concat('<p style="text-align:center;margin-top:5px;margin-bottom:0px;">'+ucwords(card.card_type)+' Card</p>');
                    
                    item = item.concat('<center>');
                    if(card.expiry_on!=null)
                    {
                        if(card.status=='1')
                        {
                            item = item.concat('<i style="color:green;" onclick="change_card_status(\''+card.id+'\',\''+card.status+'\')" class="fa card_status fa-toggle-on"></i>');
                        }
                        else
                        {
                            item = item.concat('<i style="color:red;" onclick="change_card_status(\''+card.id+'\',\''+card.status+'\')" class="fa card_status fa-toggle-off"></i>');
                        }
                    }
                    item = item.concat('</center>');

                    if(card.expiry_on!=null)
                    {
                        item = item.concat('<p class="text-center"><small>Expiry on: '+card.expiry_on+'</small></p>');
                    }
                    item = item.concat('</div>');
                    item = item.concat('</div>');
                    
                    item = item.concat('</div>');

                    $('#attach_cards').append(item);
                });
            }
            else if(data.status=='Warning')
            {
                $('#attach_cards').html('');
                $('#no_cards').removeClass('d-none');
            }
        },
        complete:(data)=>{
            $('#overlay').addClass('d-none');
        }
    });
}

function change_card_status(id,status)
{
    var status_text = (status==1)?'Deactivate':'Activate';

    Swal.fire({
            text: 'Are you sure, you want to '+status_text+' the card ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d11a2a',
            confirmButtonText: status_text,
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:"{{url('/change_user_card_status')}}",
                    method:"POST",
                    data:{id:id,status:status},
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

                            get_all_cards();

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
}

// $('#basic').click(()=>{
//     $.ajax({
//         url:"{{url('/create-card')}}",
//         method:"POST",
//         data:{card_type:'basic'},
//         beforeSend:()=>{
//             $('#overlay').removeClass('d-none');
//         },
//         success:(data)=>{
//             if(data.status=='Success')
//             {
//                 $('#add-card-close').click();

//                 swal.fire({
//                     type:'success',
//                     text:data.response
//                 });

//                 setTimeout(() => {
//                     window.location.replace("{{url('/')}}/update-card/"+data.card_id);
//                 }, 1000);
//             }
//             else if(data.status=='Warning')
//             {
//                 $('#overlay').addClass('d-none');
//                 toastr.warning(data.response);
//             }
//             else if(data.status=='Error')
//             {
//                 $('#overlay').addClass('d-none');
//                 toastr.error(data.response);
//             }
//         },
//         complete:(data)=>{

//         }
//     });
// });

// $('#premium').click(()=>{
//     $.ajax({
//         url:"{{url('/create-card')}}",
//         method:"POST",
//         data:{card_type:'premium'},
//         beforeSend:()=>{
//             $('#overlay').removeClass('d-none');
//         },
//         success:(data)=>{
//             if(data.status=='Success')
//             {
//                 $('#add-card-close').click();
                
//                 swal.fire({
//                     type:'success',
//                     text:data.response
//                 });

//                 setTimeout(() => {
//                     window.location.replace("{{url('/')}}/update-card/"+data.card_id);
//                 }, 1000);
//             }
//             else if(data.status=='Warning')
//             {
//                 $('#overlay').addClass('d-none');
//                 toastr.warning(data.response);
//             }
//             else if(data.status=='Error')
//             {
//                 $('#overlay').addClass('d-none');
//                 toastr.error(data.response);
//             }
//         },
//         complete:(data)=>{

//         }
//     });
// });
</script>
@stop