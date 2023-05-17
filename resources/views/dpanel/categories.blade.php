@extends('dpanel.layouts.app')

@section('title', 'Dashboard')

@push('scripts')
    <script>
        const editCategory = (id, name) => {
            document.getElementById('edit-form').action = `${window.location.href}/${id}`
            document.getElementById('category-name').value = name;
            showBottomSheet('editBottomSheet');
        }
    </script>
@endpush

@section('body_content')

    <div class="flex justify-between items-center bg-gray-800 rounded mb-3 text-white">
        <h1 class="font-medium px-2">Category</h1>
        <button onclick="showBottomSheet('bottomSheet')" class="bg-violet-500 rounded-r px-2 py-1">New Category</button>
    </div>

    <x-dpanel::table>
        <x-slot:thead>
            <tr>
                <th scope="col" class="pl-3 py-3 text-left w-12">
                    #
                </th>
                <th scope="col" class="pl-3 py-3 text-left font-medium tracking-wider">
                    name
                </th>
                <th scope="col" class="pl-3 py-2 text-center font-medium tracking-wider">
                    action
                </th>

            </tr>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($categories as $item)
                <tr>
                    <td class="pl-3 py-2">
                        {{ $categories->perPage() * ($categories->currentPage() - 1) + $loop->iteration }}
                    </td>
                    <td class="pl-3 py-2">
                        {{ $item->name }}
                    </td>
                    <td class="px-4 py-2 flex justify-center">
                        <button onclick="editCategory('{{ $item->id }}', '{{ $item->name }}')"
                            class="ml-1 text-blue-500 bg-blue-100 focus:outline-none border border-blue-500 rounded-full w-6 h-6 flex justify-center items-center">
                            <i class="bx bx-edit"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </x-slot:tbody>

        <x-slot:pagination>

        </x-slot:pagination>

    </x-dpanel::table>

    <x-dpanel::modal.bottom-sheet sheetId="bottomSheet" title="New Category">
        <div class="flex justify-center items-center min-h-[30vh] md:min-h-[50vh]">

            <form method="POST" action="{{ route(config('dpanel.prefix') . '.category.store') }}">
                @csrf

                <div class="mb-3">
                    <label>Category Name</label>
                    <input type="text" name="name" placeholder="Enter Category Name" required
                        class="w-full px-2 bg-transparent
                     border rounded focus:outline-none">
                </div>

                <button class="bg-violet-500 px-2 py-1 rounded w-full text-center text-white">Save</button>

            </form>

        </div>
    </x-dpanel::modal.bottom-sheet>

    <x-dpanel::modal.bottom-sheet sheetId="editBottomSheet" title="Edit Category">
        <div class="flex justify-center items-center min-h-[30vh] md:min-h-[50vh]">

            <form method="POST" id="edit-form" action="">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Category Name</label>
                    <input type="text" id="category-name" name="name" placeholder="Enter Category Name" required
                        class="w-full px-2 bg-transparent
                     border rounded focus:outline-none">
                </div>

                <button class="bg-violet-500 px-2 py-1 rounded w-full text-center text-white">Update</button>

            </form>

        </div>
    </x-dpanel::modal.bottom-sheet>

    <x-dpanel::modal.bottom-sheet-js hideOnClickOutside="true" />
@endsection
