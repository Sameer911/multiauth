
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand"> 
        <a href="{{url('/home')}}"> <img alt="image" src="{{asset('Admin/img/logo.png')}}" class="header-logo" /> <span
            class="logo-name">No-Name</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
          <a href="{{url('/home')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="command"></i><span>Paid</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{url('paid-order')}}">Paid Order</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="{{url('daily')}}" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Daily</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{url('daily')}}">Daily Order</a></li>
       
          </ul>
        </li>
      </ul>
    </aside>
</div>






       