@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-slate-800 mb-4">Edit Profile</h1>

        <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use o método PUT para atualizar o perfil do usuário -->

            <div class="mb-4">
                <label for="name" class="block text-slate-800 text-sm font-semibold mb-2">Name</label>
                <input type="text" name="name" id="name" class="input" value="{{ $user->name }}">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-slate-800 text-sm font-semibold mb-2">Email</label>
                <input type="email" name="email" id="email" class="input" value="{{ $user->email }}">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-slate-800 text-sm font-semibold mb-2">Password</label>
                <input type="password" name="password" id="password" class="input">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-slate-800 text-sm font-semibold mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input">
            </div>

            <div class="flex items-center space-x-4 mt-4">
                <button type="submit" class="btn">Update Profile</button>
            </div>
        </form>
    </div>
@endsection
