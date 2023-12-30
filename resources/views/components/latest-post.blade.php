<div class="flex flex-col gap-4 mb-8">
    @foreach ($posts as $post)
        <div class="flex gap-2 bg-white shadow-md rounded">
            <img class="w-24 shrink-0 h-auto rounded-l" src="{{ asset('storage/' . $post->featured_image) }}"
                alt="">
            <div class="flex flex-col px-1 pb-1">
                <a href="{{ route('byCategory', $post->category) }}"
                    class="text-sky-500 text-sm w-fit line-clamp-1">{{ $post->category->name }}</a>
                <a href="{{ route('show-blog', $post->slug) }}"
                    class="text-black leading-4 line-clamp-2">{{ $post->title }}</a>
            </div>
        </div>
    @endforeach
</div>
