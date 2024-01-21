
@extends('backend.layouts.app')
@section('content')

      
            <section class="content-main">
                <form action="{{ url('/admin/store-seller') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                 <div class="row">
                    <div class="col-9">
                        <div class="content-header">
                            <h2 class="content-title">Add New Seller</h2>
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
                                        <label for="product_name" class="form-label">Seller title</label>
                                        <input type="text" name="name" placeholder="Type here" class="form-control" id="seller_name" required />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">About</label>
                                        <textarea name="about" placeholder="Type here" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label">Since</label>
                                                <div class="row gx-2">
                                                    <input name="since" placeholder="" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label">Whatsapp</label>
                                                <input name="whatsapp" placeholder="" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="form-label">Phone</label>
                                                <input name="phone" placeholder="" type="text" class="form-control" />
                                        </div>
                                    </div>
                                 <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" placeholder="" class="form-control" id="product_name" />
                                    </div>

                                    <div class="col-lg-6">
                                            <label class="form-label">Area</label>
                                            <select name="area" class="form-select">
                                                <option>Islamabad / Rawalpindi</option>
                                                <option>Lahore</option>
                                                <option>Karachi</option>
                                                <option>Peshawar</option>
                                                <option>Queta</option>
                                            </select>
                                        </div>
                                </div>


                                  <div class="mb-4">
                                        <label for="product_name" class="form-label">Map link</label>
                                        <input type="text" name="map" placeholder="Add your google map location" class="form-control" id="seller_name" required />
                                    </div>



                                  <input type="hidden" name="status" value="0">
                                    <label class="form-check mb-4">
                                        <input class="form-check-input" name="status" type="checkbox" value="1">
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
                                        <input type="text" name="fb" placeholder="Facebook Url" class="form-control" id="product_name" />
                                    </div>
                                     <div class="mb-4">
                                        <label for="product_name" class="form-label">Instagram</label>
                                        <input type="text" name="insta" placeholder="Instagram Url" class="form-control" id="product_name" />
                                    </div>
                                     <div class="mb-4">
                                        <label for="product_name" class="form-label">Youtube</label>
                                        <input type="text" name="youtube" placeholder="Youtube Url" class="form-control" id="product_name" />
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
                                    <input type="email" name="email" placeholder="Email" class="form-control" id="email" required />

                                    <label class="form-label">Password</label>
                                    <input type="text" name="password" placeholder="Password" class="form-control" id="password" required />
                                </div>
                            </div>
                        </div>
                       
              
                    </div>


                    
                </div>
                 </form>
            </section>
             

@endsection