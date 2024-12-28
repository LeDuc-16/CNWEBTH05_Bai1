@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea id="bio" name="bio">{{ $user->bio }}</textarea>
        </div>

        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input id="avatar" name="avatar" type="file">
        </div>

        <button type="submit">Save</button>
    </form>
</div>
@endsection
