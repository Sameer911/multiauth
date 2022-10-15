<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN DASHBOARD</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('dashboard')}}">

            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('cashinhand')}}">
            <span>Cash In Hand</span>
        </a>
    </li>
    <hr class="sidebar-divider">


    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('credit')}}">
            <span>Credit</span>
        </a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('order-paid')}}">
            <span>Paid Order</span>
        </a>
    </li>
    <hr class="sidebar-divider">

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('allorders')}}">
            <span>All Orders</span>
        </a>
    </li>   
    <hr class="sidebar-divider"> 


</ul>