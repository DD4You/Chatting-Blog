@extends('layout')

@section('title', $blog->title)

@section('body_content')
    <h1 class="mb-4 text-xl text-black font-medium">{{ $blog->title }}</h1>

    <div class="grid grid-cols-1 gap-2 bg-[#ece5dd] rounded p-2"
        style="background-image: url('{{ asset('whatsapp-background-pattern.png') }}'); background-size: cover;">
        @foreach (json_decode($blog->content) as $item)
            @if ($item->type == 'text')
                <x-chat.center content="{{ $item->data }}" />
            @elseif ($item->type == 'left')
                <x-chat.left content="{{ $item->data }}" />
            @elseif ($item->type == 'right')
                <x-chat.right content="{{ $item->data }}" />
            @elseif ($item->type == 'image')
                <x-chat.image content="{{ $item->data }}" />
            @elseif ($item->type == 'imageL')
                <x-chat.left-image content="{{ $item->data }}" />
            @elseif ($item->type == 'imageR')
                <x-chat.right-image content="{{ $item->data }}" />
            @endif
        @endforeach
    </div>
@endsection
