@extends('admin.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Categories</h4>
   <div class="card">
      <h5 class="card-header">
         Categories
         <a href="{{route('admin.categories.index')}}" class="btn btn-danger float-end">
            <i class='bx bx-left-arrow-alt'></i>
         </a>
      </h5>
      <div class="card-body">
         <div class="col-md-12">
				{!! Form::model($category,['route' => ['admin.categories.update', $category->id], 'method' => 'put','files' => true, 'class' => '']) !!}
               @csrf
               @include('admin.categories.form')
				{!! Form::close() !!}
         
         </div>
      </div>
   </div>
</div>
@endsection