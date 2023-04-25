<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class CompanyUserWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public function __construct($data)
    {
        $this->data=$data;
    }

    public function build()
    {
        return $this->subject('Welcome To '.$this->data['company'])->markdown('emails.NewCompanyUser')>with([
            'data' => $this->data
        ]);
    }
}
