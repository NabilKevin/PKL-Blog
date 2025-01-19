@extends('index')
@section('container')
<h1 class="mb-5">Postingan</h1>

<h5>Search posts</h5>
<div class="input-group mb-4">
    <input type="text" class="form-control" placeholder="Title post..." id="search">
  </div>

  <div class="container-lg articles">
@foreach ($posts as $post)
    <article class="mb-3 border-bottom pb-3">
        <h3><a href="/post/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h3>

        <p class="my-1">By: <strong>{{ $post->author }}</strong></p>

        <p class="my-2">{{ $post->excerpt }}...</p>

        <a href="/post/{{ $post->slug }}" class="text-decoration-none">Read more...</a>
    </article>
    @endforeach
</div>
<script src="js/posts.js"></script>
@endsection
