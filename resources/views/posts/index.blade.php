@extends('common.minimal')

@section('title', 'Blog')

@section('subtitle', 'Het laatste nieuws over mijn studie')

@section('section')
    <div class="column is-full">
        <div class="has-text-right">
            <a href="{{ route('posts.create') }}" class="button is-primary">Nieuw artikel toevoegen...</a>
        </div>
        @foreach($posts as $post)
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-128x128">
                                <img src="{{$post->img_url}}" alt="Article image">
                            </figure>
                        </div>
                        <div class="media-content">
                            <p class="title is-4"><a class="title is-12" href="{{ route('posts.show', $post) }}">{{$post->title}}</a></p>
                        </div>
                    </div>
                    <div class="content">
                        <p>{{$post->excerpt}}</p>
                    </div>
                    <div class="has-text-centered">
                        <a href="/posts/{{$post->id}}" class="button is-primary">Lees meer...</a>
                    </div>
                </div>
                <footer class="card-footer">
                    <p class="card-footer-item">Gepubliceerd op: {{ $post->published_at }}</p>
                </footer>
            </div>
        @endforeach
    </div>
@endsection
