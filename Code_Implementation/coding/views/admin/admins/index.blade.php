@extends('admin.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Admins</h4>
   <div class="card">
      <h5 class="card-header">
         Admins
         <a href="{{route('admin.admins.create')}}" class="btn btn-success float-end">
            <i class="bx bx-plus"></i>
         </a>
      </h5>
      <div class="table-responsive text-nowrap" style="min-height: 500px">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody class="">
               @forelse($admins as $index=>$admin)
               <tr>
                   <td>
                       {{$index + 1}}
                   </td>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$admin->name}}</strong></td>
                  <td>
                     {{ $admin->email }}
                  </td>
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="{{route('admin.admins.edit', $admin->id)}}">
                              <i class="bx bx-edit-alt me-1"></i>Edit
                           </a>
                           @if(!in_array($admin->id, [1]))
                                <a class="dropdown-item btn-del"
                                   data-action="{{route('admin.admins.destroy', $admin->id)}}"
                                   data-customer-name="{{ $admin->name }}"
                                   data-bs-toggle="modal"
                                   data-bs-target="#modalToggle"
                                   href="#">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </a>

                            @endif
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
            {{ $admins->links() }}
         </div>
      </div>
   </div>
</div>
@endsection
