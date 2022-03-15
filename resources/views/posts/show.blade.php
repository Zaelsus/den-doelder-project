@extends('common.article')

@section('title', $post->title)

@section('background', $post->img_url)

@section('section')
    <div class="column is-full">
        <h2 class="subtitle">Gepubliceerd op: {{ $post->published_at }}</h2>
        <div class="content">
            {!! $post->body !!}
        </div>
    </div>
@endsection


