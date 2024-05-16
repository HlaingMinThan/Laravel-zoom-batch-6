<x-layout :title="$blog->title">
    <h1>
        {{$blog->title}}
    </h1>
    <p>
        {{$blog->body}}
    </p>

    {{-- comments --}}
    <div>


        {{-- comment input --}}
        <h1 class="text-3xl font-bold my-3">
            Comments
            {{-- d blog ko subscribe m loke htar yin --}}
            <form
                action="/blogs/{{$blog->slug}}/handle-subscription"
                method="POST"
            >
                @csrf
                @if (!auth()->user()->isSubscribed($blog))
                <button
                    type="submit"
                    class="bg-yellow-500 px-2 py-1 text-sm text-white rounded-md"
                >Subscribe</button>
                @else
                <button
                    type="submit"
                    class="bg-red-500 px-2 py-1 text-sm text-white rounded-md"
                >Unsubscribe</button>
                @endif
            </form>
        </h1>
        <form
            action="/blogs/{{$blog->slug}}/comments"
            method="POST"
        >
            @csrf
            <textarea
                class="shadow-md border border-2 p-3 w-full my-3"
                id=""
                cols="30"
                rows="10"
                name="body"
            ></textarea>
            @error('body')
            <p class="text-xs my-2 text-red-500">{{$message}}</p>
            @enderror
            <button
                type="submit"
                class="bg-indigo-500 px-2 py-1 text-sm text-white rounded-md"
            >Comment</button>
        </form>
        @php
        $comments = $blog->comments()->latest()->paginate(2);
        @endphp
        <div>
            @foreach ($comments as $comment)
            <div class="shadow-md border border-2 p-3 w-full my-3">
                <div>
                    <span class="text-2xl font-bold">{{$comment->author->name}}</span>
                    <span class="text-sm text-gray-500">
                        {{$comment->created_at->diffForHumans()}}</span>
                </div>
                <p class="my-3">{{$comment->body}}</p>
            </div>
            @endforeach
            {{-- design --}}
            {{$comments->links()}}
        </div>
    </div>
</x-layout>