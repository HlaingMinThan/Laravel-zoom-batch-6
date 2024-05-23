<x-layout title="Home">
    <form action="/">
        <input
            value="{{request('query')}}"
            name="query"
            type="text"
            class="my-3 border border-2 px-2 py-1 rounded-2xl"
            placeholder="search here"
        >
        <button
            type="submit"
            class="bg-indigo-500 px-2 py-1 rounded-lg text-white"
        >Search</button>
    </form>
    <form action="">
        @if (request('query'))
        <input
            name="query"
            type="hidden"
            value="{{request('query')}}"
        >
        @endif
        <label for="">Category Filter</label>
        <select
            name="category_id"
            id=""
            class="border-2 px-2 py-2 rounded-lg"
        >
            @foreach ($categories as $category)
            <option {{$category->id == request('category_id') ? 'selected' : ''}}
                value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <label for="">User Filter</label>
        <select
            name="user_id"
            id=""
            class="border-2 px-2 py-2 rounded-lg"
        >
            @foreach ($users as $user)
            <option {{$user->id == request('user_id') ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        <button
            type="submit"
            class="bg-indigo-500 px-2 py-1 text-white rounded-lg my-3"
        >Filter</button>
    </form>
    <div class="grid grid-cols-3 space-x-2">
        @forelse($blogs as $blog)
        <div class="shadow-md border-2 border-gray-100 p-3">
            <img
                src="/storage{{$blog->photo}}"
                alt=""
            >
            <h1 class="text-2xl font-bold mb-3">
                <a href="/blogs/{{$blog->slug}}">
                    {{$blog->title}}
                    @if($blog->title === 'title 1')
                    <span>special blog</span>
                    @endif
                </a>
            </h1>
            <p>
                {{$blog->body}}
            </p>
            <p class="mt-3">category - {{$blog->category->name}}</p>
            <p>Author - {{$blog->user->name}}</p>
        </div>
        @empty
        <p>no results found.</p>
        @endforelse
    </div>

    {{$blogs->links()}}

</x-layout>