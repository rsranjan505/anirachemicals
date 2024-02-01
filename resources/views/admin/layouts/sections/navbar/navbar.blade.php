@php
$containerNav = $containerNav ?? 'container-fluid';
$navbarDetached = ($navbarDetached ?? '');

@endphp

<!-- Navbar -->
@if(isset($navbarDetached) && $navbarDetached == 'navbar-detached')
<nav class="layout-navbar {{$containerNav}} navbar navbar-expand-xl {{$navbarDetached}} align-items-center bg-navbar-theme" id="layout-navbar">
  @endif
  @if(isset($navbarDetached) && $navbarDetached == '')
  <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="{{$containerNav}}">
      @endif

      <!--  Brand demo (display only for navbar-full and hide on below xl) -->
      @if(isset($navbarFull))
      <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{url('/')}}" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
            @include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])
          </span>
          <span class="app-brand-text demo menu-text fw-bolder">{{config('variables.templateName')}}</span>
        </a>
      </div>
      @endif

      <!-- ! Not required for layout-without-menu -->
      @if(!isset($navbarHideToggle))
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ?' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>
      @endif

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ms-auto">
          <!-- User -->
          {{-- <button type="button" class="btn rounded-pill btn-icon btn-secondary">
            <span class="tf-icons bx bx-bell"></span>
          </button> --}}
                    <!-- Notification -->
                    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
                        <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow btn-floating" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                          <i class="tf-icons bx bx-bell"></i>
                          <span class="badge rounded-pill badge-notification bg-danger notifycount">{{count($notifications)}}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end py-0">
                          <li class="dropdown-menu-header border-bottom">
                            <div class="dropdown-header d-flex align-items-center py-3">
                              <h6 class="fw-normal mb-0 me-auto">Notification</h6>
                              <span class="badge rounded-pill bg-label-primary notifycount_new">{{count($notifications)}} New</span>
                            </div>
                          </li>
                          <li class="dropdown-notifications-list scrollable-container">
                            <ul class="list-group list-group-flush">
                                {{-- @php
                                    function time_elapsed_string($datetime, $full = false) {
                                        $now = new DateTime;
                                        $ago = new DateTime($datetime);
                                        $diff = $now->diff($ago);

                                        $diff->w = floor($diff->d / 7);
                                        $diff->d -= $diff->w * 7;

                                        $string = array(
                                            'y' => 'year',
                                            'm' => 'month',
                                            'w' => 'week',
                                            'd' => 'day',
                                            'h' => 'hour',
                                            'i' => 'minute',
                                            's' => 'second',
                                        );
                                        foreach ($string as $k => &$v) {
                                            if ($diff->$k) {
                                                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                                            } else {
                                                unset($string[$k]);
                                            }
                                        }

                                        if (!$full) $string = array_slice($string, 0, 1);
                                        return $string ? implode(', ', $string) . ' ago' : 'just now';
                                    }
                                    @endphp --}}

                                @foreach ($notifications as $item)
                                    @if ($item->read_at == null)

                                    <a href="{{route('mark-as-read',$item->id)}}">
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex align-items-center gap-2">
                                            <div class="flex-shrink-0">
                                                <div class="avatar me-1">
                                                <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-250">
                                                <h6 class="mb-1 text-truncate">Order From {{ ucfirst($item->data['order']['customer_name'])}} 🎉</h6>
                                                <small class="text-truncate text-body">{{ ucfirst($item->data['order']['address']) . ' ' . $item->data['order']['pincode']}}</small>
                                            </div>
                                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                                <small class="text-muted"></small>
                                            </div>
                                            </div>
                                        </li>
                                    </a>

                                    @endif
                                @endforeach

                            </ul>
                          </li>
                          <li class="dropdown-menu-footer border-top p-3">
                            <a href="{{route('notification.index')}}" class="btn btn-primary d-flex justify-content-center">Read all notifications</a>
                          </li>
                        </ul>
                      </li>
                      <!--/ Notification -->


          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="javascript:void(0);">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block">{{Auth::check() ? ucfirst(Auth::user()->first_name) : ''}}</span>
                      <small class="text-muted">Admin</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('user-profile')}}">
                  <i class="bx bx-user me-2"></i>
                  <span class="align-middle">My Profile</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('setting-view')}}">
                  <i class='bx bx-cog me-2'></i>
                  <span class="align-middle">Settings</span>
                </a>
              </li>

              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                  <i class='bx bx-power-off me-2'></i>
                  <span class="align-middle"> {{ __('Logout') }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>

      @if(!isset($navbarDetached))
    </div>
    @endif
  </nav>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    var pusher = new Pusher('a9d41da1ecb7224520ca', {
      cluster: 'ap2'
    });

    var count = $(".notifycount").text();

    var channel = pusher.subscribe('notification');
    channel.bind('notification.my-event', function(data) {

        console.log(data.message);

        $(".notifycount").text(parseInt(count) + 1);
        $(".notifycount_new").text(parseInt(count) + 1 + 'New');

    });

    </script>
  <!-- / Navbar -->
