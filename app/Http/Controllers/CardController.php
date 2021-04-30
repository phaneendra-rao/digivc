<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Card;
use App\CardEnquiry;
use App\User;
use App\StoreSmsNumber;
use App\CardAddress;
use App\CardClient;
use App\CardGstNo;
use App\CardService;
use App\CardShareableLink;
use App\OnlinePayment;
use App\CardProduct;
use App\CardVideo;
use App\CardGalleryImage;
use App\CardDc;
use JeroenDesloovere\VCard\VCard;
use Symfony\Component\HttpFoundation\Response;

use Carbon\Carbon;


class CardController extends Controller
{
    public function card($slug)
    {
        $my_card = Card::where('slug', $slug)->firstorfail();

        $card_addresses = CardAddress::where('card_id', $my_card->id)->get();

        if (count($card_addresses) == 0) {
            $card_addresses = null;
        }

        $card_gst_nos = CardGstNo::where('card_id', $my_card->id)->get();

        if (count($card_gst_nos) == 0) {
            $card_gst_nos = null;
        }

        $card_services = CardService::where('card_id', $my_card->id)->get();

        if (count($card_services) == 0) {
            $card_services = null;
        }

        $card_shareable_links = CardShareableLink::where('card_id', $my_card->id)->get();

        if (count($card_shareable_links) == 0) {
            $card_shareable_links = null;
        }

        $online_payments = OnlinePayment::where('card_id', $my_card->id)->get();

        if (count($online_payments) == 0) {
            $online_payments = null;
        }

        $clients = CardClient::where('card_id', $my_card->id)->get();

        if (count($clients) == 0) {
            $clients = null;
        }

        if ($my_card->card_type == 'basic') {
            if ($my_card->template == 1) {
                return view('templates.template_one_basic', compact('my_card', 'card_addresses', 'card_gst_nos', 'card_services', 'card_shareable_links', 'online_payments', 'clients'));
            }
        } else if ($my_card->card_type == 'premium') {
            $products = CardProduct::where('card_id', $my_card->id)->get();

            if (count($products) == 0) {
                $products = null;
            }

            $videos = CardVideo::where('card_id', $my_card->id)->get();

            if (count($videos) == 0) {
                $videos = null;
            }

            $images = CardGalleryImage::where('card_id', $my_card->id)->get();

            if (count($images) == 0) {
                $images = null;
            }

            $attachments = CardDc::where('card_id', $my_card->id)->get();

            if (count($attachments) == 0) {
                $attachments = null;
            }

            if ($my_card->template == 1) {
                return view('templates.template_one_premium', compact('my_card', 'card_addresses', 'card_gst_nos', 'card_services', 'card_shareable_links', 'online_payments', 'clients', 'products', 'videos', 'images', 'attachments'));
                // return view('templates.template_one_premium', compact('my_card', 'company_address', 'company_bank_detail', 'company_gst_no', 'company_service', 'company_shareable_link', 'online_payment', 'videos', 'images', 'attachments', 'products', 'clients'));
                // return view('templates.template_one_premium', compact('my_card', 'company_address', 'company_bank_detail', 'company_gst_no', 'company_service', 'company_shareable_link', 'online_payment', 'videos', 'images', 'attachments', 'products', 'clients'));
            }
        }
    }

    public function save_vcard($card_id)
    {
        $card = Card::where('id', $card_id)->firstOrFail();
        // dd($card);
        $company_name = $card->company_name != null ? $card->company_name : '';
        $company_designation = $card->contact_person_designation != null ? $card->contact_person_designation : '';
        $email = $card->company_email != null ? $card->company_email : '';
        $contact_person_phone = $card->contact_person_phone != null ? $card->contact_person_phone : '';
        $company_phone = $card->company_phone != null ? '+' . $card->company_phone : '';
        $company_address = $card->company_address != null ? $card->company_address : '';
        $company_website = $card->company_website != null ? $card->company_website : '';

        // define vcard
        $vcard = new VCard();

        // define variables
        $lastname = '';
        $firstname = $card->contact_person_name != null ? $card->contact_person_name : '';
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
        $response->headers->set('Content-Disposition', 'attachment; filename="' . str_slug($firstname) . '.vcf"');
        $response->headers->set('Content-Length', mb_strlen($content, 'utf-8'));

        return $response;

        // return vcard as a download
        // return $vcard->download();

        // save vcard on disk
        //$vcard->setSavePath('/path/to/directory');
        //$vcard->save();
    }

    public function send_message(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3',
            'phone' => 'required|numeric',
            'card_id' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $store_message = CardEnquiry::create([
                'card_id' => $request['card_id'],
                'name' => $request['name'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'message' => $request['message']
            ]);

            if (!$store_message) {
                $response = array(
                    'status' => 'Error',
                    'response' => 'Please try again!'
                );
            } else {
                $card = Card::select('user_id', 'sms')->where('id', $request['card_id'])->get();

                if (count($card) == 1 && $card[0]->sms == 'enable') {
                    $user = User::where('id', $card[0]->user_id)->where('sms_credits', '>=', 1)->get();

                    if (count($user) == 1) {
                        User::where('id', $card[0]->user_id)->decrement('sms_credits', 1);

                        send_sms($request['name'], $request['phone'], $request['email'], $request['message'], $user[0]->phone_no);
                    }
                }


                $response = array(
                    'status' => 'Success',
                    'response' => 'Message sent successfully!'
                );
            }

            return response()->json($response);
        }
    }

    public function share_card(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'card_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $card_details = Card::where('id', $request['card_id'])->get();

            if (count($card_details) == 1) {
                StoreSmsNumber::create([
                    'name' => $request['name'],
                    'card_id' => $card_details[0]->id,
                    'number' => $request['phone_number']
                ]);

                share_card_sms($card_details[0]->contact_person_name, $card_details[0]->contact_person_designation, $card_details[0]->company_name, $card_details[0]->slug, $request['phone_number']);

                $response = array(
                    'status' => 'Success',
                    'response' => 'Card shared successfully!',
                    'data' => $card_details[0]->contact_person_name . ',' . $card_details[0]->contact_person_designation . ',' . $card_details[0]->company_name . ',' . $card_details[0]->slug . ',' . $request['phone_number']
                );
            } else {
                $response = array(
                    'status' => 'Warning',
                    'response' => 'No records found!'
                );
            }
        }

        return response()->json($response);
    }
}
