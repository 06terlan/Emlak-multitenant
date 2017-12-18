@extends('layouts.master')

@section('content')

<!-- Page Header -->
    <header class="masthead" style="background-image: url({{ url('img/post-bg.jpg') }})">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>{{$post->header}}</h1>
              <h2 class="subheading">{{$post->short_content}}</h2>
              <span class="meta">Posted by
                <a href="#">{{ $post->author->fullname() }}</a>
                on {{ App\Library\Date::d($post->created_at,'F d, Y') }}</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            {!! $post->content !!}
          </div>
        </div>
      </div>
    </article>
@endsection