@extends('layouts.app')

@section('content')
    <section class="hero is-small is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-2">{{ $pallet->name }} Details</h1>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div>
                        <img src="{{ $pallet->general_images }}" width="300px">
                        <img src="{{ $pallet->detailed_images }}" width="300px">
                    </div>
                    <br>
                    <div>
                        <h3>Pallet Details</h3>
                        <ul style="padding: 0; margin: 0;">
                            <li class="list_no_bullets" style="list-style: none">
                                <strong>Pallet Number:</strong>
                                {{ $pallet->pallet_number }}
                            </li>
                            <li class="list_no_bullets" style="list-style: none">
                                <strong>Dimensions:</strong>
                                {{ $pallet->measurements }}
                            </li>
                            <li class="list_no_bullets" style="list-style: none">
                                <strong>Classification:</strong>
                                {{ $pallet->classification }}
                            </li>
                            <li class="list_no_bullets" style="list-style: none">
                                <strong>Treatments:</strong>
                                {{ $pallet->treatments }}
                            </li>
                            <li class="list_no_bullets" style="list-style: none">
                                <strong>Materials:</strong>
                                {{ $pallet->details_materialen }}
                            </li>
                            <li class="list_no_bullets" style="list-style: none">
                                <strong>Wood Details:</strong>
                                {{ $pallet->details_nieuw_hout }}
                            </li>
                            <br>
                        </ul>
                        <h3>Specifications</h3>
                        <p><strong>Order-specific Notes:</strong>
                        {{ $pallet->details_specifieke_bladnotities }}</p>
                        <h2>Componenten</h2>
                        <ul style="padding: 0; margin: 0;">
                            <li class="list_no_bullets" style="list-style: none">
                                <h4>Bovendek</h4>
                                {{ $pallet->details_components_bovendek }}
                            </li>
                            <li class="list_no_bullets" style="list-style: none">
                                <h4>Onderdek</h4>
                                {{ $pallet->details_components_onderdek }}
                            </li>
                            <li class="list_no_bullets" style="list-style: none">
                                <h4>Boventussendek</h4>
                                {{ $pallet->details_components_boventussendek }}
                            </li>
                            <li class="list_no_bullets" style="list-style: none">
                                <h4>Klossen</h4>
                                {{ $pallet->details_components_klossen }}
                            </li>
                            <br>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
