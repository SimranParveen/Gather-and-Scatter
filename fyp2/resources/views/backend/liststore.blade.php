
@extends('backend.layouts.app')
@section('content')

       <section class="content-main">
                <div class="content-header">
                    <h2 class="content-title">Store list</h2>
                    <div>
                        <a href="{{ route('addstore') }}" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
                    </div>
                </div>
                <div class="card mb-4">
                  
                    <!-- card-header end// -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Timing</th>
                                        <th>Status</th>
                                        
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($allstores as $store)
                                    <tr>
                                         <td>{{ $store->name }}</td>
                                        
                                        <td>
                                    
                                        @if($store->type == 0)
                                        <span class="badge rounded-pill alert-success">Pharmacy</span>
                                        @else
                                        <span class="badge rounded-pill alert-warning">Apparel</span>
                                        @endif
                                        </td>




                                        <td>{{ $store->phone }}</td>
                                         <td>{{ $store->address }}</td>
                                         <td>{{ $store->timing }}</td>


                                        <td>
                                        @if($store->status == 0)
                                        <span class="badge rounded-pill alert-danger">Inactive</span>
                                        @else
                                        <span class="badge rounded-pill alert-success">Active</span>
                                        @endif
                                        </td>
                                        
                                        
                                        
                                      
                                        <td class="text-end">
                                            <a href="{{ route('editstore', ['id' => $store->id]) }}" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
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