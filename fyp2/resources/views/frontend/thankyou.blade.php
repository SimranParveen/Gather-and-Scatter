@extends('frontend.layouts.headermain')
@section('content')

 

        
        <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
    <div>
        <div class="row">
            <div class="col-lg-12 mb-40">
                <h3 class="heading-2 mb-10">Order placed successfully</h3>
                <div class="d-flex justify-content-center flex-column"> <!-- Center the text and button vertically and horizontally -->
                    <h5 class="text-body text-center">Your OTP number is: <span class="text-brand">{{$otp}}</span></h5>
                    <a href="{{ url('/') }}" class="btn">Back to home</a>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection