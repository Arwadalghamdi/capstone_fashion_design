@extends('customer.master.index')

@section('content')

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="contact__form">
                        <form action="{{route('customer.profile.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            @if(Session::has('success'))
                                <div class="col-md-12 alert alert-success text-center">{{ Session::get('success') }}</div>
                            @endif
                            @if(Session::has('fail'))
                                <div class="col-md-12 alert alert-danger text-center">{{ Session::get('fail') }}</div>
                            @endif
                                <div class="col-md-12 mb-2 text-center">
                                    <h3>Update Profile Data</h3>
                                </div>
                                <div class="col-lg-12 {{ $errors->has('name') ? 'has-feedback has-error has-danger' : '' }}">
                                    <input type="text" name="name" value="{{old('name') ?? $user->name}}" class="{{$errors->has('name') ? ' is-invalid' : ''}}" placeholder="Name">
                                    @if($errors->has('name'))
                                    <div class="form-control-feedback"> {{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-12 {{ $errors->has('email') ? 'has-feedback has-error has-danger' : '' }}">
                                    <input type="email" name="email" value="{{old('email') ?? $user->email}}" placeholder="Email" class="{{$errors->has('email') ? ' is-invalid' : ''}}">
                                    @if($errors->has('email'))
                                    <div class="form-control-feedback"> {{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-12 {{ $errors->has('phone') ? 'has-feedback has-error has-danger' : '' }}">
                                    <input type="text" name="phone" value="{{old('phone') ?? $user->phone}}" placeholder="Phone" class="{{$errors->has('phone') ? ' is-invalid' : ''}}">
                                    @if($errors->has('phone'))
                                    <div class="form-control-feedback"> {{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-12 {{ $errors->has('address') ? 'has-feedback has-error has-danger' : '' }}">
                                    <input type="text" name="address" value="{{old('address') ?? $user->address}}" placeholder="Address" class="{{$errors->has('address') ? ' is-invalid' : ''}}">
                                </div>
                                <div class="col-lg-12 {{ $errors->has('password') ? 'has-feedback has-error has-danger' : '' }}">
                                    <input type="password" placeholder="Password" name="password" class="{{$errors->has('password') ? ' is-invalid' : ''}}">
                                    @if($errors->has('password'))
                                    <div class="form-control-feedback"> {{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-12 {{ $errors->has('profile_picture') ? 'has-feedback has-error has-danger' : '' }}">
                                    <input type="file" name="profile_picture" placeholder="Profile Image" class="{{$errors->has('profile_picture') ? ' is-invalid' : ''}}">
                                    <img src="{{$user->avatar}}" style="width: 100%; height:300px;" alt="">
                                    @if($errors->has('profile_picture'))
                                    <div class="form-control-feedback"> {{ $errors->first('profile_picture') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="site-btn btn-block">Update Data</button>
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