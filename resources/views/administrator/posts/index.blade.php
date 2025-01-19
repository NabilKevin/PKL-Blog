@extends('administrator.index')

@section('container')
<h1 class="mb-5">Posts</h1>
<h5>Search posts</h5>
<div class="input-group">
    <input type="text" class="form-control" placeholder="Title post..." id="search">
  </div>
  <a href="/admin/create" class="btn btn-outline-dark mt-4 mb-2">Create new post</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($posts as $k => $post)
        <tr>
          <th scope="row">{{ $k + 1 }}</th>
          <td>{{ $post->title }}</td>
          <td>{{ $post->author }}</td>
          <td>
            <div class="buttons d-flex gap-2">
                <a href="/admin/edit/{{ $post->slug }}" class="btn btn-warning text-white fw-semibold">Edit</a>
                <form action="/admin/delete/{{ $post->slug }}" method="post">
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure want to delete this post?')" class="btn btn-danger text-white fw-semibold">Delete</button>
                </form>
            </div>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <script src="../js/adminposts.js"></script>
@endsection
