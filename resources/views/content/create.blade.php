@extends('template.main')
@section('title', 'Content')
@section('content')
<header class="header">
    <div class="header-action">
        <p><a href="{{ Route('content.index')}}">Content </a>/ Create</p>
    </div>
</header>
<h1>Create | Content</h1>
<form action="{{ Route('content.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title : </label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-input">
    </div>

    <div class="form-group">
        <label for="genre_id">Genre : </label>
        <select name="genre_id" id="genre_id" class="form-input">
            <option hidden sellect value="">-= Select Genre =-</option>
            @foreach($genre as $rowGenre)
            <option value="{{ $rowGenre->id }}">{{ $rowGenre->genre_title }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description : </label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-input"></textarea>
    </div>

    <div class="form-group">
        <label for="duration">Duration : </label>
        <input type="text" name="duration" id="duration" class="form-input">
    </div>

    <div class="form-group">
        <label for="release_date">Release Date : </label>
        <input type="date" name="release_date" id="release_date" class="form-input">
    </div>

    <div class="form-group">
        <label for="age_rating">Age Rating : </label>
        <select name="age_rating" id="age_rating" class="form-input">
            <option hidden select value="">-= Select Age Rating =-</option>
            <option value="SU">Semua umur</option>
            <option value="RE">Remaja</option>
            <option value="DT">Dewasa 17+</option>
            <option value="DD">Dewasa 21+</option>
        </select>
    </div>

    <div class="form-group">
        <label for="cover">Cover : </label>
        <input type="file" name="cover" id="cover" accept="image/*">
    </div>

    <div class="form-group">
        <label for="file">File : </label>
        <input type="file" name="file" id="file" accept="video/*">
    </div>

    <button type="submit" class="btn-login">Create Data</button>
</form>
@endsection