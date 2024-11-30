@extends('customer.master.index')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Designers</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('customer.home')}}">Home</a>
                            <span>Designers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="blog spad">
        <div class="container">
            <div class="row">
                @forelse($designers as $fashion)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{ $fashion->avatar }}"></div>
                        <div class="blog__item__text">
                            <span><img src="{{url('customer/img/icon/calendar.png')}}" alt=""></span>
                            <h5>{{$fashion->name}}</h5>
                            <a href="{{route('customer.designer', $fashion->id)}}">Read More</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="alert alert-warning text-center">No Data Found!</div>
                </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__pagination">
                        {{ $designers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
