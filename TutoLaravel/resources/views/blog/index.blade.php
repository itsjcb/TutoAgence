@extends('base')

@section('title', 'Accueil du blog')
@section('content')
    <h1>Mon Blog</h1>
    @foreach($posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <P>
                {{ $post->content }}
            </P>
            <P>
                <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}" class="btn btn-primary">Lire la suite</a>
            </P>
        </article>
    @endforeach

    {{ $posts->links() }}
@endsection

