@section('title', "Forgot Password?")
@extends('layouts.auth')
@section('content')
    <div class="w-1/3 p-4">
        <h1 class="my-3 text-xl font-bold">
            Forgot your password?
            <small class="block font-normal text-sm">
               No worries, we gotcha.
            </small>
        </h1>
        <form action="{{ route('password.email') }}" method="post">
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
                <button class="border border-gray-500 px-4 py-2">Email Password Reset Link</button>
            </div>
        </form>
        <div class="my-3">
            <a href="{{ route('login') }}">Remembered your password?</a>
        </div>
    </div>
@endsection
