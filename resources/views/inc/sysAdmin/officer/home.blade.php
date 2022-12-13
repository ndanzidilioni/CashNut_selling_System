@extends('layout.admin.main')

@section('sidebar')

<li class="menu-title">Main</li>
<li >
    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
</li>
<li >
    <a href="{{ url('adminClerks') }}"><i class="fa fa-user"></i> <span>Manage clerks</span></a>
</li>
<li class="active">
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
<li>
    

        <a  href="{{ route('logout') }}"  style="color:red" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="btn power" onclick="visitPage();">
                <i class="fa fa-key"></i>Log out</button></a> <form id="logout-form" action="{{ route('logout') }}" 
                method="POST" style="display: none;">{{ csrf_field() }}</form>

                

</li>
@endsection


@section('contents')
  <div class="dash-widget-info text-left">
                              
                                @if(isset($error))
                                @if($error == 1)
                                 <div class="alert alert-success alert-dismissible fade show" role="alert"> succesfull
                                <strong>!!!</strong> Officer <a href="#" class="alert-link">  Added</a>  successfully.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                                @else
                                 <div class="alert alert-danger alert-dismissible fade show" role="alert"> Ooooops
                                <strong>!!!</strong> Officer <a href="#" class="alert-link"> Not Added</a>  successfully.   something went wrong
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                                 @endif
                                 @endif
                               
                                </div>



    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Officers</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
           <a class="btn btn-primary float-right btn-rounded" href="{!! route('manage', ['id'=>Crypt::encrypt(4)]) !!}"></i> Add Officers</a>
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        



                        <tr>
                            <th style="min-width:200px;">Name</th>
                            <th>Employee ID</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th style="min-width: 110px;">Region</th>
                            <th>District</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                   <tbody>
                        @if(count($users))
                        @foreach($users as $admin)
                        @if($admin->role_name == 'officer' )

                        <tr>
                            <td>
                                <img width="28" height="28" class="rounded-circle" alt="" src="assets/img/user.jpg"> <h2>{{ $admin->name}}</h2>
                            </td>
                            <td>{{ $admin->id}}</td>
                            <td>{{ $admin->email}}</td>
                            <td>0{{ $admin->phone}}</td>
                            <td>{{ $admin->region}}</td>
                            <td>{{ $admin->district}}</td>

                          
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a class="action-icon dropdown-toggle" aria-expanded="false" href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="edit-employee.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                         @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection