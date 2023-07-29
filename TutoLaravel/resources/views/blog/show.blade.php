@extends('base')

@section('title', '$post->title')

@section('content')
    <h1>Mon Blog</h1>
        <article>
            <h1>{{ $post->title }}</h1>
            <P>
                {{ $post->content }}
            </P>
        </article>
@endsection

