@foreach ($products as $key => $item)
<tr>
    <td>{{$products->firstItem() + $key}}</td>
    <td>
        <strong>{{ ucfirst($item->name) }}</strong>
    </td>
    <td>
        <strong>{{$item->code }}</strong>
    </td>
    <td>
        <strong>{{$item->brand }}</strong>
    </td>
    <td>
        <strong>{{ ucfirst($item->form) }}</strong>
    </td>
    <td>
        <strong>{{ ucfirst($item->dosage) }}</strong>
    </td>
    <td>
        {{ ucfirst($item->description)}}
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
            <a class="dropdown-item" href="{{route('product.edit',['product' => $item])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
            <a class="dropdown-item" onclick="confirmationStatus('product',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Change Status</a>
            <a class="dropdown-item" onclick="confirmationDelete('product',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>
@endforeach

<tr style="margin-top: 10px;">
    <div class="demo-inline-spacing  justify-content-end">
        <td colspan="3" align="center">
            {!! $products->links() !!}
        </td>
    </div>
</tr>
