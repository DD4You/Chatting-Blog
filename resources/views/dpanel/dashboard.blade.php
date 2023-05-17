@extends('dpanel.layouts.app')

@section('title', 'Dashboard')

@section('body_content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="bg-white rounded-md flex shadow-lg w-full overflow-hidden">
            <span class="p-3 bg-violet-500 flex items-center">
                <i class='bx bx-message-alt-detail text-3xl text-white'></i>
            </span>
            <div class="p-3">
                <p class="font-medium">Total Category</p>
                <small class="text-gray-400">{{ $total['category'] }}</small>
            </div>
        </div>

        <div class="bg-white rounded-md flex shadow-lg w-full overflow-hidden">
            <span class="p-3 bg-yellow-500 flex items-center">
                <i class='bx bx-message-alt-detail text-3xl text-white'></i>
            </span>
            <div class="p-3">
                <p class="font-medium">Total Blog</p>
                <small class="text-gray-400">{{ $total['blog'] }}</small>
            </div>
        </div>

    </div>

@endsection
