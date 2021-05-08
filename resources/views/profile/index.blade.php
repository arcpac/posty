@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="bg-white p-6 rounded-lg mb-6">
                <img src="/uploads/avatars/{{ auth()->user()->avatar }}" alt="test">
            </div>
            <div class="bg-white p-6 rounded-lg">
                <div class="mb-4">
                    <a href="{{ route('profile.details', auth()->user()) }}" class="text-blue-500">Edit profile
                        details</a>
                </div>
                <div class="mb-4">
                    <a href="{{ route('profile.credentials', auth()->user()) }}" class="text-blue-500">Change credentials</a>
                </div>

            </div>
        </div>
    </div>
@endsection
