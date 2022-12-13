@extends('layout.clerk.main2')

@section('sidebar')

    <li class="menu-title">Main</li>
    <li >
        <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
    </li>
    <li class="active">
        <a href="{{ url('clerk') }}"><i class="fa fa-user"></i> <span>Add kg</span></a>
    </li>
   
   <li>
    

        <a  href="{{ route('logout') }}"  style="color:red" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="btn power" onclick="visitPage();">
                <i class="fa fa-key"></i>Log out</button></a> <form id="logout-form" action="{{ route('logout') }}" 
                method="POST" style="display: none;">{{ csrf_field() }}</form>

                

</li>
 
@endsection


@section('contents')
<div class="row">

 
           @if(count($users))
                        @foreach($users as $user)
                    
                        
                        
                      
                        
                        
                       

                        
                      
                      

    <div class="col-lg-8 offset-lg-2">
       

            <!-- <div class="col-lg-8"> -->
                <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{ $user->name}}</h3>
                                                <small class="text-muted">peasant</small>
                                                 {!! Form::open(['class'=>'form-group row mb-4','action' => 'ClerkController@store','method'=>'POST']) !!}
                                                 {{ Form::hidden('id', 2 , ['class'=>'form-control']) }}
                                                 {{ Form::hidden('email', $user->email , ['class'=>'form-control']) }}

                                                <div class="staff-msg">{{ Form::submit('Next', ['class'=>'btn btn-primary']) }}</div>

                                                   {!! Form::close() !!}
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#">0{{ $user->phone }}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#">{{ $user->email }}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">AC No:</span>
                                                    <span class="text">{{ $user->AcNumber }}</span>
                                                </li>
                                                <li>
                                                    <span class="title">AC Name</span>
                                                    <span class="text">{{ $user->acName }}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Bank Name</span>
                                                    <span class="text">{{ $user->bankName }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
               
    

            <!-- </div> -->
            
         

                        
                        @endforeach
                        @endif

    </div>
</div>
@endsection