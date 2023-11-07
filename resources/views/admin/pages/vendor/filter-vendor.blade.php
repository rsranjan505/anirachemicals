@if (count($vendors) > 0)
    @foreach ($vendors as $key => $item)
    <tr>
        <td>{{$vendors->firstItem() + $key}}</td>
        <td>
            @if ($item->image)
                <img data-bs-toggle="modal" data-bs-target="#viewImage_{{$item->id}}" src="{{$item->image->url}}" width="50px" alt="Avatar" class="rounded-circle">
            @else
                <img data-bs-toggle="modal" data-bs-target="#viewImage_{{$item->id}}" src="http://anirachemicals.com/admin/assets/images/vendor.png"  width="50px" alt="Avatar" class="rounded-circle">
            @endif
        </td>
        <td>
            {{ucfirst($item->name_of_establishment)}}
        </td>
        <td>
            {{ ucfirst($item->key_person)}}
        </td>
        <td>
            {{$item->email }}
        </td>
        <td>
            {{$item->mobile }}
        </td>
        <td>
            {{ $item->city ? ucfirst($item->city->name) : ''  }}
        </td>
        <td>
            <span class="badge bg-label-{{$item->is_active ==1 ? 'success' : 'warning'}} me-1">{{$item->is_active ==1 ? 'Active' : 'In Active'}}</span>
        </td>
        <td>
            {{$item->creator ? ucfirst($item->creator->first_name) : '' }}
        </td>
        <td>
            {{$item->created_at->format('d-m-Y g:i A') }}
        </td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#statuslog_{{$item->id}}"  href="javascript:void(0);"><i class="bx bx-group me-1"></i> vendor Logs</a>
                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#vendorView_{{$item->id}}"><i class="bx bx-show-alt me-1"></i> View</a>
                    <a class="dropdown-item" href="{{route('vendor.edit',['vendor' => $item])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" onclick="confirmationStatus('vendor',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Change Status</a>
                    <a class="dropdown-item" onclick="confirmationDelete('vendor',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
            </div>
        </td>
    </tr>

    @include('admin.components.modal.status-log',['item' => $item] )
    @include('admin.components.modal.image-view',['item' => $item] )
    {{-- @include('admin.components.modal.vendor-status',['item' => $item] ) --}}
    @include('admin.components.modal.vendor-view',['vendor' => $item] )
    @endforeach

    <tr style="margin-top: 10px;">
        <div class="demo-inline-spacing  justify-content-end">
            <td colspan="3" align="center">
                {!! $vendors->links() !!}
            </td>
        </div>
    </tr>

@else
    <tr style="margin-top: 10px;">
        <div class="demo-inline-spacing  justify-content-end">
            <td id="norecord" colspan="6" align="center">
            No records Found.
            </td>
        </div>
    </tr>
@endif
