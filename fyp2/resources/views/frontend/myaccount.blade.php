@extends('frontend.layouts.headermain')
@section('content')

 

 
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Close Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Pending Order</a>
                                        </li>
                                      
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content account dashboard-content pl-50">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Hello {{ Auth::user()->name }}!</h3>
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    From your account dashboard. you can easily check &amp; view your Pending and Completed order with their OTP.  </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Completed Orders</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order OTP</th>
                                                                <th>Date</th>
                                                                <th>Prodcut Name (Qty)</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($getmycompletedoders as $closeorder)
                                                            <tr>
                                                                <td>{{$closeorder->otp}}</td>
                                                                <td>{{ Carbon\Carbon::parse($closeorder->created_at)->format('d M Y') }}</td>
                                                                <td>{{$closeorder->prodname}} ({{$closeorder->prodqty}})</td>
                                                                <td>{{$closeorder->prodprice*$closeorder->prodqty}}</td>
                                                                <td>
                                                               @if($closeorder->delivery == 1)
                                                                    <span class="stock-status out-stock"> Delivered </span>
                                                                @else
                                                                    <span> Pending</span>
                                                                @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach   
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                         <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Pending Orders</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                   <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order OTP</th>
                                                                <th>Date</th>
                                                                <th>Prodcut Name (Qty)</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($getmypendingoders as $pendingorder)
                                                            <tr>
                                                                <td>{{$pendingorder->otp}}</td>
                                                                <td>{{ Carbon\Carbon::parse($pendingorder->created_at)->format('d M Y') }}</td>
                                                                <td>{{$pendingorder->prodname}} ({{$pendingorder->prodqty}})</td>
                                                                <td>{{$pendingorder->prodprice*$pendingorder->prodqty}}</td>
                                                                <td>
                                                               @if($pendingorder->delivery == 0)
                                                                    <span class="stock-status out-stock"> Pending </span>
                                                                @else
                                                                    <span> Pending</span>
                                                                @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach   
                                                            
                                                        </tbody>
                                                    </table>
                                               
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




@endsection