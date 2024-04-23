<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    <title>Document</title>
    <link
        rel="stylesheet"
        href="/style.css"
    >
</head>

<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">about</a></li>
        </ul>
    </nav>

    <h1>My Blogs</h1>

    @foreach($blogs as $blog)
    <h1>
        <a href="/blogs/{{$blog->id}}">
            {{$blog->title}}
            @if($blog->title === 'title 1')
            <span>special blog</span>
            @endif
        </a>
    </h1>
    <p>
        {{$blog->body}}
    </p>
    @endforeach

</body>

</html>