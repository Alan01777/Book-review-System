@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 bg-white rounded-lg shadow-md"">
        <div class="text-xl font-bold text-slate-800 mb-4">
            <p><strong>Name:</strong> {{ $user->name }}</p>
        </div>

        <div class="text-xl font-bold text-slate-800 mb-4">
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <div class="text-xl font-bold text-slate-600 mb-4">
            <p><strong>Created:</strong> {{ $user->created_at->diffForHumans() }}</p>
        </div>

        <div class="text-xl font-bold text-slate-600 mb-4">
            <p><strong>Updated:</strong> {{ $user->updated_at->diffForHumans() }}</p>
        </div>

        <div class="flex items-center space-x-4 mt-4">
            <div>
                <a class="btn" href="{{ route('users.edit', ['user' => $user->id]) }}">Edit Profile</a>
            </div>

            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn"
                    onclick="return confirm('Tem certeza de que deseja excluir este usuário?')">
                    Delete User
                </button>
            </form>
        </div>
    </div>
@endsection
