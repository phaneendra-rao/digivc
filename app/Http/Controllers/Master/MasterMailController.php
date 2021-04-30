<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

  
class MasterMailController extends Controller
{
    public function send_queue_emails(Request $request)
    {
        $file = fopen(public_path('web_sources/certificates_list.csv'),"r");

        $flag = 0;

        while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE)
        {
            if($flag)
            {
                if($flag>=371 && $flag<=380)
                // if($flag==323)
                // if($flag<=346)
                // if($flag==1)
                {
                    if(trim($filedata[0])!='' && trim($filedata[2])!='' && trim($filedata[3])!='')
                    {
                        // echo $filedata[0].' '.$filedata[2].' '.$filedata[3];
                        $name = ucwords(trim($filedata[3]));
                        // $name = 'Phaneendra rao';


                        $details = [
                            'attachment'=>public_path('web_sources/Certificates').'/'.'Child Labour-'.$filedata[0].'.pdf',
                            'email'=> strtolower(preg_replace('/\s+/', '', trim($filedata[2]))),
                            // 'email' => 'phaneendraraosuddapalli@gmail.com',
                            'subject' => 'Participation Certificate for World day Against Child Labour - Sudheer Sandra',
    
                            'body' => [
                                'content'=>'<h4>Dear '.$name.', </h4>
                                <p>Thank you for Participating in Poster Competition on World day Against Child and Making it successful.</p>
                                <p>Here is the Certificate of Participation.</p>
                                <p>Thank you, <br> <b>- Sudheer Sandra</b> <br> Psychologist, CEO, Mindify. <br> www.sudheersandra.com</p>']
                        ];

                        dispatch(new \App\Jobs\SendEmailJob($details));

                        // $message->to($email)
                        // ->from($fromEmail, $fromName)
                        // ->subject($subject)
                        // ->body($body)
                        // ->attach(public_path('web_sources/Certificates').'/'.'Child Labour-'.$sno.'.pdf');
                        
                        // Mail::send(['html'=>'emails.email_with_attachment'], $body, function($message) use($fromName, $fromEmail, $email, $subject, $sno){

                        // });

                        // sleep(4);
                    }
                }
            }

            $flag++;

        }

        echo "done!";
    }
}