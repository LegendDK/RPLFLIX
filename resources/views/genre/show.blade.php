@extends('template.main')
@section('title', 'Detail Genre')
@section('content')

<div class="header">
    <div class="header-action">
        <p><a href="{{ route('genre.index') }}">Genre</a> /Detail</p>
    </div>
</div>

<div class="genre-detail">
    <div class="genre-info">
        <p><strong>Genre :</strong> {{ $genre->genre_title }}</p>
        <p><strong>Description :</strong> {{ $genre->description }}</p>
    </div>
</div>

<div style="margin-top:20px;">
    <form action="{{ Route('genre.destroy', $genre->id) }}" onsubmit="return confirm('Are You Sure?')" method="post">
        @csrf
        <a href="{{ Route('genre.edit', $genre->id) }}"><button class="btn-show">Edit</button></a>
        @method('DELETE')
        <button type="submit" class="btn-show">Delete</button>
    </form>
</div>

@endsection