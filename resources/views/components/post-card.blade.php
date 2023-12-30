<div class="flex flex-col md:flex-row gap-3 bg-white shadow-md rounded-md">
    <img class="w-full md:w-48 shrink-0 h-auto rounded-t-md md:rounded-l-md"
        src="{{ asset('storage/' . $post->featured_image) }}" alt="">
    <div class="flex flex-col p-1">
        <a href="{{ route('byCategory', $post->category) }}"
            class="text-sky-500 font-medium">{{ $post->category->name }}</a>
        <a href="{{ route('show-blog', $post->slug) }}"
            class="text-gray-900 font-bold text-lg line-clamp-2 md:line-clamp-none">{{ $post->title }}</a>
        <p class="text-gray-500 leading-5 line-clamp-3">{{ $post->meta_desc }}</p>
    </div>
</div>
