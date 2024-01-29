@foreach ($orders as $key => $item)
<tr>
    <td>{{$orders->firstItem() + $key}}</td>
    <td>
        <strong>{{ ucfirst($item->customer_name) }}</strong>
    </td>

    <td>
        <strong>{{$item->created_at->format('d-m-Y') }}</strong>
    </td>
    <td>
        {{ $item->bill_amount }}
    </td>

    <td>
        <strong>{{ $item->mobile}}</strong>
    </td>

    <td>
        {{ $item->address . " ".ucfirst($item->city ? $item->city->name : '').' '. $item->landmark .' '.$item->pincode}}
    </td>
    <td>
        {{-- <strong>{{ $item->is_delivered ? 'delivered' : '' }}</strong> --}}
        <span class="badge bg-label-{{$item->is_delivered == 1 ? 'success' : 'warning'}} me-1">{{$item->is_delivered == 1 ? 'Delivered' : 'Not Delivered'}}</span>

    </td>
    <td>
       {{$item->delivered_date !=null ? $item->delivered_date : '-'}}
    </td>

    <td>
        {{ ucfirst($item->creator->first_name)}}
    </td>

    <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
            <div class="dropdown-menu">
            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderitems_{{$item->id}}"  href="javascript:void(0);"><i class="bx bx-group me-1"></i> Show Items</a>
            <a class="dropdown-item" href="{{route('order.edit',['order' => $item])}}"><i class="bx bx-edit-alt me-1"></i> Edit Order</a>
            <a class="dropdown-item" onclick="confirmationStatus('order',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Cancel Order </a>
            <a class="dropdown-item" onclick="confirmationDelete('order',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>
@include('admin.components.modal.order-items',['item' => $item] )
@endforeach

<tr style="margin-top: 10px;">
    <div class="demo-inline-spacing  justify-content-end">
        <td colspan="3" align="center">
            {!! $orders->links() !!}
        </td>
    </div>
</tr>
