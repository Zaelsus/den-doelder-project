{{--if there is an x you can fill in both fields--}}
@extends('layouts.app')

@section('header')
    Create a Production Check
@endsection

@section('section')
    <section class="content">
        <form method="POST" action="/prodCheck">
            @csrf

            <section class="section">
                {{--Bovendek--}}
                <section class="section">
                    <section class="hero">
                        <div class="hero-body">
                            <p class="title">
                                Bovendek
                            </p>
                            {{--set to danger--}}
                            <p class="subtitle has-text-danger">
                                Controle na eerste stapel bovendekken!
                            </p>
                        </div>
                    </section>

                    {{--Overvig--}}
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
                                <div @error('afmetingTickB') is-danger @enderror" >
                                <label for="afmetingTickB" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="afmetingTickB" value="1">
                                <label for="afmetingTickB" class="has-text-danger has-text-weight-bold">	&cross;</label>
                                <input type="radio" id="" name="afmetingTickB" value="0">
                                </div>
                                @error('afmetingTickB')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmetingAangB" id=""  >
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmetingCorrectB" id="" >
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Aantal planken</td>
                            <td>
                                <div @error('afmetingTickB') is-danger @enderror" >
                                <label for="aantalTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="aantalTick" value="1">
                                <label for="aantalTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="aantalTick" value="0">
                                </div>
                                @error('aantalTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="aantalAang" id="" >
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="aantalCorrect" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Spaties</td>

                            <td>
                                <div @error('spatiesTick') is-danger @enderror" >
                                <label for="spatiesTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="spatiesTick" value="1">
                                <label for="spatiesTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="spatiesTick" value="0">
                                </div>
                                @error('spatiesTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="spatiesAang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="spatiesCorrect" id="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Klampen</td>
                            <td>
                                <div @error('klampenTick') is-danger @enderror" >
                                <label for="klampenTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="klampenTick" value="1">
                                <label for="klampenTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="klampenTick" value="0">
                                </div>
                                @error('klampenTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="klampenAang" id=" ">
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="klampenCorrect" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Overstek</td>

                            <td>
                                <div @error('overstekTickB') is-danger @enderror" >
                                <label for="overstekTickB" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="overstekTickB" value="1">
                                <label for="overstekTickB" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="overstekTickB" value="0">
                                </div>
                                @error('overstekTickB')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="overstekAangB" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="overstekCorrectB" id="">
                                </div>
                            </td>
                        </tr>
                    </table>
                </section>
                {{--Klossen--}}
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
                                <div @error('soortTick') is-danger @enderror" >
                                <label for="soortTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="soortTick" value="1">
                                <label for="soortTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="soortTick" value="0">
                                </div>
                                @error('soortTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="soortAang" id="" >
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="soortCorrect" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Balk</td>

                            <td>
                                <div @error('balkTick') is-danger @enderror" >
                                <label for="balkTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="balkTick" value="1">
                                <label for="balkTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="balkTick" value="0">
                                </div>
                                @error('balkTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="balkAang" id="">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="balkCorrect" id="" >
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Afmeting 1</td>
                            <td>
                                <div @error('afmeting1Tick') is-danger @enderror" >
                                <label for="afmeting1Tick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="afmeting1Tick" value="1">
                                <label for="afmeting1Tick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="afmeting1Tick" value="0">
                                </div>
                                @error('afmeting1Tick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="afmeting1Aang" id=" ">
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="afmeting1Correct" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Afmeting 2</td>

                            <td>
                                <div @error('afmeting2Tick') is-danger @enderror" >
                                <label for="afmeting2Tick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="afmeting2Tick" value="1">
                                <label for="afmeting2Tick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="afmeting2Tick" value="0">
                                </div>
                                @error('afmeting2Tick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="afmeting2Aang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="afmeting2Correct" id="">
                                </div>
                            </td>
                        </tr>
                    </table>
                </section>
                {{--Onderdek--}}
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
                                <div @error('brugTick') is-danger @enderror" >
                                <label for="brugTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="brugTick" value="1">
                                <label for="brugTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="brugTick" value="0">
                                </div>
                                @error('brugTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="brugAang" id="" >
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="brugCorrect" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Ronddloper</td>

                            <td>
                                <div @error('rondTick') is-danger @enderror" >
                                <label for="rondTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="rondTick" value="1">
                                <label for="rondTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="rondTick" value="0">
                                </div>
                                @error('rondTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="rondAang" id="" >
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="rondCorrect" id="" >
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kruisdek</td>
                            <td>
                                <div @error('kruisTick') is-danger @enderror" >
                                <label for="kruisTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="kruisTick" value="1">
                                <label for="kruisTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="kruisTick" value="0">
                                </div>
                                @error('kruisTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="kruisAang" id=" ">
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="kruisAang" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Afmetingen</td>

                            <td>
                                <div @error('afmetingTickO') is-danger @enderror" >
                                <label for="afmetingTickO" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="afmetingTickO" value="1">
                                <label for="afmetingTickO" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="afmetingTickO" value="0">
                                </div>
                                @error('afmetingTickO')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="afmetingAangO" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="afmetingCorrectO" id="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Overstek</td>
                            <td>
                                <div @error('overstekTickO') is-danger @enderror" >
                                <label for="overstekTickO" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="overstekTickO" value="1">
                                <label for="overstekTickO" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="overstekTickO" value="0">
                                </div>
                                @error('afmetingTickO')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="overstekAangO" id=" ">
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="overstekCorrectO" id="">
                                </div>
                            </td>
                        </tr>

                    </table>
                </section>

                {{--Overig--}}
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
                                <div @error('hoekenTick') is-danger @enderror" >
                                <label for="hoekenTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="hoekenTick" value="1">
                                <label for="hoekenTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="hoekenTick" value="0">
                                </div>
                                @error('hoekenTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="hoekenAang" id="" >
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="hoekenCorrect" id="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Stempels</td>
                            <td>
                                <div @error('stempelsTick') is-danger @enderror" >
                                <label for="stempelsTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="stempelsTick" value="1">
                                <label for="stempelsTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="stempelsTick" value="0">
                                </div>
                                @error('stempelsTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="stempelsAang" id="" >
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="stempelsCorrect" id="" >
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Stapel hoogte</td>

                            <td>
                                <div @error('stapelTick') is-danger @enderror" >
                                <label for="stapelTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="stapelTick" value="1">
                                <label for="stapelTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="stapelTick" value="0">
                                </div>
                                @error('stapelTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="stapelAang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="stapelCorrect" id="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Strappen/ Markeren</td>
                            <td>
                                <div @error('strappenTick') is-danger @enderror" >
                                <label for="strappenTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="strappenTick" value="1">
                                <label for="strappenTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="strappenTick" value="0">
                                </div>
                                @error('strappenTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="strappenAang" id=" ">
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="strappenCorrect" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Spijkers (BD,TD,OD)</td>

                            <td>
                                <div @error('spijkerTick') is-danger @enderror" >
                                <label for="spijkerTick" class="has-text-success has-text-weight-bold">&check;</label>
                                <input type="radio" id="" name="spijkerTick" value="1">
                                <label for="spijkerTick" class="has-text-danger has-text-weight-bold">&cross;</label>
                                <input type="radio" id="" name="spijkerTick" value="0">
                                </div>
                                @error('spijkerTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="spijkerAang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="spijkerCorrect" id="">
                                </div>
                            </td>
                        </tr>
                    </table>
                </section>
                <section class="section">
                    <label class='has-text-weight-bold' for='additionalNotes'>Additional Notes:</label>
                    <div class="control ">
                        <input class="input" type="text" name="additionalNotes" id="" placeholder="Optional comments">
                    </div>
                </section>
                <section class="section">
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-primary" id="submitNew">Save</button>
                        </div>
                        <div class="control">
                            <button type="reset" class="button is-warning">Reset</button>
                        </div>
                        <div class="control">
                            <a type="button" href="{{ route('welcome.index') }}" class="button is-light">Cancel</a>
                        </div>
                    </div>
                </section>
            </section>
        </form>
    </section>
@endsection
