@extends('layouts.app')

@section('content')
    <section class="hero is-small is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-2">Drawings</h1>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div>
                        <img src="http://loremflickr.com/800/600?lock=1" width="300px">
                        <img src="http://loremflickr.com/800/600?lock=69" width="300px">
                        <img src="http://loremflickr.com/800/600?lock=420" width="300px">
                    </div>
                    <br>
                    <div>
                        <p>
                            pizza: yes
                        </p>
                        <p>
                            pizza: yes
                        </p>
                        <p>
                            pizza: yes
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
