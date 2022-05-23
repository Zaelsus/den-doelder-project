@extends('layouts.error_pages')

@section('content')
    <div class="text-center">
        <h1 style="padding-bottom: 0.5rem;
            color: red">Page not found (404)</h1>
        <div>
            <img
                src="/img/sad-smiley.jpg"
                style=
                "width: 300px;
                height: 300px"
                alt="sad smiley face"
            >
        </div>

        <div style="padding-top: 5rem">
            <h5>We can't seem to find the page you were looking for, please check if you have entered a correct URL.
                Otherwise, please go back to the Home Page and try again later, we will try to fix the issue as soon as possible.</h5>
            <a href="{{ route('home') }}">
                <button class="btn bg-dark align-center">Back To Home</button>
            </a>
        </div>
    </div>

@endsection
