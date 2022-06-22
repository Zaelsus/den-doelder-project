@extends('layouts.app')

@section('header')
    Production Check
@endsection

@section('content')

    @if(Auth::user()->role === 'Production')
        <div class="column is-9-desktop ">
            <section class="content" >
                <div class="has-text-right">
                    <a href="{{route('production.edit', $production)}}" class="btn btn-info btn-lg float-right">Edit</a>
                </div>
    @endif
                {{--Bovendek--}}
                <section class="section">
                    <section class="hero">
                        <div class="hero-body">
                            <h5 class="card bg-gradient-purple">Bovendek</h5>
                            {{--set to danger--}}
                            <p class="card bg-gradient-red subtitle">
                                Controle na eerste stapel bovendekken!
                            </p>
                        </div>
                    </section>

                    <table class="table table-bordered table-hover table-secondary ">
                        <tr>
                            <th></th>
                            <th>Condition</th>
                            <th>Aangepast naar</th>
                            <th>Correctie</th>
                        </tr>


                        <tr>
                            <td>Afmeting</td>
                            <td>
                                {{$production->afmetingTickB === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->afmetingAangB}}
                            </td>

                            <td>
                                {{$production->afmetingCorrectB}}
                            </td>
                        </tr>

                        <tr>
                            <td>Aantal planken</td>
                            <td>
                                {{$production->aantalTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->aantalAang}}
                            </td>

                            <td>
                                {{$production->aantalCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Spaties</td>
                            <td>
                                {{$production->spatiesTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->spatiesAang}}
                            </td>

                            <td>
                                {{$production->spatiesCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Klampen	</td>
                            <td>
                                {{$production->klampenTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->klampenAang}}
                            </td>

                            <td>
                                {{$production->klampenCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Overstek</td>
                            <td>
                                {{$production->overstekTickB === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->overstekAangB}}
                            </td>

                            <td>
                                {{$production->overstekCorrectB}}
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



                        @if($production->soort != null)
                            <tr>
                                <td>Soort</td>
                                <td>
                                    {{$production->soort}}
                                </td>

                                <td>
                                    {{$production->soortAang}}
                                </td>

                                <td>
                                    {{$production->soortHtKd}}
                                </td>
                            </tr>
                        @else
                        @endif

                        @if($production->balk != null)
                            <tr>
                                <td>Balk</td>
                                <td>
                                    {{$production->balk }}
                                </td>

                                <td>
                                    {{$production->balkAang}}
                                </td>

                                <td>
                                    {{$production->balkHtKd}}
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
                            <th>Type</th>
                            <th>Aangepast naar</th>
                            <th>Ht/Kd: vocht %</th>
                        </tr>


                        <tr>

                            <td>
                                {{$production->onderdek}}
                            </td>

                            <td>
                                {{$production->onderdekAang}}
                            </td>

                            <td>
                                {{$production->onderdekHtKd}}
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

                    <table class="table table-bordered table-hover table-secondary ">
                        <tr>
                            <th></th>
                            <th>Condition</th>
                            <th>Aangepast naar</th>
                            <th>Correctie</th>
                        </tr>


                        <tr>
                            <td>Hoeken zaag</td>
                            <td>
                                {{$production->hoekenTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->hoekenAang}}
                            </td>

                            <td>
                                {{$production->hoekenCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Stempels</td>
                            <td>
                                {{$production->stempelsTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->stempelsAang}}
                            </td>

                            <td>
                                {{$production->stempelsCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Stapel hoogte</td>
                            <td>
                                {{$production->stapelTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->stapelAang}}
                            </td>

                            <td>
                                {{$production->stapelCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Strappen/ Markeren</td>
                            <td>
                                {{$production->strappenTick}}
                            </td>

                            <td>
                                {{$production->strappenAang}}
                            </td>

                            <td>
                                {{$production->strappenCorrect}}
                            </td>
                        </tr>


                        <tr>
                            <td>Spijkers</td>
                            <td>
                                {{$production->spijkerTick }}
                            </td>

                            <td>
                                {{$production->spijkerAang}}
                            </td>

                            <td>
                                {{$production->spijkerCorrect}}
                            </td>
                        </tr>
                    </table>
                </section>

                <section class="section">
                    <label class='' for=''>Additional Notes:</label>
                    <p class="table table-bordered table-hover table-secondary">{{$production->additionalNotes}}</p>
                </section>

            </section>
        </div>

@endsection

