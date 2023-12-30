@extends('dpanel.layouts.app')

@section('title', 'Blogs')

@section('body_content')

    <div class="flex justify-between items-center bg-gray-800 rounded mb-3 text-white">
        <h1 class="font-medium px-2">Blogs</h1>
        <a href="{{ route(config('dpanel.prefix') . '.blog.create') }}" class="bg-violet-500 rounded-r px-2 py-1">New Blog</a>
    </div>

    <x-dpanel::table>
        <x-slot:thead>
            <tr>
                <th scope="col" class="pl-3 py-3 text-left w-12">
                    #
                </th>
                <th scope="col" class="pl-3 py-3 text-left font-medium tracking-wider">
                    Category
                </th>
                <th scope="col" class="pl-3 py-3 text-left font-medium tracking-wider">
                    Title
                </th>
                <th scope="col" class="pl-3 py-3 text-left font-medium tracking-wider">
                    action
                </th>

            </tr>
        </x-slot:thead>
        <x-slot:tbody>
            @foreach ($blogs as $item)
                <tr>
                    <td class="pl-3 py-2">
                        {{ $blogs->perPage() * ($blogs->currentPage() - 1) + $loop->iteration }}
                    </td>
                    <td class="pl-3 py-2">
                        {{ $item->category->name }}
                    </td>
                    <td class="px-4 py-2">
                        {{ $item->title }}
                    </td>
                    <td class="px-4 py-2 flex justify-center items-center">
                        <a href="{{ route(config('dpanel.prefix') . '.blog.edit', $item) }}"
                            class="ml-1 text-blue-500 bg-blue-100 focus:outline-none border border-blue-500 rounded-full w-6 h-6 flex justify-center items-center">
                            <i class="bx bx-edit"></i>
                        </a>
                        <form action="{{ route(config('dpanel.prefix') . '.blog.destroy', $item) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">
                                <i class='bx bx-trash text-2xl'></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-slot:tbody>

        <x-slot:pagination>
            {{ $blogs->links() }}
        </x-slot:pagination>
    </x-dpanel::table>


@endsection
