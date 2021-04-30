<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailTest;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
  
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
   
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $body = new SendEmailTest($this->details['body']);
        $body = $this->details['body'];
        $email = $this->details['email'];
        $subject = $this->details['subject'];
        $attachment = $this->details['attachment'];

        $fromEmail = 'teamsudheersandradigital@gmail.com';
        // $fromName = 'Sudheer Sandra';

        // $fromEmail = 'phaneendra@digitalconnect.in';
        $fromName = 'Team Sudheer Sandra';

        Mail::send(['html'=>'emails.email_with_attachment'], $body, function($message) use($fromName, $fromEmail, $email, $subject, $attachment){
            $message->to($email)
                    ->from($fromEmail, $fromName)
                    ->subject($subject);

            $message->attach($attachment);
        });

        // Mail::to($this->details['email'])->send($body);
    }
}
