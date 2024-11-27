@extends('customer.master.index')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Fashions Designs</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('customer.home')}}">Home</a>
                            <span>Fashions Designs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">

                        <!-- Search Box -->
                        <div class="shop__sidebar__search mb-4">
                            <form id="formSearch" action="{{route('customer.fashions')}}">
                                <input type="hidden" name="p" value="{{request()->p}}">
                                <input type="hidden" name="c" value="{{request()->c}}">
                                <input type="text" name="w" value="{{request()->w}}" class="form-control" placeholder="Search...">
                            </form>
                            <button form="formSearch" type="submit" class="btn btn-primary mt-2 w-100"><span class="icon_search"></span> Search</button>

                        </div>

                        <!-- Filters Accordion -->
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">

                                <!-- Categories Filter -->
                                <div class="card mb-3 borderFiltert">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne" class="font-weight-bold">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                @foreach($cats as $cat)
                                                    <li class="list-group-item">
                                                        <a href="{{route('customer.fashions', ['c' => $cat->id, 'p' => request()->p, 'w' => request()->w, 'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric])}}">
                                                            {{ $cat->name }} ({{$cat->fashions->count()}})
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Filter by Color -->
                                <div class="card mb-3 borderFiltert">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseColor" class="font-weight-bold">Filter by Color</a>
                                    </div>
                                    <div id="collapseColor" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <form action="{{route('customer.fashions')}}">
                                                <input type="hidden" name="p" value="{{request()->p}}">
                                                <input type="hidden" name="c" value="{{request()->c}}">
                                                <input type="hidden" name="w" value="{{request()->w}}">
                                                <input type="hidden" name="size" value="{{request()->size}}">
                                                <input type="hidden" name="fabric" value="{{request()->fabric}}">
                                                <input type="color" name="color" value="{{request()->color}}" class="form-control" title="Choose a color">
                                                <button type="submit" class="btn btn-primary mt-2 w-100">Filter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Filter by Size -->
                                <div class="card mb-3 borderFiltert">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSize" class="font-weight-bold">Filter by Size</a>
                                    </div>
                                    @php
                                    $sizes = \App\Models\FashionDesign::all()->pluck('sizes')->flatten()->unique();
                                    $sizes = $sizes->toArray();
                                    @endphp
                                    <div id="collapseSize" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                @foreach($sizes as $size)
                                                @if($size)
                                                <li class="list-group-item">
                                                    <a href="{{ route('customer.fashions', ['size' => $size, 'p' => request()->p, 'c' => request()->c, 'w' => request()->w, 'color' => request()->color,'fabric' => request()->fabric]) }}">{{ $size }}</a>
                                                </li>
                                                @endif
                                                @endforeach
                                              
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Filter by Fabric Type -->
                                <div class="card mb-3 borderFiltert">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFabric" class="font-weight-bold">Filter by Fabric</a>
                                    </div>
                                    <div id="collapseFabric" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                @foreach(trans('customer.fabrics') as $fb)
                                                <li class="list-group-item">
                                                    <a href="{{ route('customer.fashions', ['fabric' => $fb, 'p' => request()->p, 'c' => request()->c, 'w' => request()->w, 'size' => request()->size]) }}">{{$fb}}</a>
                                                </li>
                                                @endforeach
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Filter by Price -->
                                <div class="card mb-3 borderFiltert">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapsePrice" class="font-weight-bold">Filter by Price</a>
                                    </div>
                                    <div id="collapsePrice" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <a href="{{route('customer.fashions', ['p' => '0-50', 'c' => request()->c, 'w' => request()->w, 'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric])}}">0.00 SAR - 50.00 SAR</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{route('customer.fashions', ['p' => '50-100', 'c' => request()->c, 'w' => request()->w, 'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric])}}">50.00 SAR - 100.00 SAR</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{route('customer.fashions', ['p' => '100-150', 'c' => request()->c, 'w' => request()->w,  'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric])}}">100.00 SAR - 150.00 SAR</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{route('customer.fashions', ['p' => '150-250', 'c' => request()->c, 'w' => request()->w,  'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric])}}">150.00 SAR - 200.00 SAR</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{route('customer.fashions', ['p' => '200-250', 'c' => request()->c, 'w' => request()->w, 'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric])}}">200.00 SAR - 250.00 SAR</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{route('customer.fashions', ['p' => '250', 'c' => request()->c, 'w' => request()->w,  'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric])}}">+250.00 SAR</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Filter by Rating -->
                                <div class="card mb-3 borderFiltert">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseRating" class="font-weight-bold">Filter by Rating</a>
                                    </div>
                                    <div id="collapseRating" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <a href="{{ route('customer.fashions', ['rating' => 5, 'p' => request()->p, 'c' => request()->c, 'w' => request()->w,'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric]) }}">5 Stars</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('customer.fashions', ['rating' => 4, 'p' => request()->p, 'c' => request()->c, 'w' => request()->w, 'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric]) }}">4 Stars & Up</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('customer.fashions', ['rating' => 3, 'p' => request()->p, 'c' => request()->c, 'w' => request()->w, 'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric]) }}">3 Stars & Up</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('customer.fashions', ['rating' => 2, 'p' => request()->p, 'c' => request()->c, 'w' => request()->w, 'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric]) }}">2 Stars & Up</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('customer.fashions', ['rating' => 1, 'p' => request()->p, 'c' => request()->c, 'w' => request()->w, 'size' => request()->size, 'color' => request()->color,'fabric' => request()->fabric]) }}">1 Star & Up</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fashion Products Section -->
                <div class="col-lg-9">
                    @if(request()->anyFilled('p', 'c', 'w'))
                        <a href="{{route('customer.fashions')}}"  class="btn btn-primary mt-2 w-100 text-white"><span class="icon_search"></span> Reset Search</a>

                    @endif


                    <!-- Fashion Product Items -->
                    <div class="row">
                        @forelse($fashions as $fashion)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic">
                                        <img src="{{ $fashion->image_path }}" alt="{{ $fashion->title }}">
                                        <ul class="product__hover">
                                            <li><a href="{{ route('customer.fashion', $fashion->id) }}"><i class="fa fa-eye"></i></a></li>
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
                            <div class="col-md-12">
                                <div class="alert alert-warning text-center">No Data Found!</div>
                            </div>
                        @endforelse
                    </div>
                        <div class="shop__product__option">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__product__option__left">
                                        @if ($fashions->total() > 0)
                                            <p>
                                                Showing {{ $fashions->firstItem() }} to {{ $fashions->lastItem() }} of {{ $fashions->total() }} results
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                {{ $fashions->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

@endsection
