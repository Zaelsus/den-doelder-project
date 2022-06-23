@extends('layouts.app')

@section('header')
    Initial Check
@endsection

@section('content')
            @if(Auth::user()->role === 'Administrator')
                <div class="has-text-right">
                    <a href="{{route('initial.edit', $initial)}}" class="btn btn-info btn-lg float-right">Edit</a>
                </div>
            @endif
                <div class="column is-9-desktop ">
                    <section class="content" >

                        <section class="section">
                            <section class="hero">
                                <div class="hero-body">
                                    <h5 class="card bg-gradient-purple">Bovendek</h5>
                                </div>
                            </section>

                            <table class="table table-bordered table-hover table-secondary ">
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
                                    <h5 class="card bg-gradient-purple">Klossen</h5>
                                </div>
                            </section>

                            <table class="table table-bordered table-hover table-secondary">
                                <tr>
                                    <th></th>
                                    <th>Type</th>
                                    <th>Aangepast naar</th>
                                    <th>Ht/Kd: vocht %</th>
                                </tr>



                                    @if($initial->soort != null)
                                    <tr>
                                        <td>Soort</td>
                                        <td>
                                            {{$initial->soort}}
                                        </td>

                                        <td>
                                            {{$initial->soortAang}}
                                        </td>

                                        <td>
                                            {{$initial->soortHtKd}}
                                        </td>
                                    </tr>
                                    @else
                                    @endif

                                @if($initial->balk != null)
                                    <tr>
                                        <td>Balk</td>
                                        <td>
                                            {{$initial->balk }}
                                        </td>

                                        <td>
                                            {{$initial->balkAang}}
                                        </td>

                                        <td>
                                            {{$initial->balkHtKd}}
                                        </td>
                                    </tr>
                                @endif



                            </table>
                        </section>

                        <section class="section">
                            <section class="hero">
                                <div class="hero-body">
                                    <h5 class="card bg-gradient-purple">Onderdek</h5>

                                </div>
                            </section>


                            <table class="table table-bordered table-hover table-secondary">
                                <tr>
                                    <th>            </th>
                                    <th>Type</th>
                                    <th>Aangepast naar</th>
                                    <th>Ht/Kd: vocht %</th>
                                </tr>


                                <tr>

                                    <td>Description</td>
                                    <td>
                                        {{$initial->onderdek}}
                                    </td>

                                    <td>
                                        {{$initial->onderdekAang}}
                                    </td>

                                    <td>
                                        {{$initial->onderdekHtKd}}
                                    </td>
                                </tr>

                            </table>
                        </section>

                        <section class="section">
                            <section class="hero">
                                <div class="hero-body">
                                    <h5 class="card bg-gradient-purple">Overvig</h5>

                                </div>
                            </section>


                            <table class="table table-bordered table-hover table-secondary">
                                <tr>
                                    <th></th>
                                    <th>Condition</th>
                                    <th>Note</th>
                                </tr>


                                <tr>
                                    <td>Hoeken zaag</td>
                                    <td>
                                        {{$initial->hoekenTick === 1 ? '✔': '✖' }}
                                    </td>

                                    <td>
                                        {{$initial->hoekenAang}}
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

                                </tr>

                                <tr>
                                    <td>Stapel hoogte St/M</td>
                                    <td>
                                        {{$initial->stapelTick === 1 ? '✔': '✖' }}
                                    </td>

                                    <td>
                                        {{$initial->stapelAang}}
                                    </td>

                                </tr>

                                <tr>
                                    <td>Strappen/ Markeren</td>
                                    <td>
                                        {{$initial->strappenTick}}
                                    </td>

                                    <td>
                                        {{$initial->strappenAang}}
                                    </td>

                                </tr>


                                <tr>
                                    <td>Q(kamer)/Loods/A</td>
                                    <td>
                                        {{$initial->kamerTick}}
                                    </td>

                                    <td>
                                        {{$initial->kamerAang}}
                                    </td>

                                </tr>

                            </table>
                        </section>

                        <section class="section">
                            <label class='' for=''>Additional Notes:</label>
                            <p class="table table-bordered table-hover table-secondary">{{$initial->additionalNotes}}</p>
                        </section>

                    </section>
                </div>

@endsection
