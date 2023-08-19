<div id="portfolio" class="paddsection">

    <div class="container">
      <div class="section-title text-center">
        <h2>My Portfolio</h2>
      </div>
    </div>

    <div class="container">

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            @foreach ($categories as $category)

            <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
            @endforeach

          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        @foreach ($portfolioes as $portfolio)

        <div class="col-lg-4 col-md-6 portfolio-item {{ $portfolio->category->slug }}">
          <img src="{{ asset('portfolio_imgs/'.$portfolio->img) }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>{{ $portfolio->title }}</h4>
            <p>{{ Str::limit($portfolio->sub_title, 100) }}</p>
            <a href="{{ asset('portfolio_imgs/'.$portfolio->img) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
            <a href="{{ route('portfolio.details', $portfolio->id) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>
        @endforeach


      </div>

    </div>

  </div>
