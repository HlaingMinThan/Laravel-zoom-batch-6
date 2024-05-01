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
    @forelse($blogs as $blog)
    <h1>
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
    <p>category - {{$blog->category->name}}</p>
    <p>Author - {{$blog->user->name}}</p>
    @empty
    <p>no results found.</p>
    @endforelse
    {{$blogs->links()}}

</x-layout>