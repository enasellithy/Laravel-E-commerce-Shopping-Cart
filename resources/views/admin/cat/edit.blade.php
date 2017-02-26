@extends('admin.layouts.app')

@section('title')
Edit {{$cats->title}}
@endsection
@section('css')
<style type="text/css">
.btn-default,
.btn-default:hover {
    color: #FFF;
    background-color: #d80857;
    border-color: #E91E63;
    margin-bottom: 10px;
    font-weight: bold;
}
</style>
@endsection
@section('content')
<div class="row">
    @if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
@if(count($errors) > 0)
 <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
 </div>
@endif
    <div class="col-lg-12 col-md-12">
        <form class="form-horizontal"  
                  action="{{url('cat/'.$cats->id.'/update')}}" 
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Name</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" value="{{$cats->name}}" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Edit Category</button>
                    </div>
                  </div>
                  <input type="hidden" value="{{Session::token()}}" name="_token">
            </form>
    </div>
</div>
@endsection
