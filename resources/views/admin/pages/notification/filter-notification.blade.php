@if (count($allnotifications) > 0)
    @foreach ($allnotifications[0] as $key => $item)
    <tr class="{{ $item->read_at ==null ?  'unread' : ''}}">
        {{-- <td>{{$allnotifications[0]->firstItem() + $key}}</td> --}}

        <td>
            <span>New Order</span>
        </td>

        <td>
            {{ $item->data['order']['customer_name'] }}
        </td>
        <td>
            {{ $item->data['order']['mobile'] }}
        </td>

        <td>
            {{ $item->data['order']['address'] }}
        </td>
        {{-- <td>
            @if ($item->status == 'contacted')
                <span class="badge bg-label-success me-1">Working - Contacted</span>
            @elseif ($item->status == 'not_contacted')
                <span class="badge bg-label-danger me-1">Working - Contacted</span>
            @elseif ($item->status == 'other')
                <span class="badge bg-label-info me-1">Other</span>
            @endif

        </td>
        <td>
            {{$item->remarks}}
        </td> --}}
        <td>
            {{$item->created_at->format('d-m-Y g:i A') }}
        </td>
        <td>
            @if ($item->read_at ==null)
                <a class="btn btn-primary" href="{{route('mark-as-read',$item->id)}}"><i class="bx bx-edit me-1"></i> Mark as Read</a>
            @endif

        </td>
    </tr>

    {{-- @include('admin.components.modal.status-log',['item' => $item] )
    @include('admin.components.modal.image-view',['item' => $item] )
    @include('admin.components.modal.visit-status',['item' => $item] )
    @include('admin.components.modal.visit-view',['visit' => $item] ) --}}
    @endforeach
{{--
    <tr style="margin-top: 10px;">
        <div class="demo-inline-spacing  justify-content-end">
            <td colspan="3" align="center">
                {!! $enquiry->links() !!}
            </td>
        </div>
    </tr> --}}

@else
    <tr style="margin-top: 10px;">
        <div class="demo-inline-spacing  justify-content-end">
            <td id="norecord" colspan="6" align="center">
            No records Found.
            </td>
        </div>
    </tr>
@endif
