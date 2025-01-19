@extends('administrator.index')

@section('container')
<h1 class="mb-5">Edit post</h1>
<hr>
<form method="post" action="/admin/update/{{ $post->slug }}" class="mb-3">
    @csrf
<div class="mb-3">
    <label for="title" class="form-label">Title : </label>
    <input name="title" type="text" class="form-control {{ (isset(session('error')['errors']) && session('error')['errors']->has('title')) ? 'is-invalid' : '' }}" id="title" required value="{{ old('title', $post->title) }}">
    @if (isset(session('error')['errors']) && session('error')['errors']->has('title'))
        <div class="invalid-feedback">
            {{ session('error')['errors']->first('title') }}
        </div>
    @endif
</div>
<div class="mb-3">
    <label for="slug" class="form-label">Slug : </label>
    <input name="slug" type="text" class="form-control {{ (isset(session('error')['errors']) && session('error')['errors']->has('slug')) ? 'is-invalid' : '' }}" id="slug" required disabled value="{{ old('slug', $post->slug) }}">
    <input type="hidden" name="slug" value="{{ old('slug', $post->slug) }}">
    @if (isset(session('error')['errors']) && session('error')['errors']->has('slug'))
        <div class="invalid-feedback">
            {{ session('error')['errors']->first('slug') }}
        </div>
    @endif
</div>
<div class="mb-3">
    <label for="author" class="form-label">Author : </label>
    <input name="author" type="text" class="form-control {{ (isset(session('error')['errors']) && session('error')['errors']->has('author')) ? 'is-invalid' : '' }}" id="author" required value="{{ old('author', $post->author) }}">
    @if (isset(session('error')['errors']) && session('error')['errors']->has('author'))
        <div class="invalid-feedback">
            {{ session('error')['errors']->first('author') }}
        </div>
    @endif
</div>
<div class="mb-3">
    <input type="hidden" value="{{ old('body', $post->body) }}" name="body" id="body">
    <div id="editor" class="form-control {{ (isset(session('error')['errors']) && session('error')['errors']->has('body')) ? 'is-invalid' : '' }}">
        {!! old('body', $post->body) !!}
    </div>
    @if (isset(session('error')['errors']) && session(key: 'error')['errors']->has('body'))
    <div class="invalid-feedback">
        {{ session('error')['errors']->first('body') }}
    </div>
    @endif
</div>
<button type="submit" class="btn btn-outline-dark">Edit</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
<script src="{{ asset('js/editpost.js') }}"></script>
@endsection


