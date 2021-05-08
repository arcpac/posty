@props(['p' => $p])
<div class="mb-4">
    <a href="{{ route('users.posts', $p->user) }}" class="font-bold">{{ $p->user->username }}</a>
    <a href="{{ route('posts.show', $p) }}">
        <span class="text-gray-600 text-sm">{{ $p->created_at->diffForHumans() }}</span>
    </a>
    <p class="mb-2">{{ $p->body }}</p>

    @can('delete', $p)
        <form action="{{ route('posts.destroy', $p) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan

    <div class="flex items-center">
        @auth
            @if (!$p->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $p) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $p) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE') {{-- method spoofing --}}
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif

        @endauth

        <span>{{ $p->likes->count() }} {{ Str::plural('like', $p->likes->count()) }} </span>
    </div>
</div>

