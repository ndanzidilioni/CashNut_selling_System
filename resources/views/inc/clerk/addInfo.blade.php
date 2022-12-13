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

    <div class="col-lg-8 offset-lg-2">
       {!! Form::open(['class'=>'form-group row mb-4','action' => 'ClerkController@store','method'=>'POST']) !!}

            <div class="col-lg-8">
                 <label>-Enter Email Address <span class="text-danger">*</span></label>
                    
                <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            {{ Form::text('email', null , ['class'=>'form-control']) }}
                                           <!--  <input class="form-control" type="text"> -->
                                            <div class="input-group-append">
                                         {{ Form::hidden('id', 1 , ['class'=>'form-control']) }}

                                                 {{ Form::submit('Next', ['class'=>'btn btn-primary']) }}
                                                   <!--  <button class="btn btn-primary" type="button">Button</button> -->
                                            </div>
                                        </div>
                 
               
    

            </div>
            
            {!! Form::close() !!}

    </div>
</div>
@endsection