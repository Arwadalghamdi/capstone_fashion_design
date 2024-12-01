@extends('designer.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Reviews</h4>
   <div class="card">
      <h5 class="card-header">
      Reviews || {{ $review->customer?->name }}
         <a href="{{route('designer.reviews.index')}}" class="btn btn-danger float-end">
            <i class='bx bx-left-arrow-alt'></i>
         </a>
      </h5>
      <div class="card-body">
         <div class="col-md-12">
         <table class="table table-striped">
            <tbody>
               <tr>
                  <th>Fashion Design</th>
                  <td>{{$review->fashionDesign?->title}}</td>
               </tr>
               <tr>
                  <th>Rating</th>
                  <td>
                     @foreach(range(1,5) as $r)
                     <i class='bx {{$r <= $review->rating ? "bxs" : "bx"}}-star text-warning' ></i>
                     @endforeach
                  </td>
               </tr>
               <tr>
                  <th>Comment</th>
                  <td>{{$review->comment}}</td>
               </tr>
            </thead>
         </table>
         
         </div>
      </div>
   </div>
</div>
@endsection