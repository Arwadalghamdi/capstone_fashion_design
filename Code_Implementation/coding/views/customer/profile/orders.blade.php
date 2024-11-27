@extends('customer.master.index')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>My Orders</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('customer.home')}}">Home</a>
                            <span>My Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
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
                        <table>
                            <thead>
                                <tr>
                                    <th >Order Number</th>
                                    <th >Order Date</th>
                                    <th >Order Status</th>
                                    <th >Total</th>
                                    <th ></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $k => $order)
                                <tr>
                                    <td>{{$order->order_id}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                    
                                        {{ $order->status }}
                                    </td>
                                    <td>
                                        {{ $order->total_amount }} SAR
                                    </td>

                                    <td>
                                        <a href="{{route('customer.profile.order', $order->order_id)}}" class="btn btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="5">
                                        <div class="alert alert-warning text-center">No Items</div>
                                    </th>
                                </tr>
                                @endforelse
                           
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{route('customer.fashions')}}">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    
                    <div class="cart__total">
                        <h6>total Order You Paid</h6>
                       
                        <ul>
                            <li>Total Paid <span>{{auth('customers')->user()->orders()->whereIn('status', ['pending', 'completed'])->sum('total_amount')}} SAR</span></li>
                            <li>Discount <span>{{auth('customers')->user()->orders()->whereIn('status', ['pending', 'completed'])->sum('discount_value')}} SAR</span></li>
                        </ul>
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