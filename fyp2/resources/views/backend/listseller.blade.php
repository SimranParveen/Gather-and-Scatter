
@extends('backend.layouts.app')
@section('content')

       <section class="content-main">
                <div class="content-header">
                    <h2 class="content-title">Sellers list</h2>
                    <div>
                        <a href="{{ route('addseller') }}" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
                    </div>
                </div>
                <div class="card mb-4">
                  
                    <!-- card-header end// -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Seller</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Registered</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($allsellers as $seller)
                                    <tr>
                                        <td width="40%">
                                            <a href="#" class="itemside">
                                                <div class="left">
                                                    <img src="{{ asset('storage/' . $seller->logo) }}" class="img-sm img-avatar" alt="{{ $seller->name }}" />
                                                </div>
                                                <div class="info pl-3">
                                                    <h6 class="mb-0 title">{{ $seller->name }}</h6>
                                                    <small class="text-muted">{{ $seller->phone }}</small>
                                                </div>
                                            </a>
                                        </td>
                                        <td>{{ $seller->area }}</td>
                                        <td>
                                        @if($seller->status == 0)
                                        <span class="badge rounded-pill alert-danger">Closed</span>
                                        @else
                                        <span class="badge rounded-pill alert-success">Open</span>
                                        @endif
                                        </td>
                                        
                                        
                                        
                                        <td>{{ Carbon\Carbon::parse($seller->created_at)->format('d M Y') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('editseller', ['id' => $seller->id]) }}" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
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