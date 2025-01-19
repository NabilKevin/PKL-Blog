@extends('index')
@section('container')
<a href="/posts" class="btn btn-outline-dark mb-3"><i class="bi bi-chevron-left"></i> Back to posts</a>
<h1>{{ $post->title }}</h1>

<p class="mb-5 mt-2 ms-1">By: <strong>{{ $post->author }}</strong></p>

<div class="container mb-5">
    {!! $post->body !!}
    <button class="btn btn-outline-dark mx-auto d-block" onclick="window.scroll(0,0)">Back to top</button>
</div>
@endsection
