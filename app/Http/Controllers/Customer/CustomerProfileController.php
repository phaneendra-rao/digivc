<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

use App\User;

class CustomerProfileController extends Controller
{
    public function get_account_details()
    {
        $get_account_details = User::where('id', auth()->user()->id)->get();

        if (count($get_account_details) == 1) {
            $response = array(
                'status' => 'Success',
                'response' => $get_account_details[0]
            );
        } else {
            $response = array(
                'status' => 'Error',
                'response' => 'Please logout & login!'
            );
        }

        return response()->json($response);
    }

    public function change_profile_dp(Request $request)
    {
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);
        $image_name = time() . '.png';
        $path = public_path() . "/sources/assets/images/users/profile_pics/" . $image_name;

        file_put_contents($path, $data);

        $update_profile_pic = User::where('id', auth()->user()->id)
            ->update([
                'profile_pic' => $image_name
            ]);

        if (!$update_profile_pic) {
            $response = array(
                'status' => 'Error',
                'response' => 'Something went wrong, please try again.'
            );
        } else {
            $response = array(
                'status' => 'Success',
                'response' => 'Successfully updated profile pic!'
            );
        }

        return response()->json($response);
    }

    public function delete_profile_pic()
    {
        $delete_dp = User::where('id', auth()->user()->id)->update([
            'profile_pic' => null,
        ]);

        if (!$delete_dp) {
            $response = array(
                'status' => 'Error',
                'response' => 'Something went wrong, please try again!'
            );
        } else {
            $response = array(
                'status' => 'Success',
                'response' => 'Profile pic deleted successfully!'
            );
        }

        return response()->json($response);
    }

    public function save_profile(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'full_name' => 'required|min:3',
            'phone_no' => 'required',
            'dail_code' => 'required|numeric',
            'country_code' => 'required',
            'country_name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'gender' => 'required|max:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $phone_no = str_replace(' ', '', $request['phone_no']);

            if (!is_numeric($phone_no)) {
                return response()->json(['errors' => ['phone_no' => ['Invalid Phone No!']]]);
            }

            $genders = array('m', 'f');

            if (!in_array($request['gender'], $genders)) {
                return response()->json(['errors' => ['gender' => ['Invalid Gender!']]]);
            }

            if (User::where('id', '!=', auth()->user()->id)->where('phone_no', $phone_no)->withTrashed()->count() == 0) {

                $country_name = explode(" ", $request['country_name']);
                $country_name = implode(" ", array_slice($country_name, -0, 1));
                $time_zone = Countries::where('name.common', $country_name)->first()->hydrate('timezones')->timezones->first()->zone_name;

                $update_profile = User::where('id', auth()->user()->id)
                    ->update([
                        'full_name' => $request['full_name'],
                        'gender' => $request['gender'],
                        'email' => $request['email'],
                        'dob' => date('Y-m-d', strtotime($request['dob'])),
                        'phone_no' => $request['phone_no'],
                        'dail_code' => $request['dail_code'],
                        'country_code' => $request['country_code'],
                        'country_name' => $request['country_name'],
                        'time_zone' => $time_zone
                    ]);

                if (!$update_profile) {
                    $response = array(
                        'status' => 'Error',
                        'response' => 'Please try again!'
                    );
                } else {
                    $response = array(
                        'status' => 'Success',
                        'response' => 'Profile updated successfully!'
                    );
                }
            } else {
                $response = array(
                    'status' => 'Error',
                    'response' => 'Phone no already taken!'
                );
            }

            return response()->json($response);
        }
    }

    public function save_password(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'old_password' => 'required|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            if (!\Hash::check($request->old_password, auth()->user()->password)) {
                $response = array(
                    'status' => 'Error',
                    'response' => 'Invalid Old Password'
                );

                return response()->json($response);
            } else {
                $update_password = User::where('id', auth()->user()->id)
                    ->update([
                        'password' => \Hash::make($request['password'])
                    ]);

                if (!$update_password) {
                    $response = array(
                        'status' => 'Error',
                        'response' => 'Something went wrong, please try again.'
                    );
                } else {
                    $response = array(
                        'status' => 'Success',
                        'response' => 'Password changed successfully!'
                    );
                }

                return response()->json($response);
            }
        }
    }
}
