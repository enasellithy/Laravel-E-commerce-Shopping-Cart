@extends('layouts.app')
@section('title')
Shopping Cart
@endsection
@section('content')
<!-- Start Main Content -->

<!-- Title -->
@if(Session::has('cart'))
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <ul class="list-group">
            @foreach($ads as $ad)
                <li class="list-group-item">
                    <span class="badge">{{$ad['qty']}}</span>
                    <strong>{{$ad['item']['titel']}}</strong>
                    <span class="label label-success">{{$ad['price']}}</span>
                    <div class="dropdown">
                      <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Reduce By 1</a></li>
                         <li><a href="#">Reduce All</a></li>
                      </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
       <strong>Total: {{$totalPrice}}</strong>
    </div>
</div>
<hr>
<div class="row">
  @if (Auth::guest())
  <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
       <a href="{{url('login')}}" type="button" class="btn btn-success">Checkout</a>
    </div>
  @else
  <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
       <a href="{{route('checkout')}}" type="button" class="btn btn-success">Checkout</a>
    </div>
  @endif
</div>
@else
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
       <h2>No Items In Cart</h2>
    </div>
</div>
@endif
<!-- /.row -->
<hr>
<!--End Main Content-->
   @endsection