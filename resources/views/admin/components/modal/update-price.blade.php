@if (isset($item))
<div class="modal fade" id="updateprice_{{$item->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Update Price</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{ route('pricelog.store')}}">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="product_id" value="{{$item->product_id}}">
            <input type="hidden" name="packing_sizes_id" value="{{$item->id}}">
            <div class="mb-3">
                <label class="form-label" for="price">Product Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ $item->price }}"  name="price" placeholder="300.00" />
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endif

