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
                 <label><b>-Enter total Kg of the peasant </b> <span class="text-danger">*</span></label>
                    
                <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">kg</span>
                                            </div>
                                            {{ Form::number('kilo', null , ['class'=>'form-control']) }}
                                           <!--  <input class="form-control" type="text"> -->
                                           
                                            <div class="input-group-append">    
                                            <button class="" type="button"></button> 
                                            </div>
                                              @if(count($users))
                        @foreach($users as $user)
                        <!-- @foreach($phone as $phones) -->
                        @foreach($bank as $banks)
                          
                           {{ Form::hidden('peasant_id', $user->id , ['class'=>'form-control']) }}


                        @endforeach
                        <!-- @endforeach -->
                        @endforeach
                        @endif


                                        </div><br><br
        <label>-<b>Enter Grade</b> <span class="text-danger">*</span></label>
                                         <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <select class="form-control" name="select">

                                            
                                            

                                            <option value="A" >Grade A</option>
                                            
                                            <option value="B">Grade B</option>
                                            
                                        </select>
                                         
                                           <!--  <input class="form-control" type="text"> -->
                                           {{ Form::hidden('id', 3 , ['class'=>'form-control']) }}
                                            <div class="input-group-append">
                                                 {{ Form::submit('save', ['class'=>'btn btn-primary']) }}
                                                   <!--  <button class="btn btn-primary" type="button">Button</button> -->
                                            </div>
                                        </div>
                 
               
    

            </div>
            
            {!! Form::close() !!}

    </div>
</div>
@endsection