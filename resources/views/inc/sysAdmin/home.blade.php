@extends('layout.admin.main')

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
    

        <a  href="{{ route('logout') }}"  style="color:red" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="btn power" onclick="visitPage();">
                <i class="fa fa-key"></i>Log out</button></a> <form id="logout-form" action="{{ route('logout') }}" 
                method="POST" style="display: none;">{{ csrf_field() }}</form>

                

</li>
@endsection


@section('contents')
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg1"><i class="fa fa-user-o"></i></span>
            <div class="dash-widget-info text-right">
                <h3>98</h3>
                <span class="widget-title1">Buyers <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
            <div class="dash-widget-info text-right">
                <h3>1072</h3>
                <span class="widget-title2">Clerks <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg3"><i class="fa fa-user-o"></i></span>
            <div class="dash-widget-info text-right">
                <h3>72</h3>
                <span class="widget-title3">Market officers <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget">
            <span class="dash-widget-bg4"><i class="fa fa-user-o"></i></span>
            <div class="dash-widget-info text-right">
                <h3>618</h3>
                <span class="widget-title4">peasants <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</div>
@endsection