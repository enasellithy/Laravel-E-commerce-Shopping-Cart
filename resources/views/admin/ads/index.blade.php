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
<div class="row">
    
    <div class="col-lg-12 col-md-12">
      <a href="{{route('ad.create')}}" class="btn btn-default">Add New Ad</a>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">Posts</div>
                        <div class="count">2</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>By</th>
            <th>Cat</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Control</th>
          </tr>
        </thead>
        <tbody>
            @foreach($ads as $ad)
            <tr>
                <td>{{$ad->title}}</td>
                <td>{{$ad->price}}</td>
                <td>{{App\User::find($ad->user_id)->name}}</td>
                <td>{{App\Category::find($ad->cat_id)->name}}</td>
                <td>{{$ad->created_at}}</td>
                <td>{{$ad->updated_at}}</td>
                <td>
                    <a href="ad/{{$ad->id}}/edit" class="btn btn-info">
                        <i calss="fa fa-edit"></i>
                    </a>
                    <a href="ad/{{$ad->id}}/delete" class="btn btn-danger">
                        <i calss="fa fa-delete"></i>
                    </a>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="col-lg-6 col-md-6 text-center">
  {!! $ads->links() !!}
</div>
@endsection
