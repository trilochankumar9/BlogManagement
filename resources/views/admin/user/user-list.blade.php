@extends('layout.main')
@section('content')
    @include('layout.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('/admin/dashboard') }}">Home</a></li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
    
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">User Data</h5>

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>
                          Name
                        </th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)                            
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                            <a href="{{ route('/admin/user-edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('/admin/user-delete', $user->id) }}" onclick="return confirm('Are You Sure You want to Delete this User?')" class="btn btn-danger btn-sm">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div>
                    {{ $users->links(); }}
                  </div>
    
                </div>
              </div>
    
            </div>
          </div>
        </section>
    
      </main>
@endsection