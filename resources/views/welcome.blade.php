@extends('layout')

@section('title', config('app.name'))

@section('body_content')

    @if (!request()->category)



        <div class="relative mb-6">
            <a href="{{ route('show-blog', $latestPost->slug) }}">
                <img class="rounded-md shadow-md" src="{{ asset('storage/' . $latestPost->featured_image) }}" alt="">
            </a>

            <div
                class="absolute bottom-0 left-0 right-0 pt-0.5 px-2 pb-2 bg-white bg-clip-padding backdrop-filter backdrop-blur bg-opacity-30 rounded-b-md">
                <div class="hidden md:flex justify-between mb-1">
                    <ul class="flex flex-wrap gap-x-1 text-sm text-blue-700 font-medium">
                        @foreach (explode(',', $latestPost->tags) as $tag)
                            <li>#{{ $tag }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('landingPage', ['category' => $latestPost->category_id]) }}"
                        class="text-yellow-300 drop-shadow text-sm font-medium">{{ $latestPost->category->name }}</a>
                </div>
                <a href="{{ route('show-blog', $latestPost->slug) }}"
                    class="text-xl text-white drop-shadow leading-5 line-clamp-2 md:line-clamp-none">{{ $latestPost->title }}</a>
            </div>
        </div>

    @endif
    <div class="mb-3 flex flex-col gap-4">

        @forelse ($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <div>
                <x-error-404 />
            </div>
        @endforelse
    </div>
    {{ $posts->links() }}
@endsection
