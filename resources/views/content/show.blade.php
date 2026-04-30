@extends('template.main')
@section('title', 'Detail Content')
@section('content')

<header class="header">
    <div class="header-action">
        <p><a href="{{ route('content.index') }}">Content</a> /Detail</p>
    </div>
</header>

<h1>{{ $content->title }}</h1>

<div class="content-detail">
    <div class="content-cover">
        <img src="{{ asset('uploaded/cover/' . $content->cover) }}" alt="Cover"width="250">
    </div>

    <div class="content-video">
        <video width="640" height="360" controls>
            <source src="{{ asset('uploaded/file/' . $content->file) }}" type="video/mp4">
            Browser kamu tidak mendukung video.
        </video>
    </div>

    <div class="content-info">
        <p><strong>Genre :</strong> {{ $content->genre->genre_title }}</p>
        <p><strong>Description :</strong> {{ $content->description }}</p>
        <p><strong>Duration :</strong> {{ $content->duration }}</p>
        <p><strong>Release Date :</strong> {{ $content->release_date }}</p>
        <p><strong>Age Rating :</strong> {{ $content->age_rating }}</p>
        <p><strong>Uploaded At :</strong> {{ $content->created_at->format('d M Y') }}</p>
    </div>
</div>

@if(auth()->user() && auth()->user()->role === 'admin')
<div style="margin-top:20px;">
    <form action="{{ Route('content.destroy', $content->id) }}" onsubmit="return confirm('Are You Sure?')" method="post">
        @csrf
        <a href="{{ Route('content.edit', $content->id) }}"><button class="btn-show">Edit</button></a>
        @method('DELETE')
        <button type="submit" class="btn-show">Delete</button>
    </form>
</div>
@endif

@endsection