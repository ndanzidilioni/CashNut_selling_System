@extends('layout.buyer.main')

@section('sidebar')

<li class="menu-title">Main</li>
<li>
    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
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
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="dash-widget">

                            <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">List of available slip</h4>
                    </div>
                </div>

                              <table class="table table-striped custom-table">
                                <thead>
                                    

                                    <tr>
                                        <th>slip id</th>
                                        <th>Amount</th>
                                        <th>payed at</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                     
                                <tbody>
                                     @if(count($payment))
                                                  @foreach($payment as $user)
                                                  
                                    <tr>
                                        
                                        <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> {{ $user->id}}</td>
                                        <td>{{ $user->amount}}</td>
                                        <td>{{ $user->created_at}}</td>
                                        
                                        <td>
                                        
                                        
                                      
                                         <span class="custom-badge status-blue"><a href="{!! route('dowload', ['id'=>Crypt::encrypt($user->id)]) !!}" class="btn btn-outline-primary take-btn">dowload</a></span>
                                      
                                       
                                       

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
                
                          
                           

                           


                       
                        

</div>
@endsection
