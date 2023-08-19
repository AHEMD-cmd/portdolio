<div id="about" class="paddsection">
    <div class="container">
      <div class="row justify-content-between">

        <div class="col-lg-4 ">
          <div class="div-img-bg">
            <div class="about-img">
              {{-- <img src="{{ asset('frontend/assets/img/me.jpg') }}" class="img-responsive" alt="me"> --}}
              <img src="{{ asset('about_imgs/'.$about->img) }}" class="img-responsive" alt="me">

            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="about-descr">

            <p class="p-heading">{{ $about->title }} </p>
            <p class="separator">{{ $about->sub_title }}</p>  <br><br>
            <a href="{{ route('resume.download') }}" class="btn btn-primary">Download Resume</a>

          </div>

        </div>
      </div>
    </div>
  </div>
