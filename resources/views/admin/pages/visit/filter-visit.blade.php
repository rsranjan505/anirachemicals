@if (count($visits) > 0)
    @foreach ($visits as $key => $item)
    <tr>
        <td>{{$visits->firstItem() + $key}}</td>
        <td>
            @if ($item->image)
                <img data-bs-toggle="modal" data-bs-target="#viewImage_{{$item->id}}" src="{{$item->image->url}}" width="50px" alt="Avatar" class="rounded-circle">
            @else
                <img data-bs-toggle="modal" data-bs-target="#viewImage_{{$item->id}}" src="http://anirachemicals.com/admin/assets/images/visit.png"  width="50px" alt="Avatar" class="rounded-circle">
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
            @if ($item->status == 1)
                <span class="badge bg-label-warning me-1">Open - Not Contacted</span>
            @elseif ($item->status == 2)
                <span class="badge bg-label-info me-1">Working - Contacted</span>
            @elseif ($item->status == 3)
                <span class="badge bg-label-success me-1">Closed - Converted</span>
            @elseif ($item->status == 4)
                <span class="badge bg-label-danger me-1">Closed - Not Converted</span>
            @endif

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
                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#statuslog_{{$item->id}}"  href="javascript:void(0);"><i class="bx bx-group me-1"></i> Visit Logs</a>
                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#visitView_{{$item->id}}"><i class="bx bx-show-alt me-1"></i> View</a>
                    <a class="dropdown-item" href="{{route('visit.edit',['visit' => $item])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#visitstatus_{{$item->id}}" href="javascript:void(0);"><i class="bx bx-group me-1"></i> Change Status</a>
                    <a class="dropdown-item" onclick="confirmationDelete('visit',{{$item->id}})" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
            </div>
        </td>
    </tr>

    @include('admin.components.modal.status-log',['item' => $item] )
    @include('admin.components.modal.image-view',['item' => $item] )
    @include('admin.components.modal.visit-status',['item' => $item] )
    @include('admin.components.modal.visit-view',['visit' => $item] )
    @endforeach

    <tr style="margin-top: 10px;">
        <div class="demo-inline-spacing  justify-content-end">
            <td colspan="3" align="center">
                {!! $visits->links() !!}
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
