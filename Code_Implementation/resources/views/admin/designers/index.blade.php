@extends('admin.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Designers</h4>
   <div class="card">
      <h5 class="card-header">
         Designers
      </h5>
      <div class="table-responsive text-nowrap" style="min-height: 500px">
         <table class="table table-striped text-center">
            <thead>
               <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Image</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Phone</th>
                  <th class="text-center">Reviews</th>
                  <th class="text-center">Actions</th>
               </tr>
            </thead>
            <tbody>
               @forelse($designers as $index=>$designer)
               <tr>
                   <td>{{$index + 1}}</td>
                   <td>
                       <img src="{{$designer->avatar}}" class="img-thumbnail" style="    height: 70px;
    border-radius: 50%;
    width: 70px;">
                   </td>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$designer->name}}</strong></td>
                  <td>{{ $designer->email }}</td>
                  <td>
                     {{ $designer->phone }}
                  </td>
                   <td>
                      <a href="{{ route('admin.reviews.index') }}?id={{$designer->id}}" class="btn btn-primary">View Reviews <i class="fa fa-star"></i></a>
                   </td>
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="{{route('admin.designers.show', $designer->id)}}">
                              <i class="bx bx-show me-1"></i>Show
                           </a>
                           @if($designer->account_status == 'active')
                           <a class="dropdown-item" href="{{route('admin.designers.updateStatus', $designer->id)}}?status=suspended">
                              <i class="bx bx-block me-1"></i>Suspend this account
                           </a>
                           @else
                           <a class="dropdown-item" href="{{route('admin.designers.updateStatus', $designer->id)}}?status=active">
                              <i class="bx bx-check me-1"></i>Make this account Active
                           </a>
                           @endif
                            <a class="dropdown-item btn-del"
                               data-action="{{route('admin.designers.destroy', $designer->id)}}"
                               data-customer-name="{{ $designer->name }}"
                               data-bs-toggle="modal"
                               data-bs-target="#modalToggle"
                               href="#">
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
            {{ $designers->links() }}
         </div>
      </div>
   </div>
</div>
@endsection
