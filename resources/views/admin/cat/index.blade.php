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
        <form class="form-horizontal"  
              action="{{route('cat.store')}}" 
              method="post"
             enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
            </div>
        </div>
         <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Create New Category</button>
            </div>
          </div>
        </div>
        <input type="hidden" value="{{Session::token()}}" name="_token">
        </form>
    </div>
    <div class="col-lg-12 col-md-12">
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
                            <th>By</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Control</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach($cats as $cat)
                         <tr>
                         <td>{{$cat->name}}</td>
                         <td>{{App\User::find($cat->user_id)->name}}</td>
                         <td>
                            {{date('M j, Y H:ia',strtotime($cat->created_at))}}
                         </td>
                         <td>
                            {{date('M j, Y H:ia',strtotime($cat->updated_at))}}
                        </td>
                        <td>
                            <a href="cat/{{$cat->id}}/edit" class="btn btn-info">
                                <i calss="fa fa-edit"></i>
                            </a>
                                <a href="cat/{{$cat->id}}/delete" class="btn btn-danger">
                                    <i calss="fa fa-delete"></i>
                                </a>
                        </td>
                         @endforeach
                     </tr>
                        </tbody>
                      </table>
</div>
<div class="col-lg-6 col-md-6 text-center">
  {!! $cats->links() !!}
</div>
@endsection
