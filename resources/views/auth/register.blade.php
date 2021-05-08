@extends('layouts.auth')

@section('content')
    <div class="flex justify-center h-screen">
        <div class="w-4/12 bg-white p-6 rounded-lg m-auto">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" placeholder="Your name" name="name"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name')border-red-400 @enderror" value="{{ old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" placeholder="Username" name="username"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username')border-red-400 @enderror" value="{{old('username')}}">
                        @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" placeholder="Email" name="email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email')border-red-400 @enderror" value="{{old('email')}}">
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="text" placeholder="Password" name="password"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password')border-red-400 @enderror">
                        @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="text" placeholder="Repeat password" name="password_confirmation"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg">
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
