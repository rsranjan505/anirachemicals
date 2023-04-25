<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClass;
use App\Traits\HelperTrait;
use Illuminate\Support\Facades\Mail;

class DearlershipController extends Controller
{
    use HelperTrait;
    //
    public function index(){

        $title = 'Anira Chemicals - Dealership';
        $description = 'Dealership - Anira Chemicals is a young manufacturer of wide range of construction chemicals and allied products.  At ACPL, we aim at delivering high quality goods and providing impeccable services .We are a technologically driven company and excel in providing customized/  tailor made solutions for our customers to  suit their specific requirements.';
        $keywords = 'Dealership, Dealership Anira Chemicals, waterproofing Chemicals , Dealership anira Chemicals info, Anira Chemicals Dealership ';
        $og_url = 'http://anirachemicals.com/dealership';
        $og_type = 'article';

        return view('pages.dealership', [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'og_type'     => $og_type,
            'og_url'     => $og_url,
            'publicurl'   => $this->getPublicUrl()
        ]);
    }

    public function enquiryForm(Request $request){
        $message = [
            'type' => "enquiry",
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'state' => $request->state,
            'district' => $request->district,
            'msg' => $request->message,
        ];


        $sent = $this->send_email($message,'enquiry');
        if($sent){
            return response()->json([
                'status'=>'success',
                'message' => 'Message sent successfully',
                'data' => 'OK'
            ], 200);
        }
        return response()->json([
            'status'=>'error',
            'message' => 'Message not sent',
        ], 400);
    }


//    public function basic_email($message) {

//     $data = array('name'=>"Virat Gandhi");

//     Mail::send(['text'=>'pages.mail'], $data, function($message) {
//        $message->to(config('mail.mailers.smtp.username',null), 'Tutorials Point')->subject
//           ('Laravel Basic Testing Mail');
//        $message->from('xyz@gmail.com','Virat Gandhi');
//     });
//     echo "Basic Email Sent. Check your inbox.";
//  }
}
