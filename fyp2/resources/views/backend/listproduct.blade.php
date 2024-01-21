
@extends('backend.layouts.app')
@section('content')

       <section class="content-main">
                <div class="content-header">
                    <h2 class="content-title">Products list</h2>
                    <div>
                        <a href="{{ route('addproduct') }}" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
                    </div>
                </div>
                <div class="card mb-4">
                  
                    <!-- card-header end// -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Expire On</th>
                                        <th>On Sale</th>
                                        <th>Status</th>
                                        
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($allproducts as $product)
                                    <tr>
                                        <td width="40%">
                                            <a href="#" class="itemside">
                                                <div class="left">
                                                    <img src="{{ asset('storage/' . $product->image) }}" class="img-sm img-avatar" alt="{{ $product->name }}" />
                                                </div>
                                                <div class="info pl-3">
                                                    <h6 class="mb-0 title">{{ $product->name }}</h6>
                                                    @php
                                                         $getname = DB::table('users')->where('id' , $product->vendor_id)->first();
                                                    @endphp
                                                    <small class="text-muted">{{ $getname->name }} ({{ $getname->area }})</small>
                                                </div>
                                            </a>
                                        </td>

                                        <td>{{ Carbon\Carbon::parse($product->exp_date)->format('d M Y') }}</td>
                                         <td>
                                        @if($product->onsale == 0)
                                        <span class="badge rounded-pill alert-danger">Regular</span>
                                        @else
                                        <span class="badge rounded-pill alert-success">On Sale</span>
                                        @endif
                                        </td>


                                        <td>
                                        @if($product->status == 0)
                                        <span class="badge rounded-pill alert-danger">Inactive</span>
                                        @else
                                        <span class="badge rounded-pill alert-success">Active</span>
                                        @endif
                                        </td>
                                        
                                        
                                        
                                      
                                        <td class="text-end">
                                            <a href="{{ route('editproduct', ['id' => $product->id]) }}" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                                        </td>
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