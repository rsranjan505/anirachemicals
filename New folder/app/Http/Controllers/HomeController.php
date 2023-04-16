<?php

namespace App\Http\Controllers;

use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HelperTrait;
    //
    public function index(){

        $title = 'Anira Chemicals | Construction chemicals | Home';
        $description = 'Anira Chemicals is a young manufacturer of wide range of construction chemicals and allied products.  At ACPL, we aim at delivering high quality goods and providing impeccable services .We are a technologically driven company and excel in providing customized/  tailor made solutions for our customers to  suit their specific requirements.';
        $keywords = 'Home, Home Anira Chemicals, construction Chemicals , home anira Chemicals info, Anira Chemicals Home ';
        $og_url = 'http://anirachemicals.com/';
        $og_type = 'website';

        return view('home', [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'og_type'     => $og_type,
            'og_url'     => $og_url,
            'publicurl'   => $this->getPublicUrl()
        ]);
    }

}

