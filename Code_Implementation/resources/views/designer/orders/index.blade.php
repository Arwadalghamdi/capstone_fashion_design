@extends('designer.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Orders</h4>
   <div class="card">
      <h5 class="card-header">
        Orders
      </h5>
      <div class="table-responsive text-nowrap" style="min-height: 500px">
         <table class="table tableData table-striped text-center">
            <thead class="text-center">
               <tr>
                  <th class="text-center">Order Number</th>
                  <th class="text-center">Customer</th>
                  <th class="text-center">Total Amount</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Actions</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               @forelse($orders as $order)
               <tr>
                  <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$order->order_id}}</strong></td>
                  <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$order->customer?->name}}</strong></td>
                  <td class="text-center">
                     {{ $order->total_amount }} SAR
                  </td>
                  <td class="text-center">
                      @switch($order->status)
                          @case('pending')
                              <span class="badge bg-warning">Pending</span>
                              @break
                          @case('accepted')
                              <span class="badge bg-primary">Accepted</span>
                              @break
                          @case('rejected')
                              <span class="badge bg-secondary">Rejected</span>
                              @break
                          @case('completed')
                              <span class="badge bg-success">Completed</span>
                              @break
                          @default
                              <span class="badge bg-dark">Unknown</span>
                      @endswitch

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
                               <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#statusModal"
                                  data-id="{{ $order->id }}" data-status="{{ $order->status }}">
                                   <i class="bx bx-edit-alt me-1"></i>Change Status
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

<!-- Status Change Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="statusForm" method="POST" action="{{ route('designer.orders.update.status') }}">
            @csrf
            @method('PATCH')
            <input type="hidden" name="order_id" id="order-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Change Order Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="order-status" class="form-label">Select Status</label>
                    <select class="form-select" id="order-status" name="status">
                        <option value="pending">Pending</option>
                        <option value="accepted">Accepted</option>
                        <option value="rejected">Rejected</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const statusModal = document.getElementById('statusModal');
            statusModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const orderId = button.getAttribute('data-id');
                const orderStatus = button.getAttribute('data-status');

                const modalOrderId = statusModal.querySelector('#order-id');
                const modalOrderStatus = statusModal.querySelector('#order-status');

                modalOrderId.value = orderId;
                modalOrderStatus.value = orderStatus;
            });
        });
    </script>
@endsection
