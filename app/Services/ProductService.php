<?php

namespace App\Services;

use App\Models\PackingSize;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    protected $defaultPage = 5;
    protected $orderBy = 'DESC';

    public function getAllProducts()
    {
        return Product::with('creator','image')->orderBy('id',$this->orderBy)->paginate($this->defaultPage);
    }

    public function getProductsByFilter($request)
    {
        return Product::with('creator','image')
        ->where( function($q)use($request){
            if($request->search !='' && $request->search ){
                $q->where('name', 'like', '%'.$request->search.'%')
                ->orWhere('code', 'like', '%'.$request->search.'%')
                ->orWhere('form', 'like', '%'.$request->search.'%');
            }

        })
        ->orderBy('id',$this->orderBy)
        ->paginate($this->defaultPage);
    }

    //for select option
    public function getProducts($page=null): ?Collection
    {
        // if($page=='product'){

        // }elseif($page == 'home'){

        // }else{
        //     $products = Product::with('image')->get();
        // }

        return Product::with('image')->get();
    }

    public function deleteImage($request): bool
    {
        $product  = Product::findOrFail($request->id);
        if($request->imageId !=null){
            if($product->image()->where('id',$request->imageId)->delete()){
                return true;
            }
        }

        return false;
    }

    public function getPackingSizes()
    {
        return PackingSize::with('product','creator','unit')->orderBy('id',$this->orderBy)->paginate($this->defaultPage);
    }

    public function getPackingSizesByFilter($request)
    {
        return PackingSize::with('product','creator','unit')
                ->where( function($q)use($request){
                    if($request->product !='' && $request->product ){
                        $q->where('product_id',$request->product);
                    }

                })
                ->orderBy('id',$this->orderBy)
                ->paginate($this->defaultPage);
    }

}
