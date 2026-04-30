@extends('template.main')
@section('title', 'User')
@section('content')
<header class="header">
    <div class="header-action">
        <p><a href="{{ Route('user.index')}}">User </a>/ Edit</p>
    </div>
</header>
<h1>Edit | User</h1>
<form action="{{ Route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" class="form-input" value="{{ $user->name }}">
        @error('name')
            <p style="color: red">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" class="form-input" value="{{ $user->email }}">
        @error('email')
            <p style="color: red">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="gender">Gender : </label>
        <label for="male">
            <input type="radio" name="gender" id="male" value="male" checked>
            Male
        </label>
        <label for="female">
            <input type="radio" name="gender" id="female" value="female">
            Female
        </label>
    </div>
    <button type="submit" class="btn-login">Save Data</button>
</form>
@endsection