@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen">
    <form action="{{ route('users.auth') }}" method="POST" class="bg-white p-8 rounded shadow-md w-80">
        @csrf
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Login</h1>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" class="input-login">
        </div>

        <div class="mb-4">
            <label for "password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" name="password" id="password" class="input-login">
        </div>

        <div class="mb-4">
            <button type="submit" class="btn">Login</button>
        </div>
        <div>
            <a href="{{ route('users.create') }}" class="reset-link">Not registered yet?</a>
        </div>
    </form>
</div>
@endsection
