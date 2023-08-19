<div id="services">
    <div class="container">

      <div class="services-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
@php

$icons = ['briefcase','card-checklist', 'bar-chart', 'binoculars', 'brightness-high'];
@endphp
                  @foreach ($services as $i=>$service)

                  <div class="swiper-slide">
                  <div class="services-block">
                    <i class="bi bi-{{ $icons[$i] }}"></i>
                  <span>{{ $service->name }}</span>
                   <p class="separator">{{ $service->description }} </p>
                   </div>
                    </div>
                  @endforeach






        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

  </div>
