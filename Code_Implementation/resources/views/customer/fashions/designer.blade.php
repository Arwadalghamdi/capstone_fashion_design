@extends('customer.master.index')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>{{ $designer->name }}</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('customer.home') }}">Home</a>
                            <a href="{{ route('customer.designers') }}">Designers</a>
                            <span>{{ $designer->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Designer Profile Section Begin -->
    <section class="designer-profile spad">
        <div class="container">
            <div class="row">
                <!-- Designer Bio Section -->
                <div class="col-lg-3">
                    <div class="designer-bio text-center p-4" style="background-color: #a5a583; border-radius: 8px;">
                        <img src="{{ $designer->avatar }}" class="rounded-circle mb-3" style="height: 100px; width: 100px;" alt="Designer Profile">
                        <h4 class="text-white">Bio</h4>
                        <p class="text-white">{{ $designer->bio }}</p>
                    </div>
                </div>

                <!-- Designer Details Section -->
                <div class="col-lg-9">
                    @if(Session::has('success'))
                        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger text-center">{{ Session::get('fail') }}</div>
                    @endif

                    <!-- Designer Stats Card -->
                    <div class="designer-details card shadow-sm p-4 mb-4">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <h6 class="fw-bold">Rating</h6>
                                <div>
                                    @foreach(range(1,5) as $r)
                                        <i class="fa fa-star{{ $designer->rate() >= $r ? '' : '-o' }} text-warning"></i>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <h6 class="fw-bold">Fashion Designs</h6>
                                <p>{{ $designer->fashionDesigns->count() }}</p>
                            </div>
                            <div class="col-md-4 text-center">
{{--                                <h6 class="fw-bold">Last Update</h6>--}}
{{--                                <p>{{ $designer->created_at->diffForHumans() }}</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fashion Designs Section -->
            <div class="row mt-4">
                <div class="col-md-12 mb-2">
                    <h5 class="fw-bold">Fashion Designs</h5>
                </div>

                @forelse($designer->fashionDesigns()->where('availability_status', 'available')->get() as $fashion)
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" >
                                <img src="{{ $fashion->image_path }}" alt="{{ $fashion->title }}">

                                <ul class="product__hover">
                                    <li><a href="{{ route('customer.fashion', $fashion->id) }}"><i class="fa eye fa-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{$fashion->title}}</h6>
                                <a href="{{route('customer.cart.store', ['id' => $fashion->id])}}" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    @foreach(range(1,5) as $r)
                                        <i class="fa fa-star{{$fashion->rate() >= $r ? '' : '-o'}} text-warning"></i>
                                    @endforeach
                                </div>
                                <h5>{{$fashion->price}} SAR</h5>

                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No fashion designs available for this designer.</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Designer Profile Section End -->
@endsection

@section('js')
    <script>
        $('#btn-update-cart').on('click', function(e){
            e.preventDefault();
            $('#cart-form-update').submit();
        });
    </script>
@endsection
