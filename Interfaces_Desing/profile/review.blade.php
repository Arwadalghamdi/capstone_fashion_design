@extends('customer.master.index')

@section('content')

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="contact__form">
                        <form action="{{route('customer.profile.review.post', $order->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="fashion" value="{{$fashion->fashion_design_id}}">
                            <div class="row">
                            @if(Session::has('success'))
                                <div class="col-md-12 alert alert-success text-center">{{ Session::get('success') }}</div>
                            @endif
                            @if(Session::has('fail'))
                                <div class="col-md-12 alert alert-danger text-center">{{ Session::get('fail') }}</div>
                            @endif
                                <div class="col-md-12 mb-2 text-center">
                                    <h3>Review | {{$fashion->fashionDesign?->title}}</h3>
                                </div>
                                <div class="col-lg-12 {{ $errors->has('rate') ? 'has-feedback has-error has-danger' : '' }}">
                                    
                                    <select name="rate" id="" class="form-control" style="width: 100%;" required>
                                        <option value="1">I Rate this fashion Design with 1</option>
                                        <option value="2">I Rate this fashion Design with 2</option>
                                        <option value="3">I Rate this fashion Design with 3</option>
                                        <option value="4">I Rate this fashion Design with 4</option>
                                        <option value="5">I Rate this fashion Design with 5</option>
                                    </select>
                                    @if($errors->has('rate'))
                                    <div class="form-control-feedback"> {{ $errors->first('rate') }}</div>
                                    @endif
                                </div>
                                <div class="col-lg-12 {{ $errors->has('comment') ? 'has-feedback has-error has-danger' : '' }}">
                                    <textarea name="comment" class="form-control" placeholder="Write comment please" cols="30" rows="10" class="{{$errors->has('email') ? ' is-invalid' : ''}}">{{old('comment')}}</textarea>
                                    @if($errors->has('comment'))
                                    <div class="form-control-feedback"> {{ $errors->first('comment') }}</div>
                                    @endif
                                </div>
                                
                                <div class="col-lg-12">
                                    <button type="submit" class="site-btn btn-block">Review Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection

@section('css')
<style>
    .nice-select{
        width: 100% !important;
    }
    .nice-select.list{
        width: 100% !important;
    }
</style>
@endsection