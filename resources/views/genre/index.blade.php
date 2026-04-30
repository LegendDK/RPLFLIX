@extends('template.main')
@section('title', 'Genre')
@section('content')
<header class="header">
    <div class="search-bar">
        <form action="{{ route('genre.index') }}" method="get">
            @csrf
            <input type="text" name="keyword" placeholder="Cari Data">
        </form>
    </div>
    <div class="header-action">
        <a href="{{ Route('genre.create')}}" class="btn-create">➕ Create New</a>
        <div>👤 {{ Auth::user()->name }}</div>
    </div>
</header>
<h1>🎬 Genre</h1>
<div class="feature-cards-flex">
    @if(request()->query('keyword'))
        <p>Hasil pencarian untuk: <strong>{{ request()->query('keyword') }}</strong> {{ count($genre) }} hasil <a href="{{ route('genre.index') }}">Reset</a></p>
    @endif
    @foreach($genre as $row)
    <div class="feature-card-flex" onclick="window.location.href='{{ route('genre.show', $row->id)}}'">
        <h1>🎬</h1>
        <div>
            <h3>{{ $row->genre_title }}</h3>
            <p>{{ $row->description }}</p>
        </div>
    </div>
    @endforeach
</div>
{{-- <table border="1">
    <thead>
        <th>No</th>
        <th>Title</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($genre as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->genre_title }}</td>
            <td>
                <form action="{{ Route('genre.destroy', $row->id) }}" onsubmit="return confirm('Are You Sure?')" method="post">
                    @csrf
                    <a href="{{ Route('genre.edit', $row->id) }}">Edit</a>
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> --}}
@endsection