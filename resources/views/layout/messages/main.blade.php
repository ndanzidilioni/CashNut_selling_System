@include('layout.common.header')


<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a class="logo" href="index-2.html">
                <img width="35" height="35" alt="" src=""> <span>CASS</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a class="mobile_btn float-left" id="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
          
            <li class="nav-item dropdown d-none d-sm-block">
                <a class="hasnotifications nav-link" id="open_msg_box" href="javascript:void(0);"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">
                 {{ $number_of_sms }}
                </span></a>
            </li>
            <li class="nav-item dropdown has-arrow">
                <a class="dropdown-toggle nav-link user-link" href="#" data-toggle="dropdown">
                    <span class="user-img">
                        
                        <span class="status online"></span>
                    </span>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">My Profile</a>
                    <a class="dropdown-item" href="#">Edit Profile</a>
                     <a  href="{{ route('logout') }}"  style="color:red" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="btn power" onclick="visitPage();">
                <i class="fa fa-key"></i>Log out</button></a> <form id="logout-form" action="{{ route('logout') }}" 
                method="POST" style="display: none;">{{ csrf_field() }}</form>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a class="dropdown-toggle" aria-expanded="false" href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                <a class="dropdown-item" href="login.html">Logout</a>
            </div>
        </div>
    </div>

    {{-- sidebar goes here --}}
    <div class="sidebar" id="sidebar">
        <div class="slimScrollDiv" style="width: 100%; height: 595px; overflow: hidden; position: relative;"><div class="sidebar-inner slimscroll" style="width: 100%; height: 595px; overflow: hidden;">
            <div class="sidebar-menu" id="sidebar-menu">
                <ul>
                    @yield('sidebar')
                </ul>
            </div>
        </div><div class="slimScrollBar" style="background: rgb(204, 204, 204); border-radius: 7px; top: 0px; width: 7px; height: 284.58px; right: 1px; display: none; position: absolute; z-index: 99; opacity: 0.4;"></div><div class="slimScrollRail" style="background: rgb(51, 51, 51); border-radius: 7px; top: 0px; width: 7px; height: 100%; right: 1px; display: none; position: absolute; z-index: 90; opacity: 0.2;"></div></div>
    </div>
    {{-- sidebar ends here --}}
        
    <div class="page-wrapper" style="min-height: 640px;">
        <div class="chat-main-row">
          @yield('contents')
        </div>
  
    </div>


</div>

@include('layout.common.footer')













