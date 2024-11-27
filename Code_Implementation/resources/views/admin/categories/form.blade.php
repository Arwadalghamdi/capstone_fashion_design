<div class="row">
   <div class="col-md-12">
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
   <div class="col-md-12 mt-2">
         <button type="submit" class="btn btn-success">
            Save <i class='bx bx-save'></i>
        </button>
   </div>
</div>