@extends('layout.messages.main')

@section('sidebar')

    <li class="menu-title">Main</li>
    <li class="active">
        <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard//home</span></a>
    </li>
   <li>
    

        <a  href="{{ route('logout') }}"  style="color:red" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="btn power" onclick="visitPage();">
                <i class="fa fa-key"></i>Log out</button></a> <form id="logout-form" action="{{ route('logout') }}" 
                method="POST" style="display: none;">{{ csrf_field() }}</form>

                

</li>
 
@endsection


@section('contents')

   
                    <div class="chat-main-wrapper">
                    <div class="col-lg-9 message-view chat-view">
                        <div class="chat-window">
                            <div class="fixed-header">
                                <div class="navbar">
                                    <div class="user-details mr-auto">
                                        <div class="user-info float-left">
                                            <span class="font-bold">{{ Auth::user()->name}}</span> 
                                            <span class="last-seen">active</span>
                                        </div>
                                    </div>
                            
                                    <ul class="nav custom-menu">
                                      
                                        <li class="nav-item dropdown dropdown-action">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                        

                                            <div class="dropdown-menu dropdown-menu-right">
                                              <a class="dropdown-item" href="{!! route('deletesms', ['secsw'=>Crypt::encrypt($receiver_id)]) !!}">
                                                Delete Conversations</a>
                                               
                                            </div>
                                            
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chat-contents">
                                <div class="chat-content-wrap">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="chats">
                                              @if(count($messages) > 0)
                                              @foreach( $messages as $message)
                                              @if(Auth::user()->id == $message->receiver_id)

                                                <div class="chat chat-right">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>{{ $message->body}}</p>
                                                                <span class="chat-time">8:30 am</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="chat chat-left">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>{{ $message->body }}</p>
                                                                <span class="chat-time">8:40 am</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              @endif
                                              @endforeach
                                              @endif 
                                                
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             
                            <div class="chat-footer">
                               {!! Form::open(['class'=>'form-group row mb-4','action' => 'ChatController@store','method'=>'POST']) !!}
                                <div class="message-bar">
                                   
                                    <div class="message-inner">
                                        <a class="link attach-icon" href="#" data-toggle="modal" data-target="#drag_files"><img src="assets/img/attachment.png" alt=""></a>
                                        <div class="message-area">
                                            <div class="input-group">
                                             
                                                   {{ Form::hidden('receiver_id', $receiver_id ,['class'=>'form-control','placeholder'=>'Type message...']) }}
                                                 {{ Form::textarea('body', null ,['class'=>'form-control','placeholder'=>'Type message...']) }}

                                           

                                                <span class="input-group-append">
                                                   {{ Form::submit('', ['class'=>'btn btn-primary fa fa-send']) }}
                          <!-- <button class="btn btn-primary" type="button"> --><!-- </button> -->
                        </span>
                                            </div>
                                        </div>
                                    </div>

                                     
                                </div>
                                {!! Form::close() !!}
                            </div>
                                                     
                           </div>
                    </div>
                    <div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="chat_sidebar">
                        <div class="chat-window video-window">
                            <div class="fixed-header">
                                <ul class="nav nav-tabs nav-tabs-bottom">
                                    
                                    <li class="nav-item"><a class="nav-link active show" href="#profile_tab" data-toggle="tab">Profile</a></li>
                                </ul>
                            </div>
                            <div class="tab-content chat-contents">
                                <div class="content-full tab-pane show" id="calls_tab">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="chats">
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="Cristina Groves" src="assets/img/doctor-thumb-03.jpg" class="img-fluid rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="chat-user">You</span> <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">phone_missed</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <span class="call-description">Jeffrey Warden missed the call</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="Jennifer Robinson" src="assets/img/patient-thumb-02.jpg" class="img-fluid rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="chat-user">Jennifer Robinson</span> <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">call_end</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details"><span class="call-description">This call has ended</span></div>
                                                                        <div class="call-timing">Duration: <strong>5 min 57 sec</strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-line">
                                                    <span class="chat-date">January 29th, 2015</span>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt="Cristina Groves" src="assets/img/doctor-thumb-03.jpg" class="img-fluid rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="chat-user">You</span> <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">ring_volume</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <a href="#" class="call-description call-description--linked" data-qa="call_attachment_link">Calling Jennifer ...</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="content-full tab-pane show active" id="profile_tab">
                                    <div class="display-table">
                                        <div class="table-row">
                                            <div class="table-body">
                                                <div class="table-content">
                                                

                                                  @if(count($users) > 0)
                                                  @foreach($users as $user)

                                                    <div class="chat-profile-img">
                                                      
                                                        <h3 class="user-name m-t-10 mb-0">{{ $user->name }}</h3>
                                                        <small class="text-muted"></small>
                                                        
                                                    </div>
                                                    <div class="chat-profile-info">
                                                        <ul class="user-det-list">
                                                            <li>
                                                                <span>Username:</span>
                                                                <span class="float-right text-muted">{{$user->name }}</span>
                                                            </li>
                                                          
                                                            <li>
                                                                <span>Email:</span>
                                                                <span class="float-right text-muted">{{ $user->email }}</</span>
                                                            </li>
                                                            <li>
                                                                <span>Phone:</span>
                                                                <span class="float-right text-muted">0{{ $user->phone }}</</span>
                                                            </li>
                                                             <li>
                                                                <span>Location:</span>
                                                                <span class="float-right text-muted">{{$user->region }}</span>
                                                            </li>
                                                          
                                                         
                                                        </ul>
                                                       
                                                    </div>

                                                     @endforeach
                                                     @endif

                                                    <div class="transfer-files">
                                                      
                                                        <div class="tab-content">
                                                            <div class="tab-pane show active" id="all_files">
                                                                <ul class="files-list">
                                                                    <li>
                                                                        <div class="files-cont">
                                                                         
                                                                         
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
    
        
            
                

                   
                
          


                    
        
                
                          
                           

                           


                       
                        


@endsection