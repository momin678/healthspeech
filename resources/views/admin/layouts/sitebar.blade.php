  <div class="sidebar-menu sticky-sidebar-menu">
    <div class="logo">
      <h1><a href="#">Collective</a></h1>
    </div>
    <div class="logo-icon text-center">
      <a href="#" title="logo"><img src="{{asset('assets/backend/images/logo.png') }}" alt="logo-icon"> </a>
    </div>
    <div class="sidebar-menu-inner">
      <ul class="nav nav-pills nav-stacked custom-nav">
        </li>
        <li class="menu-list">
          <a href=""><i class="fa fa-cogs"></i>
            <span>Health-Topics <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="{{route('admin.all-health-topic')}}">All Health-Topics</a> </li>
            <li><a href="{{route('admin.all-health-speech')}}">All Health-Speech</a> </li>
          </ul>
        </li>
        <li><a href="{{route('admin.user-list')}}"><i class="fa fa-table"></i> <span>Users List</span></a></li>
        <li><a href="{{route('admin.all-subscribe')}}"><i class="fa fa-th"></i> <span>Subscriber List</span></a></li>
        <li><a href="forms.html"><i class="fa fa-file-text"></i> <span>Forms</span></a></li>
      </ul>
      <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
      </a>
    </div>
  </div>
