@extends('layout.main')
@section('content')
    @include('layout.sidebar')

    <main id="main" class="main">
        <h1>{{ $post->title }}</h1>
        <hr>

        <h3>{{ $post->content }}</h3>
        <hr>

        <b><h5>Comments</h5></b>
        <hr>

        @if(count($post->comments) > 0)
        <div>
          <a href="{{ route('/user/add-comment', $post->id) }}" class="btn btn-primary btn-sm m-2">Add New Comment</a>
        </div>
        <table class="table datatable">
            <thead>
              <tr>
                <th>
                  Comment
                </th>
                <th>Author</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($post->comments as $comment)                            
                <tr>
                  <td>{{ $comment->comment }}</td>
                  <td>{{ $comment->user->name }}</td>
                  <td>
                    @if ($comment->user->id == Auth::user()->id)                      
                      <a href="{{ route('/user/edit-comment', $comment->id) }}" class="btn btn-primary btn-sm">Edit</a>
                      <a href="{{ route('/user/delete-comment', $comment->id) }}" onclick="return confirm('Are You Sure You want to Delete this?')" class="btn btn-danger btn-sm">Delete</a>
                    @else
                      <p>N/A</p>
                    @endif
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          @else
            <p>No Comments Found</p>
            <a href="{{ route('/user/add-comment', $post->id) }}" class="btn btn-dark">Add Your Comment</a>
          @endif
        
    </main>
@endsection