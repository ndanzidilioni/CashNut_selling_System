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

	<div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="dash-widget">
							You have succesfull login as <b><i>{{Auth::user()->name}}</i></b> with email adress  of <b><i>{{Auth::user()->email}}</i></b>
							<div class="dash-widget-info text-right">
								<i> {{date('d/F/Y')}} </i>
							</div>
                        </div>
                    </div>

<div class="main-wrapper  account-wrapper">


    <div class="account-page">
        <!-- <div class="account-center"> -->
            <div class="account-box ">
                
  

 <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="" ">
               
               
                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label"> </label>
                    <div class="float-right">
                      <a href="auth-forgot-password.html" style=" text-decoration:none;" class="ccy text-small">
                        
                      </a>
                    </div>
                  </div>
                 Dear<i> <b>{{Auth::user()->name}} </b></i> you should use the following accounts for making payments and Entering the recepient Number that you will be provided from the bank after making payments, and please dont forget to have your bank slip  for refence <br><br>

                 The following are the list of banks and Account Number 
                 <br><br>
                 <b>NMB</b> : Account Number A23B23241543. Account Name : CASHEWNUT CROP SYSTEM 

                 <br><br>
                 <b>CRDB</b> : Account Number C23B23376543. Account Name : CASHEWNUT CROP SYSTEM  
                 <br><br>
                 <b>Note!!</b><br>
                 Your required to pay <b> {{$cost}}/= </b> Tsh to the one of hte above account
                  
                  
                </div>
                
                <div class="form-group">
                   <div class="input-group-append">
                                               
                                                   <!--  <button class="btn btn-primary" type="button">Button</button> -->
                                            </div>
                </div>
              </form>
                             <button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
                                    next
                                </button>
               </div>
        </div>
    
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title" id="myModalLabel">Comfirm Payments</h4>
                                            </div>
                                             {!! Form::open(['class'=>'form-group row mb-4','action' => 'BuyerController@store','method'=>'POST']) !!}
                                            <div class="modal-body">

                                            	<span><b>Please Enter the recepient Number to confirm your payments </b></span>
                                            	

                                          
                                                 
                                           <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">#no</span>
                                            </div>
                                              {{ Form::number('confirmNumber', null , ['class'=>'form-control' ]) }}
                                             {{ Form::hidden('peasant_id', $id , ['class'=>'form-control']) }}

                                              {{ Form::hidden('id', 1 , ['class'=>'form-control']) }}

                                              {{ Form::hidden('kilo', $kilo , ['class'=>'form-control']) }}

                                               {{ Form::hidden('cost', $cost , ['class'=>'form-control']) }}
                                             
                                            </div>

                                            </div>
                                         

                                                 <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                 {{ Form::submit('confirm', ['class'=>'btn btn-primary']) }}

                                                     {!! Form::close() !!}
                                            </div>
                                            </div>
                                            
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
@endsection
