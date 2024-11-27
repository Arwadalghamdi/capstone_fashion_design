@extends('customer.master.index')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Checkout</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('customer.home')}}">Home</a>
                            <a href="{{route('customer.fashions')}}">Fashion Designs</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Payment Image Section Begin -->
    <section class="payment-image">
        <div class="container text-center">
            <img src="{{ asset('customer/img/payment.png') }}" alt="Payment Methods" class="img-fluid">
        </div>
    </section>
    <!-- Payment Image Section End -->

    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{route('customer.checkout.order')}}" method="post" id="checkout-form">
                    @csrf
                    <input type="hidden" name="coupon" value="{{request()->coupon}}">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            @if(request()->coupon && !$coupon)
                                <div class="alert alert-danger text-center">The discount coupon is not valid.</div>
                            @endif
                            @if(isset($coupon) && $coupon)
                                <h6 class="coupon__code"><span class="icon_tag_alt"></span>You Got discount from "{{$coupon->code}}" Applied for this order</h6>
                            @endif
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Name<span>*</span></p>
                                        <input type="text" id="card_name" name="card_name" value="{{old('card_name')}}" required>
                                        <div id="card_name_error" class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Card Number<span>*</span></p>
                                        <input type="text" id="card_number" name="card_number" maxlength="16" required>
                                        <div id="card_number_error" class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Card Expire Date<span>*</span></p>
                                        <input type="text" id="card_date" name="card_date" placeholder="MM/YY" required>
                                        <div id="card_date_error" class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Card CVV<span>*</span></p>
                                        <input type="text" id="card_cvv" name="card_cvv" maxlength="3" required>
                                        <div id="card_cvv_error" class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Address<span>*</span></p>
                                        <input type="text" name="address" value="{{old('address') ?? auth('customers')->user()->address}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Fashion Designs <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach($contents as $k => $cart)
                                        <li>{{ $cart->name }} <span>{{ $cart->price * $cart->qty }} SAR</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    @php $dis = 0; @endphp
                                    @if($coupon)
                                        @php $dis = getDiscountValue($coupon->discount_percentage, Cart::subtotal()); @endphp
                                    @endif
                                    <li>Subtotal <span>{{ Cart::subtotal() }} SAR</span></li>
                                    <li>Discount <span>{{ $dis }} SAR</span></li>
                                    <li>Total <span>{{Cart::subtotal() - $dis}} SAR</span></li>
                                </ul>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        // Function to validate the credit card number using Luhn's Algorithm
        function isValidCardNumber(number) {
            let nCheck = 0, bEven = false;
            number = number.replace(/\D/g, "");

            for (let n = number.length - 1; n >= 0; n--) {
                let nDigit = parseInt(number.charAt(n), 10);
                if (bEven) {
                    if ((nDigit *= 2) > 9) nDigit -= 9;
                }
                nCheck += nDigit;
                bEven = !bEven;
            }
            return (nCheck % 10) == 0;
        }

        // Validate the card expiration date
        function isValidExpiryDate(date) {
            let today = new Date();
            let [month, year] = date.split('/').map(Number);
            if (month < 1 || month > 12) return false;
            let expiry = new Date('20' + year, month); // Assumes year is in YY format
            return expiry > today;
        }

        // Validate the CVV (usually 3 digits)
        function isValidCVV(cvv) {
            return /^[0-9]{3}$/.test(cvv);
        }

        // Real-time validation for card fields
        document.getElementById('checkout-form').addEventListener('input', function (e) {
            let cardName = document.getElementById('card_name').value;
            let cardNumber = document.getElementById('card_number').value;
            let cardDate = document.getElementById('card_date').value;
            let cardCVV = document.getElementById('card_cvv').value;

            // Validate Card Name
            if (cardName.trim() === "") {
                document.getElementById('card_name_error').innerText = "Card name is required.";
            } else {
                document.getElementById('card_name_error').innerText = "";
            }

            // Validate Card Number
            if (cardNumber.length === 16 && !isValidCardNumber(cardNumber)) {
                document.getElementById('card_number_error').innerText = "Invalid card number.";
            } else if (cardNumber.length < 16) {
                document.getElementById('card_number_error').innerText = "Card number must be 16 digits.";
            } else {
                document.getElementById('card_number_error').innerText = "";
            }

            // Validate Expiry Date
            if (cardDate && !isValidExpiryDate(cardDate)) {
                document.getElementById('card_date_error').innerText = "Invalid expiration date (use MM/YY).";
            } else {
                document.getElementById('card_date_error').innerText = "";
            }

            // Validate CVV
            if (!isValidCVV(cardCVV)) {
                document.getElementById('card_cvv_error').innerText = "Invalid CVV (3 digits required).";
            } else {
                document.getElementById('card_cvv_error').innerText = "";
            }
        });

        // Ensure card number and CVV inputs only accept numbers
        document.getElementById('card_number').addEventListener('input', function (e) {
            this.value = this.value.replace(/\D/g, ''); // Allow only digits
        });

        document.getElementById('card_cvv').addEventListener('input', function (e) {
            this.value = this.value.replace(/\D/g, ''); // Allow only digits
        });
    </script>
@endsection
