@extends('layout.main')
@section('content')
    @include('layout.sidebar')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1 style="font-size: 2rem; color: #4CAF50; font-weight: bold;">Dashboard</h1>
            <nav>
                <ol class="breadcrumb" style="background-color: #f8f9fa; padding: 10px; border-radius: 5px;">
                    <li class="breadcrumb-item">
                        <a href="{{ route('/admin/dashboard') }}" style="color: #007bff; text-decoration: none;">Home</a>
                    </li>
                    <li class="breadcrumb-item active" style="color: #6c757d;">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card" style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #333; font-weight: bold;">Total Users</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6 style="font-size: 1.5rem; color: #007bff;">{{ $res['totalUsers'] }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card revenue-card" style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">

                                <div class="card-body">
                                    <h5 class="card-title" style="color: #333; font-weight: bold;">Total Post's</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6 style="font-size: 1.5rem; color: #28a745;">{{ $res['totalPosts'] }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card customers-card" style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: #333; font-weight: bold;">Total Comments</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6 style="font-size: 1.5rem; color: #dc3545;">{{ $res['totalComments'] }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
