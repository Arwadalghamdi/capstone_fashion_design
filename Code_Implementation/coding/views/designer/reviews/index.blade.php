@extends('designer.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Reviews</h4>
   <div class="card">
      <h5 class="card-header">
        Reviews
      </h5>
      <div class="table-responsive text-nowrap" style="min-height: 500px">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Customer</th>
                  <th>Fashion Design</th>
                  <th>Rating</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               @forelse($reviews as $index=>$review)
               <tr>
                   <td>
                       {{$index + 1}}
                   </td>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$review->customer?->name}}</strong></td>
                  <td>
                     {{ $review->fashionDesign?->title }}
                  </td>
                  <td>
                     @foreach(range(1,5) as $r)
                     <i class='bx {{$r <= $review->rating ? "bxs" : "bx"}}-star text-warning' ></i>
                     @endforeach
                  </td>
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="{{route('designer.reviews.show', $review->id)}}">
                              <i class="bx bx-show me-1"></i>Show
                           </a>
                        </div>
                     </div>
                  </td>
               </tr>
               @empty
               <tr>
                  <th colspan="4" class="text-center">No Data Found.</th>
               </tr>
               @endforelse
            </tbody>
         </table>
         <div class="text-center">
            {{ $reviews->links() }}
         </div>
      </div>
   </div>
</div>
@endsection
