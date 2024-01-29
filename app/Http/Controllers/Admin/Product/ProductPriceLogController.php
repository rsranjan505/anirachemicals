<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\ProductPriceLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PackingSize;

class ProductPriceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricelogs = ProductPriceLog::all();
        return $pricelogs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric|between:0,9999999999.99',
        ]);
        $data = $request->all();
        $data['updated_by'] = auth()->user()->id;

        $pricelog = new ProductPriceLog();
        $pricelog->create($data);
        if($pricelog){
            PackingSize::find($request->packing_sizes_id)->update(['price'=>$request->price]);
            return redirect()->route('packing.index')->with('success','Product price updated Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductPriceLog  $productPriceLog
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPriceLog $productPriceLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductPriceLog  $productPriceLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPriceLog $productPriceLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductPriceLog  $productPriceLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPriceLog $productPriceLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductPriceLog  $productPriceLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPriceLog $productPriceLog)
    {
        //
    }
}
