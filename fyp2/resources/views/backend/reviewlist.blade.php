
@extends('backend.layouts.app')
@section('content')

      <section class="content-main">
                <div class="content-header">
                    <div>
                        <h2 class="content-title card-title">Reviews</h2>
                        @if($getpendingreviews->count()>0)
                        <p>{{$getpendingreviews->count()}} reviews need your approval.</p>
                        @else
                        <p>No review is in approval pending.</p>
                        @endif
                    </div>
                   
                </div>
                <div class="card mb-4">
                  
                    <!-- card-header end// -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th>#ID</th>
                                        <th>Customer Name</th>
                                        <th>Product Details</th>
                                        <th>Feedback</th>
                                        <th>status</th>
                                        <th>Date</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               <!-- Include Axios from CDN -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Your Blade view -->
@foreach($getallreviews as $review)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td><b>{{ $review->username }}</b></td>
        <td>{{ $review->prodname }}</td>
        <td>{{ $review->feeback }}</td>
        <td>
            @if($review->status == 0)
                <span class="badge rounded-pill alert-danger">Inactive</span>
            @else
                <span class="badge rounded-pill alert-success">Active</span>
            @endif
        </td>
        <td>{{ Carbon\Carbon::parse($review->created_at)->format('F j, Y \a\t g:i a') }}</td>
        <td class="text-end">
          <a href="#" class="btn btn-md rounded font-sm" onclick="approveReview({{ $review->id }})">Approve</a>

            <a href="#" class="btn btn-md rounded font-sm" onclick="deleteReview({{ $review->id }})">Delete</a>
        </td>
    </tr>
@endforeach

<!-- Inline JavaScript for deleteReview function -->
<!-- Inline JavaScript for deleteReview function -->
<script>
    function deleteReview(reviewId) {
        if (confirm("Are you sure you want to delete this review?")) {
            axios.delete('/reviews/' + reviewId)
                .then(response => {
                    // Handle success
                    console.log(response.data);  // Log the response data
                    alert('Review deleted successfully');  // Display an alert message
                    window.location.reload();
                    // You can also consider removing the row from the table here
                })
                .catch(error => {
                    // Handle error
                    console.error('There was an error deleting the review!', error);
                });
        }
    }
</script>
<!-- Inline JavaScript for approveReview function -->
<!-- Inline JavaScript for approveReview function -->
<script>
    function approveReview(reviewId) {
        if (confirm("Are you sure you want to approve this review?")) {
            axios.post('/reviews/approve/' + reviewId) // Use a POST request for approval
                .then(response => {
                    // Handle success
                    console.log(response.data);
                    alert('Review approved successfully');
                    window.location.reload();
                    // You can update the UI or perform any additional actions here
                })
                .catch(error => {
                    // Handle error
                    console.error('There was an error approving the review!', error);
                });
        }
    }
</script>




                                    
                                  
                                </tbody>
                            </table>
                        </div>
                        <!-- table-responsive//end -->
                    </div>
                    <!-- card-body end// -->
                </div>
               
            </section>
         

@endsection