@extends('layouts.app')
@section('title')
{{$ads->title}}

@endsection
@section('content')
<!-- Start Main Content -->
<!-- Title -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">{{$ads->title}}</h3>
    </div>
</div>
<!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
            <div class="col-md-12 col-sm-12 hero-feature">
                <div class="thumbnail">
                    <img src="{{url('public/images/'.$ads->image_cover)}}" 
                         alt="ad" 
                         title="ad" />
                </div>
            </div>
            <div class="col-md-6 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{url('public/images/'.$ads->image1)}}" 
                         alt="ad" 
                         title="ad" />
                </div>
            </div>

            <div class="col-md-6 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{url('public/images/'.$ads->image2)}}" 
                         alt="ad" 
                         title="ad" />
                </div>
            </div>

            <div class="col-md-12 col-sm-12 hero-feature">
               <div class="caption">
                <h3>{{$ads->desc}}</h3>
                <a href="">
                    <p>{{App\Category::find($ads->cat_id)->name}}</p>
                </a>
                @if (Auth::guest())
                <p>
                    <a href="{{url('/login')}}" class="btn btn-primary">Login</a>
                </p>
                @else
                <p>
                    <a href="#" class="btn btn-primary">Buy Now!</a>
                </p>
                @endif
            <div>
            </div>

        </div>
        <!-- /.row -->

        <hr>
<!--End Main Content-->
   @endsection