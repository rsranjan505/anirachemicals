<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class CompanyAdminWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public function __construct($data)
    {
        $this->data=$data;
    }

    public function build()
    {
        return $this->subject('Welcome To MyFieldHeroes')->markdown('emails.NewCompanyAdmin')>with([
            'data' => $this->data
        ]);
    }
}
