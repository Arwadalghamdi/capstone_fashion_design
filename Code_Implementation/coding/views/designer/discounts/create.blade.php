@extends('designer.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Discount Coupons</h4>
   <div class="card">
      <h5 class="card-header">
      Discount Coupons
         <a href="{{route('designer.discounts.index')}}" class="btn btn-danger float-end">
            <i class='bx bx-left-arrow-alt'></i>
         </a>
      </h5>
      <div class="card-body">
         <div class="col-md-12">
				{!!  Form::open(['route' => ['designer.discounts.store'],  'method'=> 'post', 'files' => true, 'class' => '']) !!}
               @include('designer.discounts.form')
				{!! Form::close() !!}
         
         </div>
      </div>
   </div>
</div>
@endsection