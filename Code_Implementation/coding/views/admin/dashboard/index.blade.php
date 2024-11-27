@extends('admin.master.index')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mt-5 col-md-12 order-1">
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">

                                        <i class="bx bxs-user bx-lg dd6"></i>
                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt3"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="{{route('admin.customers.index')}}">Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Customers</span>
                                <h3 class="card-title mb-2">{{ $stats['customers'] }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                    <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="bx bxs-star bx-lg dd6"></i>
                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt6"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="{{route('admin.reviews.index')}}">View
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Reviews</span>
                                <h3 class="card-title text-nowrap mb-1">{{ $stats['reviews'] }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="bx bx-user bx-lg dd6"></i>

                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt4"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                            <a class="dropdown-item" href="{{route('admin.designers.index')}}">Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Designers</span>
                                <h3 class="card-title text-nowrap mb-2">{{ $stats['designer'] }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="bx bx-closet bx-lg dd6"></i>

                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt1"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                            <a class="dropdown-item" href="{{route('admin.fashions.index')}}">Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Fashion Designs</span>
                                <h3 class="card-title mb-2">{{ $stats['fashion'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h6 class="text-dark">Latest Feedbacks</h6>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Designer</th>
                                            <th>Fashion Design</th>
                                            <th>Rating</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                        @foreach($reviews as $review)
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                    <strong>{{ $review->customer?->name }}</strong></td>
                                                <td>{{ $review->designer?->name }}</td>
                                                <td>
                                                    {{$review->fashionDesign?->title}}
                                                </td>
                                                <td>
                                                    @foreach(range(1,5) as $r)
                                                        <i class='bx {{$r <= $review->rating ? "bxs" : "bx"}}-star text-warning'></i>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                               href="{{ route('admin.reviews.show', $review->id) }}">
                                                                <i class="bx bx-show me-1"></i> Show
                                                            </a>
                                                            <a class="dropdown-item btn-del"
                                                               data-action="{{ route('admin.reviews.destroy', $review->id) }}"
                                                               data-bs-toggle="modal" data-bs-target="#modalToggle"
                                                               href="#">
                                                                <i class="bx bx-trash me-1"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Monthly Orders and Reviews</h5>
                        <canvas id="barChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer and Designer Distribution</h5>
                        <canvas id="pieChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-2 order-3 order-md-2">
                <div class="row">

                    <!-- </div>
                       <div class="row"> -->
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                    <div
                                        class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-2">Total Orders</h5>
                                        </div>
                                        <div class="mt-sm-auto">
                                            {{ $stats['orders'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Monthly Orders and Reviews Data
        const months = {!! json_encode(array_keys($ordersPerMonth)) !!};
        const ordersData = {!! json_encode(array_values($ordersPerMonth)) !!};
        const reviewsData = {!! json_encode(array_values($reviewsPerMonth)) !!};

        // Bar Chart for Monthly Orders and Reviews
        const barCtx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'Orders',
                        data: ordersData,
                        backgroundColor: 'rgb(165,165,131)',
                    },
                    {
                        label: 'Reviews',
                        data: reviewsData,
                        backgroundColor: 'rgb(155,155,67)',
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Customer and Designer Distribution Data
        const pieData = {
            labels: ['Customers', 'Designers'],
            datasets: [{
                data: [{{ $stats['customers'] }}, {{ $stats['designer'] }}],
                backgroundColor: ['#a5a583', '#9b9b43']
            }]
        };

        // Pie Chart for Customer and Designer Distribution
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: pieData,
            options: {
                responsive: true
            }
        });
    </script>
@endpush
