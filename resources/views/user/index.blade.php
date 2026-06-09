@extends('template.main')
@section('title', 'User')
@section('content')
<header class="header">
    <div class="search-bar">
        <form action="{{ route('user.index') }}" method="GET">
            @csrf
            <input type="text" name="keyword" placeholder="Cari Data">
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
<h1>👤 User</h1>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @if(request()->query('keyword'))
            <p>Hasil pencarian untuk: <strong>{{ request()->query('keyword') }}</strong> {{ count($user) }} hasil <a href="{{ route('user.index') }}">Reset</a></p>
        @endif
        @foreach($user as $rowUser)
        <tr onclick="window.location.href='{{ route('user.show', $rowUser->id)}}'">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $rowUser->name }}</td>
            <td>{{ $rowUser->email }}</td>
            <td>{{ $rowUser->role }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
{{-- <div class="feature-cards-flex">
    @if(request()->query('keyword'))
        <p>Hasil pencarian untuk: <strong>{{ request()->query('keyword') }}</strong> {{ count($user) }} hasil <a href="{{ route('user.index') }}">Reset</a></p>
    @endif
    @foreach($user as $rowUser)
    <div class="feature-card-flex" onclick="window.location.href='{{ route('user.show', $rowUser->id)}}'">
        <h1>👤</h1>
        <div>
            <h3>{{ $rowUser->name }}</h3>
            <p>{{ $rowUser->email }} | {{$rowUser->role}}</p>
        </div>
    </div>
    @endforeach
</div> --}}