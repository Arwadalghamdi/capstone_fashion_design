@extends('designer.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Orders</h4>
   <div class="card">
      <h5 class="card-header">
        Orders
      </h5>
      <div class="table-responsive text-nowrap" style="min-height: 500px">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>Customer</th>
                  <th>Total Amount</th>
                  <th>Status</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               @forelse($orders as $order)
               <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$order->customer?->name}}</strong></td>
                  <td>
                     {{ $order->total_amount }} SAR
                  </td>
                  <td>
                     @if($order->status == 'pending')
                     <span class="badge bg-warning">Pending</span>
                     @elseif($order->status == 'canceled')
                     <span class="badge bg-danger">Canceled</span>
                     @else
                     <span class="badge bg-success">Completed</span>
                     @endif
                  </td>
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="{{route('designer.orders.show', $order->id)}}">
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
            {{ $orders->links() }}
         </div>
      </div>
   </div>
</div>
@endsection