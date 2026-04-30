@extends('template.main')
@section('title', 'Home')
@section('content')
<header class="header">
    <div class="search-bar">
        <form action="{{ route('home') }}" method="get">
            @csrf
            <input type="text" name="keyword" placeholder="Cari Data" value="{{ old('keyword') }}">
        </form>
    </div>
    <div class="header-action">
        <div>👤 {{ Auth::user()->name }}</div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">🚪 Logout</button>
        </form>
    </div>
</header>

<div style="margin: 30px 0">
<a href="{{ route('home') }}" class="btn-genre">All</a>
@foreach($genre as $row)
    <a href="{{ route('home', 'genre='. $row->id)}}" class="btn-genre">{{ $row->genre_title }}</a>
@endforeach
</div>

<div class="feature-cards-flex">
    @if(request()->query('keyword'))
        <p>Hasil pencarian untuk: <strong>{{ request()->query('keyword') }}</strong> {{ count($content) }} hasil <a href="{{ route('home') }}">Reset</a></p>
    @endif
</div>

<div class="feature-cards">
    @foreach($content as $rowContent)
    <div class="feature-card" onclick="window.location.href='{{ route('content.show', $rowContent->id)}}'">
        <img src="{{ asset('uploaded/cover/'. $rowContent->cover)}}" alt="">
        <h3>{{ $rowContent->title }}</h3>
        <p>{{ $rowContent->genre->genre_title }} |  {{ $rowContent->age_rating }} | {{ $rowContent->duration }} Minutes</p>
    </div>
    @endforeach
</div>
@endsection