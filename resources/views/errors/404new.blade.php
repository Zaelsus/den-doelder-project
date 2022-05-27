<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Error</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="text-center">
    <div class="bg-blue" style="padding-top: 1rem; padding-bottom: 1rem">
        <h1>Error: 404</h1>
        <p>We're looking, we promise!</p>
        <div>
            <img
                src="/img/squirrel.gif"
                style="border-radius: .75rem;
                    border-width: .5rem;
                    border-color: black;
                    border-style: solid"
            >
        </div>
    </div>
    <div style="padding-top: 1rem; padding-bottom: 1rem">
        <p>Our elite search and rescue team of water skiing squirrels are searching for the page you requested.</p>
        <p>Maybe check the URL to help them find the page!</p>
        <a href="{{ route('home') }}"><button class="btn bg-dark align-center">Back To Home</button></a>
    </div>
</div>
</body>

