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
        <div class="breadcrumb-item">Create New Portfolio</div>
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
              <h4>Portfolioes</h4>
              <a href="{{ route('admin.portfolio.create') }}" class="btn btn-success" >create</a>
            </div>
            <div class="card-body">


                    <table class="table">
                        <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Image</th>
                          <th scope="col">Title</th>
                          <th scope="col">Sub Title</th>
                          <th scope="col">client</th>
                          <th scope="col">url</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolioes as $portfolio)
                      <tr>
                        <th scope="row">1</th>
                        <td><img src="{{ asset('portfolio_imgs/'.$portfolio->img) }}" alt="" width="100" height="100"></td>
                        <td>{{ $portfolio->title }}</td>
                        <td>{{ $portfolio->sub_title }}</td>
                        <td>{{ $portfolio->client }}</td>
                        <td>{{ $portfolio->url }}</td>
                        <td><a href="{{ route('admin.portfolio.edit',$portfolio->id) }}" class="btn btn-info">edit</a></td>
                        <td>
                            <form action="{{ route('admin.portfolio.destroy',$portfolio->id ) }}" method="POST">
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
