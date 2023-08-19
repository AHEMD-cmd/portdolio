@extends('frontend.layouts.layout')


@section('content')
<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Portfolio Details</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li>Portfolio Details</li>
        </ol>
      </div>

    </div>
  </section><!-- Breadcrumbs Section -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="{{ asset('portfolio_imgs/'.$portfolio->img) }}" alt="">
              </div>

              {{-- <div class="swiper-slide">
                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-details-2.jpg') }}" alt="">
              </div>

              <div class="swiper-slide">
                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-details-3.jpg') }}" alt="">
              </div> --}}

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: {{ $portfolio->category->name }}</li>
              <li><strong>Client</strong>: {{ $portfolio->client }}</li>
              <li><strong>Project date</strong>: {{ $portfolio->created_at->diffForHumans() }}</li>
              <li><strong>Project URL</strong>: <a href="#">{{ $portfolio->url }}</a></li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>{{ $portfolio->title }}</h2>
            <p>
                {{ $portfolio->sub_title }}
            </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

@endsection
