@extends('frontend.layouts.headermain')
@section('content')

 

   <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop
                    <span></span> Cart
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Your Cart</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are <span class="text-brand">{{$getmyallproducts->count()}}</span> products in your cart</h6>
                        <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear Cart</a></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                   
                                     <th scope="col">Sr No.</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $totalPrice = 0;
                                $counter = 0;
                            @endphp
                            @foreach($getmyallproducts as $cartitems)
                                <tr class="pt-30">
                                    <td class="product-des product-name">
                                     {{ ++$counter }}
                                    </td>
                                   
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">{{$cartitems->prodname}}</a></h6>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-body">Rs. {{$cartitems->prodprice}} </h4>
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                        <div class="detail-extralink mr-15">
                                            <div class="detail-qty border radius">
                                                <span class="qty-val">{{$cartitems->prodqty}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-brand">Rs. {{ $cartitems->prodprice * $cartitems->prodqty }} </h4>
                                    </td>
                                 
                                </tr>

                                @php
                                    $totalPrice += $cartitems->prodprice * $cartitems->prodqty;
                                @endphp
                            @endforeach   
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="divider-2 mb-30"></div>
                   
                   
                </div>
                <div class="col-lg-4">
                    <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Grand Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">Rs. {{ $totalPrice }}</h4>
                                        </td>
                                    </tr>
                                    
                                  
                                </tbody>
                            </table>
                        </div>

                        
                        @php
                            $ids = implode(',', $getmyallproducts->pluck('id')->toArray());
                        @endphp
                          <a href="{{ route('confirmorder', ['ids' => $ids]) }}" class="btn mb-20 w-100">Click to Confirm<i class="fi-rs-sign-out ml-15"></i></a>


                       
                    </div>
                </div>
            </div>
        </div>


@endsection