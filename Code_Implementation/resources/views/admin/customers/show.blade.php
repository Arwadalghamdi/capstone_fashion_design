@extends('admin.master.index')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Customers</h4>

        <div class="card shadow-sm">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Customer Details || {{ $customer->name }}</h5>
                <a href="{{ route('admin.customers.index') }}" class="btn btn-danger">
                    <i class='bx bx-left-arrow-alt'></i> Back
                </a>
            </div>

            <div class="card-body">
                <!-- Basic Information -->
                <div class="mb-4 p-4 border rounded bg-light">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ $customer->avatar }}" class="rounded-circle img-thumbnail me-3" style="width: 70px; height: 70px; object-fit: cover;" alt="Profile Image">
                        <h5 class="fw-bold text-primary mb-0">{{ $customer->name }}</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Email:</strong> {{ $customer->email }}</p>
                            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
                            <p><strong>Address:</strong> {{ $customer->address }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Total Orders:</strong> {{ $customer->orders->count() }}</p>
                            <p><strong>Total Reviews:</strong> {{ $customer->reviews->count() }}</p>
                            <p><strong>Total Customizations:</strong> {{ $customer->customizations->count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Orders Section -->
                <h6 class="fw-bold text-primary mt-4 mb-3">Orders</h6>
                <div class="row">
                    @forelse($customer->orders as $order)
                        <div class="col-md-4 mb-3">
                            <div class="card shadow-sm h-100">
                                <div class="card-body">
                                    <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                                    <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                                    <p><strong>Status:</strong>
                                        <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </p>
                                    <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">No orders available for this customer.</p>
                    @endforelse
                </div>

                <!-- Reviews Section -->
                <h6 class="fw-bold text-primary mt-4 mb-3">Reviews</h6>
                <div class="row">
                    @forelse($customer->reviews as $review)
                        <div class="col-md-4 mb-3">
                            <div class="card shadow-sm h-100">
                                <div class="card-body">
                                    <p><strong>Review ID:</strong> #{{ $review->id }}</p>
                                    <p><strong>Fashion Design:</strong> {{ $review->fashionDesign?->title }}</p>
                                    <p><strong>Rating:</strong>
                                        @foreach(range(1,5) as $r)
                                            <i class='bx {{ $r <= $review->rating ? "bxs" : "bx" }}-star text-warning'></i>
                                        @endforeach
                                    </p>
                                    <p><strong>Comment:</strong> {{ $review->comment }}</p>
                                    <p><strong>Date:</strong> {{ $review->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">No reviews available for this customer.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
