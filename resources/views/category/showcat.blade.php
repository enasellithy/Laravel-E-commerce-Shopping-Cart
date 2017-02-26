@extends('layouts.app')
@section('title')
<?php
$titleTag = htmlspecialchars($cats->name);
?>
{{$cats->name}}
@endsection
@section('content')
<!-- Start Main Content -->

<!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>{{$cats->name}}</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

@foreach($ads as $ad)
@if($ad->cat_id == $cats->id)
<div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="{{url('public/images/'.$ad->image_cover)}}" 
                 alt="{{$ad->image_cover}}"
                 title="{{$ad->image_cover}}" />
                <div class="caption">
                <h3>{{$ad->title}}</h3>
                <p>
                    <span class="price">{{$ad->price}}</span>
                </p>
                <p>
                    {{substr($ad->dssc,0,25)}}
                    {{strlen($ad->desc) > 50 ? "...":""}}
                </p>
                <p>
                    @if (Auth::guest())
                    <a href="adv/{{$ad->id}}/show" class="btn btn-default">More Info</a>
                    @else
                    <a href="#" class="btn btn-primary">Buy Now!</a> 
                    <a href="adv/{{$ad->id}}/show" class="btn btn-default">More Info</a>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endif
@endforeach

        </div>
        <!-- /.row -->

        <hr>
<!--End Main Content-->
   @endsection