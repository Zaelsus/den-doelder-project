@extends('layouts.app')

@section('content')

    <div class="padding-top-2 margin-left-2 margin-right-2">
        <div class="card padding-1">
            <h1 class="margin-bottom-1">{{ $pallet->name }} Details</h1>
            <div>
                <img
                    src="{{ $pallet->general_images }}"
                    width="100%"
                    height="auto"
                    class="margin-bottom-1"
                >
                <img
                    src="{{ $pallet->detailed_images }}"
                    width="100%"
                    height="auto"
                >
            </div>
        </div>
        <div class="flex-container">
            <div class="flex-item-left">
                <h3><span class="badge colour-orange align-content-lg-stretch justify-content-center">Pallet Details</span></h3>
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
                <h3><span class="badge colour-orange align-content-lg-stretch justify-content-center">Specifications</span></h3>
                <p><strong>Order-specific Notes:</strong>
                    {{ $pallet->details_specifieke_bladnotities }}</p>
            </div>
            <div class="flex-item-right">
                <h3><span class="badge colour-orange align-content-lg-stretch justify-content-center">Componenten</span></h3>
                <ul style="padding: 0; margin: 0">
                    <li class="list_no_bullets" style="list-style: none">
                        <p class="no-margin-bottom"><strong>Bovendek:</strong></p>
                        <p class="no-margin-bottom">{{ $pallet->details_components_bovendek }}</p>
                    </li>
                    <li class="list_no_bullets" style="list-style: none">
                        <p class="no-margin-bottom"><strong>Onderdek:</strong></p>
                        <p class="no-margin-bottom">{{ $pallet->details_components_onderdek }}</p>
                    </li>
                    <li class="list_no_bullets" style="list-style: none">
                        <p class="no-margin-bottom"><strong>Boventussendek:</strong></p>
                        <p class="no-margin-bottom">{{ $pallet->details_components_boventussendek }}</p>
                    </li>
                    <li class="list_no_bullets" style="list-style: none">
                        <p class="no-margin-bottom"><strong>Klossen:</strong></p>
                        <p class="no-margin-bottom">{{ $pallet->details_components_klossen }}</p>
                    </li>
                    <br>
                </ul>
            </div>
        </div>
    </div>
@endsection
