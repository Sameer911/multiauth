
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand"> 
        <a href="{{url('dashboard')}}"> <img alt="image" src="{{asset('Admin/img/logo.png')}}" class="header-logo" /> <span
            class="logo-name">No-Name</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
          <a href="{{url('dashboard')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="command"></i><span>Cash In Hand</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{url('cashinhand')}}">Cash In Hand</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Paid</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{url('order-paid')}}">Paid Orders</a></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Daily</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{url('allorders')}}">All Orders</a></li>
            </ul>
          </li>
      </ul>
    </aside>
</div>






          






       










       