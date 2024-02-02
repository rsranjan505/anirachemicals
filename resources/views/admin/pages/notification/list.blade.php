@extends('admin.layouts.contentNavbarLayout')

@section('title', 'Notification - Anira Chemicals')

@section('content')
<div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item"><a class="nav-link" href="{{ route('user-profile')}}"><i class="bx bx-user me-1"></i> Account</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('notification.index')}}"><i class="bx bx-bell me-1"></i> Notifications</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('setting-view')}}"><i class="bx bx-lock me-1"></i> Change Password </a></li>
      </ul>
      <div class="card mb-4">
        <h5 class="card-header">Notification</h5>
        <div class="card-body">
                <div class="table-responsive ">
                <table class="table table-hover">
                    <thead class="table-dark">
                    <tr>

                        <th>Type</th>
                        <th>From</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @include('admin.pages.notification.filter-notification')
                    </tbody>
                </table>
                <input type="hidden" id="type">
                </div>
        </div>
        <!-- /Account -->
      </div>

    </div>
  </div>


@endsection
