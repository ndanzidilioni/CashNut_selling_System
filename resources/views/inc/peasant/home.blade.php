
@extends('layout.peasant.main')

@section('sidebar')

    <li class="menu-title">Main</li>
    <li class="active">
        <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard/home</span></a>
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
                                     @if(count($deposit))
                                                  @foreach($users as $user)
                                                  @foreach($deposit as $deposits)
                                                  @foreach($bank as $banks)
                                    <tr>
                                        
                                        <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> {{ $user->name}}</td>
                                        <td>{{ $banks->AcNumber}}</td>
                                        <td>{{ $banks->bankName}}</td>
                                        <td>{{ $deposits->capacity}}</td>
                                        <td>{{ $deposits->amount}}</td>
                                        <td>
                                            @if($deposits->status == 1)
                                        <span class="custom-badge status-red">not Payed</span>
                                        @elseif($deposits->status == 3)
                                         <span class="custom-badge status-blue">inprocess</span>
                                        @else
                                        <span class="custom-badge status-green">Payed</span>
                                        @endif

                                        </td>
                         
                                    </tr>
                                             @endforeach
                                             @endforeach
                                             @endforeach

                                        @else

                         <div class="dash-widget-info text-left">
                              
                                
                                 <div class="alert alert-success alert-dismissible fade show" role="alert"> dear
                                <strong> {{Auth::user()->name}}!!!</strong> sorry your information will be posted when after adding  information of your crops to the nearby clerk 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                </div>
                         </div>
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
                
                          
                           

                           


                       
                        

</div>
@endsection