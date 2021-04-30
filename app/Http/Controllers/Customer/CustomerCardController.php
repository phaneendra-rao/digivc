<?php

namespace App\Http\Controllers\Customer;

use App\Card;
use App\CardAddress;
use App\CardClient;
use App\CardEnquiry;
use App\CardGstNo;
use App\CardService;
use App\CardShareableLink;
use App\CardGalleryImage;
use App\CardDc;
use App\CardProduct;
use App\CardVideo;
use App\Http\Controllers\Controller;
use App\InstaMojoTransaction;
use App\OnlinePayment;
use Illuminate\Http\Request;

use App\User;
use App\Wallet;
use Carbon\Carbon;

class CustomerCardController extends Controller
{
    public function edit_card($card_id)
    {
        $card = Card::where('id',$card_id)->where('user_id',auth()->user()->id)->get();

        if(count($card)==1)
        {
            if($card[0]->card_type=='basic')
            {
                $card = $card[0];

                return view('users.customer.edit_basic_card',compact('card'));
            }
            else
            {
                $card = $card[0];

                return view('users.customer.edit_premium_card',compact('card'));
            }
        }
        else
        {
            return redirect()->back()->with('error','Invalid URL!');
        }
    }

    public function change_card_status(Request $request)
    {
        $card_id = $request['id'];
        $status = $request['status'];

        $check_card = Card::where('id',$card_id)->where('user_id',auth()->user()->id)->where('slug','!=',null)->get();

        if(count($check_card)==1)
        {
            $update_status = Card::where('id',$card_id)->update([
                'status'=>($status==1)?0:1
            ]);

            if(!$update_status)
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
                    'response'=>'Card '.(($status==1)?'Deactivated':'Activated').' Successfully!'
                );
            }
        }
        else
        {
            $response = array(
                'status'=>'Error',
                'response'=>'Update card to change status!'
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
                            ->where('user_id',auth()->user()->id)
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
                        ->where('user_id',auth()->user()->id)
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
                            ->where('user_id',auth()->user()->id)
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
                        ->where('user_id',auth()->user()->id)
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
                                            ->where('user_id',auth()->user()->id)
                                            ->update([
                                                'contact_person_name'=>$request['name'],
                                                'contact_person_designation'=>$request['designation'],
                                                'contact_person_phone'=>strtolower($request['phone_no']),
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
            'company_name'=>'required'
          ]);

          if($validator->fails())
          {
              return response()->json(['errors'=>$validator->errors()]);
          }
          else
          {

            \DB::beginTransaction();

            try {
             
                $update_company = Card::where('id',$request['id'])->where('user_id',auth()->user()->id)->firstOrFail();

                $update_company->slug = null;
    
                $update_company->primary_color = $request['primary_color'];
                $update_company->template = $request['template'];
                $update_company->logo_shape = $request['logo_shape'];
                $update_company->sms = $request['sms'];
                $update_company->company_name = $request['company_name'];
                $update_company->tag_line = $request['tag_line'];
                $update_company->company_phone = $request['company_phone_no'];
                $update_company->company_whatsapp_no = $request['company_whatsapp_no'];
                $update_company->company_email = $request['company_email'];
                $update_company->company_website = $request['company_website'];
                $update_company->company_about = $request['about_company'];
                $update_company->company_offer = $request['company_offer'];
    
                $update_company->save(); 

                if(count($request['services']))
                {
                    CardService::where('card_id',$request['id'])->delete();

                    foreach ($request['services'] as $service)
                    {
                        if($service!=null && trim($service)!='')
                        {
                            CardService::create([
                                'card_id'=>$request['id'],
                                'service'=>$service
                            ]);
                        }
                    }
                }

                if(count($request['clients']))
                {
                    CardClient::where('card_id',$request['id'])->delete();

                    foreach ($request['clients'] as $client)
                    {
                        if($client!=null && trim($client)!='')
                        {
                            CardClient::create([
                                'card_id'=>$request['id'],
                                'client_name'=>$client
                            ]);
                        }
                    }
                }

                if(count($request['company_gst_no']))
                {
                    CardGstNo::where('card_id',$request['id'])->delete();

                    foreach ($request['company_gst_no'] as $index => $gst_no)
                    {
                        if($gst_no!=null && trim($gst_no)!='')
                        {
                            CardGstNo::create([
                                'card_id'=>$request['id'],
                                'company_name'=>$request['company_gst_company_name'][$index],
                                'gst_no'=>$gst_no
                            ]);
                        }
                    }
                }

                if(count($request['company_address']))
                {
                    CardAddress::where('card_id',$request['id'])->delete();

                    foreach ($request['company_address'] as $index => $company_address)
                    {
                        if($company_address!=null && trim($company_address)!='')
                        {
                            CardAddress::create([
                                'card_id'=>$request['id'],
                                'branch_name'=>$request['branch_name'][$index],
                                'company_address'=>$company_address,
                                'map_link'=>$request['map_link'][$index]
                            ]);
                        }
                    }
                }
                
                \DB::commit();

                $response = array(
                    'status'=>'Success',
                    'response'=>'Changes saved successfully!'
                );

            } catch (\Exception $e) {
                \DB::rollback();

                $response = array(
                    'status'=>'Error',
                    'response'=>'Please try again!'
                );
            }

            return response()->json($response);
          }
    }

    public function add_card_product(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'product_name'=>'required',
            'product_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        { 
            $products_count = CardProduct::where('card_id',$request['id'])->count();

            if($products_count<10)
            {
                if($request->hasfile('product_image'))
                {
                    $time = time();
        
                    $destinationPath = public_path('/sources/assets/images/user_card/company_product_images');
                    $original_name = $request->file('product_image')->getClientOriginalName();
    
                    $new_name = $time.'_'.$request['id'].'_'.auth()->user()->id.'_'.$original_name; 
                    $request->file('product_image')->move($destinationPath.'/', $new_name);
        
                    $add_product = CardProduct::create([
                        'card_id'=>$request['id'],
                        'name'=>$request['product_name'],
                        'image'=>$new_name,
                        'description'=>$request['product_description'],
                        'price'=>$request['product_price'],
                        'payment_link'=>$request['product_payment_link']
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

    public function get_card_product(Request $request)
    {
        $product = CardProduct::where('id',$request['id'])->get();

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

    public function delete_card_product(Request $request)
    {
        $delete_product = CardProduct::where('id',$request['id'])->delete();

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

    public function update_card_product(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
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

                $new_name = $time.'_'.$request['id'].'_'.auth()->user()->id.'_'.$original_name; 
                $request->file('product_image')->move($destinationPath.'/', $new_name);
    
                $update_product_details = CardProduct::where('id',$request['product_id'])
                                                    ->where('card_id',$request['id'])
                                                    ->update([
                                                        'name'=>$request['product_name'],
                                                        'image'=>$new_name,
                                                        'description'=>$request['product_description'],
                                                        'price'=>$request['product_price'],
                                                        'payment_link'=>$request['product_payment_link']
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
                $update_product_details = CardProduct::where('id',$request['product_id'])
                                                    ->where('card_id',$request['id'])
                                                    ->update([
                                                        'name'=>$request['product_name'],
                                                        'description'=>$request['product_description'],
                                                        'price'=>$request['product_price'],
                                                        'payment_link'=>$request['product_payment_link']
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

    public function add_card_video_link(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'video'=>'required|url'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $video_count = CardVideo::where('card_id',$request['id'])->count();

            if($video_count<3)
            {
                $add_video_link = CardVideo::create([
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

    public function get_card_video_link(Request $request)
    {
        $get_video_link = CardVideo::where('id',$request['id'])->get();

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

    public function update_card_video_link(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'video'=>'required|url',
            'video_id'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $update_video_link = CardVideo::where('id',$request['video_id'])->update([
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

    public function delete_card_video(Request $request)
    {
        $delete_video_link = CardVideo::where('id',$request['id'])->delete();

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

    public function add_card_gallery_image(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
            'title'=>'required',
            'gallery_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }
        else
        {
            $gallery_image_count = CardGalleryImage::where('card_id',$request['id'])->count();

            if($gallery_image_count<6)
            {
                if($request->hasfile('gallery_image'))
                {
                    $time = time();
        
                    $destinationPath = public_path('/sources/assets/images/user_card/company_gallery_images');
                    $original_name = $request->file('gallery_image')->getClientOriginalName();
    
                    $new_name = $time.'_'.$request['id'].'_'.auth()->user()->id.'_'.$original_name; 
                    $request->file('gallery_image')->move($destinationPath.'/', $new_name);
        
                    $add_video_link = CardGalleryImage::create([
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

    public function get_card_gallery_image(Request $request)
    {
        $gallery_image = CardGalleryImage::where('id',$request['id'])->get();

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

    public function update_card_gallery_image(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
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

                $new_name = $time.'_'.$request['id'].'_'.auth()->user()->id.'_'.$original_name; 
                $request->file('gallery_image')->move($destinationPath.'/', $new_name);
    
                $add_gallery_image = CardGalleryImage::where('id',$request['image_id'])
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
                $add_gallery_image = CardGalleryImage::where('id',$request['image_id'])
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

    public function delete_card_gallery_image(Request $request)
    {
       $delete_image = CardGalleryImage::where('id',$request['id'])->delete();

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

    public function add_card_dc(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
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
            $dc_count = CardDc::where('card_id',$request['id'])->count();

            if($dc_count<6)
            {
                if($request->hasfile('attachment'))
                {
                    $time = time();
        
                    $destinationPath = public_path('/sources/assets/user_card/company_dcs');
                    $original_name = $request->file('attachment')->getClientOriginalName();
    
                    $new_name = $time.'_'.$request['id'].'_'.auth()->user()->id.'_'.$original_name; 
                    $request->file('attachment')->move($destinationPath.'/', $new_name);
        
                    $add_dc_ = CardDc::create([
                        'card_id'=>$request['id'],
                        'type'=>$request['attachment_type'],
                        'title'=>$request['title'],
                        'dc_name'=>$new_name
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

    public function get_card_dc(Request $request)
    {
        $dc = CardDc::where('id',$request['id'])->get();

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

    public function update_card_dc(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'=>'required',
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
    
                $destinationPath = public_path('/sources/assets/user_card/company_dcs');
                $original_name = $request->file('attachment')->getClientOriginalName();

                $new_name = $time.'_'.$request['id'].'_'.auth()->user()->id.'_'.$original_name; 
                $request->file('attachment')->move($destinationPath.'/', $new_name);
    
                $update_dc_ = CardDc::where('id',$request['dc_id'])
                                                    ->where('card_id',$request['id'])
                                                    ->update([
                                                        'title'=>$request['title'],
                                                        'type'=>$request['attachment_type'],
                                                        'dc_name'=>$new_name
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
                $update_dc_ = CardDc::where('id',$request['dc_id'])
                                                    ->where('card_id',$request['id'])
                                                    ->update([
                                                        'title'=>$request['title'],
                                                        'type'=>$request['attachment_type']
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

    public function delete_card_dc(Request $request)
    {
       $delete_dc_ = CardDc::where('id',$request['id'])->delete();

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

    public function save_online_payments(Request $request)
    {
        // OnlinePayment
        $validator = \Validator::make($request->all(), [
            'id'=>'required'
          ]);

          if($validator->fails())
          {
              return response()->json(['errors'=>$validator->errors()]);
          }
          else
          {
            //   return response()->json($request['paytm']);
            OnlinePayment::where('card_id',$request['id'])->delete();

            \DB::beginTransaction();

            try {
                if(isset($request['paytm']) && trim($request['paytm'])!='')
                {
                    OnlinePayment::create([
                        'card_id'=>$request['id'],
                        'payment_type'=>'paytm',
                        'number'=>$request['paytm']
                    ]);
                }
    
                if(isset($request['phonepe']) && trim($request['phonepe'])!='')
                {
                    OnlinePayment::create([
                        'card_id'=>$request['id'],
                        'payment_type'=>'phonepe',
                        'number'=>$request['phonepe']

                    ]);
                }
    
                if(isset($request['googlepay']) && trim($request['googlepay'])!='')
                {
                    OnlinePayment::create([
                        'card_id'=>$request['id'],
                        'payment_type'=>'googlepay',
                        'number'=>$request['googlepay']
                    ]);
                }
    
                if(isset($request['upi_link']) && trim($request['upi_link'])!='')
                {
                    OnlinePayment::create([
                        'card_id'=>$request['id'],
                        'payment_type'=>'upi',
                        'link'=>$request['upi_link']
                    ]);
                }
    
                if(isset($request['paypal_link']) && trim($request['paypal_link'])!='')
                {
                    OnlinePayment::create([
                        'card_id'=>$request['id'],
                        'payment_type'=>'paypal',
                        'link'=>$request['paypal_link']
                    ]);
                }

                \DB::commit();
                
                $response = array(
                    'status'=>'Success',
                    'response'=>'Changes saved successfully!'
                );

            } catch (\Exception $e) {

                \DB::rollback();

                $response = array(
                    'status'=>'Error',
                    'response'=>'Please try again!',
                    'e'=>$e
                );
            }

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
            \DB::beginTransaction();

            try {
                CardShareableLink::where('card_id',$request['id'])->delete();

                if(trim($request['facebook'])!='')
                {
                    CardShareableLink::create([
                        'card_id'=>$request['id'],
                        'name'=>'facebook',
                        'link'=>strtolower($request['facebook'])
                    ]);
                }
    
                if(trim($request['twitter'])!='')
                {
                    CardShareableLink::create([
                        'card_id'=>$request['id'],
                        'name'=>'twitter',
                        'link'=>strtolower($request['twitter'])
                    ]);
                }
    
                if(trim($request['youtube'])!='')
                {
                    CardShareableLink::create([
                        'card_id'=>$request['id'],
                        'name'=>'youtube',
                        'link'=>strtolower($request['youtube'])
                    ]);
                }
    
                if(trim($request['linkedin'])!='')
                {
                    CardShareableLink::create([
                        'card_id'=>$request['id'],
                        'name'=>'linkedin',
                        'link'=>strtolower($request['linkedin'])
                    ]);
                }
    
                if(trim($request['googleplus'])!='')
                {
                    CardShareableLink::create([
                        'card_id'=>$request['id'],
                        'name'=>'googleplus',
                        'link'=>strtolower($request['googleplus'])
                    ]);
                }
    
                if(trim($request['instagram'])!='')
                {
                    CardShareableLink::create([
                        'card_id'=>$request['id'],
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
                            CardShareableLink::create([
                                'card_id'=>$request['id'],
                                'name'=>$other_name,
                                'link'=>$request['other_link'][$index]
                            ]);
                        }
                    }
                }

                \DB::commit();

                $response = array(
                    'status'=>'Success',
                    'response'=>'Changes saved successfully!'
                );

            } catch (\Exception $e) {
                \DB::rollback();

                $response = array(
                    'status'=>'Error',
                    'response'=>'Please try again!'
                );
            }

            return response()->json($response);
          }
    }

    public function preview($card_id)
    {
        $my_card = Card::where('id',$card_id)->where('user_id',auth()->user()->id)->firstorfail();

        $card_addresses = CardAddress::where('card_id',$my_card->id)->get();

        if(count($card_addresses)==0)
        {
            $card_addresses = null;
        }

        $card_gst_nos = CardGstNo::where('card_id',$my_card->id)->get();

        if(count($card_gst_nos)==0)
        {
            $card_gst_nos = null;
        }

        $card_services = CardService::where('card_id',$my_card->id)->get();

        if(count($card_services)==0)
        {
            $card_services = null;
        }

        $card_shareable_links = CardShareableLink::where('card_id',$my_card->id)->get();

        if(count($card_shareable_links)==0)
        {
            $card_shareable_links = null;
        }

        $online_payments = OnlinePayment::where('card_id',$my_card->id)->get();

        if(count($online_payments)==0)
        {
            $online_payments = null;
        }

        $clients = CardClient::where('card_id',$my_card->id)->get();

        if(count($clients)==0)
        {
            $clients = null;
        }

        if($my_card->card_type=='basic')
        {
            if($my_card->template==1)
            {
                return view('templates.template_one_basic',compact('my_card','card_addresses','card_gst_nos','card_services','card_shareable_links','online_payments','clients'));
            }
        }
        else if($my_card->card_type=='premium')
        {
            $products = CardProduct::where('card_id',$my_card->id)->get();

            if(count($products)==0)
            {
                $products = null;
            }
    
            $videos = CardVideo::where('card_id',$my_card->id)->get();
    
            if(count($videos)==0)
            {
                $videos = null;
            }
    
            $images = CardGalleryImage::where('card_id',$my_card->id)->get();
    
            if(count($images)==0)
            {
                $images = null;
            }
    
            $attachments = CardDc::where('card_id',$my_card->id)->get();
    
            if(count($attachments)==0)
            {
                $attachments = null;
            }

            if($my_card->template==1)
            {
                return view('templates.template_one_premium',compact('my_card','card_addresses','card_gst_nos','card_services','card_shareable_links','online_payments','videos','images','attachments','products','clients'));
            }
        }

    }

    public function get_single_card_details(Request $request)
    {
        $card_details = Card::where('id',$request['id'])
                            ->where('user_id', auth()->user()->id)
                            ->get();

        if($card_details[0]->slug!=null)
        {
            $qr_code = '<a href="data:image/png;base64, '.base64_encode(\QrCode::format('png')->size(300)->generate(URL($card_details[0]->slug))).'" download><img alt="" src="data:image/png;base64, '.base64_encode(\QrCode::format('png')->size(300)->generate(URL($card_details[0]->slug))).'" ></a>';
        }
        else
        {
            $qr_code = null;
        }

        $card_services = CardService::where('card_id',$request['id'])->get();

        $card_clients = CardClient::where('card_id',$request['id'])->get();

        $card_addresses = CardAddress::where('card_id',$request['id'])->get();

        $card_gst_nos = CardGstNo::where('card_id',$request['id'])->get();

        $online_payments = OnlinePayment::where('card_id',$request['id'])->get();

        $shareable_links = CardShareableLink::where('card_id',$request['id'])->get();


        if($card_details[0]->card_type=='premium')
        {
            $video_links = CardVideo::where('card_id',$request['id'])->get();

            $gallery_images = CardGalleryImage::where('card_id',$request['id'])->get();

            $company_products = CardProduct::where('card_id',$request['id'])->get();

            $company_dcs = CardDc::where('card_id',$request['id'])->get();

            $card_response = [
                'card_details'=>$card_details[0],
                'card_services'=>$card_services,
                'card_clients'=>$card_clients,
                'card_addresses'=>$card_addresses,
                'card_gst_nos'=>$card_gst_nos,
                'online_payments'=>$online_payments,
                'shareable_links'=>$shareable_links,
                'video_links'=>$video_links,
                'gallery_images'=>$gallery_images,
                'company_products'=>$company_products,
                'company_attachments'=>$company_dcs,
                'qr_code'=>$qr_code
            ];
        }
        else
        {
            $card_response = [
                'card_details'=>$card_details[0],
                'card_services'=>$card_services,
                'card_clients'=>$card_clients,
                'card_addresses'=>$card_addresses,
                'card_gst_nos'=>$card_gst_nos,
                'online_payments'=>$online_payments,
                'shareable_links'=>$shareable_links,
                'qr_code'=>$qr_code
            ];
        }


        if(count($card_details)==1)
        {
            $response = array(
                'status'=>'Success',
                'response'=>$card_response
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

    public function get_all_card_messages(Request $request)
    {
        $user_id = auth()->user()->id;
        $card_id = $request['card_id'];

        $columns = array( 
            0 =>'id', 
            1 =>'name',
            2 =>'phone',
            3 =>'email',
            4 => 'message'
        );

        $totalData = CardEnquiry::where('card_id',$card_id)->count();
            
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $messages = CardEnquiry::where('card_id',$card_id)
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
        }
        else
        {
            $search = $request->input('search.value'); 

            $messages =  CardEnquiry::where('card_id',$card_id)
                                ->where(function($query) use($search){
                                    $query->Where('id','LIKE',"%{$search}%")
                                    ->orWhere('name', 'LIKE',"%{$search}%")
                                    ->orWhere('email', 'LIKE',"%{$search}%")
                                    ->orWhere('phone', 'LIKE',"%{$search}%")
                                    ->orWhere('message', 'LIKE',"%{$search}%");
                                })
                                ->offset($start)
                                ->limit($limit)
                                ->orderBy($order,$dir)
                                ->get();

            $totalFiltered = CardEnquiry::where('card_id',$card_id)
                                    ->where(function($query) use($search){
                                        $query->Where('id','LIKE',"%{$search}%")
                                        ->orWhere('name', 'LIKE',"%{$search}%")
                                        ->orWhere('email', 'LIKE',"%{$search}%")
                                        ->orWhere('phone', 'LIKE',"%{$search}%")
                                        ->orWhere('message', 'LIKE',"%{$search}%");
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

                $nestedData['date_time'] = Carbon::parse($message->created_at)->setTimezone(auth()->user()->time_zone)->toDayDateTimeString();
                
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

    public function delete_card_message(Request $request)
    {
        $id = $request['id'];

        $delete_message = CardEnquiry::where('id',$id)->delete();

        if(!$delete_message)
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
                'response'=>'Message deleted successfully!'
            );
        }

        return response()->json($response);
    }
}
