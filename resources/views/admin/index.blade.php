<x-admin-layout>
    <h1 class="text-3xl text-bold my-3">Blog lists</h1>
    <!-- component -->
    <table class="border-collapse w-full">
        <thead>
            <tr>
                <th
                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Blog title</th>
                <th
                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Blog slug</th>
                <th
                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr
                class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                <td
                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    {{$blog->title}}
                </td>
                <td
                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    {{$blog->slug}}
                </td>
                <td
                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span
                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                    <a
                        href="/admin/blogs/{{$blog->id}}/edit"
                        class="text-blue-400 hover:text-blue-600 underline"
                    >Edit</a>

                    <form
                        action="/admin/blogs/{{$blog->id}}/delete"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="text-white bg-red-500 rounded-lg px-2 py-1"
                        >
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-3">
        {{$blogs->links()}}
    </div>
</x-admin-layout>