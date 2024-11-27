<div class="row">
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('code') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="name" class="form-label">Code</label>
         {!! Form::text('code',  null,
         ['id' => 'code',
         'placeholder' => 'Code',
         'class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('code'))
         <div class="form-control-feedback"> {{ $errors->first('code') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('discount_percentage') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="discount_percentage" class="form-label">Discount Percentage</label>
         {!! Form::text('discount_percentage',  null,
         ['id' => 'discount_percentage',
         'placeholder' => 'Discount Percentage',
         'class' => 'form-control' . ($errors->has('discount_percentage') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('discount_percentage'))
         <div class="form-control-feedback"> {{ $errors->first('discount_percentage') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-12">
      <div class="mb-3 {{ $errors->has('description') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="description" class="form-label">Description</label>
         {!! Form::textarea('description',  null,
         ['id' => 'description',
         'placeholder' => 'Description',
         'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('description'))
         <div class="form-control-feedback"> {{ $errors->first('description') }}</div>
         @endif
      </div>
   </div>

   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('valid_from') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="valid_from" class="form-label">Valid From</label>
         {!! Form::date('valid_from',  null,
         ['id' => 'valid_from',
         'placeholder' => 'Valid From',
         'class' => 'form-control' . ($errors->has('valid_from') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('valid_from'))
         <div class="form-control-feedback"> {{ $errors->first('valid_from') }}</div>
         @endif
      </div>
   </div>

   
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('valid_to') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="valid_to" class="form-label">Valid To</label>
         {!! Form::date('valid_to',  null,
         ['id' => 'valid_to',
         'placeholder' => 'Valid To',
         'class' => 'form-control' . ($errors->has('valid_to') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('valid_to'))
         <div class="form-control-feedback"> {{ $errors->first('valid_to') }}</div>
         @endif
      </div>
   </div>
   
   <div class="col-md-12 mt-2">
         <button type="submit" class="btn btn-success">
            Save <i class='bx bx-save'></i>
        </button>
   </div>
</div>