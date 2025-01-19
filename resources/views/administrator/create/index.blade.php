@extends('administrator.index')

@section('container')
<h1 class="mb-5">Create post</h1>
<hr>
<form method="post" action="/admin/create" class="mb-3">
    @csrf
<div class="mb-3">
    <label for="title" class="form-label">Title : </label>
    <input name="title" type="text" class="form-control {{ (isset(session('error')['errors']) && session('error')['errors']->has('title')) ? 'is-invalid' : '' }}" id="title" required value="{{ old('title') }}">
    @if (isset(session('error')['errors']) && session('error')['errors']->has('title'))
        <div class="invalid-feedback">
            {{ session('error')['errors']->first('title') }}
        </div>
    @endif
</div>
<div class="mb-3">
    <label for="slug" class="form-label">Slug : </label>
    <input name="slug" type="text" class="form-control {{ (isset(session('error')['errors']) && session('error')['errors']->has('slug')) ? 'is-invalid' : '' }}" id="slug" required value="{{ old('slug') }}">
    @if (isset(session('error')['errors']) && session('error')['errors']->has('slug'))
        <div class="invalid-feedback">
            {{ session('error')['errors']->first('slug') }}
        </div>
    @endif
</div>
<div class="mb-3">
    <label for="author" class="form-label">Author : </label>
    <input name="author" type="text" class="form-control {{ (isset(session('error')['errors']) && session('error')['errors']->has('author')) ? 'is-invalid' : '' }}" id="author" required value="{{ old('author') }}">
    @if (isset(session('error')['errors']) && session('error')['errors']->has('author'))
        <div class="invalid-feedback">
            {{ session('error')['errors']->first('author') }}
        </div>
    @endif
</div>
<div class="mb-3">
      <div id="editor" name="body" class="z-0 form-control {{ (isset(session('error')['errors']) && session('error')['errors']->has('body')) ? 'is-invalid' : '' }}">
        {!! old('body') !!}
      </div>
</div>
<button type="submit" class="btn btn-outline-dark">Create</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
<script src="../js/createpost.js"></script>
@endsection


