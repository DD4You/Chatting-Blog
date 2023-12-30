@extends('layout')

@section('title', $data['label'] . '-' . config('app.name'))

@section('body_content')
    <h2 class="text-3xl font-bold text-gray-900 text-center uppercase">
        {{ $data['label'] }}</h2>
    <hr>
    <div class="text-gray-700 mt-6 p-4 text-lg">
        {!! $data['value'] !!}
    </div>
@endsection
