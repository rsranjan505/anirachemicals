<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    use HelperTrait;
    //
    public function index(Request $request,$name){

        $product = $this->productDetails($name);

        $title = 'Anira Chemicals - Products-Details';
        $description = 'Products - Anira Chemicals is a young manufacturer of wide range of construction chemicals and allied products.  At ACPL, we aim at delivering high quality goods and providing impeccable services .We are a technologically driven company and excel in providing customized/  tailor made solutions for our customers to  suit their specific requirements.';
        $keywords = 'Products, Products Anira Chemicals, construction Chemicals , Products anira Chemicals info, Anira Chemicals Products ';
        $og_url = 'http://anirachemicals.com/details/paverbond';
        $og_type = 'information';

        return view('pages.details', [
            'title'       => $title,
            'description' => $description,
            'keywords'    => $keywords,
            'og_type'     => $og_type,
            'og_url'     => $og_url,
            'publicurl'   => $this->getPublicUrl(),
            'products' => $this->productsList(),
            'product' => $product
        ]);
    }

    public function productDetails($productName): ?Product
    {
        return Product::with('image')->where('name',$productName)->first();
    }
}
