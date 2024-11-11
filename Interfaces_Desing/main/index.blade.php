@extends('customer.master.index')
@push('css')
    <style>
        .hero__items {
            height: 443px;
            padding-top: 56px;
        }
    </style>
@endpush
@section('content')

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
{{--            <div class="hero__items set-bg" data-setbg="{{url('cover2.jpg')}}">--}}
            <div class="hero__items set-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Winter Collections 2030</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                    commitment to exceptional quality.</p>
                                <a href="{{route('customer.fashions')}}" class="primary-btn">Shop now <span
                                        class="arrow_right"></span></a>
                                <div class="hero__social">
                                    {{--                                    <a href="#"><i class="fa fa-facebook"></i></a>--}}
                                    {{--                                    <a href="#"><i class="fa fa-twitter"></i></a>--}}
                                    {{--                                    <a href="#"><i class="fa fa-pinterest"></i></a>--}}
                                    {{--                                    <a href="#"><i class="fa fa-instagram"></i></a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
{{--                        <li class="active" data-filter="*">All</li>--}}
{{--                        <li data-filter=".best">Best Sellers</li>--}}
{{--                        <li data-filter=".new-arrivals">New Arrivals</li>--}}
                        <li class="active" data-filter="*">New Arrivals</li>
                        <li data-filter=".best">Best Sellers</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @foreach($newFashions as $nf)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ $nf->image_path }}">
                                <span class="label">New</span>
                                <ul class="product__hover">
                                    <li><a href="{{ route('customer.fashion', $nf->id) }}"><i class="fa fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $nf->title }}</h6>
                                <a href="{{route('customer.cart.store', ['id' => $nf->id])}}" class="add-cart">+ Add To
                                    Cart</a>
                                <div class="rating">
                                    @foreach(range(1,5) as $r)
                                        <i class="fa fa-star{{$nf->rate() >= $r ? '' : '-o'}} text-warning"></i>
                                    @endforeach
                                </div>
                                <h5>{{ $nf->price }} SAR</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach($bestSales as $bs)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset($bs->image) }}">
                                <span class="label">Best</span>
                                <ul class="product__hover">
                                    <li><a href="{{ route('customer.fashion', $bs->fashion_design_id) }}"><i
                                                class="fa eye fa-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $bs->title }}</h6>
                                <a href="{{route('customer.cart.store', ['id' => $bs->fashion_design_id])}}"
                                   class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    @foreach(range(1,5) as $r)
                                        <i class="fa fa-star{{$bs->rate() >= $r ? '' : '-o'}} text-warning"></i>
                                    @endforeach
                                </div>
                                <h5>{{ $bs->price }} SAR</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@endsection
