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
                           
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Payslip</h4>
                    </div>
                    <div class="col-sm-7 col-8 text-right m-b-30">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white">CSV</button>
                            <button class="btn btn-white">PDF</button>
                             
                            <button class="btn btn-white" onclick=" windows.print();> Print</button>
                        </div>
                    </div>
                </div>

<div class="card-box">
                            <h4 class="payslip-title">Payslip for the payment made on  July 2018</h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    <img src="assets/img/logo-dark.png" class="inv-logo" alt="">
                                    <ul class="list-unstyled mb-0">
                                        <li>Cashewnut Information Management</li>
                                        <li>P.O.BOX 532 dodoma,</li>
                                        <li>Dillion Ndanzi, CA, 91403</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">Payslip #49029</h3>
                                        <ul class="list-unstyled">
                                            <li>receipt Month: <span>July, 2018</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5 class="mb-0"><strong>Albina Simonis</strong></h5></li>
                                        <li><span>Buyer</span></li>
                                        <li>User ID: NS-0001</li>
                                        <li>registration Date: 7 May 2015</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div>
                                        <h4 class="m-b-10"><strong></strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>

                                                @if(isset($payment))
                                                @foreach($payment as $payments)

                                                <tr>
                                                    <td><strong>Total kilograms sold</strong> <span class="float-right">{{$payments->kilo}} Kg</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Cost of cashewnut per one killogram</strong> <span class="float-right">{{($payments->amount)/($payments->kilo)}}/= Tsh</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tax payed per each killogram</strong> <span class="float-right">300/= tsh</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total tax payed for all killograms</strong> <span class="float-right">{{$payments->kilo*300}}/= Tsh</span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Service charges cost</strong> <span class="float-right"><strong>2000/=Tsh</strong></span></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                                             <div class="col-sm-12">
                                    <p><strong>Total cash: {{$payments->amount}}/= Tsh</strong>
                                      <?php
                                     // $f = new NumberFormatter("en",NumberFormatter::SPELLOUT);
                                      ?>
                                        

                                     (Fifty nine thousand six hundred and ninety eight only.)</p>
                                </div>
                            </div>
                        </div>
@endsection
