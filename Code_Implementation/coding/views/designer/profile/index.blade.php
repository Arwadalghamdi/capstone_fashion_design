@extends('designer.master.index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Profile</h4>

              <div class="row">
                <div class="col-md-12">
                 
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
				{!! Form::model($user,['route' => ['designer.profile.post', $user->id], 'method' => 'put','files' => true, 'class' => '']) !!}

                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="{{$user->avatar}}"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4 {{ $errors->has('profile_picture') ? 'has-feedback has-error has-danger' : '' }}" tabindex="0">
                            <span class="d-none d-sm-block {{$errors->has('profile_picture') ? ' is-invalid' : ''}}">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              name="profile_picture"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                            @if($errors->has('profile_picture'))
                            <div class="form-control-feedback"> {{ $errors->first('profile_picture') }}</div>
                            @endif

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG.</p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-md-6 {{ $errors->has('name') ? 'has-feedback has-error has-danger' : '' }}">
                            <label for="name" class="form-label">Name</label>
                            
                            {!! Form::text('name',  null,
                            ['id' => 'name',
                            'placeholder' => 'Name',
                            'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                            ]
                            );
                            !!}
                            @if($errors->has('name'))
                            <div class="form-control-feedback"> {{ $errors->first('name') }}</div>
                            @endif
                            
                          </div>
                          <div class="mb-3 col-md-6 {{ $errors->has('email') ? 'has-feedback has-error has-danger' : '' }}">
                            <label for="email" class="form-label">E-mail</label>
                            {!! Form::email('email',  null,
                            ['id' => 'email',
                            'placeholder' => 'Email',
                            'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
                            ]
                            );
                            !!}
                            @if($errors->has('email'))
                            <div class="form-control-feedback"> {{ $errors->first('email') }}</div>
                            @endif
                          </div>
                          <div class="mb-3 col-md-6 {{ $errors->has('phone') ? 'has-feedback has-error has-danger' : '' }}">
                            <label for="phone" class="form-label">Phone</label>
                            {!! Form::text('phone',  null,
                            ['id' => 'phone',
                            'placeholder' => 'Phone',
                            'class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''),
                            ]
                            );
                            !!}
                            @if($errors->has('phone'))
                            <div class="form-control-feedback"> {{ $errors->first('phone') }}</div>
                            @endif
                          </div>
                          <div class="mb-3 col-md-6 {{ $errors->has('address') ? 'has-feedback has-error has-danger' : '' }}">
                            <label for="address" class="form-label">Address</label>
                            {!! Form::text('address',  null,
                            ['id' => 'address',
                            'placeholder' => 'Address',
                            'class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''),
                            ]
                            );
                            !!}
                            @if($errors->has('address'))
                            <div class="form-control-feedback"> {{ $errors->first('address') }}</div>
                            @endif
                          </div>
                          <div class="mb-3 col-md-12 {{ $errors->has('bio') ? 'has-feedback has-error has-danger' : '' }}">
                            <label for="bio" class="form-label">Bio</label>
                            {!! Form::textarea('bio',  null,
                            ['id' => 'bio',
                            'placeholder' => 'Bio',
                            'class' => 'form-control' . ($errors->has('bio') ? ' is-invalid' : ''),
                            ]
                            );
                            !!}
                            @if($errors->has('bio'))
                            <div class="form-control-feedback"> {{ $errors->first('bio') }}</div>
                            @endif
                          </div>
                         
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                    </div>
				    {!! Form::close() !!}

                  </div>
                </div>
              </div>
            </div>
@endsection