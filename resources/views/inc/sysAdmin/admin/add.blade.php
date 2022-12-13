@extends('layout.admin.main')

@section('sidebar')

<li class="menu-title">Main</li>
<li >
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
<li class="active">
    <a href="{{ url('adminAdmin') }}"><i class="fa fa-user"></i></i> <span>Manage admins</span></a>
    
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
        <h4 class="page-title">Admins Infomation</h4>
    </div>
</div>
  
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        {!! Form::open(['class'=>'form-group row mb-4','action' => 'AdminController@store','method'=>'POST']) !!}

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Full name<span class="text-danger">*</span></label>
                        {{ Form::text('name', null , ['class'=>'form-control']) }}

                        {{-- <input class="form-control" type="text"> --}}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email Address</label>
                        {{ Form::email('email', null , ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Phone<span class="text-danger">*</span></label>
                        {{ Form::number('phone', null , ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>region <span class="text-danger">*</span></label>
                        {{ Form::text('region', null , ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>disctrict</label>
                        {{ Form::text('district', null , ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>ward</label>
                        {{ Form::text('ward', null , ['class'=>'form-control']) }}
                    </div>
                </div>
               {{ Form::hidden('id', 2 , ['class'=>'form-control']) }}-
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>password (Auto-generated)</label>
                        <input type="text" class="form-control" value="1234" readonly="readonly">
                    </div>
                </div> 
            


            </div>
            <div class="m-t-20 text-center">
                    {{ Form::submit('save', ['class'=>'btn btn-primary  submit-btn']) }}

                {{-- <button class="btn btn-primary submit-btn">Create Employee</button> --}}
            </div>
            {!! Form::close() !!}

    </div>
</div>

@endsection


<!-- nachomoa waya -->