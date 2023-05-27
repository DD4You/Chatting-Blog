<div class="mb-8 flex flex-col gap-2">
    @foreach ($categories as $item)
        <div class="flex items-center gap-1 pl-2">
            <i class="bx bxs-hand-right text-blue-500"></i>
            <a href="{{ route('landingPage', ['category' => $item->id]) }}">{{ $item->name }}</a>
        </div>
    @endforeach
</div>
