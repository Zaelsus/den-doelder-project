@extends('layouts.app')

@section('header')
    Production Check
@endsection

@section('content')

    @if(Auth::user()->role === 'Production')
        <div class="column is-9-desktop ">
            <section class="content" >
                <div class="control is-pulled-right">
                    <button class="button "
                            onclick=window.location.href="{{route('production.edit', $production)}}">
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
                            {{--set to danger--}}
                            <p class="subtitle">
                                Controle na eerste stapel bovendekken!
                            </p>
                        </div>
                    </section>

                    <table>
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

                Klossen
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
                            <th>Correctie</th>
                        </tr>


                        <tr>
                            <td>Soort (Spaan/ Hout)</td>
                            <td>
                                {{$production->soortTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->soortAang}}
                            </td>

                            <td>
                                {{$production->soortCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Balk</td>
                            <td>
                                {{$production->balkTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->balkAang}}
                            </td>

                            <td>
                                {{$production->balkCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Afmeting 1</td>
                            <td>
                                {{$production->afmeting1Tick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->afmeting1Aang}}
                            </td>

                            <td>
                                {{$production->afmeting1Correct}}
                            </td>
                        </tr>

                        <tr>
                            <td>Afmeting 2</td>
                            <td>
                                {{$production->afmeting2Tick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->afmeting2Aang}}
                            </td>

                            <td>
                                {{$production->afmeting2Correct}}
                            </td>
                        </tr>

                    </table>
                </section>

                Onderdek
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
                            <th>Correctie</th>
                        </tr>


                        <tr>
                            <td>Brug</td>
                            <td>
                                {{$production->brugTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->brugAang}}
                            </td>

                            <td>
                                {{$production->brugCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Ronddloper</td>
                            <td>
                                {{$production->rondTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->rondAang}}
                            </td>

                            <td>
                                {{$production->rondCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Kruisdek</td>
                            <td>
                                {{$production->kruisTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->kruisAang}}
                            </td>

                            <td>
                                {{$production->kruisCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Afmetingen</td>
                            <td>
                                {{$production->afmetingTickO === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->afmetingAangO}}
                            </td>

                            <td>
                                {{$production->afmetingCorrectO}}
                            </td>
                        </tr>

                        <tr>
                            <td>Overstek</td>
                            <td>
                                {{$production->overstekTickO === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->overstekAangO}}
                            </td>

                            <td>
                                {{$production->overstekCorrectO}}
                            </td>
                        </tr>
                    </table>
                </section>

                Overvig
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
                                {{$production->strappenTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->strappenAang}}
                            </td>

                            <td>
                                {{$production->strappenCorrect}}
                            </td>
                        </tr>


                        <tr>
                            <td>Spijkers (BD,TD,OD)</td>
                            <td>
                                {{$production->spijkerTick === 1 ? '✔': '✖' }}
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
                    <p>{{$production->additionalNotes}}</p>
                </section>

            </section>
        </div>

    @elseif(Auth::user()->role === 'Administrator')
        <div class="column is-9-desktop ">
            <section class="content" >

                {{--Bovendek--}}
                <section class="section">
                    <section class="hero">
                        <div class="hero-body">
                            <p class="title">
                                Bovendek
                            </p>
                            {{--set to danger--}}
                            <p class="subtitle">
                                Controle na eerste stapel bovendekken!
                            </p>
                        </div>
                    </section>

                    <table>
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

                Klossen
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
                            <th>Correctie</th>
                        </tr>


                        <tr>
                            <td>Soort (Spaan/ Hout)</td>
                            <td>
                                {{$production->soortTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->soortAang}}
                            </td>

                            <td>
                                {{$production->soortCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Balk</td>
                            <td>
                                {{$production->balkTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->balkAang}}
                            </td>

                            <td>
                                {{$production->balkCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Afmeting 1</td>
                            <td>
                                {{$production->afmeting1Tick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->afmeting1Aang}}
                            </td>

                            <td>
                                {{$production->afmeting1Correct}}
                            </td>
                        </tr>

                        <tr>
                            <td>Afmeting 2</td>
                            <td>
                                {{$production->afmeting2Tick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->afmeting2Aang}}
                            </td>

                            <td>
                                {{$production->afmeting2Correct}}
                            </td>
                        </tr>

                    </table>
                </section>

                Onderdek
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
                            <th>Correctie</th>
                        </tr>


                        <tr>
                            <td>Brug</td>
                            <td>
                                {{$production->brugTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->brugAang}}
                            </td>

                            <td>
                                {{$production->brugCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Ronddloper</td>
                            <td>
                                {{$production->rondTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->rondAang}}
                            </td>

                            <td>
                                {{$production->rondCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Kruisdek</td>
                            <td>
                                {{$production->kruisTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->kruisAang}}
                            </td>

                            <td>
                                {{$production->kruisCorrect}}
                            </td>
                        </tr>

                        <tr>
                            <td>Afmetingen</td>
                            <td>
                                {{$production->afmetingTickO === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->afmetingAangO}}
                            </td>

                            <td>
                                {{$production->afmetingCorrectO}}
                            </td>
                        </tr>

                        <tr>
                            <td>Overstek</td>
                            <td>
                                {{$production->overstekTickO === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->overstekAangO}}
                            </td>

                            <td>
                                {{$production->overstekCorrectO}}
                            </td>
                        </tr>
                    </table>
                </section>

                Overvig
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
                                {{$production->strappenTick === 1 ? '✔': '✖' }}
                            </td>

                            <td>
                                {{$production->strappenAang}}
                            </td>

                            <td>
                                {{$production->strappenCorrect}}
                            </td>
                        </tr>


                        <tr>
                            <td>Spijkers (BD,TD,OD)</td>
                            <td>
                                {{$production->spijkerTick === 1 ? '✔': '✖' }}
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
                    <p>{{$production->additionalNotes}}</p>
                </section>

            </section>
        </div>

    @endif

@endsection

