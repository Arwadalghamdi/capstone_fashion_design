@extends('designer.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Discount Coupons</h4>
   <div class="card">
      <h5 class="card-header">
         Discount Coupons
         <a href="{{route('designer.discounts.create')}}" class="btn btn-success float-end">
            <i class="bx bx-plus"></i>
         </a>
      </h5>
      <div class="table-responsive text-nowrap" style="min-height: 500px">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>Code</th>
                  <th>Discount Percentage</th>
                  <th>Validation Period</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               @forelse($discounts as $discount)
               <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$discount->code}}</strong></td>
                  <td>
                     {{ $discount->discount_percentage }}%
                  </td>
                  <td>
                     {{ $discount->valid_from }} - {{ $discount->valid_to }}
                  </td>
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                           
                           <a class="dropdown-item" href="{{route('designer.discounts.edit', $discount->id)}}">
                              <i class="bx bx-edit-alt me-1"></i>Edit
                           </a>
                           <a class="dropdown-item btn-del" data-action="{{route('designer.discounts.destroy', $discount->id)}}"  data-bs-toggle="modal" data-bs-target="#modalToggle" href="#">
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
            {{ $discounts->links() }}
         </div>
      </div>
   </div>
</div>
@endsection