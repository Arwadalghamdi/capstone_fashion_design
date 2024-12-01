@extends('designer.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Fashion Design</h4>
   <div class="card">
      <h5 class="card-header">
      Fashion Design || {{ $fashion->title }}
         <a href="{{route('designer.fashions.index')}}" class="btn btn-danger float-end">
            <i class='bx bx-left-arrow-alt'></i>
         </a>
      </h5>
      <div class="card-body">
         <div class="col-md-12">
         <table class="table table-striped">
            <tbody>
               <tr>
                  <th>Description</th>
                  <td>{{$fashion->description}}</td>
               </tr>
               <tr>
                  <th>Price</th>
                  <td>{{$fashion->price}} SAR</td>
               </tr>
               <tr>
                  <th>Image</th>
                  <td>
                     <img src="{{$fashion->image_path}}" style="width: 400px; height: 400px" alt="">
                  </td>
               </tr>
               <tr>
                  <th>Availability Status</th>
                  <td>

                     <label class="badge bg-{{ $fashion->availability_status == 'available' ? 'success' : 'danger' }}"> {{$fashion->availability_status}}</label>
                  </td>
               </tr>
               <tr>
                  <th>Fabric</th>
                  <td>{{$fashion->fabrics}}</td>
               </tr>
               <tr>
                  <th>Colors</th>
                  <td>
                     @if($fashion->colors)
                     @foreach($fashion->colors as $col)
                     <span style="width: 100px; height: 100px; background-color: {{$col}}; border-radius: 50%; color: {{$col}}">{{'color'}}</span>
                     @endforeach
                     @endif
                  </td>
               </tr>
               <tr>
                  <th>Sizes</th>
                  <td>
                     @if($fashion->sizes)
                     @foreach($fashion->sizes as $size)
                     <span>{{ $size }}</span><br>
                     @endforeach
                     @endif
                  </td>
               </tr>
            </thead>
         </table>

         </div>
      </div>
   </div>
</div>
@endsection
