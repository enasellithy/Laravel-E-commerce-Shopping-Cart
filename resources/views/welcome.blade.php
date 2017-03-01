@extends('layouts.app')
@section('title')
{{trans('message.welcome')}}
@endsection
@section('content')

<!-- Start Main Content -->
<!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            @foreach($cats as $cat)
            <div class="col-md-2">
                <a href="category/{{$cat->id}}/show">
                    <h5>{{$cat->name}}</h5>
                </a>
            </div>
            @endforeach
            <p> 
            </p>
        </header>

        <hr>
<!-- Title -->
<!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
            @foreach($ads as $ad)
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{url('public/images/'.$ad->image_cover)}}" 
                         alt="ad" 
                         title="ad"
                         width="500"
                         height="800" />
                    <div class="caption">
                        <h3>{{$ad->title}}</h3>
                        <p>
                            {{substr($ad->dssc,0,25)}}
                            {{strlen($ad->desc) > 100 ? "...":""}}
                        </p>
                        <a href="category/{{App\Category::find($ad->cat_id)->id}}/show">
                            {{App\Category::find($ad->cat_id)->name}}
                        </a>
                        <p>
                            <a href="add-to-cart/{{$ad->id}}/cart" class="btn btn-primary fa fa-shopping-cart">Add To Cart</a> 
                            <a href="adv/{{$ad->id}}/show" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.row -->
        <hr>
<!--End Main Content-->

   @endsection