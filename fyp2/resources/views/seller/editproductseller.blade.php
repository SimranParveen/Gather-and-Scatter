
@extends('seller.layouts.app')
@section('content')

      
            <section class="content-main">
             <form action="{{ url('/manager/update-product-seller') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                  <input type="hidden" name="id" value="{{$productrecord->id}}"/>

                <div class="row">
                    <div class="col-9">
                        <div class="content-header">
                            <h2 class="content-title">Edit Product</h2>
                            <div>
                                <button type="submit" class="btn btn-md rounded font-sm hover-up">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Basic</h4>
                            </div>
                            <div class="card-body">
                              
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Product title</label>
                                        <input type="text" name="name" value="{{$productrecord->name}}" class="form-control" id="product_name" />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Full description</label>
                                        <textarea  name="description" class="form-control" rows="4">{{$productrecord->description}}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label">Regular price</label>
                                                <div class="row gx-2">
                                                    <input value="{{$productrecord->orignal_price}}" name="orignal_price" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label">Promotional price</label>
                                                <input value="{{$productrecord->discount_price}}" name="discount_price" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                          <label class="form-label">Type</label>
                                                    <select name="type" class="form-select">
                                                        <option value="Grocery" {{ $productrecord->type === 'Grocery' ? 'selected' : '' }}>Grocery</option>
                                                        <option value="Beauty Product" {{ $productrecord->type === 'Beauty Product' ? 'selected' : '' }}>Beauty Product</option>
                                                        <option value="Household" {{ $productrecord->type === 'Household' ? 'selected' : '' }}>Household</option>
                                                        <option value="Food" {{ $productrecord->type === 'Food' ? 'selected' : '' }}>Food</option>
                                                    </select>

                                        </div>
                                    </div>


                                     <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-6">
                                                <label class="form-label">Mag. Date</label>
                                                    <div class="row gx-2">
                                                        <input name="mag_date" type="date" class="form-control" value="{{ date('Y-m-d', strtotime($productrecord->mag_date)) }}">
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-6">
                                                <label class="form-label">Exp. Date</label>
                                                <input name="exp_date" type="date" class="form-control" value="{{ date('Y-m-d', strtotime($productrecord->exp_date)) }}" />
                                            </div>
                                        </div>
                                       
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-6">
                                                <label class="form-label">Stock Qty.</label>
                                                <input type="text" name="stock" value="{{$productrecord->stock}}" class="form-control" id="product_name" />
                                            </div>
                                        </div>
                                     
                                       
                                    </div>






                              
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-3">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Product Image</h4>
                            </div>
                            <div class="card-body">
                                <div class="input-upload">
                                     <img src="{{ asset('storage/' . $productrecord->image) }}" alt="{{ $productrecord->name }}" class="img-preview">
                                    <input name="image" class="form-control" type="file" />
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                  </form>
            </section>

@endsection