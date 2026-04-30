@extends('template.main')
@section('title', 'Content')
@section('content')
<header class="header">
    <div class="search-bar">
        <input type="text" placeholder="Cari Data">
    </div>
    <div class="header-action">
        @if(auth()->user() && auth()->user()->role === 'admin')
            <a href="{{ route('content.create') }}" class="btn-create">➕ Create New</a>
        @endif
        <div>👤 {{ Auth::user()->name }}</div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">🚪 Logout</button>
        </form>
    </div>
</header>
<h1>🎥 Content</h1>
<div class="feature-cards">
    @foreach ($content as $rowContent)
    <div class="feature-card" onclick="window.location.href='{{ route('content.show', $rowContent->id)}}'">
        <img src="{{ asset('uploaded/cover/'. $rowContent->cover)}}" alt="">
        <h3>{{ $rowContent->title }}</h3>
        <p>{{ $rowContent->genre->genre_title }} |  {{ $rowContent->age_rating }} | {{ $rowContent->duration }} Minutes</p>
    </div>
    @endforeach 
</div>
{{-- <table border="1">
    <thead>
        <th>No</th>
        <th>Title</th>
        <th>Genre</th>
        <th>Description</th>
        <th>Duration (Minutes)</th>
        <th>Release Date</th>
        <th>Age Rating</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($content as $rowContent)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $rowContent->title }}</td>
            <td>{{ $rowContent->genre->genre_title }}</td>
            <td>{{ $rowContent->description }}</td>
            <td>{{ $rowContent->duration }} Minutes</td>
            <td>{{ $rowContent->release_date }}</td>
            <td>{{ $rowContent->age_rating }}</td>
            <td>
                <form action="" method="post"><a href="{{ Route('content.show',$rowContent->id) }}">Detail</a></form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> --}}
@endsection