@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="bg-white p-6 rounded-lg mb-6">
                <img src="/uploads/avatars/{{ auth()->user()->avatar }}" alt="test">
            </div>

            <div class="bg-white p-6 rounded-lg">
                <form action="{{ route('profile.update', auth()->user()) }}" method="post" enctype="multipart/form-data">
                    @csrf         
                    <div class="mb-4">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" placeholder="Your name" name="name"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name')border-red-400 @enderror"
                            value="{{ $data['name'] }}">

                        @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
       
                    <input type="submit" value="Save" class="bg-blue-500 text-white px-4 py-3 rounded">
                </form>
            </div>
        </div>
    </div>
@endsection
