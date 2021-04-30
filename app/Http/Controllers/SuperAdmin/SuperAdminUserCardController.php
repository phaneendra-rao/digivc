<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\SuperAdmin;
use App\User;
use App\Card;
use App\CompanyAddress;
use App\CompanyBankDetail;
use App\CompanyBrochure;
use App\CompanyClient;
use App\CompanyGalleryImage;
use App\CompanyGstNo;
use App\CompanyProduct;
use App\CompanyService;
use App\CompanyShareableLink;
use App\CompanyVideo;
use App\Enquiry;
use App\OnlinePayment;
use Carbon\Carbon;
use DataTables;
use Symfony\Component\HttpFoundation\Response;


class SuperAdminUserCardController extends Controller
{
    public function __construct()
    {
        \Session::put('url.intended',\Request::fullUrl());

        $this->middleware('auth:superadmin');

    }

    public function create_card(Request $request)
    {
        $user_id = $request['user_id'];
        $card_type = $request['card_type'];

        $user = User::where('id',$user_id)->get();

        if($card_type=='basic' && count($user)==1)
        {
            // $is_user_card_exists = Card::where('user_id',$user_id)->where('card_type',$card_type)->count();

            // if($is_user_card_exists<$user[0]->basic_card_limit)
            // {
            //     $create_card = Card::create([
            //         'user_id'=>$user[0]->id,
            //         'card_type'=>$card_type
            //     ]);
                
            //     $response = array(
            //         'status'=>'Success',
            //         'response'=>'Card Created Successfully!',
            //         'card_id'=>$create_card->id
            //     );
            // }
            // else
            // {
            //     $response = array(
            //         'status'=>'Warning',
            //         'response'=>'No limit to create a '.$card_type.' card!'
            //     );
            // }

            $create_card = Card::create([
                'user_id'=>$user[0]->id,
                'card_type'=>$card_type
            ]);
            
            $response = array(
                'status'=>'Success',
                'response'=>'Card Created Successfully!',
                'card_id'=>$create_card->id
            );
    
        }
        else if($card_type=='premium')
        {
            // $is_user_card_exists = Card::where('user_id',$user_id)->where('card_type',$card_type)->count();

            // if($is_user_card_exists<$user[0]->premium_card_limit)
            // {
            //     $create_card = Card::create([
            //         'user_id'=>$user[0]->id,
            //         'card_type'=>$card_type
            //     ]);
                
            //     $response = array(
            //         'status'=>'Success',
            //         'response'=>'Card Created Successfully!',
            //         'card_id'=>$create_card->id
            //     );
            // }
            // else
            // {
            //     $response = array(
            //         'status'=>'Warning',
            //         'response'=>'No limit to create a '.$card_type.' card!'
            //     );
            // }

            $create_card = Card::create([
                'user_id'=>$user[0]->id,
                'card_type'=>$card_type
            ]);
            
            $response = array(
                'status'=>'Success',
                'response'=>'Card Created Successfully!',
                'card_id'=>$create_card->id
            );
        }

        return response()->json($response);
    }

    public function update_card($user_id,$id)
    {
        $card_details = Card::where('id',$id)->where('user_id',$user_id)->firstorfail();

        if($card_details->card_type=='basic')
        {
            return view('superadmin_dashboard.basic-card-update-card',compact('card_details'));
        }
        else if($card_details->card_type=='premium')
        {
            $image = \QrCode::format('png')->merge('https://img.icons8.com/material/4ac144/256/user-male.png', .3, true)->generate(\Request::url());
            return view('superadmin_dashboard.premium-card-update-card',compact('card_details'));
        }

    }

    public function get_all_user_cards(Request $request)
    {
        $user_id = $request['user_id'];

        $columns = array( 
            0 =>'id', 
            1 =>'card_type',
            2 =>'company_name',
            3 =>'contact_person_name',
            4 => 'expiry_on',
            5 => 'status'
        );

        $totalData = Card::where('user_id',$user_id)->count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $cards = Card::where('user_id',$user_id)
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
        }
        else
        {
            $search = $request->input('search.value'); 

            $cards =  Card::where('user_id',$user_id)
                                ->where(function($query) use($search){
                                    $query->Where('id','LIKE',"%{$search}%")
                                    ->orWhere('card_type', 'LIKE',"%{$search}%")
                                    ->orWhere('company_name', 'LIKE',"%{$search}%")
                                    ->orWhere('contact_person_name', 'LIKE',"%{$search}%")
                                    ->orWhere('expiry_on', 'LIKE',"%{$search}%")
                                    ->orWhere('status', 'LIKE',"%{$search}%");
                                })
                                ->offset($start)
                                ->limit($limit)
                                ->orderBy($order,$dir)
                                ->get();

            $totalFiltered = Card::where('user_id',$user_id)
                                    ->where(function($query) use($search){
                                        $query->Where('id','LIKE',"%{$search}%")
                                        ->orWhere('card_type', 'LIKE',"%{$search}%")
                                        ->orWhere('company_name', 'LIKE',"%{$search}%")
                                        ->orWhere('contact_person_name', 'LIKE',"%{$search}%")
                                        ->orWhere('expiry_on', 'LIKE',"%{$search}%")
                                        ->orWhere('status', 'LIKE',"%{$search}%");
                                    })
                                    ->count();
        }

        $data = array();

        if(!empty($cards))
        {
            $sno = $start+1;

            foreach ($cards as $card)
            { 
                $nestedData['sno'] = $sno;

                if($card->card_type=='basic')
                {
                    $nestedData['card_type'] = 'Basic <br><button type="button" onclick="switch_card(\''.$card->id.'\',\''.$card->user_id.'\',\''.$card->card_type.'\')" class="btn btn-sm btn-primary">Switch to Premium</button>';
                }
                else if($card->card_type=='premium')
                {
                    $nestedData['card_type'] = 'Premium <br><button type="button" onclick="switch_card(\''.$card->id.'\',\''.$card->user_id.'\',\''.$card->card_type.'\')" class="btn btn-sm btn-primary">Switch to Basic</button>';
                }


                if($card->company_logo != null)
                {
                    $company_logo = $card->company_logo;
                }
                else
                {
                    $company_logo = 'nologo.png';
                }

                $company_name = '<a href="'.url('/superadmin/update-card').'/'.$card->user_id.'/'.$card->id.'" style="color:black;"><img class="img img-radius img-responsive" style="height:50px;width:50px;border-radius:50%;margin-right:5px;" src="'.asset('/sources/assets/images/user_card/company_logo').'/'.$company_logo.'" /> '.ucfirst($card->company_name).'</a>';

                $nestedData['company_name'] = $company_name;

                $nestedData['contact_person_name'] = $card->contact_person_name;

                $nestedData['expiry_on'] = $card->expiry_on;

                $nestedData['status'] = $card->status?'<i class="fa fa-toggle-on" style="color:green;cursor:pointer" onclick="change_user_card_status(\''.$card->id.'\',\''.$card->user_id.'\',\''.$card->status.'\')"></i>':'<i class="fa fa-toggle-off" style="color:red;cursor:pointer" onclick="change_user_card_status(\''.$card->id.'\',\''.$card->user_id.'\',\''.$card->status.'\')"></i>';

                $nestedData['updated_at'] = Carbon::createFromFormat('Y-m-d H:i:s',  $card->updated_at, 'Asia/kolkata')->format('Y-m-d g:i A');
                
                $btn = '<button type="button" class="btn btn-primary btn-sm" style="margin-right:6px;" onclick="renew_card(\''.$card->id.'\')"><i class="fa fa-refresh" aria-hidden="true"></i> Renew</button>';
                $btn = $btn.'<button type="button" class="btn btn-danger btn-sm" style="margin-right:6px;" onclick="delete_card(\''.$card->id.'\')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>';
                
                $nestedData['action'] = $btn;

                $data[] = $nestedData;

                $sno++;
            }
        }
          
        $json_data = array(
                "draw"            => intval($request->input('draw')),  
                "recordsTotal"    => intval($totalData),  
                "recordsFiltered" => intval($totalFiltered), 
                "data"            => $data   
            );
    
        echo json_encode($json_data);
    }

    public function change_user_card_status(Request $request)
    {
        $card_id = $request['card_id'];
        $user_id = $request['user_id'];

        $status = $request['status']?0:1;

        \DB::beginTransaction();

        try
        {
            Card::where('id',$card_id)
                ->where('user_id',$user_id)
                ->update([
                    'status'=>$status
                ]);

            \DB::commit();
            
            if($status)
            {
                $status='Activated';
            }
            else
            {
                $status='Deactivated';
            }

            $response = array(
                'status'=>'Success',
                'response'=>'Card '.$status.' successfully!'
            );
        }
        catch(\Exception $e)
        {
            \DB::rollback();

            $response = array(
                'status'=>'Error',
                'response'=>'Please try again!'
            );
        }

        return response()->json($response);
    }

    public function switch_card(Request $request)
    {
        $card_id = $request['card_id'];
        $user_id = $request['user_id'];

        $card = $request['card']=='basic'?'premium':'basic';

        \DB::beginTransaction();

        try
        {
            Card::where('id',$card_id)
                ->where('user_id',$user_id)
                ->update([
                    'card_type'=>$card
                ]);

            \DB::commit();
            
            if($card=='basic')
            {
                $status='Basic';
            }
            else
            {
                $status='Premium';
            }

            $response = array(
                'status'=>'Success',
                'response'=>'Card switched to '.$status.' successfully!'
            );
        }
        catch(\Exception $e)
        {
            \DB::rollback();

            $response = array(
                'status'=>'Error',
                'response'=>'Please try again!'
            );
        }

        return response()->json($response);
    }

    public function delete_user_card(Request $request)
    {
        $card_id = $request['card_id'];

        \DB::beginTransaction();

        try
        {
            Card::where('id',$card_id)->delete();

            CompanyAddress::where('card_id',$card_id)->delete();

            CompanyBankDetail::where('card_id',$card_id)->delete();

            CompanyBrochure::where('card_id',$card_id)->delete();

            CompanyGalleryImage::where('card_id',$card_id)->delete();

            CompanyGstNo::where('card_id',$card_id)->delete();

            CompanyService::where('card_id',$card_id)->delete();

            CompanyShareableLink::where('card_id',$card_id)->delete();

            Enquiry::where('card_id',$card_id)->delete();

            OnlinePayment::where('card_id',$card_id)->delete();

            CompanyVideo::where('card_id',$card_id)->delete();

            CompanyClient::where('card_id',$card_id)->delete();

            CompanyProduct::where('card_id',$card_id)->delete();

            \DB::commit();
        
            $response = array(
                'status'=>'Success',
                'response'=>'Card deleted successfully!'
            );
        }
        catch(\Exception $e)
        {
            \DB::rollback();

            $response = array(
                'status'=>'Error',
                'response'=>'Please try again!'
            );
        }

        return response()->json($response);
    }

    public function change_user_card_company_logo(Request $request)
    {
        $card_id = $request['id'];
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);
        $image_name= time().'.png';
        $path = public_path() . "/sources/assets/images/user_card/company_logo/".$image_name;

        file_put_contents($path, $data);

        $update_profile_pic = Card::where('id',$card_id)
                            ->update([
                                'company_logo'=>$image_name
                            ]);

        if(!$update_profile_pic)
        {
            $response = array(
                'status'=>'Error',
                'response'=>'Something went wrong, please try again.'
            );
        } 
        else
        {
            $response = array(
                'status'=>'Success',
                'response'=>'Successfully updated logo!'
            );
        }
                   
        return response()->json($response);
    }

    public function delete_user_card_company_logo(Request $request)
    {
        $delete_pic = Card::where('id',$request['id'])
                        ->update([
                            'company_logo'=>null
                        ]);

        if(!$delete_pic)
        {
            $response = array(
                'status'=>'Error',
                'response'=>'Please try again!'
            );
        }
        else
        {
            $response = array(
                'status'=>'Success',
                'response'=>'Company Logo removed successfully!'
            );
        }

        return response()->json($response);
    }

    public function change_user_card_profile_dp(Request $request)
    {
        $card_id = $request['id'];
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);
        $image_name= time().'.png';
        $path = public_path() . "/sources/assets/images/user_card/contact_profile_pic/".$image_name;

        file_put_contents($path, $data);

        $update_profile_pic = Card::where('id',$card_id)
                            ->update([
                                'contact_profile_pic'=>$image_name
                            ]);

        if(!$update_profile_pic)
        {
            $response = array(
                'status'=>'Error',
                'response'=>'Something went wrong, please try again.'
            );
        } 
        else
        {
            $response = array(
                'status'=>'Success',
                'response'=>'Successfully updated profile pic!'
            );
        }
                   
        return response()->json($response);
    }

    public function delete_user_card_profile_dp(Request $request)
    {
        $delete_pic = Card::where('id',$request['id'])
                        ->update([
                            'contact_profile_pic'=>null
                        ]);

        if(!$delete_pic)
        {
            $response = array(
                'status'=>'Error',
                'response'=>'Please try again!'
            );
        }
        else
        {
            $response = array(
                'status'=>'Success',
                'response'=>'Profile Pic removed successfully!'
            );
        }

        return response()->json($response);
    }

    public function get_user_card_details(Request $request)
    {
        $card_details = Card::where('id',$request['id'])
                            ->where('user_id', $request['user_id'])
                            ->get();

        // $qr_code = base64_encode(\QrCode::format('png')->size(250)->generate(URL($card_details[0]->slug)));
        // $qr_code = "<img src=".\QrCode::format('png')->size(300)->generate($card_details[0]->slug)." />";

        if($card_details[0]->slug!=null)
        {
            $qr_code = '<a href="data:image/png;base64, '.base64_encode(\QrCode::format('png')->size(300)->generate(URL($card_details[0]->slug))).'" download><img alt="" src="data:image/png;base64, '.base64_encode(\QrCode::format('png')->size(300)->generate(URL($card_details[0]->slug))).'" ></a>';
        }
        else
        {
            $qr_code = null;
        }

        $company_services = CompanyService::where('card_id',$request['id'])
                                        ->where('user_id', $request['user_id'])
                                        ->get();

        $company_addresses = CompanyAddress::where('card_id',$request['id'])
                                        ->where('user_id', $request['user_id'])
                                        ->get();

        $company_gst_nos = CompanyGstNo::where('card_id',$request['id'])
                                        ->where('user_id', $request['user_id'])
                                        ->get();

        $bank_details = CompanyBankDetail::where('card_id',$request['id'])
                                        ->where('user_id', $request['user_id'])
                                        ->get();

        $online_payments = OnlinePayment::where('card_id',$request['id'])
                                        ->where('user_id', $request['user_id'])
                                        ->get();

        $shareable_links = CompanyShareableLink::where('card_id',$request['id'])
                                                ->where('user_id', $request['user_id'])
                                                ->get();

        $video_links = CompanyVideo::where('card_id',$request['id'])
                                    ->where('user_id', $request['user_id'])
                                    ->get();

        $gallery_images = CompanyGalleryImage::where('card_id',$request['id'])
                                    ->where('user_id', $request['user_id'])
                                    ->get();

        $company_clients = CompanyClient::where('card_id',$request['id'])
                                    ->where('user_id', $request['user_id'])
                                    ->get();

        $company_products = CompanyProduct::where('card_id',$request['id'])
                                    ->where('user_id', $request['user_id'])
                                    ->get();

        $company_attachments = CompanyBrochure::where('card_id',$request['id'])
                                    ->where('user_id', $request['user_id'])
                                    ->get();



        if(count($card_details)==1)
        {
            $response = array(
                'status'=>'Success',
                'response'=>$card_details[0],
                'company_services'=>$company_services,
                'company_addresses'=>$company_addresses,
                'company_gst_nos'=>$company_gst_nos,
                'bank_details'=>$bank_details,
                'online_payments'=>$online_payments,
                'shareable_links'=>$shareable_links,
                'video_links'=>$video_links,
                'gallery_images'=>$gallery_images,
                'company_clients'=>$company_clients,
                'company_products'=>$company_products,
                'company_attachments'=>$company_attachments,
                'qr_code'=>$qr_code
            );
        }
        else
        {
            $response = array(
                'status'=>'Warning',
                'response'=>'No records found!'
            );
        }

        return response()->json($response);
    }

    public function save_contact_person_info(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'name'=>'required'
          ]);

          if($validator->fails())
          {
              return response()->json(['errors'=>$validator->errors()]);
          }
          else
          {
            $update_contact_person_info = Card::where('id',$request['id'])
                                            ->where('user_id',$request['user_id'])
                                            ->update([
                                                'contact_person_name'=>$request['name'],
                                                'contact_person_designation'=>$request['designation'],
                                                'contact_person_phone'=>strtolower($request['phone']),
                                                'contact_person_whatsapp_no'=>strtolower($request['whatsapp_no']),
                                            ]);

            if(!$update_contact_person_info)
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Please try again'
                );
            }
            else
            {
                $response = array(
                    'status'=>'Success',
                    'response'=>'Changes saved successfully!'
                );
            }

            return response()->json($response);
          }
    }

    public function save_company_info(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'company_name'=>'required',
            'expiry_on'=>'required'
          ]);

          if($validator->fails())
          {
              return response()->json(['errors'=>$validator->errors()]);
          }
          else
          {
            $update_company = Card::where('id',$request['id'])->where('user_id',$request['user_id'])->firstOrFail();

            $update_company->slug = null;

            $update_company->primary_color = $request['primary_color'];
            $update_company->logo_shape = $request['logo_shape'];
            $update_company->expiry_on = $request['expiry_on'];
            $update_company->company_name = $request['company_name'];
            $update_company->tag_line = $request['tag_line'];
            $update_company->company_phone = $request['company_phone'];
            $update_company->company_whatsapp_no = $request['company_whatsapp_no'];
            $update_company->company_email = $request['company_email'];
            $update_company->company_website = $request['company_website'];
            $update_company->company_about = $request['about_company'];
            $update_company->company_offer = $request['company_offer'];

            $update_company->save(); 

            if(!$update_company)
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Please try again'
                );
            }
            else
            {
                if(count($request['service']))
                {
                    CompanyService::where('user_id',$request['user_id'])->where('card_id',$request['id'])->delete();

                    foreach ($request['service'] as $service)
                    {
                        if($service!=null && trim($service)!='')
                        {
                            CompanyService::create([
                                'user_id'=>$request['user_id'],
                                'card_id'=>$request['id'],
                                'service'=>$service
                            ]);
                        }
                    }
                }

                if(count($request['clients']))
                {
                    CompanyClient::where('user_id',$request['user_id'])->where('card_id',$request['id'])->delete();

                    foreach ($request['clients'] as $client)
                    {
                        if($client!=null && trim($client)!='')
                        {
                            CompanyClient::create([
                                'user_id'=>$request['user_id'],
                                'card_id'=>$request['id'],
                                'client_name'=>$client
                            ]);
                        }
                    }
                }

                if(count($request['company_gst_no']))
                {
                    CompanyGstNo::where('user_id',$request['user_id'])->where('card_id',$request['id'])->delete();

                    foreach ($request['company_gst_no'] as $index => $gst_no)
                    {
                        if($gst_no!=null && trim($gst_no)!='')
                        {
                            CompanyGstNo::create([
                                'user_id'=>$request['user_id'],
                                'card_id'=>$request['id'],
                                'gst_no'=>$gst_no,
                                'company_name'=>$request['company_gst_company_name'][$index]
                            ]);
                        }
                    }
                }

                if(count($request['company_address']))
                {
                    CompanyAddress::where('user_id',$request['user_id'])->where('card_id',$request['id'])->delete();

                    foreach ($request['company_address'] as $index => $company_address)
                    {
                        if($company_address!=null && trim($company_address)!='')
                        {
                            CompanyAddress::create([
                                'user_id'=>$request['user_id'],
                                'card_id'=>$request['id'],
                                'branch_name'=>$request['branch_name'][$index],
                                'company_address'=>$company_address,
                                'map_link'=>$request['map_link'][$index]
                            ]);
                        }
                    }
                }

                $response = array(
                    'status'=>'Success',
                    'response'=>'Changes saved successfully!'
                );
            }

            return response()->json($response);
          }
    }

    public function add_video_link(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'user_id'=>'required',
            'video'=>'required|url'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $video_count = CompanyVideo::where('user_id',$request['user_id'])->where('card_id',$request['id'])->count();

            if($video_count<3)
            {
                $add_video_link = CompanyVideo::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'link'=>$request['video']
                ]);
    
                if(!$add_video_link)
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Something went wrong, please try again!'
                    );
                }
                else
                {
                    $response = array(
                        'status'=>'Success',
                        'response'=>'Video added successfully!'
                    );
                }
            }
            else
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Not allowed to add more than 3 videos!'
                );
            }

            return response()->json($response);
        }
    }

    public function get_video_link(Request $request)
    {
        $get_video_link = CompanyVideo::where('id',$request['id'])->get();

        if(count($get_video_link)==1)
        {
            $response = array(
                'status'=>'Success',
                'response'=>$get_video_link[0]
            );
        }
        else
        {
            $response = array(
                'status'=>'Warning',
                'response'=>'No records found!'
            );
        }

        return response()->json($response);
    }

    public function update_video_link(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'user_id'=>'required',
            'video'=>'required|url',
            'video_id'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $update_video_link = CompanyVideo::where('id',$request['video_id'])->update([
                'link'=>$request['video']
            ]);

            if(!$update_video_link)
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Something went wrong, please try again!'
                );
            }
            else
            {
                $response = array(
                    'status'=>'Success',
                    'response'=>'Video added successfully!'
                );
            }

            return response()->json($response);
        }

    }

    public function delete_video(Request $request)
    {
        $delete_video_link = CompanyVideo::where('id',$request['id'])->delete();

        if($delete_video_link)
        {
            $response = array(
                'status'=>'Success',
                'response'=>'Deleted successfully!'
            );
        }
        else
        {
            $response = array(
                'status'=>'Warning',
                'response'=>'Please try again!'
            );
        }

        return response()->json($response);
    }

    public function add_gallery_image(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'user_id'=>'required',
            'title'=>'required',
            'gallery_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $gallery_image_count = CompanyGalleryImage::where('user_id',$request['user_id'])->where('card_id',$request['id'])->count();

            if($gallery_image_count<6)
            {
                if($request->hasfile('gallery_image'))
                {
                    $time = time();
        
                    $destinationPath = public_path('/sources/assets/images/user_card/company_gallery_images');
                    $original_name = $request->file('gallery_image')->getClientOriginalName();
    
                    $new_name = $time.'_'.$request['id'].'_'.$request['user_id'].'_'.$original_name; 
                    $request->file('gallery_image')->move($destinationPath.'/', $new_name);
        
                    $add_video_link = CompanyGalleryImage::create([
                        'user_id'=>$request['user_id'],
                        'card_id'=>$request['id'],
                        'title'=>$request['title'],
                        'image'=>$new_name
                    ]);
        
                    if(!$add_video_link)
                    {
                        $response = array(
                            'status'=>'Error',
                            'response'=>'Something went wrong, please try again!'
                        );
                    }
                    else
                    {
                        $response = array(
                            'status'=>'Success',
                            'response'=>'Image added successfully!'
                        );
                    }
                }
                else
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Invalid Image!'
                    );
                }    
            }
            else
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Not allowed to add more than 6 gallery images!'
                );
            }

            return response()->json($response);
        }
    }

    public function get_gallery_image(Request $request)
    {
        $gallery_image = CompanyGalleryImage::where('id',$request['id'])->get();

        if(count($gallery_image)==1)
        {
            $response = array(
                'status'=>'Success',
                'response'=>$gallery_image[0]
            );
        }
        else
        {
            $response = array(
                'status'=>'Error',
                'response'=>'No records found!'
            );
        }

        return response()->json($response);
    }

    public function update_gallery_image(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'user_id'=>'required',
            'image_id'=>'required',
            'title'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            if($request->hasfile('gallery_image'))
            {
                $time = time();
        
                $destinationPath = public_path('/sources/assets/images/user_card/company_gallery_images');
                $original_name = $request->file('gallery_image')->getClientOriginalName();

                $new_name = $time.'_'.$request['id'].'_'.$request['user_id'].'_'.$original_name; 
                $request->file('gallery_image')->move($destinationPath.'/', $new_name);
    
                $add_gallery_image = CompanyGalleryImage::where('id',$request['image_id'])
                                                    ->where('user_id',$request['user_id'])
                                                    ->where('card_id',$request['id'])
                                                    ->update([
                                                        'title'=>$request['title'],
                                                        'image'=>$new_name
                                                    ]);
    
                if(!$add_gallery_image)
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Something went wrong, please try again!'
                    );
                }
                else
                {
                    $response = array(
                        'status'=>'Success',
                        'response'=>'Image added successfully!'
                    );
                }
            }
            else
            {
                $add_gallery_image = CompanyGalleryImage::where('id',$request['image_id'])
                                    ->where('user_id',$request['user_id'])
                                    ->where('card_id',$request['id'])
                                    ->update([
                                        'title'=>$request['title']
                                    ]);
    
                if(!$add_gallery_image)
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Something went wrong, please try again!'
                    );
                }
                else
                {
                    $response = array(
                        'status'=>'Success',
                        'response'=>'Image updated successfully!'
                    );
                }
            }

            return response()->json($response);
        }

    }

    public function delete_gallery_image(Request $request)
    {
       $delete_image = CompanyGalleryImage::where('id',$request['id'])->delete();

       if($delete_image)
       {
           $response = array(
               'status'=>'Success',
               'response'=>'Deleted successfully!'
           );
       }
       else
       {
           $response = array(
               'status'=>'Warning',
               'response'=>'Please try again!'
           );
       }

       return response()->json($response);
    }

    public function add_dc(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'user_id'=>'required',
            'attachment_type'=>'required',
            'title'=>'required',
            'attachment'=>'required|mimes:pdf|max:10000'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $dc_count = CompanyBrochure::where('user_id',$request['user_id'])->where('card_id',$request['id'])->count();

            if($dc_count<6)
            {
                if($request->hasfile('attachment'))
                {
                    $time = time();
        
                    $destinationPath = public_path('/sources/assets/user_files/company_attachments');
                    $original_name = $request->file('attachment')->getClientOriginalName();
    
                    $new_name = $time.'_'.$request['id'].'_'.$request['user_id'].'_'.$original_name; 
                    $request->file('attachment')->move($destinationPath.'/', $new_name);
        
                    $add_dc_ = CompanyBrochure::create([
                        'user_id'=>$request['user_id'],
                        'card_id'=>$request['id'],
                        'type'=>$request['attachment_type'],
                        'title'=>$request['title'],
                        'brochure'=>$new_name
                    ]);
        
                    if(!$add_dc_)
                    {
                        $response = array(
                            'status'=>'Error',
                            'response'=>'Something went wrong, please try again!'
                        );
                    }
                    else
                    {
                        $response = array(
                            'status'=>'Success',
                            'response'=>'Attachment added successfully!'
                        );
                    }
                }
                else
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Invalid Attachment!'
                    );
                }    
            }
            else
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Not allowed to add more than 6 attachments!'
                );
            }

            return response()->json($response);
        }
    }

    public function get_dc(Request $request)
    {
        $dc = CompanyBrochure::where('id',$request['id'])->get();

        if(count($dc)==1)
        {
            $response = array(
                'status'=>'Success',
                'response'=>$dc[0]
            );
        }
        else
        {
            $response = array(
                'status'=>'Error',
                'response'=>'No records found!'
            );
        }

        return response()->json($response);
    }

    public function update_dc(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'user_id'=>'required',
            'dc_id'=>'required',
            'attachment_type'=>'required',
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            if($request->hasfile('attachment'))
            {
                $time = time();
    
                $destinationPath = public_path('/sources/assets/user_files/company_attachments');
                $original_name = $request->file('attachment')->getClientOriginalName();

                $new_name = $time.'_'.$request['id'].'_'.$request['user_id'].'_'.$original_name; 
                $request->file('attachment')->move($destinationPath.'/', $new_name);
    
                $update_dc_ = CompanyBrochure::where('id',$request['dc_id'])
                                                    ->where('user_id',$request['user_id'])
                                                    ->where('card_id',$request['id'])
                                                    ->update([
                                                        'title'=>$request['title'],
                                                        'brochure'=>$new_name
                                                    ]);
    
                if(!$update_dc_)
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Something went wrong, please try again!'
                    );
                }
                else
                {
                    $response = array(
                        'status'=>'Success',
                        'response'=>'Attachment updated successfully!'
                    );
                }
            }
            else
            {
                $update_dc_ = CompanyBrochure::where('id',$request['dc_id'])
                                                    ->where('user_id',$request['user_id'])
                                                    ->where('card_id',$request['id'])
                                                    ->update([
                                                        'title'=>$request['title']
                                                    ]);
    
                if(!$update_dc_)
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Something went wrong, please try again!'
                    );
                }
                else
                {
                    $response = array(
                        'status'=>'Success',
                        'response'=>'Attachment updated successfully!'
                    );
                }
            }

            return response()->json($response);
        }

    }

    public function delete_dc(Request $request)
    {
       $delete_dc_ = CompanyBrochure::where('id',$request['id'])->delete();

       if($delete_dc_)
       {
           $response = array(
               'status'=>'Success',
               'response'=>'Deleted successfully!'
           );
       }
       else
       {
           $response = array(
               'status'=>'Warning',
               'response'=>'Please try again!'
           );
       }

       return response()->json($response);
    }

    public function add_product(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'user_id'=>'required',
            'product_name'=>'required',
            'product_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $products_count = CompanyProduct::where('user_id',$request['user_id'])->where('card_id',$request['card_id'])->count();

            if($products_count<10)
            {
                if($request->hasfile('product_image'))
                {
                    $time = time();
        
                    $destinationPath = public_path('/sources/assets/images/user_card/company_product_images');
                    $original_name = $request->file('product_image')->getClientOriginalName();
    
                    $new_name = $time.'_'.$request['id'].'_'.$request['user_id'].'_'.$original_name; 
                    $request->file('product_image')->move($destinationPath.'/', $new_name);
        
                    $add_product = CompanyProduct::create([
                        'user_id'=>$request['user_id'],
                        'card_id'=>$request['id'],
                        'name'=>$request['product_name'],
                        'image'=>$new_name,
                        'description'=>$request['product_description'],
                        'price'=>$request['product_price'],
                        'payment_link'=>$request['product_payment_link'],
                        'phone'=>$request['product_phone'],
                        'whatsapp'=>$request['product_whatsapp']
                    ]);
        
                    if(!$add_product)
                    {
                        $response = array(
                            'status'=>'Error',
                            'response'=>'Something went wrong, please try again!'
                        );
                    }
                    else
                    {
                        $response = array(
                            'status'=>'Success',
                            'response'=>'Product added successfully!'
                        );
                    }
                }
                else
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Product Image is required!'
                    );
                }    
            }
            else
            {
                $response = array(
                    'status'=>'Error',
                    'response'=>'Not allowed to add more than 6 gallery images!'
                );
            }

            return response()->json($response);
        }
    }

    public function get_product(Request $request)
    {
        $product = CompanyProduct::where('id',$request['id'])->get();

        if(count($product)==1)
        {
            $response = array(
                'status'=>'Success',
                'response'=>$product[0]
            );
        }
        else
        {
            $response = array(
                'status'=>'Error',
                'response'=>'No records found!'
            );
        }

        return response()->json($response);
    }

    public function delete_product(Request $request)
    {
        $delete_product = CompanyProduct::where('id',$request['id'])->delete();

        if($delete_product)
        {
            $response = array(
                'status'=>'Success',
                'response'=>'Deleted successfully!'
            );
        }
        else
        {
            $response = array(
                'status'=>'Warning',
                'response'=>'Please try again!'
            );
        }
 
        return response()->json($response);
    }

    public function update_product(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'user_id'=>'required',
            'product_id'=>'required',
            'product_name'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            if($request->hasfile('product_image'))
            {
                $time = time();
        
                $destinationPath = public_path('/sources/assets/images/user_card/company_product_images');
                $original_name = $request->file('product_image')->getClientOriginalName();

                $new_name = $time.'_'.$request['id'].'_'.$request['user_id'].'_'.$original_name; 
                $request->file('product_image')->move($destinationPath.'/', $new_name);
    
                $update_product_details = CompanyProduct::where('id',$request['product_id'])
                                                    ->where('user_id',$request['user_id'])
                                                    ->where('card_id',$request['id'])
                                                    ->update([
                                                        'name'=>$request['product_name'],
                                                        'image'=>$new_name,
                                                        'description'=>$request['product_description'],
                                                        'price'=>$request['product_price'],
                                                        'payment_link'=>$request['product_payment_link'],
                                                        'phone'=>$request['product_phone'],
                                                        'whatsapp'=>$request['product_whatsapp']
                                                    ]);
    
                if(!$update_product_details)
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Something went wrong, please try again!'
                    );
                }
                else
                {
                    $response = array(
                        'status'=>'Success',
                        'response'=>'Product updated successfully!'
                    );
                }
            }
            else
            {
                $update_product_details = CompanyProduct::where('id',$request['product_id'])
                                                    ->where('user_id',$request['user_id'])
                                                    ->where('card_id',$request['id'])
                                                    ->update([
                                                        'name'=>$request['product_name'],
                                                        'description'=>$request['product_description'],
                                                        'price'=>$request['product_price'],
                                                        'payment_link'=>$request['product_payment_link'],
                                                        'phone'=>$request['product_phone'],
                                                        'whatsapp'=>$request['product_whatsapp']
                                                    ]);
    
                if(!$update_product_details)
                {
                    $response = array(
                        'status'=>'Error',
                        'response'=>'Something went wrong, please try again!'
                    );
                }
                else
                {
                    $response = array(
                        'status'=>'Success',
                        'response'=>'Product updated successfully!'
                    );
                }
            }

            return response()->json($response);
        }
    }

    public function save_bank_details(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required'
          ]);

          if($validator->fails())
          {
              return response()->json(['errors'=>$validator->errors()]);
          }
          else
          {
            if(count($request['full_name']))
            {
                CompanyBankDetail::where('user_id',$request['user_id'])->where('card_id',$request['id'])->delete();

                foreach ($request['full_name'] as $index => $name)
                {
                    if( ($name!=null && trim($name)!='') && 
                        ($request['account_no'][$index]!=null && trim($request['account_no'][$index])!='') &&
                        ($request['ifsc'][$index]!=null && trim($request['ifsc'][$index])!='') &&
                        ($request['branch'][$index]!=null && trim($request['branch'][$index])!='')
                    )
                    {
                        CompanyBankDetail::create([
                            'user_id'=>$request['user_id'],
                            'card_id'=>$request['id'],
                            'bank_name'=>$request['bank_name'][$index],
                            'name'=>$name,
                            'account_no'=>$request['account_no'][$index],
                            'ifsc'=>$request['ifsc'][$index],
                            'branch'=>$request['branch'][$index]
                        ]);
                    }
                }

                $response = array(
                    'status'=>'Success',
                    'response'=>'Changes saved successfully!'
                );
            }
            else
            {
                $response = array(
                    'status'=>'Warning',
                    'response'=>'Invalid inputs!'
                );
            }
          }

          return response()->json($response);
    }

    public function save_online_payments(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required'
          ]);

          if($validator->fails())
          {
              return response()->json(['errors'=>$validator->errors()]);
          }
          else
          {
            OnlinePayment::where('user_id',$request['user_id'])->where('card_id',$request['id'])->delete();

            if(isset($request['paytm']) && trim($request['paytm'])!='')
            {
                OnlinePayment::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'payment_type'=>'paytm',
                    'phone'=>$request['paytm']
                ]);
            }

            if(isset($request['phonepe']) && trim($request['phonepe'])!='')
            {
                OnlinePayment::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'payment_type'=>'phonepe',
                    'phone'=>$request['phonepe']
                ]);
            }

            if(isset($request['googlepay']) && trim($request['googlepay'])!='')
            {
                OnlinePayment::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'payment_type'=>'googlepay',
                    'phone'=>$request['googlepay']
                ]);
            }

            if(isset($request['upi_link']) && trim($request['upi_link'])!='')
            {
                OnlinePayment::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'payment_type'=>'upi',
                    'link'=>$request['upi_link']
                ]);
            }

            if(isset($request['paypal_link']) && trim($request['paypal_link'])!='')
            {
                OnlinePayment::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'payment_type'=>'paypal',
                    'link'=>$request['paypal_link']
                ]);
            }

            $response = array(
                'status'=>'Success',
                'response'=>'Changes saved successfully!'
            );

          }

          return response()->json($response);
    }

    public function save_shareable_links(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required'
          ]);

          if($validator->fails())
          {
              return response()->json(['errors'=>$validator->errors()]);
          }
          else
          {
            CompanyShareableLink::where('user_id',$request['user_id'])->where('card_id',$request['id'])->delete();

            if(trim($request['facebook'])!='')
            {
                CompanyShareableLink::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'type'=>'social',
                    'name'=>'facebook',
                    'link'=>strtolower($request['facebook'])
                ]);
            }

            if(trim($request['twitter'])!='')
            {
                CompanyShareableLink::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'type'=>'social',
                    'name'=>'twitter',
                    'link'=>strtolower($request['twitter'])
                ]);
            }

            if(trim($request['youtube'])!='')
            {
                CompanyShareableLink::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'type'=>'social',
                    'name'=>'youtube',
                    'link'=>strtolower($request['youtube'])
                ]);
            }

            if(trim($request['linkedin'])!='')
            {
                CompanyShareableLink::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'type'=>'social',
                    'name'=>'linkedin',
                    'link'=>strtolower($request['linkedin'])
                ]);
            }

            if(trim($request['googleplus'])!='')
            {
                CompanyShareableLink::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'type'=>'social',
                    'name'=>'googleplus',
                    'link'=>strtolower($request['googleplus'])
                ]);
            }

            if(trim($request['instagram'])!='')
            {
                CompanyShareableLink::create([
                    'user_id'=>$request['user_id'],
                    'card_id'=>$request['id'],
                    'type'=>'social',
                    'name'=>'instagram',
                    'link'=>strtolower($request['instagram'])
                ]);
            }

            if(count($request['other_name']))
            {
                foreach ($request['other_name'] as $index => $other_name)
                {
                    if(trim($other_name)!='' && trim($request['other_link'][$index])!='')
                    {
                        CompanyShareableLink::create([
                            'user_id'=>$request['user_id'],
                            'card_id'=>$request['id'],
                            'type'=>'business',
                            'name'=>$other_name,
                            'link'=>$request['other_link'][$index]
                        ]);
                    }
                }
            }


            $response = array(
                'status'=>'Success',
                'response'=>'Changes saved successfully!'
            );
          }

          return response()->json($response);
    }

    public function get_all_user_card_messages(Request $request)
    {
        $user_id = $request['user_id'];
        $card_id = $request['card_id'];

        $columns = array( 
            0 =>'id', 
            1 =>'name',
            2 =>'phone',
            3 =>'email',
            4 => 'message',
            5 => 'status',
            6 => 'created_at'
        );

        $totalData = Enquiry::where('user_id',$user_id)->where('card_id',$card_id)->count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $messages = Enquiry::where('user_id',$user_id)
                        ->where('card_id',$card_id)
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
        }
        else
        {
            $search = $request->input('search.value'); 

            $messages =  Enquiry::where('user_id',$user_id)
                                ->where('card_id',$card_id)
                                ->where(function($query) use($search){
                                    $query->Where('id','LIKE',"%{$search}%")
                                    ->orWhere('name', 'LIKE',"%{$search}%")
                                    ->orWhere('email', 'LIKE',"%{$search}%")
                                    ->orWhere('phone', 'LIKE',"%{$search}%")
                                    ->orWhere('message', 'LIKE',"%{$search}%")
                                    ->orWhere('status', 'LIKE',"%{$search}%")
                                    ->orWhere('created_at', 'LIKE',"%{$search}%");
                                })
                                ->offset($start)
                                ->limit($limit)
                                ->orderBy($order,$dir)
                                ->get();

            $totalFiltered = Enquiry::where('user_id',$user_id)
                                    ->where('card_id',$card_id)
                                    ->where(function($query) use($search){
                                        $query->Where('id','LIKE',"%{$search}%")
                                        ->orWhere('name', 'LIKE',"%{$search}%")
                                        ->orWhere('email', 'LIKE',"%{$search}%")
                                        ->orWhere('phone', 'LIKE',"%{$search}%")
                                        ->orWhere('message', 'LIKE',"%{$search}%")
                                        ->orWhere('status', 'LIKE',"%{$search}%")
                                        ->orWhere('created_at', 'LIKE',"%{$search}%");
                                    })
                                    ->count();
        }

        $data = array();

        if(!empty($messages))
        {
            $sno = $start+1;

            foreach ($messages as $message)
            { 
                $nestedData['sno'] = $sno;

                $nestedData['name'] = $message->name;

                $nestedData['phone'] = $message->phone;

                $nestedData['email'] = $message->email;

                $nestedData['message'] = $message->message;

                $nestedData['date_time'] = Carbon::createFromFormat('Y-m-d H:i:s',  $message->updated_at, 'Asia/kolkata')->format('Y-m-d g:i A');
                
                $btn = '<button type="button" class="btn btn-danger btn-sm" style="margin-right:6px;" onclick="delete_message(\''.$message->id.'\')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>';
                
                $nestedData['action'] = $btn;

                $data[] = $nestedData;

                $sno++;
            }
        }
          
        $json_data = array(
                "draw"            => intval($request->input('draw')),  
                "recordsTotal"    => intval($totalData),  
                "recordsFiltered" => intval($totalFiltered), 
                "data"            => $data   
            );
    
        echo json_encode($json_data);
    }

    public function preview($template,$user_id,$card_id)
    {
        $my_card = Card::where('id',$card_id)->where('user_id',$user_id)->firstorfail();

        $company_address = CompanyAddress::where('user_id',$my_card->user_id)->where('card_id',$my_card->id)->get();

        if(count($company_address)==0)
        {
            $company_address = null;
        }

        $company_bank_detail = CompanyBankDetail::where('user_id',$my_card->user_id)->where('card_id',$my_card->id)->get();

        if(count($company_bank_detail)==0)
        {
            $company_bank_detail = null;
        }

        $company_gst_no = CompanyGstNo::where('user_id',$my_card->user_id)->where('card_id',$my_card->id)->get();

        if(count($company_gst_no)==0)
        {
            $company_gst_no = null;
        }

        $company_service = CompanyService::where('user_id',$my_card->user_id)->where('card_id',$my_card->id)->get();

        if(count($company_service)==0)
        {
            $company_service = null;
        }

        $company_shareable_link = CompanyShareableLink::where('user_id',$my_card->user_id)->where('card_id',$my_card->id)->get();

        if(count($company_shareable_link)==0)
        {
            $company_shareable_link = null;
        }

        $online_payment = OnlinePayment::where('user_id',$my_card->user_id)->where('card_id',$my_card->id)->get();

        if(count($online_payment)==0)
        {
            $online_payment = null;
        }

        $videos = CompanyVideo::where('user_id',$my_card->user_id)->where('card_id',$my_card->id)->get();

        if(count($videos)==0)
        {
            $videos = null;
        }

        $clients = CompanyClient::where('user_id',$my_card->user_id)->where('card_id',$my_card->id)->get();

        if(count($clients)==0)
        {
            $clients = null;
        }

        $products = CompanyProduct::where('user_id',$my_card->user_id)->where('card_id',$my_card->id)->get();

        if(count($products)==0)
        {
            $products = null;
        }

        $images = CompanyGalleryImage::where('user_id',$my_card->user_id)->where('card_id',$my_card->id)->get();

        if(count($images)==0)
        {
            $images = null;
        }

        $attachments = CompanyBrochure::where('user_id',$my_card->user_id)->where('card_id',$my_card->id)->get();

        if(count($attachments)==0)
        {
            $attachments = null;
        }

        if($my_card->card_type=='basic')
        {
            return view('templates.template_one_basic',compact('my_card','company_address','company_bank_detail','company_gst_no','company_service','company_shareable_link','online_payment','clients'));
        }
        else if($my_card->card_type=='premium')
        {
            return view('templates.template_one_premium',compact('my_card','company_address','company_bank_detail','company_gst_no','company_service','company_shareable_link','online_payment','videos','images','attachments','products','clients'));
        }

    }

    public function save_vcard($user_id,$card_id)
    {
        $card = Card::where('id',$card_id)->where('user_id',$user_id)->firstOrFail();

        $company_name = $card->company_name!=null?$card->company_name:'';
        $company_designation = $card->contact_person_designation!=null?$card->contact_person_designation:'';
        $email = $card->company_email!=null?$card->company_email:'';
        $contact_person_phone = $card->contact_person_phone!=null?$card->contact_person_phone:'';
        $company_phone = $card->company_phone!=null?$card->company_phone:'';
        $company_address = $card->company_address!=null?$card->company_address:'';
        $company_website = $card->company_website!=null?$card->company_website:'';

        // define vcard
        $vcard = new VCard();

        // define variables
        $lastname = '';
        $firstname = $card->contact_person_name!=null?$card->contact_person_name:'';
        $additional = '';
        $prefix = '';
        $suffix = '';

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // add work data
        $vcard->addCompany($company_name);
        $vcard->addJobtitle($company_designation);
        $vcard->addEmail($email);
        $vcard->addPhoneNumber($contact_person_phone, 'PREF;WORK');
        $vcard->addPhoneNumber($company_phone, 'WORK');
        $vcard->addLabel($company_address);
        $vcard->addURL($company_website);

        // $vcard->addPhoto(__DIR__ . '/landscape.jpeg');

        // return vcard as a string
        // return $vcard->getOutput();

        $content = $vcard->getOutput();

        $response = new Response();
        $response->setContent($content);
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/x-vcard');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.str_slug($firstname).'.vcf"');
        $response->headers->set('Content-Length', mb_strlen($content, 'utf-8'));

        return $response;

        // return vcard as a download
        // return $vcard->download();

        // save vcard on disk
        //$vcard->setSavePath('/path/to/directory');
        //$vcard->save();
    }
}
