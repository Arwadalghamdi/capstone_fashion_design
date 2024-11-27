@extends('admin.master.index')

@section('content')

<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
              <div class="card-body loginBG">
                  <img class="imgageLogin" src="{{asset('logo.png')}}">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="#" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bolder">Register</span>
                </a>
              </div>
              <!-- /Logo -->
              <p class="mb-4 text-center">Create an account now as a designer.</p>

              <form id="formAuthentication" class="mb-3" action="{{route('designer.register.post')}}" method="POST">
                @csrf
                <div class="mb-3 {{ $errors->has('name') ? 'has-feedback has-error has-danger' : '' }}">
                  <label for="name" class="form-label">Name</label>
                  <input
                    type="text"
                    class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}"
                    id="name"
                    name="name"
                    placeholder="Enter your name"
                    value="{{old('name')}}"
                    autofocus
                  />
                  @if($errors->has('name'))
                  <div class="form-control-feedback"> {{ $errors->first('name') }}</div>
                  @endif
                </div>
                <div class="mb-3 {{ $errors->has('email') ? 'has-feedback has-error has-danger' : '' }}">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control {{$errors->has('email') ? ' is-invalid' : ''}}" value="{{old('email')}}" id="email" name="email" placeholder="Enter your email" />
                  @if($errors->has('email'))
                  <div class="form-control-feedback"> {{ $errors->first('email') }}</div>
                  @endif
                </div>
                <div class="mb-3 {{ $errors->has('phone') ? 'has-feedback has-error has-danger' : '' }}">
                  <label for="name" class="form-label">Phone</label>
                  <input
                    type="text"
                    class="form-control {{$errors->has('phone') ? ' is-invalid' : ''}}"
                    id="phone"
                    name="phone"
                    placeholder="Enter your phone"
                    value="{{old('phone')}}"
                  />
                  @if($errors->has('phone'))
                  <div class="form-control-feedback"> {{ $errors->first('phone') }}</div>
                  @endif
                </div>
                <div class="mb-3 {{ $errors->has('address') ? 'has-feedback has-error has-danger' : '' }}">
                  <label for="address" class="form-label">Address</label>
                  <input
                    type="text"
                    class="form-control {{$errors->has('address') ? ' is-invalid' : ''}}"
                    id="address"
                    name="address"
                    placeholder="Enter your address"
                    value="{{old('address')}}"
                  />
                  @if($errors->has('address'))
                  <div class="form-control-feedback"> {{ $errors->first('address') }}</div>
                  @endif
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password Confirmation</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password_confirmation"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ route('designer.login') }}">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>
@endsection

@section('css')
<link rel="stylesheet" href="{{url('admin/assets/vendor/css/pages/page-auth.css')}}" />
@endsection
