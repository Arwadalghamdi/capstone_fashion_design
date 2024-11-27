@extends('customer.master.index')

@section('content')

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="contact__form">
                        <form action="{{route('customer.login.post')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-2 text-center">
                                    <h3>Login</h3>
                                </div>
                                <div class="col-lg-12 {{ $errors->has('email') ? 'has-feedback has-error has-danger' : '' }}">
                                    <input type="email" name="email" value="{{old('email')}}" placeholder="Email" class="{{$errors->has('email') ? ' is-invalid' : ''}}">
                                    @if($errors->has('email'))
                                    <div class="form-control-feedback"> {{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-12 {{ $errors->has('password') ? 'has-feedback has-error has-danger' : '' }}">
                                    <input type="password" placeholder="Password" name="password" class="{{$errors->has('password') ? ' is-invalid' : ''}}">
                                    @if($errors->has('password'))
                                    <div class="form-control-feedback"> {{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="site-btn btn-block">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection