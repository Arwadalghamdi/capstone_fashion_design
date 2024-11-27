@extends('admin.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Customers</h4>
   <div class="card">
      <h5 class="card-header">
         Customers
      </h5>
      <div class="table-responsive text-nowrap" style="min-height: 500px">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               @forelse($customers as $index=>$customer)
               <tr>
                   <td>{{$index + 1}}</td>
                   <td>
                       <img src="{{$customer->avatar}}" class="img-thumbnail" style="    height: 70px;
    border-radius: 50%;
    width: 70px;">
                   </td>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$customer->name}}</strong></td>
                  <td>
                     {{ $customer->email }}
                  </td>
                  <td>
                     {{ $customer->phone }}
                  </td>
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="{{route('admin.customers.show', $customer->id)}}">
                              <i class="bx bx-show me-1"></i>Show
                           </a>

                            <a class="dropdown-item btn-del"
                               data-action="{{route('admin.customers.destroy', $customer->id)}}"
                               data-customer-name="{{ $customer->name }}"
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
            {{ $customers->links() }}
         </div>
      </div>
   </div>
</div>
@endsection
