@extends('frontend.layouts.headermain')
@section('content')

 

  <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span>  {{$singleproduct->name}}
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-11 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="product-detail accordion-detail">
                                <div class="row mb-50 mt-30">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                        <div class="detail-gallery">
                                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                            <!-- MAIN SLIDES -->
                                            <div class="product-image-slider">
                                                <figure class="border-radius-10">
                                                    <img src="{{ asset('storage/' . $singleproduct->image) }}" alt="product image" />
                                                </figure>
                                                <!--<figure class="border-radius-10">
                                                    <img src="assets/imgs/shop/product-16-1.jpg" alt="product image" />
                                                </figure>
                                                <figure class="border-radius-10">
                                                    <img src="assets/imgs/shop/product-16-3.jpg" alt="product image" />
                                                </figure>
                                                <figure class="border-radius-10">
                                                    <img src="assets/imgs/shop/product-16-4.jpg" alt="product image" />
                                                </figure>
                                                <figure class="border-radius-10">
                                                    <img src="assets/imgs/shop/product-16-5.jpg" alt="product image" />
                                                </figure>
                                                <figure class="border-radius-10">
                                                    <img src="assets/imgs/shop/product-16-6.jpg" alt="product image" />
                                                </figure>
                                                <figure class="border-radius-10">
                                                    <img src="assets/imgs/shop/product-16-7.jpg" alt="product image" />
                                                </figure>-->
                                            </div>
                                            <!-- THUMBNAILS -->
                                            <!--<div class="slider-nav-thumbnails">
                                                <div><img src="assets/imgs/shop/thumbnail-3.jpg" alt="product image" /></div>
                                                <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image" /></div>
                                                <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image" /></div>
                                                <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image" /></div>
                                                <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image" /></div>
                                                <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image" /></div>
                                                <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image" /></div>
                                            </div>-->
                                        </div>
                                        <!-- End Gallery -->
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="detail-info pr-30 pl-30">

                                            @if($singleproduct->onsale == 1)
                                                    <span class="stock-status out-stock"> Sale </span>
                                                @else
                                                    <span></span>
                                                @endif


                                            
                                            <h2 class="title-detail">{{$singleproduct->name}}</h2>
                                            <div class="product-detail-rating">
                                                <div class="product-rate-cover text-end">
                                                   
                                                </div>
                                            </div>
                                            <div class="clearfix product-price-cover">
                                                <div class="product-price primary-color float-left">
                                                    <span class="current-price text-brand">Rs. {{$singleproduct->discount_price}}</span>
                                                    <span>
                                                       
                                                        <span class="save-price font-md color3 ml-15">{{($singleproduct->orignal_price - $singleproduct->discount_price) / $singleproduct->orignal_price * 100}} Off</span>
                                                        <span class="old-price font-md ml-15">Rs. {{$singleproduct->orignal_price}}</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="short-desc mb-30">
                                                <p class="font-lg">{{$singleproduct->description}}</p>
                                            </div>
                                            <!--<div class="attr-detail attr-size mb-30">
                                                <strong class="mr-10">Size / Weight: </strong>
                                                <ul class="list-filter size-filter font-small">
                                                    <li><a href="#">50g</a></li>
                                                    <li class="active"><a href="#">60g</a></li>
                                                    <li><a href="#">80g</a></li>
                                                    <li><a href="#">100g</a></li>
                                                    <li><a href="#">150g</a></li>
                                                </ul>
                                            </div>-->
                                            <div class="detail-extralink mb-50">

                                                <form method="POST" action="{{ url('/addtocart') }}">
                                                @csrf
                                                    <div class="detail-qty border radius">
                                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                        <input type="text" name="qty" class="qty-val" value="1" min="1">
                                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                                    </div>
                                                    <div class="product-extra-link2">
                                                
                                                        <input type="hidden" name="prodid" value="{{$singleproduct->id}}"><br>
                                                        <input type="hidden" name="venderid" value="{{$singleproduct->vendor_id}}"><br>
                                                        <input type="hidden" name="prodname" value="{{$singleproduct->name}}"><br>
                                                        <input type="hidden" name="prodprice" value="{{$singleproduct->discount_price}}"><br>
                                                        
                                                        


                                                       @if(auth()->check())
                                                            <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                                        @else
                                                            <a href="{{ route('login') }}"><p class="button button-add-to-cart" style="width: 206px;">Login to process</p></a>
                                                        @endif

                                                    
                                                    </div>
                                                </form>
                                            </div>


                 @php
                                                $getsellerdetails = DB::table('users')->where('id' , $singleproduct->vendor_id)->first();
                                            @endphp                              
                            <p><a href="{{$getsellerdetails->map}}">Get directions to this place</a></strong></p>
                                            <div class="font-xs">
                                                <ul class="mr-50 float-start">
                                                    <li class="mb-5">Type: <span class="text-brand">{{$singleproduct->type}}</span></li>
                                                     <li>Stock:<span class="in-stock text-brand ml-5">{{$singleproduct->stock}} Item(s) In Stock</span></li>
                                                </ul>
                                                <ul class="float-start">
                                                    <li class="mb-5">MFG:<span class="text-brand">{{ Carbon\Carbon::parse($singleproduct->mag_date)->format('d M Y') }}</span></li>
                                                    <li>EXP: <span class="text-brand">{{ Carbon\Carbon::parse($singleproduct->exp_date)->format('d M Y') }}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Detail Info -->
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="tab-style3">
                                        <ul class="nav nav-tabs text-uppercase">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{$feedback->count()}})</a>
                                            </li>
                                           
                                        </ul>
                                        <div class="tab-content shop_info_tab entry-main-content">
                                            <div class="tab-pane fade show active" id="Description">
                                                <div class="">
                                                    <p>{{$singleproduct->description}}</p>
                                                </div>
                                            </div>
                                           

                                        
                                            <div class="tab-pane fade" id="Vendor-info">
                                                <div class="vendor-logo d-flex mb-30">
                                                    <a href="{{ route('vendordetails', ['id' => $getsellerdetails->id]) }}"><img src="{{ asset('storage/' . $getsellerdetails->logo) }}" alt="" /></a>
                                                    <div class="vendor-name ml-15">
                                                       
                                                       
                                                    </div>
                                                </div>
                                                <ul class="contact-infor mb-50">
                                                    <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>{{$getsellerdetails->address}}</span></li>
                                                    <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong><span>{{$getsellerdetails->phone}} / {{$getsellerdetails->whatsapp}}</span></li>
                                                </ul>
                                              <p><a href="{{$getsellerdetails->map}}">Get my directions</a></strong></p>
                                                <p>
                                                      {{$getsellerdetails->about}}  
                                                </p>
                                            </div>






                                             <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer reviews</h4>
                                                    <div class="comment-list">

                                                    @foreach($feedback as $feed)
                                                        <div class="single-comment justify-content-between d-flex mb-30">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                   
                                                                    <a href="#" class="font-heading text-brand">{{$feed->username}}</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">{{ Carbon\Carbon::parse($seller->created_at)->format('F j, Y \a\t g:i a') }} </span>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                    <p class="mb-10">{{$feed->feeback}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach   



                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <!--comment form-->
                                         @if(auth()->check())
                                        <div class="comment-form">
                                            <h4 class="mb-15">Add a review</h4>
                                           
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                   <form action="{{ url('/storefeedback') }}" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="prodid" value="{{$singleproduct->id}}"><br>
                                                        <input type="hidden" name="prodname" value="{{$singleproduct->name}}"><br>
                                                        
                                                        
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">Submit Review</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                    </div>





                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-60">
                                    <div class="col-12">
                                        <h2 class="section-title style-1 mb-30">Related products</h2>
                                    </div>
                                    <div class="col-12">
                                        <div class="row related-products">

                                        @foreach($allproducts as $product)   
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                           <a href="{{ route('singleproduct', ['id' => $product->id]) }}">
                                                                <img class="default-img" src="{{ asset('storage/' . $product->image) }}" alt="" />
                                                                <img class="hover-img" src="{{ asset('storage/' . $product->image) }}" alt="" />
                                                            </a>
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
                                                        <h2><a href="shop-product-right.html" tabindex="0">{{$product->name}}</a></h2>
                                                      
                                                        <div class="product-price">
                                                            <span>Rs. {{$product->discount_price}}</span>
                                                            <span class="old-price">Rs. {{$product->orignal_price}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                           
                           
                         
                           @foreach($promo as $banner)
                                <div class="banner-img mb-30">
                                    <a href="{{ $banner->url }}"><img src="{{ asset('storage/' . $banner->image) }}" alt="Image is not loaded" /></a>
                                </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection