@extends('layout.main')
@section('content')
    @include('layout.sidebar')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/user/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
              <div class="col-lg-12">
      
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Post Data</h5>
  
                    @if(count($posts) > 0)
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th>
                            Title
                          </th>
                          <th>Content</th>
                          <th>Author</th>
                          <th>Comments</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($posts as $Post)                            
                          <tr>
                            <td>{{ $Post->title }}</td>
                            <td>{{ $Post->content }}</td>
                            <td>{{ $Post->user->name }}</td>
                            <td>
                                <a href="{{ route('/user/view-all-comment', $Post->id) }}" class="btn btn-dark btn-sm">View All</a>
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    <div>
                      {{ $posts->links(); }}
                    </div>
                    @else
                    <h1>No Post Found</h1>
                    @endif
      
                  </div>
                </div>
      
              </div>
            </div>
          </section>
    </main>
@endsection