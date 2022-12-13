@extends('layout.officer.main')

@section('sidebar')

    <li class="menu-title">Main</li>
    <li class="active">
        <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
    </li>
    <li >
        <a href="{{ url('peasantDetails') }}"><i class="fa fa-user"></i> <span>Peasant Details</span></a>
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
                                 <div class="alert alert-success alert-dismissible fade show" role="alert"> Congraturation dear
                                <strong> {{Auth::user()->name}}!</strong> Your <a href="#" class="alert-link">  Payments</a> has been Processed successfully.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                                 @endif
                               
                                </div>
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">List Of Buyers</h4>
        </div>
       
    </div>
   
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        



                        <tr>
                            <th style="min-width:200px;">Name</th>
                            <th>Email</th>
                            <th>Total kilo</th>
                            <th>Total Amount</th>
                            <th style="min-width: 110px;">status</th>
                            
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                   <tbody>
                        @if(count($payments))
                        @foreach($payments as $payment)
                        

                        <tr>
                            <td>
                                <img width="28" height="28" class="rounded-circle" alt="" src="assets/img/user.jpg"> <h2>{{ $payment->name}}</h2>
                            </td>
                            <td>{{ $payment->email}}</td>
                            <td>{{ $payment->kilo}}</td>
                            <td>{{ $payment->amount}}</td>
                            <td>
                                            @if($payment->status == 1)
                                        <span class="custom-badge status-blue">payment not confirmed</span>
                                        @else
                                        <span class="custom-badge status-green">Payment confirmed</span>
                                        @endif

                                        </td>

                          
                            <td class="text-right">
                                 @if($payment->status == 1)
                                       <a href="{!! route('confirmation', ['id'=>Crypt::encrypt($payment->id),'peasant_id'=>Crypt::encrypt($payment->peasant_id)]) !!}" class="btn btn-outline-primary take-btn">confirm</a>
                                        @else
                                        <span class="custom-badge status-green">confirmed</span>
                                        @endif
                                
                                         
                            </td>
                        </tr>
                         
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection