@extends('rides.layouts.app')
@section('title','User reviews')
@section('content')


<section>
  <div class="container p-lg-5 p-2" id="deshboard">
    <div class="row">
      <div class="col-sm-2">
         <a href="{{asset('account')}}">
        @if(Auth::user()->img != null || '')
        <img src="{{asset('public/'.Auth::user()->img)}}" alt="" class="img-responsive img-circle" id="res-image">
        @else
        <img src="{{asset('public/upload/no.jpg')}}" alt="" class="img-responsive img-circle" id="res-image">
        @endif
        </a>
      </div>

</section>








@endsection