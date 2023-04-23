<?php

namespace App\Http\Controllers\Admin\Product;

use App\Exports\ExportProducts;
use App\Http\Controllers\Controller;
use App\Models\PackingSize;
use App\Models\Product;
use App\Models\State;
use App\Models\StockItems;
use App\Models\Unit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $data['state'] = State::all();
        $data['unit'] = Unit::all();
        $data['packing_size'] = PackingSize::all();
        return view('admin.pages.product.add',['data'=>$data]);
    }

     /**
     * Create User
     * @param Request $request
     * @return Product
     */
    public function createProduct(Request $request)
    {
        //Validated
        $data = $request->except(['avatar','product_items']);

        $request->validate([
            'name' => 'required|string',
            'code' => 'required|unique:products,code',
            'brand' =>'required',
            'form' => 'required',
        ]);


        $data['created_by'] = auth()->user()->id;
        $product = $this->recordSave(Product::class,$data,null,null);
        if($product !=null && $request->product_items !=null){

            foreach($request->product_items as $items){
                $itemsDetails = new StockItems();
                $items['product_id'] = $product->id;
                $itemsDetails->create($items);
            }
        }

        if($request->avatar !=null){
            foreach($request->avatar as $doc){
                $docs = $this->fileUpload($doc,$product,'local');
                $docs['document_type']='avatar';
                $product->images()->create($docs);
            }
        }

        return redirect()->back()->with(['success'=>'created']);
    }

    public function productList(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::with('creator')->limit(10)->latest();
            return DataTables::of($products)
                    ->addIndexColumn()
                    ->setRowId(function ($product) {
                        return 'row'.$product->id;
                    })
                    ->addColumn('Product Name', function ($product) {
                        return $product->name;
                    })
                    ->addColumn('Product Code', function ($product) {

                        return $product->code;
                    })
                    ->addColumn('Product Brand', function ($product) {
                        return $product->brand;
                    })
                    ->addColumn('Product Form', function ($product) {
                        return $product->form;
                    })
                    ->addColumn('Created Date', function ($product) {
                        return $product->created_at;
                    })
                    ->addColumn('Created By', function ($product) {
                        return $product->creator->first_name;
                    })
                    ->addColumn('Status', function ($product) {
                        $status='';
                        if($product->is_active ==1){
                            $status ='Active';
                        }else{
                            $status= 'Deactive';
                        }
                        return $status;
                    })

                    ->addColumn('action', function($product){
                        $status='';
                        if($product->is_active ==1){
                            $status = 'Deactive';
                        }else{
                            $status = 'Active';
                        }
                        return '<div class="dropdown">
                                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                <a class="dropdown-item" href="'.url('admin/product-update/'.$product->id).'">Edit</a>
                                <a class="dropdown-item" href="'.url('admin/product/change-status/'.$product->id).'">'.$status.'</a>

                                </div>
                            </div>';

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.pages.product.list');
    }

    public function edit($id){
        if($id!=null){
            $product = Product::find($id);
            $data['unit'] = Unit::all();
            $data['packing_size'] = PackingSize::all();
            $data['product'] = $product;
            return view('admin.pages.product.edit',['data'=>$data]);
        }
    }

    public function update(Request $request){

        if($request->id !=null){
            // $vendor = Vendor::find($request->id);
            $data = $request->except(['avatar']);
            //Validated
            $request->validate([
                'name' => 'required|string',
                'brand' =>'required',
                'form' => 'required',
                'packing_type' =>'required',
                'packaging_size' =>'required',
                'description' =>'required',
            ]);

            $product = $this->recordSave(Product::class,$data,null,null);
            if($request->avatar !=null){
                foreach($request->avatar as $doc){
                    $docs = $this->fileUpload($doc,$product,'local');
                    $docs['document_type']='avatar';
                    $product->images()->create($docs);
                }
            }

            return redirect()->back()->with(['message'=>'success']);
        }
    }

    public function changeStatus($id)
    {
        $product = Product::find($id);
        $value = !$product->is_active;
        $product->update([
            'is_active' => (int) $value,
        ]);
        return redirect()->back()->with(['message'=>'success']);
    }

    public function exportProduct(Request $request){
        return Excel::download(new ExportProducts, 'products.csv');
    }
}
