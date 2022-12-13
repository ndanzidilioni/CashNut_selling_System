@include('layout.common.header')


<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a class="logo" href="index-2.html">
                <img width="35" height="35" alt="" src="<!-- assets/img/logo.png -->"> <span>CASS</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a class="mobile_btn float-left" id="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown d-none d-sm-block">
                <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right"></span></a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span>Select Name To start Conversation</span>
                    </div>
                    <div class="drop-scroll">
                        <ul class="notification-list">
                           

                             @if(count($users2) > 0)
                             @foreach($users2 as $users2)

                              @if( $users2->role_name == 'officer' )

              

                            <li class="notification-message">
                                
                            <a href="{!! route('switch', ['secsw'=>Crypt::encrypt($users2->id)]) !!}">
                                
                                    <div class="media">
                                        <span class="avatar">
                                            
                                        </span>
                                        <div class="media-body"> <span class="noti-title">{{ $users2->name}} </span></p>
                                            <p class="noti-time"><span class="notification-time">{{ $users2->role_name}}</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                                @endif
                               @endforeach
                               @endif


                         
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                       <!--  <a href="activities.html">View all Notifications</a> -->
                    </div>
                </div>
            </li>
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
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
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
        
    <div class="page-wrapper" style="min-height: 655px;">
        <div class="content">
          @yield('contents')
        </div>
        <div class="notification-box">
            <div class="msg-sidebar notifications msg-noti">
                <div class="topnav-dropdown-header">
                    <span>Messages</span>
                </div>
                <div class="slimScrollDiv" style="width: auto; height: 531px; overflow: hidden; position: relative;"><div class="drop-scroll msg-list-scroll" id="msg_list" style="width: auto; height: 531px; overflow: hidden;">
                    <ul class="list-box">
                        @if(count($messages) > 0)
                        @foreach( $messages as $message)


                             <!--    {!! Form::open(['class'=>'form-group row mb-4','action' => 'ChatController@store','method'=>'POST']) !!} -->

                        <li>
                            
                            <a href="{!! route('switch', ['secsw'=>Crypt::encrypt($message->sender_id)]) !!}">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">{{ $message->name }} </span>
                                        <span class="message-time">{{ $message->created_at }}</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">{{ $message->body }}</span>
                                       <!--  {{ Form::hidden('id', 5 , ['class'=>'form-control']) }}

                                         {{ Form::submit('Next', ['class'=>'btn btn-primary ']) }} -->
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!--  {!! Form::close() !!} -->
                        @endforeach
                        @endif
                    </ul>
                </div><div class="slimScrollBar" style="background: rgb(135, 135, 135); border-radius: 0px; top: 0px; width: 4px; height: 813.4px; right: 1px; display: block; position: absolute; z-index: 99; opacity: 0.4;"></div><div class="slimScrollRail" style="background: rgb(51, 51, 51); border-radius: 7px; top: 0px; width: 4px; height: 100%; right: 1px; display: none; position: absolute; z-index: 90; opacity: 0.2;"></div></div>
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">See all messages</a>
                </div>
            </div>
        </div>
    </div>


</div>

@include('layout.common.footer')













