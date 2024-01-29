@if (isset($item))
<div class="modal fade" id="orderitems_{{$item->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Order Items</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @if (count($item->orderItems) > 0)
                @foreach ($item->orderItems as $orderitm)
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="product_id">Product Name</label>
                                <select disabled id="product_id" name="product_id" class="form-select @error('product_id') is-invalid @enderror">

                                    {{-- @foreach ($products as $product) --}}
                                        <option value="{{$orderitm->product->id}}" selected>{{$orderitm->product->name  }}</option>
                                    {{-- @endforeach --}}
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="packing_size_id">Packaging Size</label>
                                <select disabled id="packing_size_id" name="packing_size_id" class="form-select @error('packing_size_id') is-invalid @enderror">

                                    {{-- @foreach ($products as $product) --}}
                                        <option value="{{$orderitm->packing_size->id}}"  selected>{{$orderitm->packing_size->packing . '('.$orderitm->packing_size->internal_qty .'X'.$orderitm->packing_size->internal_size . ')'}}</option>
                                    {{-- @endforeach --}}
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="quantity">Quantity</label>
                                <input type="decimal" disabled class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity"  value="{{ $orderitm->quantity }}"  />

                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="volume">Volume</label>
                                <input type="number" disabled class="form-control @error('volume') is-invalid @enderror" id="volume" name="volume" value="{{ $orderitm->volume }}" placeholder="" />
                                @error('volume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="total_price">Price</label>
                                <input type="decimal" disabled class="form-control @error('total_price') is-invalid @enderror" id="total_price" name="total_price" value="{{ $orderitm->total_price }}" placeholder="" />


                            </div>
                        </div>
                        {{-- <div class="col-xl-2 col-md-2" style="margin-top: 1.8rem">
                            <button type="button" id="add_orderproduct" class="btn btn-primary">Add +</button>
                        </div> --}}

                    </div>
                @endforeach

            @endif

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endif
