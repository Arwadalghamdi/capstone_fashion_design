<div class="row">
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('title') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="name" class="form-label">Title</label>
         {!! Form::text('title',  null,
         ['id' => 'title',
         'placeholder' => 'Title',
         'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('title'))
         <div class="form-control-feedback"> {{ $errors->first('title') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('price') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="price" class="form-label">Price</label>
         {!! Form::text('price',  null,
         ['id' => 'price',
         'placeholder' => 'Price',
         'class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('price'))
         <div class="form-control-feedback"> {{ $errors->first('price') }}</div>
         @endif
      </div>
   </div>
   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('stock') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="price" class="form-label">stock</label>
         {!! Form::number('stock',  null,
         ['id' => 'stock',
         'placeholder' => 'stock',
         'class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('stock'))
         <div class="form-control-feedback"> {{ $errors->first('stock') }}</div>
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
      <div class="mb-3 {{ $errors->has('availability_status') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="availability_status" class="form-label">Availability Status</label>
         {!! Form::select('availability_status',  ['available' => 'Available', 'unavailable' => 'Unavailable'], null,
         ['id' => 'availability_status',
         'placeholder' => 'Availability Status',
         'class' => 'form-control' . ($errors->has('availability_status') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('availability_status'))
         <div class="form-control-feedback"> {{ $errors->first('availability_status') }}</div>
         @endif
      </div>
   </div>

   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('category_id') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="category_id" class="form-label">Category</label>
         {!! Form::select('category_id',  $cats, null,
         ['id' => 'category_id',
         'placeholder' => 'Category',
         'class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('category_id'))
         <div class="form-control-feedback"> {{ $errors->first('category_id') }}</div>
         @endif
      </div>
   </div>

   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('image') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="image" class="form-label">Image</label>
         <input type="file" name="image" id="image" class="form-control">
         @if(isset($fashion))
         <img src="{{$fashion->image_path}}" style="width: 100%; height: 270px;" alt="">
         @endif
         @if($errors->has('image'))
         <div class="form-control-feedback"> {{ $errors->first('image') }}</div>
         @endif
      </div>
   </div>


   <div class="col-md-6">
      <div class="mb-3 {{ $errors->has('fabrics') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="fabrics" class="form-label">Fabric</label>
         {!! Form::select('fabrics',  trans('customer.fabrics'), null,
         ['id' => 'fabrics',
         'placeholder' => 'Fabric',
         'class' => 'form-control' . ($errors->has('fabrics') ? ' is-invalid' : ''),
         ]
         );
         !!}
         @if($errors->has('fabrics'))
         <div class="form-control-feedback"> {{ $errors->first('fabrics') }}</div>
         @endif
      </div>
   </div>

   <div class="col-md-12">
      <div class="mb-3 {{ $errors->has('sizes') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="sizes" class="form-label">sizes</label> | <label for=""><a href="#" id="add-size-req"><i class="fa fa-plus"></i> Add</a></label>
            <table class="table table-bordered">
               <thead>
               <tr>
                     <th>Size</th>
                     <th>Actions</th>
               </tr>
               </thead>
               <tbody id="size-area">
               @if(old('sizes'))
                  @foreach(old('sizes') as $k => $size)
                     <tr id="req{{$k}}">
                     <td>
                        <input type="text" class="form-control" name="sizes[]" value="{{$size}}" >
                     </td>
                     <td>
                        @if($k != 0)
                        <button type="button" onClick="removeSizeReqRecord({{$k}})" class="btn btn-danger">Delete</button>
                        @endif
                     </td>
                  </tr>
                     @endforeach
               @elseif(isset($fashion))
                  @if(!empty($fashion->sizes))
                     @foreach($fashion->sizes as $k => $size)
                     <tr id="req{{$k}}">
                     <td>
                        <input type="text" class="form-control" name="sizes[]" value="{{$size}}" >
                     </td>
                     <td>
                        @if($k != 0)
                        <button type="button" onClick="removeSizeReqRecord({{$k}})" class="btn btn-danger">Delete</button>
                        @endif
                     </td>
                  </tr>
                     @endforeach
                  @endif
               @else
               <tr>
                  <td>
                     <input type="text" class="form-control" name="sizes[]" value="" >
                  </td>
                  <td>

                  </td>
               </tr>
               @endif
               </tbody>
            </table>

         @if($errors->has('sizes'))
         <div class="form-control-feedback"> {{ $errors->first('sizes') }}</div>
         @endif
      </div>
   </div>

   <div class="col-md-12">
      <div class="mb-3 {{ $errors->has('colors') ? 'has-feedback has-error has-danger' : '' }}">
         <label for="colors" class="form-label">Colors</label> | <label for=""><a href="#" id="add-color-req"><i class="fa fa-plus"></i> Add</a></label>
            <table class="table table-bordered">
               <thead>
               <tr>
                     <th>Color</th>
                     <th>Actions</th>
               </tr>
               </thead>
               <tbody id="color-area">
               @if(old('colors'))
                  @foreach(old('colors') as $k => $fb)
                     <tr id="req-color{{$k}}">
                     <td>
                        <input type="color" class="form-control" name="colors[]" value="{{$fb}}" >
                     </td>
                     <td>
                        @if($k != 0)
                        <button type="button" onClick="removeColorReqRecord({{$k}})" class="btn btn-danger">Delete</button>
                        @endif
                     </td>
                  </tr>
                     @endforeach
               @elseif(isset($fashion))
                  @if(!empty($fashion->colors))
                     @foreach($fashion->colors as $k => $fa)
                     <tr id="req-color{{$k}}">
                     <td>
                        <input type="color" class="form-control" name="colors[]" value="{{$fa}}" >
                     </td>
                     <td>
                        @if($k != 0)
                        <button type="button" onClick="removeColorReqRecord({{$k}})" class="btn btn-danger">Delete</button>
                        @endif
                     </td>
                  </tr>
                     @endforeach
                  @endif
               @else
               <tr>
                  <td>
                     <input type="color" class="form-control" name="colors[]" value="" >
                  </td>
                  <td>

                  </td>
               </tr>
               @endif
               </tbody>
            </table>

         @if($errors->has('colors'))
         <div class="form-control-feedback"> {{ $errors->first('colors') }}</div>
         @endif
      </div>
   </div>

   <div class="col-md-12 mt-2">
         <button type="submit" class="btn btn-success">
            Save <i class='bx bx-save'></i>
        </button>
   </div>
</div>
