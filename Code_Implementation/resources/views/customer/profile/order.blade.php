@extends('customer.master.index')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Order</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('customer.home')}}">Home</a>
                            <a href="{{route('customer.profile.orders')}}">My Order</a>
                            <span>Order</span>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th >Name</th>
                                    <th >Qty</th>
                                    <th >Price</th>
                                    <th >Color</th>
                                    <th >Size</th>
                                    <th >Fabric</th>
                                    <th >Customization</th>
                                    <th >Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($order->items as $k => $item)
                                <tr>
                                    <td>{{$item->fashionDesign?->title}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>

                                        {{ $item->price }} [{{ $item->price*$item->quantity }}] SAR
                                    </td>
                                    <td>
                                        <span style="width: 100px; height: 100px; background-color: {{$item->selected_color}}; border-radius: 50%; color: {{$item->selected_color}}">{{'color'}}</span>
                                    </td>
                                    <td>
                                        {{ $item->selected_size }}
                                    </td>
                                    <td>
                                        {{ $item->selected_fabric }}
                                    </td>
                                    <td>
                                        {{ $item->fashionDesign?->customize($item->order_item_id) }}
                                    </td>
                                    <td>
                                        @if($rev = $order->reviews()->where('product_id', $item->product_id)->first())
                                        @foreach(range(1,5) as $r)
                                        <i class="fa fa-star{{$rev->rating >= $r ? '' : '-o'}} text-warning"></i>
                                        @endforeach
                                        @else
                                        <a href="{{route('customer.profile.review', $order->id)}}?fashion={{$item->product_id}}" class="n-link">Review Now</a>
                                        @endif
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
                                <a href="{{route('customer.profile.orders')}}">Back To Orders</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-lg-4">

                    <div class="cart__total">
                        <h6>More Info</h6>

                        <ul>
                            <li>Total <span>{{ $order->total_amount }} SAR</span></li>
                            <li>Payment <span>{{ $order->payment?->payment_method ?? 'N/A' }}</span></li>
                            <li>Status <span>{{ $order->payment?->payment_status ?? 'N/A' }}</span></li>
                        </ul>
                        <button type="button" class="site-btn" data-toggle="modal" data-target="#invoiceModal">Print Invoice</button>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    <!-- Invoice Modal -->
    <div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceModalLabel">Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="invoice-content">
                    <!-- Invoice Content -->
                    <div class="invoice-box">
                        <table cellpadding="0" cellspacing="0">
                            <tr class="top">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td class="title">
                                                <img src="{{ asset('logo.png') }}" style="width:100%; max-width:150px;">
                                            </td>
                                            <td>
                                                Invoice #: {{ $order->id }}<br>
                                                Created: {{ $order->created_at->format('d M Y') }}<br>
                                                Due: {{ $order->created_at->addDays(7)->format('d M Y') }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="information">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td>
                                                Customer Name: {{ $order->customer->name }}<br>
                                                Email: {{ $order->customer->email }}<br>
                                                Phone: {{ $order->customer->phone }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="heading">
                                <td>Item</td>
                                <td>Price</td>
                            </tr>
                            @foreach($order->items as $item)
                                <tr class="item">
                                    <td>{{ $item->fashionDesign->title }}</td>
                                    <td>{{ $item->price * $item->quantity }} SAR</td>
                                </tr>
                            @endforeach
                            <tr class="total">
                                <td></td>
                                <td>Total: {{ $order->total_amount }} SAR</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="site-btn" onclick="printInvoice()">Print Invoice</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
    $('#btn-update-cart').on('click', function(e){
        e.preventDefault();
        $('#cart-form-update').submit();
    })
</script>

<script>
    function printInvoice() {
        var invoiceContent = document.getElementById('invoice-content').innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = invoiceContent;
        window.print();
        document.body.innerHTML = originalContent;
        location.reload(); // Reload the page to get back to normal view after print
    }
</script>

@endsection
