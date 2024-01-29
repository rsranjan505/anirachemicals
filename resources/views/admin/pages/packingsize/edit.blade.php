@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Add Packing Size - Anira Chemicals')

@section('content')
<div class="row">
    @include('admin.components.header-nav.packingsize-nav',['activeTab' => 'edit'] )
    <hr>
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                Product Packing Size Update
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('packing.update',['packing' => $packing]) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label" for="code">Product Name</label>
                    <select id="product_id" name="product_id" class="form-select @error('product_id') is-invalid @enderror">
                        <option value="">Select Name</option>
                        @foreach ($products as $item)
                            <option value="{{$item->id}}" {{ $packing->product_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                        @endforeach

                    </select>
                    @error('product_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="packing">Product Packing</label>
                            <select id="packing" name="packing" class="form-select @error('packing') is-invalid @enderror">
                                <option value="">Select Packing</option>
                                <option value="box" {{ $packing->packing == 'box' ? 'selected' : ''}}>Box</option>
                                <option value="bucket" {{ $packing->packing == 'bucket' ? 'selected' : ''}}>Bucket</option>
                                <option value="set" {{ $packing->packing == 'set' ? 'selected' : ''}}>Set</option>
                            </select>
                            @error('packing')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="internal_qty">Internal Qunatity(in number) of Packing</label>
                            <input type="text" class="form-control @error('internal_qty') is-invalid @enderror" id="internal_qty" name="internal_qty" value="{{ $packing->internal_qty }}" placeholder="Internal Qunatity(in number) of Packing" />
                            @error('internal_qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="internal_size">Product internal Size(s) of Packing</label>
                            <input type="text" class="form-control @error('internal_size') is-invalid @enderror" id="internal_size" value="{{ $packing->internal_size }}"  name="internal_size" placeholder="Product internal Size(s) In Packing" />
                            @error('internal_size')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="unit_id">Product Internal Size Unit</label>
                            <select id="unit_id" name="unit_id" class="form-select @error('unit_id') is-invalid @enderror">
                                <option value="">Select Unit</option>
                                @foreach ($units as $item)

                                    <option value="{{$item->id}}" {{ $packing->unit_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('unit_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="price">Product Price</label>
                            <input type="text" {{$packing->price != 0.00 ? 'disabled' : '' }}  class="form-control @error('price') is-invalid @enderror" id="price" value="{{ $packing->price }}"  name="price" placeholder="300.00" />
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label" for="volume">Total Product Volume</label>
                    <input type="text" class="form-control @error('type') is-invalid @enderror" id="volume" name="volume" value="{{ old('volume') }}" placeholder="Product Volume" />
                </div> --}}
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
