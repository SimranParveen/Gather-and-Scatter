
@extends('backend.layouts.app')
@section('content')

      
            <section class="content-main">
             <form action="{{ url('/admin/update-promotion') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{$promoid->id}}"/>
                <div class="row">
                    <div class="col-9">
                        <div class="content-header">
                            <h2 class="content-title">Edit Promotion</h2>
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
                                      <label class="form-label">Seller</label>
                                               <select name="sellerid" class="form-select">
                                                    @foreach($allsellers as $seller)
                                                        <option value="{{ $seller->name }}" {{ $promoid->sellerid == $seller->name ? 'selected' : '' }}>
                                                            {{ $seller->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">URL</label>
                                        <textarea placeholder="Type here" name="url" class="form-control" rows="4">{{$promoid->url}}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label class="form-label">Charges</label>
                                                <div class="row gx-2">
                                                    <input placeholder="Rs" value="{{$promoid->charges}}" name="charges" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label class="form-label">Exp. Date</label>
                                                <input name="exp_on" type="date" class="form-control" value="{{ date('Y-m-d', strtotime($promoid->exp_on)) }}" />
                                            </div>
                                        </div>
                                       
                                    </div>




                              <label class="form-check mb-4">
                                    <input class="form-check-input" name="status" type="checkbox" {{ $promoid->status == 1 ? 'checked' : '' }}>
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
                                     <img src="{{ asset('storage/' . $promoid->image) }}" alt="{{ $promoid->sellerid }}" class="img-preview">
                                    <input name="image" class="form-control" type="file" />
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                  </form>
            </section>

@endsection