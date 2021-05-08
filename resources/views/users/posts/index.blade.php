@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="bg-white p-6 rounded-lg mb-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->username }}</h1>
                <p>{{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes()->count() }} {{ Str::plural('like', $user->receivedLikes()->count()) }} </p>
            </div>

            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $p)
                        <x-post :p="$p" />
                    @endforeach
                @else
                    <p> {{ $user->username }} has not posted anything.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
