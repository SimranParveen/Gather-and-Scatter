
@extends('seller.layouts.app')
@section('content')

       <section class="content-main">
                <div class="content-header">
                    <h2 class="content-title">All Pending Products ({{$pendingorder->count()}})</h2>
                   
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
                                       <th>Action</th>
                                        
                                      
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($pendingorder as $index => $order)
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
                                        <td>  <a href="#" class="btn btn-md rounded font-sm" onclick="confirmdeliver({{ $order->id }})">Deliver Now</a></td>
                                    </tr>
                                @endforeach 
                                


                 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function confirmdeliver(orderId) {
   
        if (confirm("Are you sure you want to deliver this order?")) {
            // Send Ajax request to update delivery status
            $.ajax({
                url: '/manager/update-delivery/' + orderId,
                type: 'POST',
                data: {_token: '{{ csrf_token() }}'}, // Include CSRF token for Laravel
                success: function(response) {
                    alert('Order delivered successfully');
                     window.location.reload();
                    // You can perform additional actions or update the UI here
                },
                error: function(error) {
                    console.error('Error delivering the order', error);
                }
            });
        }
    }
</script>



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