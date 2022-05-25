@extends('layouts.app')

@section('header')
    Initial Check
@endsection

@section('content')

    <div class="column is-9-desktop ">
        <section class="content" >

                        <div class="control is-pulled-right">
                            <button class="button "
                                    onclick=window.location.href="{{route('initial.edit', $initial)}}">
                                Edit
                            </button>
                        </div>

            {{--Bovendek--}}
            <section class="section">
                <section class="hero">
                    <div class="hero-body">
                        <p class="title">
                            Bovendek
                        </p>
                    </div>
                </section>

                <table>
                    <tr>
                        <th></th>
                        <th>Condition</th>
                        <th>Aangepast naar</th>
                        <th>Ht/Kd: vocht %</th>
                    </tr>


                    <tr>
                        <td>Afmeting</td>
                        <td>
                            {{$initial->afmetingTickB === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->afmetingAangB}}
                        </td>

                        <td>
                            {{$initial->afmetingHtKdB}}
                        </td>
                    </tr>

                    <tr>
                        <td>Aantal planken</td>
                        <td>
                            {{$initial->aantalTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->aantalAang}}
                        </td>

                        <td>
                            {{$initial->aantalHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Klampen	</td>
                        <td>
                            {{$initial->klampenTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->klampenAang}}
                        </td>

                        <td>
                            {{$initial->klampenHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Schimmel Ja/Nee</td>
                        <td>
                            {{$initial->schimmelTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->schimmelAang}}
                        </td>

                        <td>
                            {{$initial->schimmelHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Waan Ja/Nee</td>
                        <td>
                            {{$initial->waanTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->waanAang}}
                        </td>

                        <td>
                            {{$initial->waanHtKd}}
                        </td>
                    </tr>
                </table>
            </section>

            <section class="section">
                <section class="hero">
                    <div class="hero-body">
                        <p class="title">
                            Klossen
                        </p>
                    </div>
                </section>

                <table>
                    <tr>
                        <th></th>
                        <th>Condition</th>
                        <th>Aangepast naar</th>
                        <th>Ht/Kd: vocht %</th>
                    </tr>


                    <tr>
                        <td>Soort (Spaan/ Hout)</td>
                        <td>
                            {{$initial->soortTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->soortAang}}
                        </td>

                        <td>
                            {{$initial->soortHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Balk</td>
                        <td>
                            {{$initial->balkTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->balkAang}}
                        </td>

                        <td>
                            {{$initial->balkHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Afmeting 1</td>
                        <td>
                            {{$initial->afmeting1Tick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->afmeting1Aang}}
                        </td>

                        <td>
                            {{$initial->afmeting1HtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Afmeting 2</td>
                        <td>
                            {{$initial->afmeting2Tick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->afmeting2Aang}}
                        </td>

                        <td>
                            {{$initial->afmeting2HtKd}}
                        </td>
                    </tr>

                </table>
            </section>

            <section class="section">
                <section class="hero">
                    <div class="hero-body">
                        <p class="title">
                            Onderdek
                        </p>
                    </div>
                </section>

                <table>
                    <tr>
                        <th></th>
                        <th>Condition</th>
                        <th>Aangepast naar</th>
                        <th>Ht/Kd: vocht %</th>
                    </tr>


                    <tr>
                        <td>Brug</td>
                        <td>
                            {{$initial->brugTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->brugAang}}
                        </td>

                        <td>
                            {{$initial->brugHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Ronddloper Afm(2x)
                        </td>
                        <td>
                            {{$initial->rond2xTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->rond2xAang}}
                        </td>

                        <td>
                            {{$initial->rond2xHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Ronddloper Afm(3x)
                        </td>
                        <td>
                            {{$initial->rond3xTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->rond3xAang}}
                        </td>

                        <td>
                            {{$initial->rond3xHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Kruisdek</td>
                        <td>
                            {{$initial->kruisTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->kruisAang}}
                        </td>

                        <td>
                            {{$initial->kruisHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Elementen</td>
                        <td>
                            {{$initial->elementenTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->elementenAang}}
                        </td>

                        <td>
                            {{$initial->elementenHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Dubbel Dek</td>
                        <td>
                            {{$initial->dubbelTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->dubbelAang}}
                        </td>

                        <td>
                            {{$initial->dubbelHtKd}}
                        </td>
                    </tr>
                </table>
            </section>

            <section class="section">
                <section class="hero">
                    <div class="hero-body">
                        <p class="title">
                            Overvig
                        </p>
                    </div>
                </section>

                <table>
                    <tr>
                        <th></th>
                        <th>Condition</th>
                        <th></th>
                        <th></th>
                    </tr>


                    <tr>
                        <td>Hoeken zaag</td>
                        <td>
                            {{$initial->hoekenTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->hoekenAang}}
                        </td>

                        <td>
                            {{$initial->hoekenHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Stempels</td>
                        <td>
                            {{$initial->stempelsTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->stempelsAang}}
                        </td>

                        <td>
                            {{$initial->stempelsHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Stapel hoogte St/M</td>
                        <td>
                            {{$initial->stapelTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->stapelAang}}
                        </td>

                        <td>
                            {{$initial->stapelHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Strappen/ Markeren</td>
                        <td>
                            {{$initial->strappenTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->strappenAang}}
                        </td>

                        <td>
                            {{$initial->strappenHtKd}}
                        </td>
                    </tr>


                    <tr>
                        <td>Q(kamer)/Loods/A</td>
                        <td>
                            {{$initial->kamerTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->kamerAang}}
                        </td>

                        <td>
                            {{$initial->kamerHtKd}}
                        </td>
                    </tr>

                    <tr>
                        <td>Speciale Instructie</td>
                        <td>
                            {{$initial->specialeTick === 1 ? '✔': '✖' }}
                        </td>

                        <td>
                            {{$initial->specialeAang}}
                        </td>

                        <td>
                            {{$initial->specialeHtKd}}
                        </td>
                    </tr>
                </table>
            </section>

            <section class="section">
                <label class='' for=''>Additional Notes:</label>
                <p>{{$initial->additionalNotes}}</p>
            </section>

        </section>
    </div>
@endsection
