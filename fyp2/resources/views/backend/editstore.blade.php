
@extends('backend.layouts.app')
@section('content')

      
            <section class="content-main">
             <form action="{{ url('/admin/update-store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                  <input type="hidden" name="id" value="{{$storerecord->id}}"/>
                <div class="row">
                    <div class="col-9">
                        <div class="content-header">
                            <h2 class="content-title">Edit Store</h2>
                            <div>
                                <button type="submit" class="btn btn-md rounded font-sm hover-up">Update</button>
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
                                        <label for="product_name" class="form-label">Store Name</label>
                                        <input type="text" name="name" value="{{$storerecord->name}}" class="form-control" id="product_name" />
                                    </div>
                              
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Phone</label>
                                        <input type="text" name="phone" value="{{$storerecord->phone}}" class="form-control" id="product_name" />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Address</label>
                                        <textarea  name="address" class="form-control" rows="4">{{$storerecord->address}}</textarea>
                                    </div>


                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Map Link</label>
                                        <input type="text" name="map"  value="{{$storerecord->map}}" class="form-control" id="product_name" />
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label">Store Timings</label>
                                                <div class="row gx-2">
                                                    <input value="{{$storerecord->timing}}" name="timing" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-lg-4">
                                             <label class="form-label">Status</label>
                                                    <select name="status" class="form-select">
                                                        <option value="1" {{ $storerecord->status === '1' ? 'selected' : '' }}>Open</option>
                                                        <option value="0" {{ $storerecord->status === '0' ? 'selected' : '' }}>Close</option>

                                                    </select>
                                        </div>
                                    </div>


                              
                            </div>
                        </div>
                        
                    </div>
                
                </div>
                  </form>
            </section>

@endsection