<?php

namespace App\Http\Controllers;

use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use HelperTrait;
    //
    public function index(){
        $title = 'Anira Chemicals | Construction chemicals | About us';
        $description = 'Anira Chemicals is a young manufacturer of wide range of construction chemicals and allied products.  At ACPL, we aim at delivering high quality goods and providing impeccable services. We are a technologically driven company and excel in providing customized/  tailor made solutions for our customers to  suit their specific requirements.';
        $keywords = 'About us, About us Anira Chemicals, construction Chemicals , about us anira Chemicals info, Anira Chemicals About us ';
        $og_url = 'http://anirachemicals.com/about';
        $og_type = 'article';

        return view('pages.about', [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'og_type'     => $og_type,
            'og_url'     => $og_url,
            'publicurl'   => $this->getPublicUrl()
        ]);
    }
}
