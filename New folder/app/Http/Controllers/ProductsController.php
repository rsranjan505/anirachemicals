<?php

namespace App\Http\Controllers;

use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    use HelperTrait;
    //
    public function index(){
        $title = 'Anira Chemicals - Products';
        $description = 'Products - Anira Chemicals is a young manufacturer of wide range of construction chemicals and allied products.  At ACPL, we aim at delivering high quality goods and providing impeccable services .We are a technologically driven company and excel in providing customized/  tailor made solutions for our customers to  suit their specific requirements.';
        $keywords = 'Products, Products Anira Chemicals, waterproofing Chemicals , Products anira Chemicals info, Anira Chemicals Products ';
        $og_url = 'http://anirachemicals.com/product';
        $og_type = 'information';

        return view('pages.product', [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'og_type'     => $og_type,
            'og_url'     => $og_url,
            'publicurl'   => $this->getPublicUrl()
        ]);
    }
    public function downloadbrowser()
    {
        $browser = Storage::disk('public/assets/img/')->get('broser.pdf');
        // $browser = public("assets/img/broser.pdf");
        $headers = ['Content-Type: application/pdf'];
    	return response()->download($browser, $headers);
    }
}
