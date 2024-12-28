@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $user->name }}'s Profile</h2>
    @if($user->avatar)
        <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" style="width: 150px;">
    @endif
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Bio:</strong> {{ $user->bio }}</p>
</div>
@endsection
