@extends('template.main')
@section('title', 'Detail Genre')
@section('content')

<div class="header">
    <div class="header-action">
        <p><a href="{{ route('genre.index') }}">Genre</a> /Detail</p>
    </div>
</div>

<div class="user-detail">
    <div class="user-info">
        <p><strong>Name :</strong> {{ $user->name }}</p>
        <p><strong>Email :</strong> {{ $user->email }}</p>
        <p><strong>Gender :</strong> {{ $user->gender }}</p>
        <p><strong>Role :</strong> {{ $user->role }}</p>
    </div>
</div>

<div style="margin-top:20px;">
    <form action="{{ Route('user.destroy', $user->id) }}" onsubmit="return confirm('Are You Sure?')" method="post">
        @csrf
        <a href="{{ Route('user.edit', $user->id) }}"><button class="btn-show">Edit</button></a>
        @method('DELETE')
        <button type="submit" class="btn-show">Delete</button>
    </form>
</div>

@endsection