<div id="journal" class="text-left paddsection">

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
              <div class="journal-info">

                <a href=""><img src="{{ asset('blog_imgs/'.$blog->img) }}" class="img-responsive" alt="img"></a>

                <div class="journal-txt">

                  <h4><a href="blog-single.html">{{ $blog->title }}</a></h4>
                  <p class="separator">{{ Str::limit($blog->sub_title, 100, '...') }}
                  </p>

                </div>

              </div>
            </div>
            @endforeach



        </div>
      </div>
    </div>

  </div>
