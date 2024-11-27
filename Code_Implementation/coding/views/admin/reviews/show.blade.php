@extends('admin.master.index')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Reviews</h4>

        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Review Details for {{ $review->customer?->name }}</h5>
                <a href="javascript:void(0);" onclick="history.back();" class="btn btn-danger">
                    <i class='bx bx-left-arrow-alt'></i> Back
                </a>
            </div>

            <div class="card-body">
                <!-- Designer Information -->
                <div class="mb-4 p-3 border rounded">
                    <h6 class="fw-bold text-primary">Designer</h6>
                    <p class="mb-0">{{ $review->designer?->name }}</p>
                </div>

                <!-- Fashion Design Information -->
                <div class="mb-4 p-3 border rounded">
                    <h6 class="fw-bold text-primary">Fashion Design</h6>
                    <p class="mb-0">{{ $review->fashionDesign?->title }}</p>
                </div>

                <!-- Rating Information -->
                <div class="mb-4 p-3 border rounded">
                    <h6 class="fw-bold text-primary">Rating</h6>
                    <div>
                        @foreach(range(1,5) as $r)
                            <i class='bx {{ $r <= $review->rating ? "bxs" : "bx" }}-star text-warning'></i>
                        @endforeach
                    </div>
                </div>

                <!-- Comment Section -->
                <div class="mb-4 p-3 border rounded">
                    <h6 class="fw-bold text-primary">Comment</h6>
                    <p class="mb-0">{{ $review->comment }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
