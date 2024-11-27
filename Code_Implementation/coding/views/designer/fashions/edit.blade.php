@extends('designer.master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Fashion Designs</h4>
   <div class="card">
      <h5 class="card-header">
         Fashion Designs
         <a href="{{route('designer.fashions.index')}}" class="btn btn-danger float-end">
            <i class='bx bx-left-arrow-alt'></i>
         </a>
      </h5>
      <div class="card-body">
         <div class="col-md-12">
				{!! Form::model($fashion,['route' => ['designer.fashions.update', $fashion->id], 'method' => 'put','files' => true, 'class' => '']) !!}
               @include('designer.fashions.form')
				{!! Form::close() !!}
         
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
<script>
   $('#add-size-req').on('click', function(e){
        e.preventDefault();
        $('#size-area').append(addSizeNewReqRecord());
    });
    $('#add-fabric-req').on('click', function(e){
        e.preventDefault();
        $('#fabric-area').append(addFabricNewReqRecord());
    });
    $('#add-color-req').on('click', function(e){
        e.preventDefault();
        $('#color-area').append(addColorNewReqRecord());
    });

    function generateRandomNumber() {
        return Math.floor(Math.random() * (9999999 - 10 + 1)) + 10;
    }

    function addSizeNewReqRecord(){
        let id = generateRandomNumber();
        let html = '<tr id="req'+id+'">';
        html += '<td><input type="text" name="sizes[]"  class="form-control"></td>';
        html += '<td><button type="button" onClick="removeSizeReqRecord('+id+')" class="btn btn-danger">Delete</button></td>';
        return html;
    }
    function removeSizeReqRecord(id){
        $('#req' + id).remove();
    }
    function addFabricNewReqRecord(){
        let id = generateRandomNumber();
        let html = '<tr id="req-fabric'+id+'">';
        html += '<td><input type="text" name="fabrics[]"  class="form-control"></td>';
        html += '<td><button type="button" onClick="removeFabricReqRecord('+id+')" class="btn btn-danger">Delete</button></td>';
        return html;
    }
    function removeFabricReqRecord(id){
        $('#req-fabric' + id).remove();
    }
    function addColorNewReqRecord(){
        let id = generateRandomNumber();
        let html = '<tr id="req-color'+id+'">';
        html += '<td><input type="color" name="colors[]"  class="form-control"></td>';
        html += '<td><button type="button" onClick="removeColorReqRecord('+id+')" class="btn btn-danger">Delete</button></td>';
        return html;
    }
    function removeColorReqRecord(id){
        $('#req-color' + id).remove();
    }
</script>
@endsection