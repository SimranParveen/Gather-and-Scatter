@extends('frontend.layouts.headermain')

@section('content')

 <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Store <span></span> {{$vendordetails->name}}
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="archive-header-3 mt-30 mb-80" style="background-image: url(assets/imgs/vendor/vendor-header-bg.png)">
                <div class="archive-header-3-inner">
                    <div class="vendor-logo mr-50">
                        <img src="{{ asset('storage/' . $vendordetails->logo) }}" alt="" />
                    </div>
                    <div class="vendor-content">
                        <div class="product-category">
                            <span class="text-muted">Since {{$vendordetails->since}}</span>
                        </div>
                        <h3 class="mb-5 text-white"><a href="vendor-details-1.html" class="text-white">{{$vendordetails->name}}</a></h3>
                       
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="vendor-des mb-15">
                                    <p class="font-sm text-white">{{$vendordetails->about}}</p>
                                     <p style="color: white !important;"><a href="{{$vendordetails->map}}">Directions</a></strong></li>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="vendor-info text-white mb-15">
                                    <ul class="font-sm">
                                        <li><img class="mr-5" src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>{{$vendordetails->address}} </span></li>
                                        <li><img class="mr-5" src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>{{$vendordetails->phone}}</span></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="follow-social">
                                    <h6 class="mb-15 text-white">Follow Us</h6>
                                    <ul class="social-network">
                                        <li class="hover-up">
                                            <a href="{{$vendordetails->twitter}}">
                                                <img src="assets/imgs/theme/icons/social-tw.svg" alt="" />
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="{{$vendordetails->fb}}">
                                                <img src="assets/imgs/theme/icons/social-fb.svg" alt="" />
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="{{$vendordetails->insta}}">
                                                <img src="assets/imgs/theme/icons/social-insta.svg" alt="" />
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>

                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We found <strong class="text-brand">{{$allproducts->count()}}</strong> item(s) for you!</p>
                        </div>
                       
                    </div>
                    <div class="product-list mb-50">


                    @foreach($allproducts as $product) 
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <div class="product-img-inner">
                                        <a href="{{ route('singleproduct', ['id' => $product->id]) }}">
                                            <img class="default-img" src="{{ asset('storage/' . $product->image) }}" alt="" />
                                            <img class="hover-img" src="{{ asset('storage/' . $product->image) }}" alt="" />
                                        </a>
                                    </div>
                                </div>
                              
                                <div class="product-badges product-badges-position product-badges-mrg">
                                                @if($product->onsale == 1)
                                                    <span class="sale">Sale</span>
                                                @else
                                                    <span></span>
                                                @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                   
                                </div>
                                <h2><a href="shop-product-right.html">{{$product->name}}</a></h2>
                                <div class="product-rate-cover">
                                   
                                    <span class="ml-30">{{$product->type}}</span>
                                </div>
                                <p class="mt-15 mb-15">{{$product->description}}</p>
                                <div class="product-price">
                                    <span>Rs. {{$product->discount_price}}</span>
                                    <span class="old-price">Rs. {{$product->orignal_price}}</span>
                                </div>
                                <div class="mt-30">
                                   <!-- <a aria-label="Buy now" class="btn" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add to Cart</a>-->
                                   
                                </div>
                            </div>
                        </div>
                    @endforeach 

                        
                    </div>
                    <!--product grid-->
                 
                  
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">

                @foreach($promo as $banner)
                    <div class="banner-img mb-30">
                        <a href="{{ $banner->url }}"><img src="{{ asset('storage/' . $banner->image) }}" alt="Image is not loaded" /></a>
                    </div>
                @endforeach


                    <div class="banner-img mb-30">
                        <img src="assets/imgs/banner/banner-10.jpg" alt="" />
                    </div>
                    
                  
                    
                 
                </div>
            </div>
        </div>

        @endsection