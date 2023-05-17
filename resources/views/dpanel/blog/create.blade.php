@extends('dpanel.layouts.app')

@section('title', 'New Blog')

@push('scripts')
    <script>
        const updateType = (e) => {
            let element = e.parentElement.nextElementSibling.querySelector('input');
            if (e.value == 'image' || e.value == 'imageL' || e.value == 'imageR') {
                element.type = 'file';
                element.name = 'content_file[]';
            } else {
                element.type = 'text';
                element.name = 'content[]';
            }
        }

        const addMore = (e) => {
            let html = `<div class="flex gap-3"><div>
                            <label>Content Type <span class="text-red-500 font-bold">*</span></label>
                            <select onchange="updateType(this)" name="type[]" required
                                class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                                <option value="">select</option>
                                <option value="text">Text</option>
                                <option value="left">Left Chat</option>
                                <option value="right">Right Chat</option>
                                <option value="image">Image</option>
                                <option value="imageL">Image Left</option>
                                <option value="imageR">Image Right</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label>Content <span class="text-red-500 font-bold">*</span></label>
                            <input type="text" name="content[]" required placeholder="Write something..."
                                class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                        </div>
                        <div class="shrink-0 flex items-end">
                            <button type="button" onclick="addMore(this)" class="bg-indigo-500 text-white text-center px-2 py-1 rounded">Add More</button>
                        </div>
                    </div>`;
            e.parentElement.parentElement.parentElement.lastElementChild.insertAdjacentHTML("afterend", html)
            e.parentElement.innerHTML =
                `<button type="button" onclick="remove(this)" class="bg-red-500 text-center text-white px-2 py-1 rounded">Remove</button>`;
        }

        const remove = (e) => e.parentElement.parentElement.remove();
    </script>
@endpush

@section('body_content')

    <div class="flex justify-between items-center bg-gray-800 rounded py-1 mb-3 text-white">
        <h1 class="font-medium px-2">New Blog</h1>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 text-red-500 p-2 mb-3 border border-red-400 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route(config('dpanel.prefix') . '.blog.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-2">
            <div>
                <label>Category <span class="text-red-500 font-bold">*</span></label>
                <select name="category_id" required
                    class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                    <option value="">select</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" @selected($item->id == old('category_id'))>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Title <span class="text-red-500 font-bold">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" maxlength="150" required
                    placeholder="Enter blog title"
                    class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
            </div>
            <div>
                <label>Featured Image <span class="text-red-500 font-bold">*</span></label>
                <input type="file" name="featured_image" required
                    class="w-full bg-transparent border border-gray-500 rounded px-2 focus:outline-none">
            </div>

            <div class="md:col-span-3">
                <label>Tags <span class="text-red-500 font-bold">*</span></label>
                <input type="text" name="tags" value="{{ old('tags') }}" maxlength="150" required
                    placeholder="Enter comma separated tags e.g. WhatsApp, Facebook"
                    class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
            </div>

            {{-- <div>
                <label>Schedule Date Time</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"
                    placeholder="Enter blog title"
                    class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
            </div> --}}
        </div>

        <div class="mb-2">
            <label>Meta Description <span class="text-red-500 font-bold">*</span></label>
            <input type="text" name="meta_desc" value="{{ old('meta_desc') }}" maxlength="150" required
                placeholder="Enter meta description"
                class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
        </div>

        <div id="contentContainer" class="mb-3 flex flex-col gap-2">

            <div class="flex gap-3">
                <div>
                    <label>Content Type <span class="text-red-500 font-bold">*</span></label>
                    <select onchange="updateType(this)" name="type[]" required
                        class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                        <option value="">select</option>
                        <option value="text">Text</option>
                        <option value="left">Left Chat</option>
                        <option value="right">Right Chat</option>
                        <option value="image">Image</option>
                        <option value="imageL">Image Left</option>
                        <option value="imageR">Image Right</option>
                    </select>
                </div>
                <div class="w-full">
                    <label>Content <span class="text-red-500 font-bold">*</span></label>
                    <input type="text" name="content[]" required placeholder="Write something..."
                        class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                </div>
                <div class="shrink-0 flex items-end">
                    <button type="button" onclick="addMore(this)"
                        class="bg-indigo-500 text-center px-2 text-white py-1 rounded">Add
                        More</button>
                </div>
            </div>

        </div>

        <div class="flex justify-between gap-3">
            <button class="bg-indigo-500 text-center text-white font-medium w-full py-1 rounded shadow-md">Save</button>
            <input type="submit" name="draft"
                class="bg-indigo-500 text-center text-white cursor-pointer font-medium w-full py-1 rounded shadow-md"
                value="Save as Draft" />
        </div>
    </form>

@endsection
