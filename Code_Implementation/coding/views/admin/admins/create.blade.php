@extends('admin.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Admins</h4>
   <div class="card">
      <h5 class="card-header">
         Admins
         <a href="{{route('admin.admins.index')}}" class="btn btn-danger float-end">
            <i class='bx bx-left-arrow-alt'></i>
         </a>
      </h5>
      <div class="card-body">
         <div class="col-md-12">
				{!!  Form::open(['route' => ['admin.admins.store'],  'method'=> 'post', 'files' => true, 'class' => '']) !!}
               @csrf
               @include('admin.admins.form')
				{!! Form::close() !!}
         
         </div>
      </div>
   </div>
</div>
@endsection