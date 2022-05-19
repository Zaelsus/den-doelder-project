@extends('layouts.error_pages')

@section('content')
    <div div class="text-center">
    <h1>Server Error (500)</h1>
    <div style="padding-bottom: 0.5rem" class="text-center">
        <img
            src="/img/sad-smiley.jpg"
            style=
            "width: 300px;
                height: 300px"
            alt="sad smiley face"
        >
    </div>
    <div style="padding-top: 5rem">
        <h5>Sorry, we had some technical problems during your last operation. Our team is figuring it out and it will be back online
            as soon as possible. Please try again later.</h5>
        <a href="{{ route('home') }}">
            <button class="btn bg-dark align-center">Back To Home</button>
        </a>
    </div>
    </div>
@endsection
