@extends('customer.master.index')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4 class="text-uppercase font-weight-bold">{{$fashion->title}}</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('customer.home')}}">Home</a>
                            <a href="{{route('customer.fashions')}}">Fashion Designs</a>
                            <span>{{$fashion->title}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <!-- Fashion Image and Details -->
                <div class="col-lg-4">
                    <img src="{{ $fashion->image_path }}" alt="{{ $fashion->title }}" style="height: auto; max-width: 100%;">
                </div>

                <!-- Fashion Details -->
                <div class="col-lg-6">
                    @if(Session::has('success'))
                        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger text-center">{{ Session::get('fail') }}</div>
                    @endif

                    <div class="product-details__info">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th class="text-muted">Description</th>
                                <td class="font-weight-normal">{{$fashion->description}}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Category</th>
                                <td class="font-weight-normal">{{$fashion->category?->name}}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Designer</th>
                                <td class="font-weight-normal">{{$fashion->designer?->name}}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Price</th>
                                <td class="font-weight-normal">{{$fashion->price}} SAR</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Fabric</th>
                                <td class="font-weight-normal">{{$fashion->fabrics}}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Sizes</th>
                                <td class="font-weight-normal">
                                    @if($fashion->sizes)
                                        @foreach($fashion->sizes as $k => $size)
                                            {{ $k ? ' - ' : '' }}  {{ $size }}
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted">Colors</th>
                                <td class="font-weight-normal">
                                    @if($fashion->colors)
                                    @foreach($fashion->colors as $col)
                                    <span style="width: 100px; height: 100px; background-color: {{$col}}; border-radius: 50%; color: {{$col}}">{{'color'}}</span>
                                    @endforeach
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{route('customer.cart.store', ['id' => $fashion->id])}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add To Cart</a>
                    </div>

{{--                    <div class="row text-center mt-5">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <h5>Reviews</h5>--}}
{{--                        </div>--}}
{{--                        @foreach($fashion->reviews as $rev)--}}
{{--                        <div class="col-md-4 mb-5 mb-md-0">--}}
{{--                            <div class="d-flex justify-content-center mb-4">--}}
{{--                                <img src="{{ $rev->customer?->avatar }}" class="rounded-circle shadow-1-strong" width="150" height="150">--}}
{{--                            </div>--}}
{{--                        <h5 class="mb-3">{{$rev->customer?->name}}</h5>--}}
{{--                        <h6 class="text-primary mb-3">{{ $rev->created_at?->diffForHumans() }}</h6>--}}
{{--                        <p class="px-xl-3">--}}
{{--                            <i class="fa fa-quote-left pe-2"></i> {{ $rev->comment }}--}}
{{--                        </p>--}}
{{--                        <ul class="list-unstyled d-flex justify-content-center mb-0">--}}
{{--                        @foreach(range(1,5) as $r)--}}
{{--                            <li>--}}
{{--                            <i class="fa fa-star{{$rev->rating >= $r ? '' : '-o'}} text-warning"></i>--}}
{{--                            </li>--}}

{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                        </div>--}}
{{--                        @endforeach--}}
{{--       --}}
{{--      --}}
{{--                    </div>--}}
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h4 class="font-weight-bold mb-4">Reviews</h4>
                    @forelse($fashion->reviews as $review)
                        <div  class="review-box mb-3 borderReview">

                            <div class="review-header">
                                <i class="fa faReview fa-user-circle"></i>
                                <strong>{{ $review->customer->name }}</strong>
                                <span class="text-muted">rated</span>
                                <span>
                                    @foreach(range(1,5) as $r)
                                        <i class="fa fa-star{{$review->rating >= $r ? '' : '-o'}} text-warning"></i>
                                    @endforeach
                                </span>
                            </div>
                            <p class="review-comment">{{ $review->comment }}</p>
                        </div>
                    @empty
                        <p>No reviews yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Similar Fashion Designs Section -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h4 class="font-weight-bold mb-4">Similar Fashion Designs</h4>
                    <div class="row">
                        @foreach($similarFashions as $similar)
                            <div class="col-md-3">
                                <div class="product__item">
                                    <div class="product__item__pic">
                                        <img src="{{ $similar->image_path }}" alt="{{ $similar->title }}">
                                        <ul class="product__hover">
                                            <li><a href="{{ route('customer.fashion', $similar->id) }}"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>{{$similar->title}}</h6>
                                        <a href="{{route('customer.cart.store', ['id' => $similar->id])}}" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            @foreach(range(1,5) as $r)
                                                <i class="fa fa-star{{$similar->rate() >= $r ? '' : '-o'}} text-warning"></i>
                                            @endforeach
                                        </div>
                                        <h5>{{$similar->price}} SAR</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Product Details Section End -->

@endsection

@section('js')
    <script>
        $('#btn-update-cart').on('click', function(e){
            e.preventDefault();
            $('#cart-form-update').submit();
        })
    </script>
@endsection
