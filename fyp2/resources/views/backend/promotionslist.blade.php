
@extends('backend.layouts.app')
@section('content')

       <section class="content-main">
                <div class="content-header">
                    <h2 class="content-title">All Promotions list</h2>
                    <div>
                        <a href="{{ route('addpromotion') }}" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
                    </div>
                </div>
                <div class="card mb-4">
                  
                    <!-- card-header end// -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Banner</th>
                                         <th>URL</th>
                                        <th>Expire On</th>
                                        <th>Vendor</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($promotions as $promo)
                                    <tr>
                                        <td>
                                                    <img src="{{ asset('storage/' . $promo->image) }}" class="img-sm img-avatar" alt="Poster is missing" />
                                        </td>
                                         <td>{{ $promo->url }}</td>
                                        <td>{{ Carbon\Carbon::parse($promo->exp_date)->format('d M Y') }}</td>
                                        <td>{{ $promo->sellerid }}</td>
                                        <td>
                                            @if($promo->status == 0)
                                            <span class="badge rounded-pill alert-danger">Inactive</span>
                                            @else
                                            <span class="badge rounded-pill alert-success">Active</span>
                                            @endif
                                        </td>


                                       
                                        
                                        
                                        
                                      
                                        <td class="text-end">
                                            <a href="{{ route('editpromotion', ['id' => $promo->id]) }}" class="btn btn-sm btn-brand rounded font-sm mt-15">Edit</a>
                                         <form action="{{ route('destroypromotion', ['id' => $promo->id]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-light rounded font-sm mt-15" onclick="return confirm('Are you sure you want to delete this promotion?')">Delete</button>
                                            </form>
                                            
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