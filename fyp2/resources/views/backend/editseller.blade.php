
@extends('backend.layouts.app')
@section('content')

      
            <section class="content-main">
                <form action="{{ url('/admin/update-seller') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $sellerrecord->id }}" />
                                 <div class="row">
                    <div class="col-9">
                        <div class="content-header">
                            <h2 class="content-title">Edit Seller Details</h2>
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
                                        <label for="product_name" class="form-label">Seller title</label>
                                        <input type="text" name="name" value="{{ $sellerrecord->name }}" class="form-control" id="seller_name" required />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">About</label>
                                        <textarea name="about"  class="form-control" rows="4">{{ $sellerrecord->about }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label">Since</label>
                                                <div class="row gx-2">
                                                    <input name="since" value="{{ $sellerrecord->since }}" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label">Whatsapp</label>
                                                <input name="whatsapp" value="{{ $sellerrecord->whatsapp }}" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="form-label">Phone</label>
                                                <input name="phone" value="{{ $sellerrecord->phone }}" type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" value="{{ $sellerrecord->address }}" class="form-control" id="product_name" />
                                    </div>

                                   <div class="col-lg-4">
                                        <label class="form-label">Area</label>
                                        <select name="area" class="form-select">
                                            <option value="Islamabad / Rawalpindi" {{ $sellerrecord->area == 'Islamabad / Rawalpindi' ? 'selected' : '' }}>Islamabad / Rawalpindi</option>
                                            <option value="Lahore" {{ $sellerrecord->area == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                                            <option value="Karachi" {{ $sellerrecord->area == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                                            <option value="Peshawar" {{ $sellerrecord->area == 'Peshawar' ? 'selected' : '' }}>Peshawar</option>
                                            <option value="Quetta" {{ $sellerrecord->area == 'Quetta' ? 'selected' : '' }}>Quetta</option>
                                        </select>
                                    </div>


                                     <div class="mb-4">
                                        <label for="product_name" class="form-label">Map Link</label>
                                        <input type="text" name="map" value="{{ $sellerrecord->map }}" class="form-control" id="seller_name" required />
                                    </div>



                                  <input type="hidden" name="status" value="0">
                                    <label class="form-check mb-4">
                                        <input class="form-check-input" name="status" type="checkbox" value="1" {{ $sellerrecord->status == 1 ? 'checked' : '' }}>
                                        <span class="form-check-label"> Publish </span>
                                    </label>

                              
                            </div>
                        </div>
                        <!-- card end// -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Social Links</h4>
                            </div>
                            <div class="card-body">
                             
                                   
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Facebook</label>
                                        <input type="text" name="fb" value="{{ $sellerrecord->fb }}" class="form-control" id="product_name" />
                                    </div>
                                     <div class="mb-4">
                                        <label for="product_name" class="form-label">Instagram</label>
                                        <input type="text" name="insta" value="{{ $sellerrecord->insta }}" class="form-control" id="product_name" />
                                    </div>
                                     <div class="mb-4">
                                        <label for="product_name" class="form-label">Youtube</label>
                                        <input type="text" name="youtube" value="{{ $sellerrecord->youtube }}" class="form-control" id="product_name" />
                                    </div>
                                    
                                  
                              
                            </div>
                        </div>
                        <!-- card end// -->
                    </div>
                    <div class="col-lg-3">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Logo</h4>
                            </div>
                          <div class="card-body">
                                <div class="input-upload">
                                    <img src="{{ asset('storage/' . $sellerrecord->logo) }}" alt="{{ $sellerrecord->name }}" class="img-preview">
                                    <input name="logo" class="form-control" type="file" />
                                </div>
                            </div>

                        </div>


                               <div class="card mb-4">
                            <div class="card-header">
                                <h4>Login Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="input-upload">
                                   
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ $sellerrecord->email }}"  class="form-control" id="email" required />

                                    <label class="form-label">Password</label>
                                    <input type="text" name="password"  class="form-control" id="password" />
                                </div>
                            </div>
                        </div>
                       
              
                    </div>
                </div>
                 </form>
            </section>
             

@endsection