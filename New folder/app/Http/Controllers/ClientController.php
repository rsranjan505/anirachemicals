<?php

namespace App\Http\Controllers;

use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use HelperTrait;
    //
    public function index(){
        $title = 'Anira Chemicals - Client';
        $description = 'Client - Anira Chemicals is a young manufacturer of wide range of construction chemicals and allied products.  At ACPL, we aim at delivering high quality goods and providing impeccable services .We are a technologically driven company and excel in providing customized/  tailor made solutions for our customers to  suit their specific requirements.';
        $keywords = 'Client, Client Anira Chemicals, construction Chemicals , Client anira Chemicals info, Anira Chemicals Client ';
        $og_url = 'http://anirachemicals.com/client';
        $og_type = 'article';

        return view('pages.client', [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'og_type'     => $og_type,
            'og_url'     => $og_url,
            'publicurl'   => $this->getPublicUrl()
        ]);
    }
}
