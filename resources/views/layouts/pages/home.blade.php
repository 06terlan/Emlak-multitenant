@extends('layouts.master')

@section('content')

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Serendipity</h1>
          <span class="subheading">the occurrence and development of events by chance in a happy or beneficial way</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      
      <!-- Posts -->
      @foreach ($posts as $post)
        <div class="post-preview">
          <a href="{{ url('post/'.$post->id) }}">
            <h2 class="post-title">
              {{ $post->header }}
            </h2>
            <h3 class="post-subtitle">
              {{ $post->short_content }}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{ $post->author->fullname() }}</a>
            on {{ App\Library\Date::d($post->created_at,'F d, Y') }}
          </p>
        </div>
        <hr>
      @endforeach
      
      <!-- Pager -->
      <div class="clearfix">
        {{ $posts->links('layouts.pagination', ['paginator' => $posts]) }}
      </div>
    </div>
  </div>
</div>

@endsection