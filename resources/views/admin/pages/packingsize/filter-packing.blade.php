@foreach ($packings as $key => $item)
<tr>
    <td>{{$packings->firstItem() + $key}}</td>
    <td>
        <strong>{{ $item->product ? ucfirst($item->product->name) :'' }}</strong>
    </td>
    <td>
        {{ucfirst($item->packing)}}
    </td>
    <td>
        {{$item->internal_qty}}
    </td>
    <td>
        {{$item->internal_size .' '. ucfirst($item->unit->sku)}}
    </td>
    <td>
        {{$item->volume .' '. ucfirst($item->unit->sku)}}
    </td>
    <td>
        {{$item->price}}
    </td>
    <td>
        {{ ucfirst($item->creator->first_name)}}
    </td>
    <td>
        <span class="badge bg-label-{{$item->is_active ==1 ? 'success' : 'warning'}} me-1">{{$item->is_active ==1 ? 'Active' : 'In Active'}}</span>
    </td>
    <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('packing.edit',['packing' => $item])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateprice_{{$item->id}}"  href="javascript:void(0);"><i class="bx bx-group me-1"></i> Update Price</a>
            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pricelog_{{$item->id}}"  href="javascript:void(0);"><i class="bx bx-group me-1"></i> Price Logs</a>
            <a class="dropdown-item" onclick="confirmationStatus('packing',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Change Status</a>
            <a class="dropdown-item" onclick="confirmationDelete('packing',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>

@include('admin.components.modal.update-price',['item' => $item] )
@include('admin.components.modal.price-logs',['item' => $item] )
@endforeach

<tr style="margin-top: 10px;">
    <div class="demo-inline-spacing  justify-content-end">
        <td colspan="3" align="center">
            {!! $packings->links() !!}
        </td>
    </div>
</tr>
