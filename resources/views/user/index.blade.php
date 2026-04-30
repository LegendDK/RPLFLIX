@extends('template.main')
@section('title', 'Genre')
@section('content')
<header class="header">
    <div class="search-bar">
        <input type="text" placeholder="Cari Data">
    </div>
    <div class="header-action">
        <a href="{{ Route('genre.create')}}" class="btn-create">➕ Create New</a>
        <div>👤 {{ Auth::user()->name }}</div>
    </div>
</header>
<h1>👤 User</h1>
<div class="feature-cards-flex">
    @foreach($user as $rowUser)
    <div class="feature-card-flex" onclick="window.location.href='{{ route('user.show', $rowUser->id)}}'">
        <h1>👤</h1>
        <div>
            <h3>{{ $rowUser->name }}</h3>
            <p>{{ $rowUser->email }} | {{$rowUser->role}}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection