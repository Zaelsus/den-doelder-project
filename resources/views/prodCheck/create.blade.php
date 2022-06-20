{{--if there is an x you can fill in both fields--}}
@extends('layouts.app')

@section('header')
    Create a Production Check
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{ route('production.store') }}">
            @csrf

            <section class="section">
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

                    <table class="table table-bordered table-hover table-secondary">
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
                                <label for="afmetingTickB" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmetingTickB" value="1" @if(old('afmetingTickB') ==  '1') checked @endif>
                                <label for="afmetingTickB" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">	&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmetingTickB" value="0" @if(old('afmetingTickB') ==  '0') checked @endif>
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
                                <div @error('aantalTick') is-danger @enderror" >
                                <label for="aantalTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="aantalTick" value="1" @if(old('aantalTick') ==  '1') checked @endif>
                                <label for="aantalTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="aantalTick" value="0" @if(old('aantalTick') ==  '0') checked @endif>
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
                                <label for="spatiesTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="spatiesTick" value="1" @if(old('spatiesTick') ==  '1') checked @endif>
                                <label for="spatiesTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="spatiesTick" value="0" @if(old('spatiesTick') ==  '0') checked @endif>
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
                                <label for="klampenTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="klampenTick" value="1" @if(old('klampenTick') ==  '1') checked @endif>
                                <label for="klampenTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="klampenTick" value="0" @if(old('klampenTick') ==  '0') checked @endif>
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
                                <label for="overstekTickB" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="overstekTickB" value="1" @if(old('overstekTickB') ==  '1') checked @endif>
                                <label for="overstekTickB" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="overstekTickB" value="0" @if(old('overstekTickB') ==  '0') checked @endif>
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

                <section class="section">
                    <section class="hero">
                        <div class="hero-body">
                            <h5 class="card bg-gradient-purple">Klossen</h5>
                        </div>
                    </section>
                    <table class="table table-bordered table-hover table-secondary">
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
                                <label for="soortTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="soortTick" value="1" @if(old('soortTick') ==  '1') checked @endif>
                                <label for="soortTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="soortTick" value="0" @if(old('soortTick') ==  '0') checked @endif>
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
                                <label for="balkTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="balkTick" value="1" @if(old('balkTick') ==  '1') checked @endif>
                                <label for="balkTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="balkTick" value="0" @if(old('balkTick') ==  '0') checked @endif>
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
                                <label for="afmeting1Tick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmeting1Tick" value="1" @if(old('afmeting1Tick') ==  '1') checked @endif>
                                <label for="afmeting1Tick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmeting1Tick" value="0" @if(old('afmeting1Tick') ==  '0') checked @endif>
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
                                <label for="afmeting2Tick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmeting2Tick" value="1" @if(old('afmeting2Tick') ==  '1') checked @endif>
                                <label for="afmeting2Tick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmeting2Tick" value="0" @if(old('afmeting2Tick') ==  '0') checked @endif>
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

                <section class="section">
                    <section class="hero">
                        <div class="hero-body">
                            <h5 class="card bg-gradient-purple">Onderdek</h5>
                        </div>
                    </section>
                    <table class="table table-bordered table-hover table-secondary">
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
                                <label for="brugTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="brugTick" value="1" @if(old('brugTick') ==  '1') checked @endif>
                                <label for="brugTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="brugTick" value="0" @if(old('brugTick') ==  '0') checked @endif>
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
                                <label for="rondTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="rondTick" value="1" @if(old('rondTick') ==  '1') checked @endif>
                                <label for="rondTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="rondTick" value="0" @if(old('rondTick') ==  '0') checked @endif>
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
                                <label for="kruisTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="kruisTick" value="1" @if(old('kruisTick') ==  '1') checked @endif>
                                <label for="kruisTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="kruisTick" value="0" @if(old('kruisTick') ==  '0') checked @endif>
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
                                    <input class="input " type="text" name="kruisCorrect" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Afmetingen</td>

                            <td>
                                <div @error('afmetingTickO') is-danger @enderror" >
                                <label for="afmetingTickO" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmetingTickO" value="1" @if(old('afmetingTickO') ==  '1') checked @endif>
                                <label for="afmetingTickO" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmetingTickO" value="0" @if(old('afmetingTickO') ==  '0') checked @endif>
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
                                <label for="overstekTickO" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="overstekTickO" value="1" @if(old('overstekTickO') ==  '1') checked @endif>
                                <label for="overstekTickO" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="overstekTickO" value="0" @if(old('overstekTickO') ==  '0') checked @endif>
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
                            <th>Aangepast naar</th>
                            <th>Correctie</th>
                        </tr>

                        <tr>
                            <td>Hoeken zaag</td>

                            <td>
                                <div @error('hoekenTick') is-danger @enderror" >
                                <label for="hoekenTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="hoekenTick" value="1" @if(old('hoekenTick') ==  '1') checked @endif>
                                <label for="hoekenTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="hoekenTick" value="0" @if(old('hoekenTick') ==  '0') checked @endif>
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
                                <label for="stempelsTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stempelsTick" value="1" @if(old('stempelsTick') ==  '1') checked @endif>
                                <label for="stempelsTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stempelsTick" value="0" @if(old('stempelsTick') ==  '0') checked @endif>
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
                                <label for="stapelTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stapelTick" value="1" @if(old('stapelTick') ==  '1') checked @endif>
                                <label for="stapelTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stapelTick" value="0" @if(old('stapelTick') ==  '0') checked @endif>
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
                                <label for="strappenTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="strappenTick" value="1" @if(old('strappenTick') ==  '1') checked @endif>
                                <label for="strappenTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="strappenTick" value="0" @if(old('strappenTick') ==  '0') checked @endif>
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
                                <label for="spijkerTick" class="has-text-success has-text-weight-bold" style = "font-size:35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="spijkerTick" value="1" @if(old('spijkerTick') ==  '1') checked @endif>
                                <label for="spijkerTick" class="has-text-danger has-text-weight-bold" style = "font-size:35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="spijkerTick" value="0" @if(old('spijkerTick') ==  '0') checked @endif>
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
                    <label class='' for='additionalNotes'>Additional Notes:</label>
                    <div class="control ">
                        <input class="table table-bordered table-hover table-secondary" type="text" name="additionalNotes" id="" placeholder="Optional comments">
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
                            <a type="button" href="/home" class="button is-light">Cancel</a>
                        </div>

                    </div>
                </section>
            </section>
        </form>
    </section>
@endsection
