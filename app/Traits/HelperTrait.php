<?php

namespace App\Traits;

use Illuminate\Support\Facades\Mail;

trait HelperTrait
{
    //
    public $publucUrl;
    public $adminemail ;

    public function getPublicUrl(){
        return config('app.env') == 'local' ? '' : 'public/';
    }

    public function send_email($data, $type) {

        $this->adminemail = config('mail.mailers.smtp.username',null);
        if( $type == 'contact'){
            $this->data = $data;

            Mail::send('pages.contact_mail', $data, function($message) {
                $message->to($this->adminemail, 'Customer Contact')->subject
                    ('Contact ');
                $message->from($this->data['email'],$this->data['name']);
            });

            return true;
        }
        if( $type == 'enquiry'){
            $this->data = $data;
            Mail::send('pages.enquiry_mail', $data, function($message) {
                $message->to($this->adminemail, 'Tutorials Point')->subject
                    ('Enquiry ');
                $message->from($this->data['email'],$this->data['first_name']);
            });

            return true;
        }




        // $data = array('name'=>"Virat Gandhi");

        // Mail::send(['text'=>'pages.mail'], $data, function($message) {
        //    $message->to(config('mail.mailers.smtp.username',null), 'Tutorials Point')->subject
        //       ('Laravel Basic Testing Mail');
        //    $message->from('xyz@gmail.com','Virat Gandhi');
        // });
   }

   public function contact_email($data) {
    $data = array('name'=>"Virat Gandhi");
    Mail::send('mail', $data, function($message) {
       $message->to('abc@gmail.com', 'Tutorials Point')->subject
          ('Laravel HTML Testing Mail');
       $message->from('xyz@gmail.com','Virat Gandhi');
    });
    echo "HTML Email Sent. Check your inbox.";
 }
}
