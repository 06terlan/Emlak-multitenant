@extends('layouts.master')

@section('content')

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/about-bg.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="page-heading">
          <h1>About Me</h1>
          <span class="subheading">This is what I do.</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      {!! $about !!}
    </div>
  </div>
</div>

@endsection