

   @extends('backend.layouts.app')

@section('content')


           
                <div class="content-header">
                    <div>
                        <h2 class="content-title card-title">Admin Dashboard</h2>
                        <p>Gather & Scatter | Together We Can</p>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Order Amount</h6>
                                    <span>Rs. {{$orderAmountSum}}</span>
                                    <span class="text-sm"> Total amount of all orders </span>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Orders</h6>
                                     <span>{{$orderCount->count()}}</span>
                                    <span class="text-sm"> Total orders delivered till todate.</span>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-qr_code"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Products</h6>
                                    <span>{{$productCount->count()}}</span>
                                    <span class="text-sm"> Total products we have for our clients.</span>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-info-light"><i class="text-info material-icons md-shopping_basket"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Sellers</h6>
                                    <span>{{$sellers->count()}}</span>
                                    <span class="text-sm">On board active sellers offers products</span>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                
               
              
      
          @endsection