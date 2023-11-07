<?php

namespace App\Http\Controllers\Admin\Product;

use App\Exports\ExportProducts;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Str;

class ProductController extends Controller
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
        $products = $this->productService->getAllProducts();
        if($request->ajax()){
            $products = $this->productService->getProductsByFilter($request);
            return view('admin.pages.product.filter-product', compact('products'))->render();
        }
        return view('admin.pages.product.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product.add');
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
            'name' => 'required|string',
            'code' => 'required|unique:products,code',
            'brand' =>'required',
            'product_form' => 'required',
            'dosage' => 'required',
            'description' => 'required',
            'avatar' => 'required',
        ],[
            'avatar.required' => 'Product Image Required'
        ]);

        $data = $request->except('avatar');
        $data['slug'] = Str::slug($data['name']);
        $data['code'] = strtoupper($data['code']);
        $data['form'] = $data['product_form'];
        $data['created_by'] = auth()->user()->id;
        $product = new Product();
        $product = $product->create($data);
        if($product){
            if($request->avatar !=null){
                $images = $request->avatar;
                foreach($images as $doc){
                    $docs = $this->fileUpload($doc,$product,'local');
                    if($docs !=[]){
                        $docs['document_type']='avatar';
                        $product->image()->create($docs);
                    }
                }
            }
            return redirect()->route('product.index')->with('success','Products created Successfully');
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
        $product = Product::with('creator','allimages')->findOrFail($id);
        return view('admin.pages.product.edit',compact('product'));
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
            'name' => 'required|unique:products,name,'.$id.',id',
            'code' => 'required|unique:products,code,'.$id.',id',
            'brand' =>'required',
            'product_form' => 'required',
            'dosage' => 'required',
            'description' => 'required',
        ]);
        $data = $request->except('avatar');
        $data['slug'] = Str::slug($data['name']);
        $data['code'] = strtoupper($data['code']);
        $data['form'] = $data['product_form'];
        $product = Product::findOrFail($id);
        $product->update($data);
        if($product){
            if($request->avatar !=null){
                $images = $request->avatar;
                foreach($images as $doc){
                    $docs = $this->fileUpload($doc,$product,'local');
                    if($docs !=[]){
                        $docs['document_type']='avatar';
                        $product->image()->create($docs);
                    }
                }
            }
            return redirect()->route('product.index')->with(['success'=>'Product Has been successfully updated']);
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
        $product = Product::findOrFail($id);
        if($product){
            $product->delete();
            return ok($product,'Product Deleted successfully');
        }
    }

    public function changeStatus($id)
    {
        $product = Product::findOrFail($id);
        $value = !$product->is_active;
        $product->update([
            'is_active' => (int) $value,
        ]);

        return ok($product,'Status Changed successfully');
    }

    public function deleteImge(Request $request){

        if( $this->productService->deleteImage($request)){
            return ok(null,'Image deleted successfully');
        }
        return ok(null,'Image not deleted successfully.');
    }

    public function exportProduct(Request $request){
        return Excel::download(new ExportProducts, 'products.csv');
    }
}
