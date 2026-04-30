@extends('template.main')
@section('title', 'Dashboard Admin')
@section('content')
<header class="header">
    <div class="search-bar">
        <input type="text" placeholder="Cari Data">
    </div>
    <div class="header-action">
        <a href="#" class="btn-create">➕ Create New</a>
        <div>👤 Muhammad Eizza Aqilah Syafi'i</div>
    </div>
</header>
<div class="feature-cards">
    <div class="feature-card">
        <div class="feature-icon">🎬</div>
        <h3>Movies</h3>
    </div>
    <div class="feature-card">
        <div class="feature-icon">🎬</div>
        <h3>Movies</h3>
    </div>
    <div class="feature-card">
        <div class="feature-icon">🎬</div>
        <h3>Movies</h3>
    </div>
</div>
@endsection