@extends('layout.main')
@section('content')
    @include('layout.sidebar')

    <main id="main" class="main">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">User Detail</h5>
          @include('extra.session-message')

          <form class="row g-3" action="{{ route('/admin/user-update', $user->id) }}" method="post">
            @csrf

            <div class="col-12">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </main>
@endsection