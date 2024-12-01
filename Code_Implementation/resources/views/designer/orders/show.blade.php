@extends('designer.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Orders</h4>
   <div class="card">
      <h5 class="card-header">
      Orders || {{ $order->customer?->name }}
         <a href="{{route('designer.orders.index')}}" class="btn btn-danger float-end">
            <i class='bx bx-left-arrow-alt'></i>
         </a>
      </h5>
      <div class="card-body">
         <div class="col-md-12">
         <table class="table table-striped">
            <tbody>
            <tr>
                <th>Order Number</th>
                <td>{{$order->order_id}}</td>
            </tr>
               <tr>
                  <th>Total Amount</th>
                  <td>{{$order->total_amount}} SAR</td>
               </tr>
               <tr>
                  <th>Customer Address</th>
                  <td>{{$order->invoice?->billing_address}}</td>
               </tr>
               <tr>
                  <th>Status</th>
                  <td>
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
               </tr>
               <tr>
                  <th>Order Date & Time</th>
                  <td>{{$order->created_at}}</td>
               </tr>
            </tbody>
         </table>
         <table class="table table-striped mt-5">
            <tbody>
               <tr>
                  <th colspan="8" class="text-center">Order Items</th>
               </tr>
               <tr>
                  <th>Fashion Design</th>
                  <th>Qty</th>
                  <th>Color</th>
                  <th>Size</th>
                  <th>Fabric</th>
                  <th>Price</th>

                  <th>Customization</th>
               </tr>
               @foreach($order->items as $item)
               <tr>
                  <th>{{ $item->fashionDesign?->title }}</th>
                  <td>{{$item->quantity}}</td>
                  <td>
                     <span style="width: 100px; height: 100px; background-color: {{$item->selected_color}}; border-radius: 50%; color: {{$item->selected_color}}">{{'color'}}</span>
                  </td>
                  <td>
                     {{ $item->selected_size }}
                  </td>
                  <td>
                     {{ $item->selected_fabric }}
                  </td>
                  <td>{{$item->price}} SAR</td>
                  <th>{{ $item->fashionDesign?->customize($item->order_item_id) }}</th>
               </tr>
               @endforeach
            </tbody>
         </table>
         </div>
      </div>
   </div>
</div>
@endsection
