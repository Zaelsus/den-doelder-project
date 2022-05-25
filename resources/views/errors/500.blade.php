<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>500 Error</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="text-center">
        <div class="bg-blue" style="padding-top: 1rem; padding-bottom: 1rem">
            <h1>Error: 500</h1>
            <p>We're having a rough time right now, maybe check back later.</p>
            <div>
                <img
                    src="/img/squirrel2.gif"
                    style="border-radius: .75rem;
                    border-width: .5rem;
                    border-color: black;
                    border-style: solid"
                >
            </div>
        </div>
        <div style="padding-top: 1rem; padding-bottom: 1rem">
            <h2>Don't worry, this one's on us!</h2>
            <p>Our server had an internal error and threw a fit. We don't know much more.</p>
            <a href="{{ route('home') }}"><button class="btn bg-dark align-center">Back To Home</button></a>
        </div>
    </div>
</body>
