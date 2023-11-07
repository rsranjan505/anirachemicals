<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HelperTrait;

class GalleryController extends Controller
{
    use HelperTrait;
    public function index(){

        $title = 'Anira Chemicals | Construction chemicals | Gallery';
        $description = 'Anira Chemicals is a young manufacturer of wide range of construction chemicals and allied products.  At ACPL, we aim at delivering high quality goods and providing impeccable services .We are a technologically driven company and excel in providing customized/  tailor made solutions for our customers to  suit their specific requirements.';
        $keywords = 'Gallery, Gallery Anira Chemicals, construction Chemicals , Gallery anira Chemicals info, Anira Chemicals Gallery ';
        $og_url = 'http://anirachemicals.com/';
        $og_type = 'website';

        return view('pages.gallery', [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'og_type'     => $og_type,
            'og_url'     => $og_url,
            'publicurl'   => $this->getPublicUrl(),
            'products' => $this->productsList()
        ]);
    }
}
