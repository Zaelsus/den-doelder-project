@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header colour-purple">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                            {{ $pallet->name }} Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
{{--                    This is where the code formerly at the bottom of the page begins--}}
                    <div class="flex-container">
                        <div class="flex-item-left padding-right-1">
                            <h3><span
                                    class="badge colour-orange align-content-lg-stretch justify-content-center">Pallet Details</span>
                            </h3>
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
                            <h3><span
                                    class="badge colour-orange align-content-lg-stretch justify-content-center">Specifications</span>
                            </h3>
                            <p><strong>Order-specific Notes:</strong>
                                {{ $pallet->details_specifieke_bladnotities }}</p>
                        </div>
                        <div class="flex-item-right">
                            <h3><span class="badge colour-orange align-content-lg-stretch justify-content-center">Componenten</span>
                            </h3>
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
            </div>
        </div>
    </div>

    {{--    Main Page Code--}}
    <div class="padding-top-2 margin-left-2 margin-right-2">
        <div class="card padding-1">
            <div class="flex-container">
                <div class="flex-item-left">
                    <h1 class="margin-bottom-1">{{ $pallet->name }} Details</h1>
                </div>
                <div class="flex-item-right" style="margin-bottom: 8px; margin-top: 8px">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn colour-orange" data-toggle="modal"
                                data-target="#exampleModalCenter">
                            More Details
                        </button>
                    </div>
                </div>
            </div>
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
    </div>
@endsection
