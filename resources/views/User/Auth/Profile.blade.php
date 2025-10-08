@extends('layout.user')

@section('content')
@if(Auth::check())
    <div class="profile-container">
        <h2>Welcome, {{ Auth::user()->name }}</h2>
        <p>Email: {{ Auth::user()->email }}</p>
        <p>Joined: {{ Auth::user()->created_at->format('F j, Y') }}</p>

        <form method="POST" action="{{ route('user.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    <div class="container">
        <h1>Notification Panel</h1>
        <ul>
            @foreach(auth()->user()->notifications()->latest()->get() as $note)
            <li>{{ $note->message }} <small>{{ $note->created_at->diffForHumans() }}</small></li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
