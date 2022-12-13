@extends('layout.clerk.main')

@section('sidebar')

    <li class="menu-title">Main</li>
    <li class="active">
        <a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard//home</span></a>
    </li>
    <li >
        <a href="{{ url('clerkadd') }}"><i class="fa fa-user"></i> <span>Add Kg</span></a>
    </li>
   <li>
    

        <a  href="{{ route('logout') }}"  style="color:red" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="btn power" onclick="visitPage();">
                <i class="fa fa-key"></i>Log out</button></a> <form id="logout-form" action="{{ route('logout') }}" 
                method="POST" style="display: none;">{{ csrf_field() }}</form>

                

</li>
 
@endsection


@section('contents')

@if(isset($sam))

{{ optional($sam) }}

@endif
 <div class="alert alert-success" style="display:none ;" id="sam" > hellow ever--y- one </div>

 <script type="text/javascript">
  //  document.getElementById("sam").innerHTML="HELLOW".fadeIn().delay(4000).fadeOut();
       
       $(function(){
  $(#sam).fadeIn().delay(4000).fadeOut();

       });
   // $('#myModal').modal('show');

     //$(#sam).fadeIn().delay(4000).fadeOut();
     // $(".alert").html('User '+type1+' Successfull').fadeIn().delay(4000).fadeOut();
     
     //  $(".alert").html('User '+type1+' Successfull').fadeIn().delay(4000).fadeOut();
 </script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<div class="alert alert-success" id="success-alert">
                                  <center> Transaction complete successfull!! </center>
                                </div>

<script>
    window.alert('hellow');
$(".alert").delay(4000).slideUp(20, function() {
    $(this).alert(close);
});
</script> -->'
<div class="row">

   <div class="col-lg-12">
                            <div class="card-block">
                                <h4 class="card-title">Peasant lists </h4>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Bank Name</th>
                                                <th>AC Number</th>
                                                <th>total Kg</th>
                                                <th>Amount To be payed</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                           
                                                  @if(count($users))
                                                  @foreach($users as $user)
                                                 
                                            <tr>

                                                 <td>{{ $user->name}}</td>
                                                <td>{{ $user->email}}</td>
                                                <td>{{ $user->bankName}}</td>
                                                <td>{{ $user->AcNumber}}</td>
                                                <td>{{ $user->capacity}}</td>
                                                <td>{{ $user->amount}}</td>
                                                <td>
                                          @if($user->status == 1)
                                        <span class="custom-badge status-red">not Payed</span>
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
                        </div>
    </div>       
                
                          
                           

                           


                       
                        

</div>
@endsection