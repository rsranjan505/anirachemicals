<?php

namespace App\Http\Controllers;

use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use HelperTrait;

    public $publicurl;
    //
    public function index(){
        $title = 'Anira Chemicals - Contact';
        $description = 'Lane No-1, Nathanpur Raod,  Dehardun (Uttrakhand) Pin-248005.';
        $keywords = 'Contact, Contact Anira Chemicals, construction Chemicals , Contact anira Chemicals info, Anira Chemicals Contact ';
        $og_url = 'http://anirachemicals.com/contact';
        $og_type = 'article';

        return view('pages.contact', [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'og_type'     => $og_type,
            'og_url'     => $og_url,
            'publicurl'   => $this->getPublicUrl()
        ]);
    }

    public function contactEmail(Request $request){
        $message = [
            'type' => "contact",
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->message,
        ];

        $sent = $this->send_email($message,'contact');
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
}
