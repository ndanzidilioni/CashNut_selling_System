@extends('layout.clerk.main2')

@section('sidebar')

   <li class="menu-title">Main</li>
<li class="active">
    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
</li>
<li  >
    <a href="{{ url('adminClerks') }}"><i class="fa fa-user"></i> <span>Manage clerks</span></a>
</li>
<li >
    <a href="{{ url('adminOfficer') }}"><i class="fa fa-user"></i><span>Manage officers</span></a>
</li>
<li >
    <a href="{{ url('adminPeasant') }}"><i class="fa fa-user"></i><span>Manage peasants</span></a>
</li>
<li>
    <a href="{{ url('adminBuyer') }}"><i class="fa fa-user"></i></i> <span>Manage buyers</span></a>

</li>
<li >
    <a href="{{ url('adminAdmin') }}"><i class="fa fa-user"></i></i> <span>Manage admins</span></a>
    
</li>
<li >
    <a href="{{ url('addcost') }}"><i class="fa fa-user"></i></i> <span>Add costs</span></a>
    
</li>
<li>
   
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
       {!! Form::open(['class'=>'form-group row mb-4','action' => 'AdminController@store','method'=>'POST']) !!}

            <div class="col-lg-8">
                 <label>-Enter grade of cashewnut <span class="text-danger">*</span></label>
                       <div class="input-group-append">
<!--                                     <label class="col-form-label col-md-2">Default select</label>
 -->                                    <div class="col-md-10">
                                        <select class="form-control" name="select">

                                            
                                            

                                            <option value="A" >Grade A</option>
                                            
                                            <option value="B">Grade B</option>
                                            <option value="C">Grade C</option>
                                            <option value="D">Grade D</option>
                                        </select>
                                    </div>
                                </div>     
                <br><br
        <label>-Enter ammount in Tsh<span class="text-danger">*</span></label>
                                         <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            {{ Form::number('cost', null , ['class'=>'form-control']) }}


                                           <!--  <input class="form-control" type="text"> -->
                                           {{ Form::hidden('id', 1 , ['class'=>'form-control']) }}
                                            <div class="input-group-append">
                                                 {{ Form::submit('save', ['class'=>'btn btn-primary']) }}
                                                   <!--  <button class="btn btn-primary" type="button">Button</button> -->
                                            </div>
                          <!--       <div class="input-group-append">
                                    <label class="col-form-label col-md-2">Default select</label>
                                    <div class="col-md-10">
                                        <select class="form-control">
                                            <option>-- Select --</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                            <option>Option 4</option>
                                            <option>Option 5</option>
                                        </select>
                                    </div>
                                </div> -->
                                        </div>
                 
               
    

            </div>
            
            {!! Form::close() !!}

    </div>
</div>
@endsection