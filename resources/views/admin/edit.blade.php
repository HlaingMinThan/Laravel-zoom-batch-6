<x-admin-layout>
    <h1 class="font-bold my-3 text-3xl">Blogs Edit</h1>
    <form
        enctype="multipart/form-data"
        action="/admin/blogs/{{$blog->id}}/update"
        method="POST"
    >
        @csrf
        @method('PUT')
        <div>
            <label
                for="photo"
                class="block text-sm font-medium leading-6 text-gray-900"
            >Blog Photo</label>
            <img
                width="200"
                height="200"
                src="/storage{{$blog->photo}}"
                alt=""
            >
            <div class="relative mt-2 rounded-md shadow-sm">
                <input
                    value="{{old('photo')}}"
                    type="file"
                    name="photo"
                    id="photo"
                    class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
            </div>
            @error('photo')
            <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label
                for="title"
                class="block text-sm font-medium leading-6 text-gray-900"
            >Blog title</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input
                    value="{{old('title',$blog->title)}}"
                    type="text"
                    name="title"
                    id="title"
                    class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
            </div>
            @error('title')
            <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label
                for="slug"
                class="block text-sm font-medium leading-6 text-gray-900"
            >Blog slug</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input
                    value="{{old('slug',$blog->title)}}"
                    type="text"
                    name="slug"
                    id="slug"
                    class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
            </div>
            @error('slug')
            <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label
                for="body"
                class="block text-sm font-medium leading-6 text-gray-900"
            >Blog body</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <textarea
                    class="w-full border border-b-2"
                    name="body"
                    id=""
                    cols="30"
                    rows="10"
                >{{old('body',$blog->body)}}</textarea>
            </div>
            @error('body')
            <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <select
                class="p-2 w-full border border-2 my-2 rounded-lg"
                name="category_id"
                id=""
            >
                @foreach ($categories as $category)
                <option {{$category->id == old('category_id',$blog->category_id) ? 'selected' : '' }}
                    value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <button
                type="submit"
                class="bg-indigo-500 px-2 py-1 w-full rounded-lg text-white"
            >
                Update</button>
        </div>
    </form>

</x-admin-layout>