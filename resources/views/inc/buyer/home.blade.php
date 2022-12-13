@extends('layout.buyer.main')

@section('sidebar')

<li class="menu-title">Main</li>
<li>
    <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
</li>
<li>
    <a href="{{ url('viewslip') }}"><i class="fa fa-user"></i> <span>Dowload slip</span></a>
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


<div class="card">
							<div class="card-header">
								<h6 class="card-title d-inline-block">List of Clerks and available <b>Kg</b> of Cashewnut on their Store</h6> <a href="appointments.html" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead class="dnone">
											<tr>
												<th>Clerk Name</th>
												<th>Location</th>
												<th>Available Kg</th>
												<th>Grade</th>
												<th>Cost per Kg</th>
												<th class="text-right">Action</th>
											</tr>
										</thead>
										<tbody>
											
											  @if(count($users))
                                              @foreach($users as $clerk)
                                              @if($clerk->role_name == 'clerk' )
											
											
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="#">{{ substr('hellow',0,1) }}</a>
													<h2><a href="#">{{$clerk->name}} </a></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">{{$clerk->region}}</h5>
													<p> and district is <b>{{$clerk->district}} </b></p>
												</td>
												<td>
													<h5 class="time-title p-0">{{$clerk->total_kilo}}</h5>
													
												</td>
												<td>
													<h5 class="time-title p-0">{{$clerk->Grade}}</h5>
													
												</td>
												<td>
													<h5 class="time-title p-0">
                                                         @if($clerk->Grade == 'A')
                                                           3500 tsh
                                                           <?php 
                                                       $cost =  $clerk->capacity*3500;


													      ?>

                                                         
                                                         @elseif($clerk->Grade == 'B')
                                                           3000 tsh
                                                             <?php 
                                                       $cost =  $clerk->capacity*3000;

													      ?>
                                                         @elseif($clerk->Grade == 'C')
														   2500 tsh
														     <?php 
                                                       $cost =  $clerk->capacity*2500;

													      ?>
                                                         @endif
														</h5>
													
													<?php 
                                                       $sam = $clerk->Grade ;

													 ?>
												</td>
												
												<td class="text-right">
													@if($clerk->status == 3 || $clerk->status==2)
                                                    <a href="#" class="btn btn-outline-success take-btn">Purchased</a>
													@else
													<a href="{!! route('showInfo', ['secsw'=>Crypt::encrypt($cost),'id'=>Crypt::encrypt($clerk->peasant_id),'kilo'=>Crypt::encrypt($clerk->capacity)]) !!}" class="btn btn-outline-primary take-btn">you can Buy</a>
													@endif
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
