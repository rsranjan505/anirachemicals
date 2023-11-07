<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\PackingSize;
use App\Models\Product;
use App\Models\Unit;
use App\Services\ProductService;
use Illuminate\Http\Request;

class PackingSizeController extends Controller
{
    public ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $packings = $this->productService->getPackingSizes();
        $products = $this->productService->getProducts();
        if($request->ajax()){
            $packings = $this->productService->getPackingSizesByFilter($request);
            return view('admin.pages.packingsize.filter-packing', compact('packings','products'))->render();
        }
        return view('admin.pages.packingsize.list',compact('packings','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->productService->getProducts();
        $units = Unit::all();
        return view('admin.pages.packingsize.add',compact('products','units'));
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
            'product_id' => 'required',
            'packing' => 'required',
            'internal_qty' =>'required|numeric',
            'internal_size' => 'required',
            'unit_id' => 'required',
        ],
        [
            'product_id.required' => 'Product name required',
            'packing.required' => 'Product packing required',
            'internal_qty.required' => 'Product internal quantity required',
            'internal_size.required' => 'Product internal size required',
            'unit_id.required' => 'Unit required',
        ]);
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;
        $data['volume'] = $request->internal_qty * $request->internal_size;
        $packing = new PackingSize();
        $packing->create($data);
        if($packing){
            return redirect()->route('packing.index')->with('success','Product Packing sizes created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = $this->productService->getProducts();
        $units = Unit::all();
        $packing = PackingSize::with('creator')->findOrFail($id);
        return view('admin.pages.packingsize.edit',compact('packing','products','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'packing' => 'required',
            'internal_qty' =>'required|numeric',
            'internal_size' => 'required',
            'unit_id' => 'required',
        ],
        [
            'product_id.required' => 'Product name required',
            'packing.required' => 'Product packing required',
            'internal_qty.required' => 'Product internal quantity required',
            'internal_size.required' => 'Product internal size required',
            'unit_id.required' => 'Unit required',
        ]);
        $data = $request->all();
        $packing = PackingSize::findOrFail($id);
        $data['volume'] = $request->internal_qty * $request->internal_size;
        $packing->update($data);
        if($packing){
            return redirect()->route('packing.index')->with(['success'=>'Product Packing sizes Has been successfully updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packing = PackingSize::findOrFail($id);
        if($packing){
            $packing->delete();
            return ok($packing,'Product Packing Sizes Deleted successfully');
        }
    }

    public function changeStatus($id)
    {
        $packing = PackingSize::findOrFail($id);
        $value = !$packing->is_active;
        $packing->update([
            'is_active' => (int) $value,
        ]);

        return ok($packing,'Status Changed successfully');
    }
}
