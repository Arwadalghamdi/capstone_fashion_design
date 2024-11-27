<div class="row">
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('name') ? 'has-feedback has-error has-danger' : '' }}">
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
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('email') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="email" class="form-label">Email</label>
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
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('role') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="role" class="form-label">Role</label>
         {!! Form::select('role',  ['superadmin' => 'Super Admin', 'moderator' => 'Moderator'], null,
         ['id' => 'role',
         'placeholder' => 'Role',
         'class' => 'form-control' . ($errors->has('role') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('role'))
         <div class="form-control-feedback"> {{ $errors->first('role') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('password') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="password" class="form-label">Password</label>
         {!! Form::password('password',
         ['id' => 'password',
         'placeholder' => 'Password',
         'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('password'))
         <div class="form-control-feedback"> {{ $errors->first('password') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-12 mt-2">
         <button type="submit" class="btn btn-success">
            Save <i class='bx bx-save'></i>
        </button>
   </div>
</div>