<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\SuperAdmin;
use App\User;
use App\Card;
use App\StoreSmsNumber;
use Carbon\Carbon;
use DataTables;


class SuperAdminUserController extends Controller
{
    public function __construct()
    {
        \Session::put('url.intended',\Request::fullUrl());

        $this->middleware('auth:superadmin');
    }

    public function get_all_active_users(Request $request)
    {
        $columns = array( 
            0 =>'id', 
            1 =>'name',
            2 =>'phone',
            3 =>'email'
        );

        $totalData = User::where(function($query){
            $query->where('status','!=',0);
        })->count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $users = User::where(function($query){
                            $query->where('status','!=',0);
                        })
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
        }
        else
        {
            $search = $request->input('search.value'); 

            $users =  User::where(function($query){
                                    $query->where('status','!=',0);
                                })
                                ->where(function($query) use($search){
                                    $query->Where('id','LIKE',"%{$search}%")
                                    ->orWhere('name', 'LIKE',"%{$search}%")
                                    ->orWhere('email', 'LIKE',"%{$search}%")
                                    ->orWhere('phone', 'LIKE',"%{$search}%");
                                })
                                ->offset($start)
                                ->limit($limit)
                                ->orderBy($order,$dir)
                                ->get();

            $totalFiltered = User::where(function($query){
                                        $query->where('status','!=',0);
                                    })
                                    ->where(function($query) use($search){
                                        $query->Where('id','LIKE',"%{$search}%")
                                        ->orWhere('name', 'LIKE',"%{$search}%")
                                        ->orWhere('email', 'LIKE',"%{$search}%")
                                        ->orWhere('phone', 'LIKE',"%{$search}%");
                                    })
                                    ->count();
        }

        $data = array();

        if(!empty($users))
        {
            $sno = $start+1;

            foreach ($users as $user)
            {
                $nestedData['sno'] = $sno;


                if($user->profile_pic != null)
                {
                    $profile_pic = $user->profile_pic;
                }
                else
                {
                    $profile_pic = $user->gender?'male_pic.png':'female_pic.png';
                }

                $name = '<a href="'.url('/superadmin/user').'/'.$user->id.'" style="color:black;"><img class="img img-radius img-responsive" style="height:50px;width:50px;border-radius:50%;margin-right:5px;" src="'.asset('/sources/assets/images/user_profile').'/'.$profile_pic.'" /> '.ucfirst($user->name).' <br><small>'.$user->email.'</small><br><small>'.$user->phone.'</small></a>';

                $nestedData['name_email_phone_gender'] = $name;
                // $nestedData['phone'] = $user->phone;
                // $nestedData['email'] = $user->email;
                // $nestedData['gender'] = $user->gender;

                $nestedData['basic_card_limit'] = Card::where('user_id',$user->id)->where('card_type','basic')->count();
                $nestedData['premium_card_limit'] = Card::where('user_id',$user->id)->where('card_type','premium')->count();

                $nestedData['joined_at'] = Carbon::createFromFormat('Y-m-d H:i:s',  $user->created_at, 'Asia/kolkata')->format('Y-m-d g:i A');

                if($user->status==1)
                {
                    $nestedData['status'] = '<i style="font-size:1.2rem;cursor:pointer;color:green;" onclick="change_user_status(\''.$user->id.'\',\''.$user->status.'\')" class="fa fa-toggle-on"></i>';
                }
                else if($user->status==2)
                {
                    $nestedData['status'] = '<i style="font-size:1.2rem;cursor:pointer;color:red;" onclick="change_user_status(\''.$user->id.'\',\''.$user->status.'\')" class="fa fa-toggle-off"></i>';
                }

                $nestedData['referred_by'] = $user->referred_by!=null ? $user->referred_by:'-';


                // $nestedData['status'] = $user->status==1 ? '<i style="font-size:1.2rem;cursor:pointer;color:green;" onclick="change_user_status(\''.$user->id.'\',\''.$user->status.'\')" class="fa fa-toggle-on"></i>' : $user->status==2 ? '<i style="font-size:1.2rem;cursor:pointer;color:red;" onclick="change_user_status(\''.$user->id.'\',\''.$user->status.'\')" class="fa fa-toggle-off"></i>':'';
                // $nestedData['created_at'] = date('j M Y h:i a',strtotime($operation->created_at));
                
                $btn = '<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>';
                $btn = $btn.'<div class="dropdown-menu dropdown-menu-right b-none contact-menu" style="width:100px;">';
                $btn = $btn.'<a href="'.url('/superadmin/user/'.$user->id.'').'" class="dropdown-item"><i class="fa fa-eye"></i> View</a>';
                $btn = $btn.' <a href="#!"  onclick="add_user(\''.$user->id.'\')" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>';
                $btn = $btn.' <a href="#!"  onclick="delete_user(\''.$user->id.'\')" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>';
                $btn = $btn.'</div>';
                
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

    public function get_all_users(Request $request)
    {
        $users = User::where('status','!=',0)->get();

        if(count($users))
        {
            $response = array(
                'status'=>'Success',
                'response'=>$users
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

    public function get_all_sms_users()
    {
        $users = StoreSmsNumber::get();

        if(count($users))
        {
            $response = array(
                'status'=>'Success',
                'response'=>$users
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

    public function send_bulk_sms(Request $request)
    {
        $msg = $request['msg'];
        $data = "userid=b2bdvc&password=123456&sender=MYEDVC&mobileno=".$request['customer_list']."&msg=".$msg;

        $ch = curl_init('http://trans.msg360.in/websms/sendsms.aspx');

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        $response = array(
            'status'=>'Success',
            'response'=>'SMS sent successfully!'
        );
                                                            
        return response()->json($response);
    }

    public function get_all_user_requests(Request $request)
    {
        $columns = array( 
            0 =>'id', 
            1 =>'name',
            2 =>'phone',
            3 =>'email'
        );

        $totalData = User::where(function($query){
            $query->where('status','=',0);
        })->count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $users = User::where(function($query){
                            $query->where('status','=',0);
                        })
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
        }
        else
        {
            $search = $request->input('search.value'); 

            $users =  User::where(function($query){
                                    $query->where('status','=',0);
                                })
                                ->where(function($query) use($search){
                                    $query->Where('id','LIKE',"%{$search}%")
                                    ->orWhere('name', 'LIKE',"%{$search}%")
                                    ->orWhere('email', 'LIKE',"%{$search}%")
                                    ->orWhere('phone', 'LIKE',"%{$search}%");
                                })
                                ->offset($start)
                                ->limit($limit)
                                ->orderBy($order,$dir)
                                ->get();

            $totalFiltered = User::where(function($query){
                                        $query->where('status','=',0);
                                    })
                                    ->where(function($query) use($search){
                                        $query->Where('id','LIKE',"%{$search}%")
                                        ->orWhere('name', 'LIKE',"%{$search}%")
                                        ->orWhere('email', 'LIKE',"%{$search}%")
                                        ->orWhere('phone', 'LIKE',"%{$search}%");
                                    })
                                    ->count();
        }

        $data = array();

        if(!empty($users))
        {
            $sno = $start+1;

            foreach ($users as $user)
            { 
                $nestedData['sno'] = $sno;

                if($user->profile_pic != null)
                {
                    $profile_pic = $user->profile_pic;
                }
                else
                {
                    $profile_pic = $user->gender?'male_pic.png':'female_pic.png';
                }

                $name = '<a href="'.url('/superadmin/user').'/'.$user->id.'" style="color:black;"><img class="img img-radius img-responsive" style="height:50px;width:50px;border-radius:50%;margin-right:5px;" src="'.asset('/sources/assets/images/user_profile').'/'.$profile_pic.'" /> '.ucfirst($user->name).' <br><small>'.$user->email.'</small><br><small>'.$user->phone.'</small></a>';

                $nestedData['name_email_phone_gender'] = $name;

                $nestedData['joined_at'] = Carbon::createFromFormat('Y-m-d H:i:s',  $user->created_at, 'Asia/kolkata')->format('Y-m-d g:i A');
                
                $btn = '<button type="button" class="btn btn-primary btn-sm" style="margin-right:6px;" onclick="add_user(\''.$user->id.'\')"><i class="fa fa-check" aria-hidden="true"></i></button>';
                $btn = $btn.'<button type="button" class="btn btn-danger btn-sm" style="margin-right:6px;" onclick="delete_user(\''.$user->id.'\')"><i class="fa fa-times" aria-hidden="true"></i></button>';
                
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

    public function get_single_user(Request $request)
    {
        $id = $request['user_id'];

        $get_user = User::where('id',$id)->get();

        if(count($get_user)==1)
        {
            $basic_cards = Card::where('user_id',$get_user[0]->id)->where('card_type','basic')->count();
            $premium_cards = Card::where('user_id',$get_user[0]->id)->where('card_type','premium')->count();

            $response = array(
                'status'=>'Success',
                'response'=>$get_user[0],
                'basic_cards'=>$basic_cards,
                'premium_cards'=>$premium_cards
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

    public function add_update_user(Request $request)
    {
        if($request['user_id']!=null)
        {
            $validator = \Validator::make($request->all(), [
                'user_id'=>'required',
                'name'=>'required|min:3',
                'email'=>'required|email', 
                'phone'=>'required|numeric',
                'gender'=>'required' 
            ]);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }
            else
            {
                if(isset($request['check_basic_card']))
                {
                    if(count($request['basic_expiry_on'])!=0)
                    {
                        for ($i=0; $i <count($request['basic_expiry_on']); $i++)
                        { 
                            $expiry_date = $request['basic_expiry_on'][$i];
    
                            if(trim($expiry_date)!='')
                            {
                                $test_arr  = explode('-', $expiry_date);
                                if(!checkdate($test_arr[1], $test_arr[2], $test_arr[0]))
                                {
                                    return response()->json(['errors'=>['basic_card'=>['Invalid basic card expiry date!']]]);
                                }
                                else
                                {
                                    $today = date("Y-m-d",strtotime(carbon::now()));
                                    $expiry_date = date('Y-m-d',strtotime($expiry_date));                        
                                
                                    if($expiry_date < $today)
                                    {
                                        return response()->json(['errors'=>['basic_card'=>['Invalid basic card expiry date!']]]);
                                    }
                                }
                            }
                            else
                            {
                                return response()->json(['errors'=>['basic_card'=>['Invalid basic card expiry date!']]]);
                            }
                        }
                    }
                }

                if(isset($request['check_premium_card']))
                {
                    if(count($request['premium_expiry_on'])!=0)
                    {
                        for ($i=0; $i <count($request['premium_expiry_on']); $i++)
                        { 
                            $expiry_date = $request['premium_expiry_on'][$i];
    
                            if(trim($expiry_date)!='')
                            {
                                $test_arr  = explode('-', $expiry_date);
                                if(!checkdate($test_arr[1], $test_arr[2], $test_arr[0]))
                                {
                                    return response()->json(['errors'=>['premium_card'=>['Invalid premium card expiry date!']]]);
                                }
                                else
                                {
                                    $today = date("Y-m-d",strtotime(carbon::now()));
                                    $expiry_date = date('Y-m-d',strtotime($expiry_date));                        
                                
                                    if($expiry_date < $today)
                                    {
                                        return response()->json(['errors'=>['premium_card'=>['Invalid premium card expiry date!']]]);
                                    }
                                }
                            }
                            else
                            {
                                return response()->json(['errors'=>['premium_card'=>['Invalid premium card expiry date!']]]);
                            }
                        }
                    }
                }

                \DB::beginTransaction();

                try
                {
                    $check_phone = User::where('id','!=',$request['user_id'])->where('phone',$request['phone'])->count();

                    if($check_phone==0)
                    {
                        $user = User::where('id',$request['user_id'])->get();

                        if($user[0]->password!=null)
                        {
                            User::where('id',$request['user_id'])
                                ->update([
                                    'name'=>strtolower($request['name']),
                                    'email'=>strtolower($request['email']),
                                    'phone'=>strtolower($request['phone']),
                                    'gender'=>$request['gender'],
                                    'status'=>1
                                ]);
                        }
                        else
                        {
                            User::where('id',$request['user_id'])
                            ->update([
                                'name'=>strtolower($request['name']),
                                'email'=>strtolower($request['email']),
                                'phone'=>strtolower($request['phone']),
                                'gender'=>$request['gender'],
                                'status'=>1,
                                'password'=>\Hash::make($request['phone'])
                            ]);
                        }


                            if(isset($request['check_basic_card']))
                            {
                                if(count($request['basic_expiry_on'])!=0)
                                {
                                    for ($i=0; $i <count($request['basic_expiry_on']); $i++)
                                    { 
                                        $expiry_date = $request['basic_expiry_on'][$i];
                
                                        if(trim($expiry_date)!='')
                                        {
                                            $test_arr  = explode('-', $expiry_date);
                                            if(checkdate($test_arr[1], $test_arr[2], $test_arr[0]))
                                            {
                                                $today = date("Y-m-d",strtotime(carbon::now()));
                                                $expiry_date = date('Y-m-d',strtotime($expiry_date));                        
                                            
                                                if($expiry_date >= $today)
                                                {
                                                    Card::create([
                                                        'user_id'=>$request['user_id'],
                                                        'card_type'=>'basic',
                                                        'expiry_on'=>$expiry_date
                                                    ]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
        
                            if(isset($request['check_premium_card']))
                            {
                                if(count($request['premium_expiry_on'])!=0)
                                {
                                    for ($i=0; $i <count($request['premium_expiry_on']); $i++)
                                    { 
                                        $expiry_date = $request['premium_expiry_on'][$i];
                
                                        if(trim($expiry_date)!='')
                                        {
                                            $test_arr  = explode('-', $expiry_date);
                                            if(checkdate($test_arr[1], $test_arr[2], $test_arr[0]))
                                            {
                                                $today = date("Y-m-d",strtotime(carbon::now()));
                                                $expiry_date = date('Y-m-d',strtotime($expiry_date));                        
                                            
                                                if($expiry_date >= $today)
                                                {
                                                    Card::create([
                                                        'user_id'=>$request['user_id'],
                                                        'card_type'=>'premium',
                                                        'expiry_on'=>$expiry_date
                                                    ]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        
                            \DB::commit();

                            $response = array(
                                'status'=>'Success',
                                'response'=>'User updated successfully!'
                            );
                    }
                    else
                    {
                        $response = array(
                            'status'=>'Error',
                            'response'=>'User phone already exists!'
                        );
                    }


                }
                catch (\Exception $e)
                {
                    \DB::rollback();

                    $response = array(
                        'status'=>'Error',
                        'response'=>'Please try again!'
                    );
                }

                return response()->json($response);
            }

        }
        else
        {
            $validator = \Validator::make($request->all(), [
                'name'=>'required|min:3',
                'email'=>'required|email', 
                'phone'=>'required|digits:10|unique:users',
                'gender'=>'required' 
            ]);
    
            if($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()]);
            }
            else
            {
                if(isset($request['check_basic_card']))
                {
                    if(count($request['basic_expiry_on'])!=0)
                    {
                        for ($i=0; $i <count($request['basic_expiry_on']); $i++)
                        { 
                            $expiry_date = $request['basic_expiry_on'][$i];
    
                            if(trim($expiry_date)!='')
                            {
                                $test_arr  = explode('-', $expiry_date);

                                // return response()->json($test_arr);
                                
                                if(!checkdate($test_arr[1], $test_arr[2], $test_arr[0]))
                                {
                                    return response()->json(['errors'=>['basic_card'=>['Invalid basic card expiry date!']]]);
                                }
                                else
                                {
                                    $today = date("Y-m-d",strtotime(carbon::now()));
                                    $expiry_date = date('Y-m-d',strtotime($expiry_date));                        
                                
                                    if($expiry_date < $today)
                                    {
                                        return response()->json(['errors'=>['basic_card'=>['Invalid basic card expiry date!']]]);
                                    }
                                }
                            }
                            else
                            {
                                return response()->json(['errors'=>['basic_card'=>['Invalid basic card expiry date!']]]);
                            }
                        }
                    }
                }

                if(isset($request['check_premium_card']))
                {
                    if(count($request['premium_expiry_on'])!=0)
                    {
                        for ($i=0; $i <count($request['premium_expiry_on']); $i++)
                        { 
                            $expiry_date = $request['premium_expiry_on'][$i];
    
                            if(trim($expiry_date)!='')
                            {
                                $test_arr  = explode('-', $expiry_date);
                                if(!checkdate($test_arr[1], $test_arr[2], $test_arr[0]))
                                {
                                    return response()->json(['errors'=>['premium_card'=>['Invalid premium card expiry date!']]]);
                                }
                                else
                                {
                                    $today = date("Y-m-d",strtotime(carbon::now()));
                                    $expiry_date = date('Y-m-d',strtotime($expiry_date));                        
                                
                                    if($expiry_date < $today)
                                    {
                                        return response()->json(['errors'=>['premium_card'=>['Invalid premium card expiry date!']]]);
                                    }
                                }
                            }
                            else
                            {
                                return response()->json(['errors'=>['premium_card'=>['Invalid premium card expiry date!']]]);
                            }
                        }
                    }
                }

                \DB::beginTransaction();

                try
                {
                    $user = User::create([
                                'name'=>strtolower($request['name']),
                                'email'=>strtolower($request['email']),
                                'phone'=>strtolower($request['phone']),
                                'gender'=>$request['gender'],
                                'status'=>1,
                                'password'=>\Hash::make($request['phone'])
                            ]);

                    if(isset($request['check_basic_card']))
                    {
                        if(count($request['basic_expiry_on'])!=0)
                        {
                            for ($i=0; $i <count($request['basic_expiry_on']); $i++)
                            { 
                                $expiry_date = $request['basic_expiry_on'][$i];
        
                                if(trim($expiry_date)!='')
                                {
                                    $test_arr  = explode('-', $expiry_date);
                                    if(checkdate($test_arr[1], $test_arr[2], $test_arr[0]))
                                    {
                                        $today = date("Y-m-d",strtotime(carbon::now()));
                                        $expiry_date = date('Y-m-d',strtotime($expiry_date));                        
                                    
                                        if($expiry_date >= $today)
                                        {
                                            Card::create([
                                                'user_id'=>$user->id,
                                                'card_type'=>'basic',
                                                'expiry_on'=>$expiry_date
                                            ]);
                                        }
                                    }
                                }
                            }
                        }
                    }

                    if(isset($request['check_premium_card']))
                    {
                        if(count($request['premium_expiry_on'])!=0)
                        {
                            for ($i=0; $i <count($request['premium_expiry_on']); $i++)
                            { 
                                $expiry_date = $request['premium_expiry_on'][$i];
        
                                if(trim($expiry_date)!='')
                                {
                                    $test_arr  = explode('-', $expiry_date);
                                    if(checkdate($test_arr[1], $test_arr[2], $test_arr[0]))
                                    {
                                        $today = date("Y-m-d",strtotime(carbon::now()));
                                        $expiry_date = date('Y-m-d',strtotime($expiry_date));                        
                                    
                                        if($expiry_date >= $today)
                                        {
                                            Card::create([
                                                'user_id'=>$user->id,
                                                'card_type'=>'premium',
                                                'expiry_on'=>$expiry_date
                                            ]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                    
                    \DB::commit();

                    $response = array(
                        'status'=>'Success',
                        'response'=>'User added successfully!'
                    );
                }
                catch (\Exception $e)
                {
                    \DB::rollback();

                    $response = array(
                        'status'=>'Error',
                        'response'=>'Please try again!',
                        'data'=>$e
                    );
                }

                return response()->json($response);
            }
        }
    }

    public function change_user_status(Request $request)
    {
        $id = $request['user_id'];
        $status = $request['status'];

        if($status==1)
        {
            $status=2;
        }
        else if($status==2)
        {
            $status=1;
        }

        \DB::beginTransaction();

        try
        {
            User::where('id',$id)->update([
                'status'=>$status
            ]);

            if($status==1)
            {
                $response = array(
                    'status'=>'Success',
                    'response'=>'Account activated successfully!'
                );
            }
            else if($status==2)
            {
                $response = array(
                    'status'=>'Success',
                    'response'=>'Account deactivated successfully!'
                );
            }

            \DB::commit();
        }
        catch (\Exception $e)
        {
            $response = array(
                'status'=>'Error',
                'response'=>'Please try again!'
            );

            \DB::rollback();
        }

        return response()->json($response);
    }

    public function delete_user(Request $request)
    {
        \DB::beginTransaction();

        try
        {
           $get_user = User::where('id',$request['user_id'])->get();

            if(count($get_user)==1)
            {
                Card::where('user_id',$request['user_id'])->delete();

                User::where('id',$request['user_id'])->delete();

                $response = array(
                    'status'=>'Success',
                    'response'=>'User & cards deleted successfully!'
                );
            }
            else
            {
                $response = array(
                    'status'=>'Warning',
                    'response'=>'No records found!'
                );                

                \DB::rollback();
            }
            
            \DB::commit();
        } 
        catch (\Exception $e)
        {
            $response = array(
                'status'=>'Error',
                'response'=>'Please try again!'
            );

            \DB::rollback();
        }

        return response()->json($response);
    }

    public function view_single_user($user_id)
    {
        $user = User::where('id',$user_id)->firstOrFail();

        $user_details = array(
            'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'phone'=>$user->phone,
            'gender'=>$user->gender,
            'joined_on'=>Carbon::createFromFormat('Y-m-d H:i:s',  $user->created_at, 'Asia/kolkata')->format('Y-m-d g:i A')
        );

        return view('superadmin_dashboard.single-user', compact('user_details'));
    }

    public function change_user_profile_pic(Request $request)
    {
        $user_id = $request['id'];
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);
        $image_name= time().'.png';
        $path = public_path() . "/sources/assets/images/user_profile/".$image_name;

        file_put_contents($path, $data);

        $update_profile_pic = User::where('id',$user_id)
                            ->update([
                                'profile_pic'=>$image_name
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

    public function delete_user_profile_pic(Request $request)
    {
        $delete_pic = User::where('id',$request['id'])
                                ->update([
                                    'profile_pic'=>null
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
                'response'=>'Profile pic removed successfully!'
            );
        }

        return response()->json($response);
    }

}
