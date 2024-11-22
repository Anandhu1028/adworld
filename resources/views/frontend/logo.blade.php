@extends('layouts.frontend')
@section('achievements')
current current-menu-ancestor current-menu-parent
@endsection
@section('body')
<style>
   .clearfix .title{
      text-align:center;
   }
</style>
<section class="page-title" style="background-image: url({{asset('frontend/uploads/2021/10/pattern-16.png')}})">
   <div class="pattern-layer-one" style="background-image: url({{asset('frontend//themes/moko/assets/images/main-slider/pattern-1.png')}})"></div>
   <div class="pattern-layer-two" style="background-image: url({{asset('frontend//themes/moko/assets/images/background/pattern-17.png')}})"></div>
   <div class="pattern-layer-three" style="background-image: url({{asset('frontend//themes/moko/assets/images/background/pattern-18.png')}})"></div>
   <div class="pattern-layer-four" style="background-image: url({{asset('frontend//themes/moko/assets/images/icons/cross-icon.png')}})"></div>
   <div class="auto-container">
      <h2>  Our Client's</h2>
      <ul class="page-breadcrumb">
         <li><a href="/">Home</a></li>
         <li>Client's</li>
      </ul>
   </div>
</section>


@endsection