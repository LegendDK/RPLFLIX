@extends('template.main')
@section('title', 'Content')
@section('content')
<header class="header">
    <div class="header-action">
        <p><a href="{{ Route('content.index')}}">Content </a>/ Edit</p>
    </div>
</header>
<h1>Edit | Content</h1>
<form action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title :</label>
        <input type="text" name="title" id="title"
            value="{{ old('title', $content->title) }}" class="form-input">
    </div>

    <div class="form-group">
        <label for="genre_id">Genre :</label>
        <select name="genre_id" id="genre_id" class="form-input">
            <option hidden value="">-= Select Genre =-</option>
            @foreach($genre as $rowGenre)
                <option value="{{ $rowGenre->id }}"
                    {{ old('genre_id', $content->genre_id) == $rowGenre->id ? 'selected' : '' }}>
                    {{ $rowGenre->genre_title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description :</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-input">{{ old('description', $content->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="duration">Duration :</label>
        <input type="text" name="duration" id="duration"
            value="{{ old('duration', $content->duration) }}" class="form-input">
    </div>

    <div class="form-group">
        <label for="release_date">Release Date :</label>
        <input type="date" name="release_date" id="release_date"
            value="{{ old('release_date', $content->release_date) }}" class="form-input">
    </div>

    <div class="form-group">
        <label for="age_rating">Age Rating :</label>
        <select name="age_rating" id="age_rating" class="form-input">
            <option hidden value="">-= Select Age Rating =-</option>
            <option value="SU" {{ old('age_rating', $content->age_rating) == 'SU' ? 'selected' : '' }}>Semua umur</option>
            <option value="RE" {{ old('age_rating', $content->age_rating) == 'RE' ? 'selected' : '' }}>Remaja</option>
            <option value="DT" {{ old('age_rating', $content->age_rating) == 'DT' ? 'selected' : '' }}>Dewasa 17+</option>
            <option value="DD" {{ old('age_rating', $content->age_rating) == 'DD' ? 'selected' : '' }}>Dewasa 21+</option>
        </select>
    </div>

    <div class="form-group">
        <label for="cover">Cover :</label>
        <input type="file" name="cover" id="cover" accept="image/*">
        <br>
    </div>

    <div class="form-group">
        <label for="file">File :</label>
        <input type="file" name="file" id="file" accept="video/*">
    </div>

    <button type="submit" class="btn-login">Update Data</button>
</form>
@endsection