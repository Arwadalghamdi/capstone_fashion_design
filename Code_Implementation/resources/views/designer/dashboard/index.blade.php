@extends('designer.master.index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
                     <div class="row">
                        <div class="col-lg-8 mb-4 order-0">
                           <div class="card">
                              <div class="d-flex align-items-end row">
                                 <div class="col-sm-12">
                                    <div class="card-body">
                                       <h5 class="card-title text-primary">Welcome {{auth('designers')->user()->name}}</h5>
                                       <p class="mb-4">
                                          It's Control Area To see all numbers and control everything in the products and orders.
                                       </p>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4 col-md-4 order-1">
                           <div class="row">
                              <div class="col-lg-6 col-md-12 col-6 mb-4">
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="card-title d-flex align-items-start justify-content-between">
                                          <div class="avatar flex-shrink-0">
                                                <i class="bx bxs-user bx-lg"></i>
                                          </div>
                                       </div>
                                       <span class="fw-semibold d-block mb-1">Customers</span>
                                       <h3 class="card-title mb-2">{{ $stats['customers'] }}</h3>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-12 col-6 mb-4">
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="card-title d-flex align-items-start justify-content-between">
                                          <div class="avatar flex-shrink-0">
                                             <i class="bx bxs-star bx-lg"></i>
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
                                                <a class="dropdown-item" href="{{route('designer.reviews.index')}}">View More</a>
                                             </div>
                                          </div>
                                       </div>
                                       <span>Reviews</span>
                                       <h3 class="card-title text-nowrap mb-1">{{ $stats['reviews'] }}</h3>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Total Revenue -->
                        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                           <div class="card">
                              <div class="row row-bordered g-0">
                                 <div class="col-md-12">
                                    <div class="card-body">
                                    <div class="table-responsive text-nowrap">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Fashion Design</th>
                                            <th>Rating</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                        @foreach($reviews as $review)
                                        <tr>
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $review->customer?->name }}</strong></td>
                                            <td>
                                                {{$review->fashionDesign?->title}}
                                            </td>
                                            <td>
                                                @foreach(range(1,5) as $r)
                                                <i class='bx {{$r <= $review->rating ? "bxs" : "bx"}}-star text-warning' ></i>
                                                @endforeach
                                            </td>
                                            <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('designer.reviews.show', $review->id) }}">
                                                    <i class="bx bx-show me-1"></i> Show
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
                        <!--/ Total Revenue -->
                        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                           <div class="row">
                              <div class="col-6 mb-4">
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="card-title d-flex align-items-start justify-content-between">
                                          <div class="avatar flex-shrink-0">
                                             <i class="bx bx-user bx-lg"></i>

                                          </div>

                                       </div>
                                       <span class="d-block mb-1">Customization</span>
                                       <h3 class="card-title text-nowrap mb-2">{{ $stats['designer'] }}</h3>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-6 mb-4">
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="card-title d-flex align-items-start justify-content-between">
                                          <div class="avatar flex-shrink-0">
                                             <i class="bx bx-closet bx-lg"></i>

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
                                                <a class="dropdown-item" href="{{route('designer.fashions.index')}}">Read More</a>
                                             </div>
                                          </div>
                                       </div>
                                       <span class="fw-semibold d-block mb-1">Fashion Designs</span>
                                       <h3 class="card-title mb-2">{{ $stats['fashion'] }}</h3>
                                    </div>
                                 </div>
                              </div>
                              <!-- </div>
                                 <div class="row"> -->
                              <div class="col-12 mb-4">
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                          <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
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
