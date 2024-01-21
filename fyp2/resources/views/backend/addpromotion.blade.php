
@extends('backend.layouts.app')
@section('content')

      
            <section class="content-main">
             <form action="{{ url('/admin/store-promotion') }}" method="post" enctype="multipart/form-data">
                                @csrf
                <div class="row">
                    <div class="col-9">
                        <div class="content-header">
                            <h2 class="content-title">Add New Promotion</h2>
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
                                      <label class="form-label">Seller</label>
                                                <select name="sellerid" class="form-select">
                                                    @foreach($allsellers as $seller)
                                                        <option value="{{$seller->name}}">{{$seller->name}}</option>
                                                    @endforeach 
                                                    
                                                </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">URL</label>
                                        <textarea placeholder="Type here" name="url" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label class="form-label">Charges</label>
                                                <div class="row gx-2">
                                                    <input placeholder="Rs" name="charges" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label class="form-label">Exp. Date</label>
                                                <input name="exp_on" type="date" class="form-control" />
                                            </div>
                                        </div>
                                       
                                    </div>




                                  <input type="hidden" name="status" value="0">
                                <label class="form-check mb-4">
                                    <input class="form-check-input" name="status" type="checkbox" value="1">
                                    <span class="form-check-label"> Publish </span>
                                </label>
                              
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-3">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Banner Image</h4>
                            </div>
                            <div class="card-body">
                                <div class="input-upload">
                                   
                                    <input name="image" class="form-control" type="file" required />
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                  </form>
            </section>

@endsection