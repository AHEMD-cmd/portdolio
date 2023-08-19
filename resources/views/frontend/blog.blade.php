@extends('frontend.layouts.layout')


@section('content')

<div id="journal-blog" class="text-left  paddsections">

    <div class="container">
      <div class="section-title text-center">
        <h2>journal</h2>
      </div>
    </div>

    <div class="container">
      <div class="journal-block">
        <div class="row">

            @foreach ($blogs as $blog)

            <div class="col-lg-4 col-md-6">
              <div class="journal-info mb-30">

                <a href="blog-single.html"><img src="{{ asset('blog_imgs/'.$blog->img) }}" class="img-responsive" alt="img"></a>

                <div class="journal-txt">

                  <h4><a href="blog-single.html">{{ $blog->title }}</a></h4>
                  <p class="separator">{{ Str::limit($blog->title, 100, '...') }}
                  </p>

                </div>

              </div>
            </div>
            @endforeach

{{ $blogs->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
