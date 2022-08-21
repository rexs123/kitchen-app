@section('title', "Login")
@extends('layouts.auth')
@section('content')
    <div class="w-1/3 p-4">
        <h1 class="my-3 text-xl font-bold">
            Login
            <small class="block font-normal text-sm">
                Welcome back!
            </small>
        </h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            @method('post')
            <div class="my-3">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Email Address"
                    required
                    autofocus
                    class="block mt-1 w-full border border-gray-400 p-1"
                >
            </div>
            <div class="my-3">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Your password"
                    required
                    autocomplete="current-password"
                    class="block mt-1 w-full border border-gray-400 p-1">
            </div>
            <div class="my-3">
                <label for="remember_me">
                    <input type="checkbox" name="remember" id="remember_me">
                    Stay logged in?
                </label>
            </div>
            <div class="my-3">
                <button class="border border-gray-500 px-4 py-2">Login</button>
            </div>
        </form>
        <div class="my-3">
            <a href="{{ route('password.email') }}">Forgot your password?</a>
        </div>
    </div>
@endsection
