@extends('designer.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Fashion Design</h4>
   <div class="card">
      <h5 class="card-header">
         Fashion Design
         <a href="{{route('designer.fashions.create')}}" class="btn btn-success float-end">
            <i class="bx bx-plus"></i>
         </a>
      </h5>
       <div class="table-responsive text-nowrap" style="min-height: 500px">
          <table class="table tableData table-bordered">
              <thead>
              <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th class="text-center">Reviews</th>
                  <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @forelse($fashions as $index=>$designer)
                  <tr>
                      <td>
                          {{$index +1 }}
                      </td>
                      <td><img src="{{$designer->image_path}}" class="img-thumbnail" style="height: 100px;width: 100px;"></td>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$designer->title}}</strong></td>
                      <td>{{ optional($designer->category)->name }} </td>
                      <td>{{ $designer->price }} SAR</td>
                      <td>
                          @if(count($designer->reviews))
                              <a href="{{ route('designer.reviews.index') }}?id={{$designer->id}}" class="btn btn-primary">View Reviews ({{count($designer->reviews)}}) <i class="fa fa-star"></i></a>

                          @else
                              <a href="#" class="btn btn-primary">No Reviews</a>

                          @endif
                      </td>
                      <td>
                          <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{route('designer.fashions.edit', $designer->id)}}">
                                      <i class="bx bx-edit me-1"></i>Edit
                                  </a>
                                  <a class="dropdown-item" href="{{route('designer.fashions.show', $designer->id)}}">
                                      <i class="bx bx-show me-1"></i>Show
                                  </a>
                                  <a class="dropdown-item btn-del" data-action="{{route('designer.fashions.destroy', $designer->id)}}"  data-bs-toggle="modal" data-bs-target="#modalToggle" href="#">
                                      <i class="bx bx-trash me-1"></i> Delete
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
            {{ $fashions->links() }}
         </div>
      </div>
   </div>
</div>
@endsection
