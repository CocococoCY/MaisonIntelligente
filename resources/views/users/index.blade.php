@extends('layouts.app')

@section('content')
<style>
    .members-container {
        background-color: rgba(255, 255, 255, 0.92);
        padding: 30px;
        border-radius: 12px;
        max-width: 700px;
        margin: 40px auto;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    .members-container h2 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: bold;
        color: #222;
    }

    .member-item {
        padding: 10px 0;
        border-bottom: 1px solid #ccc;
        font-size: 16px;
    }

    .member-item:last-child {
        border-bottom: none;
    }

    .member-item a {
        color: #007bff;
        text-decoration: none;
    }

    .member-item a:hover {
        text-decoration: underline;
    }
</style>

<div class="members-container">
    <h2>👥 Liste des membres</h2>

        @foreach ($users as $user)
        <div>
            <a href="{{ route('users.show', $user->id) }}">
                {{ $user->name }} ({{ $user->niveau ?? 'type inconnu' }})
            </a>
        </div>
        @endforeach

</div>
@endsection
