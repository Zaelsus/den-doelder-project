@extends('layouts.app')

@section('header')
    Edit an Initial Check
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{ route('initial.update',$initial) }}">
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
                                <label for="afmetingTickB" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="afmetingTickB" value="1"  {{$initial->afmetingTickB === 1 ? 'checked': '' }}  >
                                <label for="afmetingTickB" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="afmetingTickB" value="0" {{$initial->afmetingTickB === 0 ? 'checked': '' }} >
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmetingAangB" id="" value="{{$initial->afmetingAangB}} ">
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmetingHtKdB" id="" value="{{$initial->afmetingHtKdB}} ">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Aantal planken</td>

                            <td>
                                <label for="aantalTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="aantalTick" value="1" {{$initial->aantalTick === 1 ? 'checked': '' }}>

                                <label for="aantalTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="aantalTick" value="0" {{$initial->aantalTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="aantalAang" id="" value={{$initial->aantalAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="aantalHtKd" id="" value={{$initial->aantalHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Klampen</td>

                            <td>
                                <label for="klampenTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="klampenTick" value="1" {{$initial->klampenTick === 1 ? 'checked': '' }}>
                                <label for="klampenTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="klampenTick" value="0" {{$initial->klampenTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="klampenAang" id="" value={{$initial->klampenAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="klampenHtKd" id="" value={{$initial->klampenHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Schimmel Ja/Nee
                            </td>

                            <td>
                                <label for="schimmelTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="schimmelTick" value="1" {{$initial->schimmelTick === 1 ? 'checked': '' }}>
                                <label for="schimmelTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="schimmelTick" value="0" {{$initial->schimmelTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="schimmelAang" id="" value={{$initial->schimmelAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="schimmelHtKd" id="" value={{$initial->schimmelHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Waan Ja/Nee</td>

                            <td>
                                <label for="waanTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="waanTick" value="1" {{$initial->waanTick === 1 ? 'checked': '' }}>
                                <label for="waanTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="waanTick" value="0" {{$initial->waanTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="waanAang" id="" value={{$initial->waanAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="waanHtKd" id="" value={{$initial->waanHtKd}}>
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
                            <th>Ht/Kd: vocht %</th>
                        </tr>

                        <tr>
                            <td>Soort (Spaan/ Hout)</td>

                            <td>
                                <label for="soortTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="soortTick" value="1" {{$initial->soortTick === 1 ? 'checked': '' }}>
                                <label for="soortTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="soortTick" value="0" {{$initial->soortTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="soortAang" id="" value={{$initial->soortAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="soortHtKd" id="" value={{$initial->soortHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Balk</td>

                            <td>
                                <label for="balkTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="balkTick" value="1" {{$initial->balkTick === 1 ? 'checked': '' }}>
                                <label for="balkTick" class="has-text-danger has-text-weight-bold">	&cross;</label>
                                <input type="radio" id="" name="balkTick" value="0" {{$initial->balkTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="balkAang" id="" value={{$initial->balkAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="balkHtKd" id="" value={{$initial->balkHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Afmeting 1</td>

                            <td>
                                <label for="afmeting1Tick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="afmeting1Tick" value="1" {{$initial->afmeting1Tick === 1 ? 'checked': '' }}>
                                <label for="afmeting1Tick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="afmeting1Tick" value="0" {{$initial->afmeting1Tick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmeting1Aang" id="" value={{$initial->afmeting1Aang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmeting1HtKd" id="" value={{$initial->afmeting1HtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Afmeting 2</td>

                            <td>
                                <label for="afmeting2Tick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="afmeting2Tick" value="1" {{$initial->afmeting2Tick === 1 ? 'checked': '' }}>
                                <label for="afmeting2Tick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="afmeting2Tick" value="0" {{$initial->afmeting2Tick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmeting2Aang" id="" value={{$initial->afmeting2Aang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmeting2HtKd" id="" value={{$initial->afmeting2HtKd}}>
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
                            <th>Ht/Kd: vocht %</th>
                        </tr>

                        <tr>
                            <td>Brug</td>

                            <td>
                                <label for="brugTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="brugTick" value="1" {{$initial->brugTick === 1 ? 'checked': '' }}>
                                <label for="brugTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="brugTick" value="0" {{$initial->brugTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="brugAang" id="" value={{$initial->brugAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="brugHtKd" id="" value={{$initial->brugHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Ronddloper Afm(2x)</td>

                            <td>
                                <label for="rond2xTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="rond2xTick" value="1" {{$initial->rond2xTick === 1 ? 'checked': '' }}>
                                <label for="rond2xTick" class="has-text-danger has-text-weight-bold">	&cross;</label>
                                <input type="radio" id="" name="rond2xTick" value="0" {{$initial->rond2xTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="rond2xAang" id="" value={{$initial->rond2xAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="rond2xHtKd" id="" value={{$initial->rond2xHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Ronddloper Afm(3x)</td>

                            <td>
                                <label for="rond3xTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="rond3xTick" value="1" {{$initial->rond3xTick === 1 ? 'checked': '' }}>
                                <label for="rond3xTick" class="has-text-danger has-text-weight-bold">	&cross;</label>
                                <input type="radio" id="" name="rond3xTick" value="0" {{$initial->rond3xTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="rond3xAang" id="" value={{$initial->rond3xAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="rond3xHtKd" id="" value={{$initial->rond3xHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Kruisdek</td>

                            <td>
                                <label for="kruisTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="kruisTick" value="1" {{$initial->kruisTick === 1 ? 'checked': '' }}>
                                <label for="kruisTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="kruisTick" value="0" {{$initial->kruisTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="kruisAang" id="" value={{$initial->kruisAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="kruisHtKd" id="" value={{$initial->kruisHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Elementen</td>

                            <td>
                                <label for="elementenTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="elementenTick" value="1" {{$initial->elementenTick === 1 ? 'checked': '' }}>
                                <label for="elementenTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="elementenTick" value="0" {{$initial->elementenTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="elementenAang" id="" value={{$initial->elementenAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="elementenHtKd" id="" value={{$initial->elementenHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Dubbel Dek</td>

                            <td>
                                <label for="dubbelTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="dubbelTick" value="1" {{$initial->dubbelTick === 1 ? 'checked': '' }}>
                                <label for="dubbelTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="dubbelTick" value="0" {{$initial->dubbelTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="dubbelAang" id="" value={{$initial->dubbelAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="dubbelHtKd" id="" value={{$initial->dubbelHtKd}}>
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
                            <th>Ht/Kd: vocht %</th>
                        </tr>

                        <tr>
                            <td>Hoeken zaag</td>

                            <td>
                                <label for="hoekenTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="hoekenTick" value="1" {{$initial->hoekenTick === 1 ? 'checked': '' }}>
                                <label for="hoekenTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="hoekenTick" value="0" {{$initial->hoekenTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="hoekenAang" id="" value={{$initial->hoekenAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="hoekenHtKd" id="" value={{$initial->hoekenHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Extra Stempel</td>

                            <td>
                                <label for="stempelsTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="stempelsTick" value="1" {{$initial->stempelsTick === 1 ? 'checked': '' }}>
                                <label for="stempelsTick" class="has-text-danger has-text-weight-bold">	&cross;</label>
                                <input type="radio" id="" name="stempelsTick" value="0" {{$initial->stempelsTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="stempelsAang" id="" value={{$initial->stempelsAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="stempelsHtKd" id="" value={{$initial->stempelsHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Stapel hoogte St/M</td>

                            <td>
                                <label for="stapelTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="stapelTick" value="1" {{$initial->stapelTick === 1 ? 'checked': '' }}>
                                <label for="stapelTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="stapelTick" value="0" {{$initial->stapelTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="stapelAang" id="" value={{$initial->stapelAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="stapelHtKd" id="" value={{$initial->stapelHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Strappen/ Markeren</td>

                            <td>
                                <label for="strappenTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="strappenTick" value="1" {{$initial->strappenTick === 1 ? 'checked': '' }}>
                                <label for="strappenTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="strappenTick" value="0" {{$initial->strappenTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="strappenAang" id="" value={{$initial->strappenAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="strappenHtKd" id="" value={{$initial->strappenHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Q(kamer)/Loods/A</td>

                            <td>
                                <label for="kamerTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="kamerTick" value="1" {{$initial->kamerTick === 1 ? 'checked': '' }}>
                                <label for="kamerTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="kamerTick" value="0" {{$initial->kamerTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="kamerAang" id="" value={{$initial->kamerAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="kamerHtKd" id="" value={{$initial->kamerHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Speciale Instructie</td>

                            <td>
                                <label for="specialeTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="specialeTick" value="1" {{$initial->specialeTick === 1 ? 'checked': '' }}>
                                <label for="specialeTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="specialeTick" value="0" {{$initial->specialeTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="specialeAang" id="" value={{$initial->specialeAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="specialeHtKd" id="" value={{$initial->specialeHtKd}}>
                                </div>
                            </td>
                        </tr>

                    </table>
                </section>

                <label class='has-text-weight-bold' for='additionalNotes'>Additional Notes:</label>
                <div class="control "><input class="input" type="text" name="additionalNotes" id="" placeholder="Optional comments" value={{$initial->additionalNotes}} >
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
                            <a type="button" href="{{route('initial.show', $initial)}}" class="button is-light">Cancel</a>
                        </div>
                    </div>
                </section>

            </section>
        </form>
    </section>
@endsection
