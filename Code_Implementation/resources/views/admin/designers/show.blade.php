@extends('admin.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Designers</h4>
   <div class="card">
      <h5 class="card-header">
       Designers || {{ $designer->name }}
         <a href="{{route('admin.designers.index')}}" class="btn btn-danger float-end">
            <i class='bx bx-left-arrow-alt'></i>
         </a>
      </h5>
      <div class="card-body">
         <div class="col-md-12">
         <table class="table table-striped">
            <tbody>
               <tr>
                  <th>Name</th>
                  <td>{{$designer->name}}</td>
               </tr>
               <tr>
                  <th>Email</th>
                  <td>{{$designer->email}}</td>
               </tr>
               <tr>
                  <th>Phone</th>
                  <td>{{$designer->phone}}</td>
               </tr>
               <tr>
                  <th>Address</th>
                  <td>{{$designer->address}}</td>
               </tr>
               <tr>
                  <th>Profile Picture</th>
                  <td>
                     <img src="{{$designer->avatar}}" style="width: 100px; height: 100px" alt="">
                  </td>
               </tr>
               <tr>
                  <th>Bio</th>
                  <td>{{$designer->bio}}</td>
               </tr>
               <tr>
                  <th>Account Status</th>
                  <td>

                     <label class="badge bg-{{ $designer->account_status == 'active' ? 'success' : 'danger' }}"> {{$designer->account_status}}</label>
                  </td>
               </tr>
            </thead>
         </table>

         </div>
      </div>
   </div>
</div>
@endsection
