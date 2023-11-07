<?php

namespace App\Traits;

use App\Services\ProductService;
use Illuminate\Support\Facades\Mail;

trait HelperTrait
{
    //
    public $publucUrl;
    public $adminemail ;

    public ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getPublicUrl(){
        return config('app.env') == 'local' ? '' : 'public/';
    }

    public function send_email($data, $type) {

        $this->adminemail = "contact@anirachemicals.com";
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
   }

   //products list for header

   public function productsList(){
    return $this->productService->getProducts();
   }
}
