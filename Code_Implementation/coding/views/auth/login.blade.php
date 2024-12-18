@extends('admin.master.index')

@section('content')

<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">

            <div class="card-body loginBG">
                <img class="imgageLogin" src="{{asset('logo.png')}}">
              <h4 class="mb-2 text-center">Login</h4>
              <p class="mb-4 text-center">Welcome to admin dashboard</p>

              <form id="formAuthentication" class="mb-3" action="{{route('admin.login.post')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Email"
                    value="{{old('email')}}"
                    autofocus
                  />
                  @if($errors->has('email'))
                    <div class="alert alert-danger"> {{ $errors->first('email') }}</div>
                  @endif
                </div>
                <div class="mb-3 form-password-toggle">
                  <!-- <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forget Password?</small>
                    </a>
                  </div> -->
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
                <!-- <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" name="remember_me" value="1" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div> -->
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
@endsection

@section('css')
<link rel="stylesheet" href="{{url('admin/assets/vendor/css/pages/page-auth.css')}}" />
@endsection
