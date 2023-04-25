<?php

namespace App\Jobs;

use App\Mail\CompanyUserWelcomeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NewCompanyUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */   
    public function __construct($data)
    {
        $this->data=$data;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail = new CompanyUserWelcomeMail($this->data);
        Mail::to($this->data['email'])->send($mail);
    }
}
