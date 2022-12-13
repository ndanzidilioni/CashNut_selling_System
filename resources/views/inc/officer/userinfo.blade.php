
@extends('layout.admin.main2')

@section('sidebar')

    <li class="menu-title">Main</li>
    <li >
        <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard/home</span></a>
    </li>
    <li class="active">
        <a href="{{ url('clerk') }}"><i class="fa fa-user"></i> <span>View peasant Details</span></a>
    </li>
    <li >
       
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
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="dash-widget">
                            
                            <div class="dash-widget-info text-right">
                               Last login  <i> {{date('d/F/Y')}} </i>
                            </div>
                             <div class="dash-widget-info text-left">
                               You have succesfull login as <b><i>{{Auth::user()->name}}</i></b> with email adress  of <b><i>{{Auth::user()->email}}</i></b>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="dash-widget">

                            <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Peasant Information</h4>
                    </div>
                </div>

                              <table class="table table-striped custom-table">
                                <thead>
                                    

                                    <tr>
                                        <th>Full Name</th>
                                        <th>Account Number</th>
                                        <th>Bank Name</th>
                                        <th>Killos Submitted</th>
                                        <th>Amount to be payed</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                    </thead>
                                     
                                <tbody>
                                     @if(count($users2))
                                                  @foreach($users2 as $user)
                                                  
                                    <tr>
                                        
                                        <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> {{ $user->name}}</td>
                                        <td>{{ $user->AcNumber}}</td>
                                        <td>{{ $user->bankName}}</td>
                                        <td>{{ $user->capacity}}</td>
                                        <td>{{ $user->amount}}</td>
                                        <td>
                                            @if($user->status == 1)
                                        <span class="custom-badge status-red">not Payed</span>
                                        @elseif($user->status == 3)
                                         <span class="custom-badge status-blue">inprocess</span>
                                        @else
                                        <span class="custom-badge status-green">Payed</span>
                                        @endif

                                        </td>
                         
                                    </tr>
                                             
                                             @endforeach
                                             @endif
                                
                                </tbody>
                            </table>

                    </div>
                    </div>
  
                        <div class="content">
                
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">

                        </div>
                    </div>
                </div>
            </div>
    </div>       
                
                          
                           

                           


                       
                        


@endsection