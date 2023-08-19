@extends('admin.layouts.layout')

@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Categories Section</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Categories</a></div>
        <div class="breadcrumb-item">Create New Category</div>
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
              <h4>Categories</h4>
              <a href="{{ route('admin.category.create') }}" class="btn btn-success" >create</a>
            </div>
            <div class="card-body">


                    <table class="table">
                        <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">slug</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td><a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-info">edit</a></td>
                        <td>
                            <form action="{{ route('admin.category.destroy',$category->id ) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
