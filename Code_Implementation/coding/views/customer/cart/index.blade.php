@php $noNiceSelect = true; @endphp
@extends('customer.master.index')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('customer.home')}}">Home</a>
                            <a href="{{route('customer.fashions')}}">Fashion Designs</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart mb-5 spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @if(Session::has('success'))
                        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger text-center">{{ Session::get('fail') }}</div>
                    @endif
                    @if(request()->coupon && !$coupon)
                        <div class="alert alert-danger text-center">The discount coupon is not valid.</div>
                    @endif
                    <form action="{{route('customer.cart.update')}}" id="cart-form-update" method="post">
                        @csrf
                    <div class="shopping__cart__table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 20%;">Fashion Design</th>
                                    <th style="width: 10%;">Quantity</th>
                                    <th style="width: 10%;">Color</th>
                                    <th style="width: 10%;">Size</th>
                                    <th style="width: 10%;">Fabric</th>
                                    <th style="width: 25%;">Customization</th>
                                    <th style="width: 10%;">Total</th>
                                    <th style="width: 5%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contents as $k => $cart)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img class="img-thumbnail" src="{{ $cart->options->image }}" style="width: 120px; height: 120px;" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$cart->name}}</h6>
                                            <h5>{{$cart->price}} SAR</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text" value="{{$cart->qty}}" name="cart[{{$k}}][qty]">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="quantity">
                                        <select class="form-control" name="cart[{{$k}}][color]">
                                            @if($cart->options->colors)
                                        @foreach($cart->options->colors as $col)
                                        <option value="{{ $col }}" style="background-color: {{ $col }}; color: white;" {{ $col == $cart->options->color ? 'selected' : '' }}>Option {{$col}}</option>
                                        @endforeach
                                        @endif
                                        </select>
                                    </td>
                                    <td class="quantity">
                                        <select class="form-control" name="cart[{{$k}}][size]">
                                            @if($cart->options->sizes)
                                        @foreach($cart->options->sizes as $si)
                                        <option value="{{ $si }}"  {{ $si == $cart->options->size ? 'selected' : '' }}>{{$si}}</option>
                                        @endforeach
                                        @endif
                                        </select>
                                    </td>
                                    <td class="quantity">
                                        <select class="form-control" name="cart[{{$k}}][fabric]">
                                    
                                        @foreach(trans('customer.fabrics') as $fb)
                                        <option value="{{ $fb }}"  {{ $fb == $cart->options->fabric ? 'selected' : '' }}>{{$fb}}</option>
                                        @endforeach
                                        </select>
                                    </td>
                                    <td class="quantity">

                                       <textarea cols="30"  rows="3" class="form-control" placeholder="Write any customization you want." name="cart[{{$k}}][custom]">{{$cart->options->custom}}</textarea>
                                    </td>
                                    <td class="cart__price">{{ $cart->price * $cart->qty }} SAR</td>
                                    <td class="cart__close">
                                        <a href="{{route('customer.cart.destroy', ['id' => $k])}}">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="9">
                                        <div class="alert alert-warning text-center">No Item Added</div>
                                    </th>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a class="btn-primary" href="{{route('customer.fashions')}}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a class="btn-primary" href="#" id="btn-update-cart"> Update cart</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-lg-3">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="{{route('customer.cart.index')}}">
                            <input type="text" placeholder="Coupon code" value="{{request()->coupon}}" name="coupon">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        @php $dis = 0; @endphp
                        @if($coupon)
                        @php $dis = getDiscountValue($coupon->discount_percentage, Cart::subtotal()); @endphp
                        @endif
                        <ul>
                            <li>Subtotal <span>{{Cart::subtotal()}} SAR</span></li>
                            <li>Discount <span>{{ $dis }} SAR</span></li>
                            <li>Total <span>{{Cart::subtotal() - $dis}} SAR</span></li>
                        </ul>
                        <a href="{{route('customer.checkout.index', ['coupon' => request()->coupon])}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection

@section('js')
<script>
    $('#btn-update-cart').on('click', function(e){
        e.preventDefault();
        $('#cart-form-update').submit();
    })
</script>
@endsection
