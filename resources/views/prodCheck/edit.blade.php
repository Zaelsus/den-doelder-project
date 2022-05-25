@extends('layouts.app')

@section('header')
    Edit a Production Check
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{route('production.update',$production)}}">
            @csrf

            @method('PUT')

            <section class="section">
                {{--                Bovendek--}}
                <section class="section">
                    <section class="hero">
                        <div class="hero-body">
                            <p class="title">
                                Bovendek
                            </p>
                            <p class="subtitle has-text-danger">
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
                                <label for="afmetingTickB" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="afmetingTickB" value="1"  {{$production->afmetingTickB === 1 ? 'checked': '' }} >
                                <label for="afmetingTickB" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="afmetingTickB" value="0" {{$production->afmetingTickB === 0 ? 'checked': '' }} >
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmetingAangB" id="" value="{{$production->afmetingAangB}}">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmetingCorrectB" id="" value="{{$production->afmetingCorrectB}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Aantal planken</td>

                            <td>
                                <label for="aantalTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="aantalTick" value="1" {{$production->aantalTick === 1 ? 'checked': '' }}>

                                <label for="aantalTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="aantalTick" value="0" {{$production->aantalTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="aantalAang" id="" value="{{$production->aantalAang}} ">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="aantalCorrect" id="" value="{{$production->aantalCorrect}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Spaties</td>

                            <td>
                                <label for="spatiesTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="spatiesTick" value="1" {{$production->spatiesTick === 1 ? 'checked': '' }}>
                                <label for="spatiesTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="spatiesTick" value="0" {{$production->spatiesTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="spatiesAang" id=" " value="{{$production->spatiesAang}}">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="spatiesCorrect" id="" value="{{$production->spatiesCorrect}}">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Klampen</td>

                            <td>
                                <label for="klampenTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="klampenTick" value="1" {{$production->klampenTick === 1 ? 'checked': '' }}>
                                <label for="klampenTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="klampenTick" value="0" {{$production->klampenTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="klampenAang" id="" value="{{$production->klampenAang}}">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="klampenCorrect" id="" value="{{$production->klampenCorrect}}">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Overstek</td>

                            <td>
                                <label for="overstekTickB" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="overstekTickB" value="1" {{$production->overstekTickB === 1 ? 'checked': '' }}>
                                <label for="overstekTickB" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="overstekTickB" value="0" {{$production->overstekTickB === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="overstekAangB" id="" value="{{$production->overstekAangB}}">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="overstekCorrectB" id="" value="{{$production->overstekCorrectB}} ">
                                </div>
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
                            <th>Correctie</th>
                        </tr>

                        <tr>
                            <td>Soort (Spaan/ Hout)</td>

                            <td>
                                <label for="soortTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="soortTick" value="1" {{$production->soortTick === 1 ? 'checked': '' }}>
                                <label for="soortTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="soortTick" value="0" {{$production->soortTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="soortAang" id="" value="{{$production->soortAang}} ">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="soortCorrect" id="" value="{{$production->soortCorrect}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Balk</td>

                            <td>
                                <label for="balkTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="balkTick" value="1" {{$production->balkTick === 1 ? 'checked': '' }}>
                                <label for="balkTick" class="has-text-danger has-text-weight-bold">	&cross;</label>
                                <input type="radio" id="" name="balkTick" value="0" {{$production->balkTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="balkAang" id="" value="{{$production->balkAang}} ">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="balkCorrect" id="" value="{{$production->balkCorrect}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Afmeting 1</td>

                            <td>
                                <label for="afmeting1Tick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="afmeting1Tick" value="1" {{$production->afmeting1Tick === 1 ? 'checked': '' }}>
                                <label for="afmeting1Tick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="afmeting1Tick" value="0" {{$production->afmeting1Tick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmeting1Aang" id="" value="{{$production->afmeting1Aang}}">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmeting1Correct" id="" value="{{$production->afmeting1Correct}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Afmeting 2</td>

                            <td>
                                <label for="afmeting2Tick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="afmeting2Tick" value="1" {{$production->afmeting2Tick === 1 ? 'checked': '' }}>
                                <label for="afmeting2Tick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="afmeting2Tick" value="0" {{$production->afmeting2Tick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmeting2Aang" id="" value="{{$production->afmeting2Aang}}">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmeting2Correct" id="" value="{{$production->afmeting2Correct}} ">
                                </div>
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
                            <th>Correctie</th>
                        </tr>

                        <tr>
                            <td>Brug</td>

                            <td>
                                <label for="brugTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="brugTick" value="1" {{$production->brugTick === 1 ? 'checked': '' }}>
                                <label for="brugTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="brugTick" value="0" {{$production->brugTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="brugAang" id="" value="{{$production->brugAang}} ">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="brugCorrect" id="" value="{{$production->brugCorrect}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Ronddloper</td>

                            <td>
                                <label for="rondTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="rondTick" value="1" {{$production->rondTick === 1 ? 'checked': '' }}>
                                <label for="rondTick" class="has-text-danger has-text-weight-bold">	&cross;</label>
                                <input type="radio" id="" name="rondTick" value="0" {{$production->rondTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="rondAang" id="" value="{{$production->rondAang}} ">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="rondCorrect" id="" value="{{$production->rondCorrect}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Kruisdek</td>

                            <td>
                                <label for="kruisTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="kruisTick" value="1" {{$production->kruisTick === 1 ? 'checked': '' }}>
                                <label for="kruisTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="kruisTick" value="0" {{$production->kruisTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="kruisAang" id="" value="{{$production->kruisAang}}">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="kruisCorrect" id="" value="{{$production->kruisCorrect}}">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Afmetingen</td>

                            <td>
                                <label for="afmetingTickO" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="afmetingTickO" value="1" {{$production->afmetingTickO === 1 ? 'checked': '' }}>
                                <label for="afmetingTickO" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="afmetingTickO" value="0" {{$production->afmetingTickO === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmetingAangO" id=" " value="{{$production->afmetingAangO}}">
                                </div>
                            </td>


                            <td>
                                <div class="control">
                                    <input class="input" type="text" name="afmetingCorrectO" id="" value="{{$production->afmetingCorrectO}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Overstek</td>

                            <td>
                                <label for="overstekTickO" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="overstekTickO" value="1" {{$production->overstekTickO === 1 ? 'checked': '' }}>
                                <label for="overstekTickO" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="overstekTickO" value="0" {{$production->overstekTickO === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="overstekAangO" id="" value="{{$production->overstekAangO}}">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="overstekCorrectO" id="" value="{{$production->overstekCorrectO}} ">
                                </div>
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
                            <th>Aangepast naar</th>
                            <th>Correctie</th>
                        </tr>

                        <tr>
                            <td>Hoeken zaag</td>

                            <td>
                                <label for="hoekenTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="hoekenTick" value="1" {{$production->hoekenTick === 1 ? 'checked': '' }}>
                                <label for="hoekenTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="hoekenTick" value="0" {{$production->hoekenTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="hoekenAang" id="" value="{{$production->hoekenAang}} ">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="hoekenCorrect" id="" value="{{$production->hoekenCorrect}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Stempels</td>

                            <td>
                                <label for="stempelsTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="stempelsTick" value="1" {{$production->stempelsTick === 1 ? 'checked': '' }}>
                                <label for="stempelsTick" class="has-text-danger has-text-weight-bold">	&cross;</label>
                                <input type="radio" id="" name="stempelsTick" value="0" {{$production->stempelsTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="stempelsAang" id="" value="{{$production->stempelsAang}} ">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="stempelsCorrect" id="" value="{{$production->stempelsCorrect}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Stapel hoogte</td>

                            <td>
                                <label for="stapelTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="stapelTick" value="1" {{$production->stapelTick === 1 ? 'checked': '' }}>
                                <label for="stapelTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="stapelTick" value="0" {{$production->stapelTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="stapelAang" id="" value="{{$production->stapelAang}}">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="stapelCorrect" id="" value="{{$production->stapelCorrect}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Strappen/ Markeren</td>

                            <td>
                                <label for="strappenTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="strappenTick" value="1" {{$production->strappenTick === 1 ? 'checked': '' }}>
                                <label for="strappenTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="strappenTick" value="0" {{$production->strappenTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="strappenAang" id="" value="{{$production->strappenAang}}">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="strappenCorrect" id="" value="{{$production->strappenCorrect}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Spijkers (BD,TD,OD)</td>

                            <td>
                                <label for="spijkerTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="spijkerTick" value="1" {{$production->spijkerTick === 1 ? 'checked': '' }}>
                                <label for="spijkerTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="spijkerTick" value="0" {{$production->spijkerTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="spijkerAang" id="" value="{{$production->spijkerAang}}">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="spijkerCorrect" id="" value="{{$production->spijkerCorrect}} ">
                                </div>
                            </td>
                        </tr>

                    </table>
                </section>


                <label class='has-text-weight-bold' for='additionalNotes'>Additional Notes:</label>
                <div class="control "><input class="input" type="text" name="additionalNotes" id="" placeholder="Optional comments" value={{$production->additionalNotes}} >
                </div>

                <section class="section">
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-primary" id="submitNew">Save</button>
                        </div>

                        <div class="control">
                            <button type="reset" class="button is-warning">Reset</button>
                        </div>
                        <div class="control">
                            <a type="button" href="{{route('production.show', $production)}}" class="button is-light">Cancel</a>
                        </div>
                    </div>
                </section>

            </section>
        </form>
    </section>
@endsection
