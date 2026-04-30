@extends('template.main')
@section('title', 'Genre')
@section('content')
<header class="header">
    <div class="header-action">
        <p><a href="{{ Route('genre.index')}}">Genre </a>/ Create</p>
    </div>
</header>
<h1>Create | Genre</h1>
<form action="{{ Route('genre.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="genre_title">Title : </label>
    <input type="genre_title" name="genre_title" id="genre_title" value="{{ old('genre_title') }}" class="form-input">
    @error('genre_title')
        <span style="color: red">{{ $message }}</span>
    @enderror <br><br>
    <label for="description">Description : </label>
    <textarea name="description" id="description" class="form-input">{{ old('description') }}</textarea>
    @error('description')
        <span style="color: red">{{ $message }}</span>
    @enderror <br><br>
    <button type="submit" class="btn-login">Save Data</button>
</form>
@endsection