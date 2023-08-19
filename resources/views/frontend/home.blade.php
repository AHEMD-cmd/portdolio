@extends('frontend.layouts.layout')


@section('content')

@include('frontend.sections.hero')

 <!-- ======= About Section ======= -->
 @include('frontend.sections.about')
 <!-- End About Section -->

 <!-- ======= Services Section ======= -->
 @include('frontend.sections.services')
 <!-- End Services Section -->

 <!-- ======= Portfolio Section ======= -->
 @include('frontend.sections.portfolio')
 <!-- End Portfolio Section -->

 <!-- ======= Journal Section ======= -->
 @include('frontend.sections.journal')
 <!-- End Journal Section -->

 <!-- ======= Contact Section ======= -->
 @include('frontend.sections.contact')
 <!-- End Contact Section -->

@endsection
