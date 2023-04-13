<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#vendor" aria-expanded="false" aria-controls="ui-order">
                <i class="icon-inbox menu-icon"></i>
                <span class="menu-title">Vendor</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="vendor">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="#">List</a></li>
                    <li class="nav-item"><a class="nav-link" href="Today-Delivery-Order"> Add New</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="ui-order">
                <i class="icon-inbox menu-icon"></i>
                <span class="menu-title">Order</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="order">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="#"> Order List</a></li>
                    <li class="nav-item"><a class="nav-link" href="Cancel-Order"> Create Order</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="Add-Chef">Add Chef </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="report">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Report</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="report">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="#">Items </a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Menus </a></li>
                </ul>
            </div>
        </li>

    @if (Auth::user()->is_admin==1)
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">Manage Users</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
            <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="#">List</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Info</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Add New</a></li>
                    <li class="nav-item"><a class="nav-link" href="#edit">Profile</a></li>
            </ul>
            </div>
        </li>

    @endif



    </ul>
  </nav>
