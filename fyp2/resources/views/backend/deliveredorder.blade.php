
@extends('backend.layouts.app')
@section('content')

       <section class="content-main">
                <div class="content-header">
                    <h2 class="content-title">All Delivered Products ({{$deliveredorder->count()}})</h2>
                   
                </div>
                <div class="card mb-4">
                  
                    <!-- card-header end// -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No. </th>
                                        <th>Customer</th>
                                        <th>Product / Seller</th>
                                        <th>Location</th>
                                        <th>Order Date</th>
                                        <th>Delivery Date</th>
                                        
                                      
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($deliveredorder as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        @php
                                           $getname = DB::table('users')->where('id' , $order->userid)->first();
                                        @endphp
                                        <td>{{ $getname->name }} </td>
                                        <td>
                                            
                                                <div class="info pl-3">
                                                    <h6 class="mb-0 title">{{ $order->prodname }}</h6>
                                                    @php
                                                         $getseller = DB::table('users')->where('id' , $order->sellerid)->first();
                                                    @endphp
                                                    <small class="text-muted">{{ $getseller->name }}</small>
                                                </div>
                                           
                                        </td>
                                        <td>{{ $getseller->area }}</td>

                                        <td>{{ Carbon\Carbon::parse($order->created_at)->format('F j, Y \a\t g:i a') }}</td>
                                         <td>{{ Carbon\Carbon::parse($order->updated_at)->format('F j, Y \a\t g:i a') }}</td>

                                    </tr>
                                @endforeach 
                                 
                                  
                                </tbody>
                            </table>
                            <!-- table-responsive.// -->
                        </div>
                    </div>
                    <!-- card-body end// -->
                </div>
                <!-- card end// -->
               
            </section>
         

@endsection