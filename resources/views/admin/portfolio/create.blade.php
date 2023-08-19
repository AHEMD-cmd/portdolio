@extends('admin.layouts.layout')

@section('content')
<section class="section">
	<div class="section-header">
	  <div class="section-header-back">
		<a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
	  </div>
	  <h1>Portfolio Section</h1>
	  <div class="section-header-breadcrumb">
		<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
		<div class="breadcrumb-item"><a href="#">Portfolio</a></div>
		{{-- <div class="breadcrumb-item">Create New Post</div> --}}
	  </div>
	</div>

	<div class="section-body">
	  {{-- <h2 class="section-title">Create New Post</h2>
	  <p class="section-lead">
		On this page you can create a new post and fill in all fields.
	  </p> --}}

	  <div class="row">
		<div class="col-12">
		  <div class="card">

			<div class="card-header">
			  <h4>create Portfolio</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row mb-4">
					  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
					  <div class="col-sm-12 col-md-7">
						<input type="text" name="title" class="form-control" value="{{ old('title') }}">
						<x-input-error class="mt-2" :messages="$errors->get('title')" />
					  </div>
					</div>

					<div class="form-group row mb-4">
					  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Title</label>
					  <div class="col-sm-12 col-md-7">
						<textarea type="text" class="form-control" name="sub_title">{{ old('sub_title') }}</textarea>
						<x-input-error class="mt-2" :messages="$errors->get('sub_title')" />
					</div>
					</div>

					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Client</label>
						<div class="col-sm-12 col-md-7">
						  <input type="text" name="client" class="form-control" value="{{ old('client') }}">
						  <x-input-error class="mt-2" :messages="$errors->get('client')" />
						</div>
					  </div>

					  <div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Url</label>
						<div class="col-sm-12 col-md-7">
						  <input type="text" name="url" class="form-control" value="{{ old('url') }}">
						  <x-input-error class="mt-2" :messages="$errors->get('url')" />
						</div>
					  </div>

					  <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control selectric" name="category_id">
                              <option> choose</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                          </select>
                        </div>
                      </div>





					<div class="form-group row mb-4">
						<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
						<div class="col-sm-12 col-md-7">
						  <div id="image-preview" class="image-preview">
							<label for="image-upload" id="image-label">Choose File</label>
							<input type="file" name="img" id="image-upload" />
						  </div>
						</div>
						<x-input-error class="mt-2" :messages="$errors->get('img')" />
					  </div>


					<div class="form-group row mb-4">
					  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
					  <div class="col-sm-12 col-md-7">
						<button class="btn btn-primary" type="submit">create</button>
					  </div>
					</div>
				</form>

			</div>
		  </div>
		</div>
	  </div>
	</div>
  </section>

@endsection

@push('script')

<script>
	$(document).ready(function(){
		$('#image-preview').css({
			'background-image':'url("")',
			'background-size':'cover',
			'background-position':'center center',

		})
	})
</script>
@endpush
