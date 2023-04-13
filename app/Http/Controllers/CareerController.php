<?php

namespace App\Http\Controllers;

use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    use HelperTrait;
    //
    public function index(){
        $title = 'Anira Chemicals - Career';
        $description = 'Anira Chemicals is a young manufacturer of wide range of construction chemicals and allied products.  At ACPL, we aim at delivering high quality goods and providing impeccable services .We are a technologically driven company and excel in providing customized/  tailor made solutions for our customers to  suit their specific requirements.';
        $keywords = 'Career, Career Anira Chemicals, construction Chemicals , Career anira Chemicals info, Anira Chemicals Career ';
        $og_url = 'http://anirachemicals.com/career';
        $og_type = 'article';

        return view('pages.career', [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'og_type'     => $og_type,
            'og_url'     => $og_url,
            'publicurl'   => $this->getPublicUrl()
        ]);
    }
}
