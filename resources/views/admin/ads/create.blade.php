@extends('admin.layouts.app')

@section('title')
Categories
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
              action="{{route('ad.store')}}" 
              method="post"
             enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label class="control-label col-sm-2" for="title">Title</label>
              <div class="col-sm-10">
              <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="desc">Description</label>
              <div class="col-sm-10">
                <textarea name="desc" class="form-control" rows="5"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="price">Price</label>
              <div class="col-sm-10">
                <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="image_cover">Image Cove</label>
              <div class="col-sm-10">
                <input type="file" name="image_cover" class="form-control" id="image_cover" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="image1">Image</label>
              <div class="col-sm-10">
                <input type="file" name="image1" class="form-control" id="image1" />
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-sm-2" for="image2">Image</label>
              <div class="col-sm-10">
                <input type="file" name="image2" class="form-control" id="image2" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="cat_id">Category</label>
              <div class="col-sm-10">
              <select name="cat_id" class="form-control">
                @foreach($cats as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
              </select>
            </div>
            </div>
         <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Create New Advertsing</button>
            </div>
          </div>
        </div>
        <input type="hidden" value="{{Session::token()}}" name="_token">
        </form>
        <a href="{{url('/ad')}}" class="btn btn-success">Go Back</a>
    </div>
    @endsection