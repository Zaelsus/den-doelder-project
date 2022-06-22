{{--if there is an x you can fill in both fields--}}
@extends('layouts.app')

@section('header')
    Create an Initial Check
@endsection

@section('content')
    <section class="content">
        <form method="POST" action="{{route('initial.store')}}">
            @csrf

            <section class="section">
                {{--Bovendek--}}
                <section class="section">
                    <section class="hero">
                        <div class="hero-body">
                            <h5 class="card bg-gradient-purple">Bovendek</h5>
                        </div>
                    </section>

                    <table class="table table-bordered table-hover table-secondary">
                        <tr>
                            <th></th>
                            <th>Condition</th>
                            <th>Aangepast naar</th>
                            <th>Ht/Kd: vocht %</th>
                        </tr>

                        <tr>
                            <td>Afmeting</td>



                            <td>
                                <div @error('afmetingTickB') is-danger @enderror" >
                                <label for="afmetingTickB" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="afmetingTickB" value="1" @if(old('afmetingTickB') ==  '1') checked @endif>
                                <label for="afmetingTickB" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">	&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="afmetingTickB" value="0" @if(old('afmetingTickB') ==  '0') checked @endif>
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
                                    <input class="input" type="text" name="afmetingHtKdB" id="" >
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Aantal planken</td>
                            <td>
                                <div @error('aantalTick') is-danger @enderror" >
                                <label for="aantalTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="aantalTick" value="1" @if(old('aantalTick') ==  '1') checked @endif>
                                <label for="aantalTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="aantalTick" value="0" @if(old('aantalTick') ==  '0') checked @endif>
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
                                    <input class="input" type="text" name="aantalHtKd" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Klampen</td>
                            <td>
                                <div @error('klampenTick') is-danger @enderror" >
                                <label for="klampenTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="klampenTick" value="1" @if(old('klampenTick') ==  '1') checked @endif>
                                <label for="klampenTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="klampenTick" value="0" @if(old('klampenTick') ==  '0') checked @endif>
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
                                    <input class="input " type="text" name="klampenHtKd" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Schimmel Ja/Nee</td>

                            <td>
                                <div @error('schimmelTick') is-danger @enderror" >
                                <label for="schimmelTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="schimmelTick" value="1" @if(old('schimmelTick') ==  '1') checked @endif>
                                <label for="schimmelTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="schimmelTick" value="0" @if(old('schimmelTick') ==  '0') checked @endif>
                                </div>
                                @error('schimmelTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="schimmelAang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="schimmelHtKd" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Waan Ja/Nee</td>

                            <td>
                                <div @error('waanTick') is-danger @enderror" >
                                <label for="waanTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="waanTick" value="1" @if(old('waanTick') ==  '1') checked @endif>
                                <label for="waanTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="waanTick" value="0" @if(old('waanTick') ==  '0') checked @endif>
                                </div>
                                @error('waanTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="waanAang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="waanHtKd" id="">
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
                            <th>Ht/Kd: vocht %</th>
                        </tr>
                        <tr>
                            <td>Soort (Spaan/ Hout)</td>
                            <td>
                                <div @error('soortTick') is-danger @enderror" >
                                <label for="soortTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="soortTick" value="1" @if(old('soortTick') ==  '1') checked @endif>
                                <label for="soortTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="soortTick" value="0" @if(old('soortTick') ==  '0') checked @endif>
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
                                    <input class="input" type="text" name="soortHtKd" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Balk</td>

                            <td>
                                <div @error('balkTick') is-danger @enderror" >
                                <label for="balkTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="balkTick" value="1" @if(old('balkTick') ==  '1') checked @endif>
                                <label for="balkTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="balkTick" value="0" @if(old('balkTick') ==  '0') checked @endif>
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
                                    <input class="input " type="text" name="balkHtKd" id="" >
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Afmeting 1</td>
                            <td>
                                <div @error('afmeting1Tick') is-danger @enderror" >
                                <label for="afmeting1Tick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="afmeting1Tick" value="1" @if(old('afmeting1Tick') ==  '1') checked @endif>
                                <label for="afmeting1Tick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="afmeting1Tick" value="0" @if(old('afmeting1Tick') ==  '0') checked @endif>
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
                                    <input class="input " type="text" name="afmeting1HtKd" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Afmeting 2</td>

                            <td>
                                <div @error('afmeting2Tick') is-danger @enderror" >
                                <label for="afmeting2Tick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="afmeting2Tick" value="1" @if(old('afmeting2Tick') ==  '1') checked @endif>
                                <label for="afmeting2Tick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="afmeting2Tick" value="0" @if(old('afmeting2Tick') ==  '0') checked @endif>
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
                                    <input class="input " type="text" name="afmeting2HtKd" id="">
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
                            <th>Ht/Kd: vocht %</th>
                        </tr>
                        <tr>
                            <td>Brug</td>
                            <td>
                                <div @error('brugTick') is-danger @enderror" >
                                <label for="brugTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="brugTick" value="1" @if(old('brugTick') ==  '1') checked @endif>
                                <label for="brugTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="brugTick" value="0" @if(old('brugTick') ==  '0') checked @endif>
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
                                    <input class="input " type="text" name="brugHtKd" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Ronddloper Afm(2x)</td>

                            <td>
                                <div @error('rond2xTick') is-danger @enderror" >
                                <label for="rond2xTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="rond2xTick" value="1" @if(old('rond2xTick') ==  '1') checked @endif>
                                <label for="rond2xTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="rond2xTick" value="0" @if(old('rond2xTick') ==  '0') checked @endif>
                                </div>
                                @error('rond2xTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="rond2xAang" id="" >
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="rond2xHtKd" id="" >
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Ronddloper Afm(3x)</td>

                            <td>
                                <div @error('rond3xTick') is-danger @enderror" >
                                <label for="rond3xTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="rond3xTick" value="1" @if(old('rond3xTick') ==  '1') checked @endif>
                                <label for="rond3xTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="rond3xTick" value="0" @if(old('rond3xTick') ==  '0') checked @endif>
                                </div>
                                @error('rond3xTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="rond3xAang" id="" >
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="rond3xHtKd" id="" >
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Kruisdek</td>
                            <td>
                                <div @error('kruisTick') is-danger @enderror" >
                                <label for="kruisTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="kruisTick" value="1" @if(old('kruisTick') ==  '1') checked @endif>
                                <label for="kruisTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="kruisTick" value="0" @if(old('kruisTick') ==  '0') checked @endif>
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
                                    <input class="input " type="text" name="kruisHtKd" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Elementen</td>

                            <td>
                                <div @error('elementenTick') is-danger @enderror" >
                                <label for="elementenTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="elementenTick" value="1" @if(old('elementenTick') ==  '1') checked @endif>
                                <label for="elementenTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="elementenTick" value="0" @if(old('elementenTick') ==  '0') checked @endif>
                                </div>
                                @error('elementenTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="elementenAang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="elementenHtKd" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Dubbel Dek</td>
                            <td>
                                <div @error('dubbelTick') is-danger @enderror" >
                                <label for="dubbelTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="dubbelTick" value="1" @if(old('dubbelTick') ==  '1') checked @endif>
                                <label for="dubbelTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="dubbelTick" value="0" @if(old('dubbelTick') ==  '0') checked @endif>
                                </div>
                                @error('dubbelTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="dubbelAang" id=" ">
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="dubbelHtKd" id="">
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
                            <th></th>
                            <th></th>
                        </tr>

                        <tr>
                            <td>Hoeken zaag</td>

                            <td>
                                <div @error('hoekenTick') is-danger @enderror" >
                                <label for="hoekenTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="hoekenTick" value="1" @if(old('hoekenTick') ==  '1') checked @endif>
                                <label for="hoekenTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="hoekenTick" value="0" @if(old('hoekenTick') ==  '0') checked @endif>
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
                                    <input class="input " type="text" name="hoekenHtKd" id="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Extra Stempels</td>
                            <td>
                                <div @error('stempelsTick') is-danger @enderror" >
                                <label for="stempelsTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="stempelsTick" value="1" @if(old('stempelsTick') ==  '1') checked @endif>
                                <label for="stempelsTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="stempelsTick" value="0" @if(old('stempelsTick') ==  '0') checked @endif>
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
                                    <input class="input " type="text" name="stempelsHtKd" id="" >
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Stapel hoogte St/M</td>

                            <td>
                                <div @error('stapelTick') is-danger @enderror" >
                                <label for="stapelTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="stapelTick" value="1" @if(old('stapelTick') ==  '1') checked @endif>
                                <label for="stapelTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="stapelTick" value="0" @if(old('stapelTick') ==  '0') checked @endif>
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
                                    <input class="input" type="text" name="stapelHtKd" id="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Strappen/ Markeren</td>
                            <td>
                                <div @error('strappenTick') is-danger @enderror" >
                                <label for="strappenTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="strappenTick" value="1" @if(old('strappenTick') ==  '1') checked @endif>
                                <label for="strappenTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="strappenTick" value="0" @if(old('strappenTick') ==  '0') checked @endif>
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
                                    <input class="input " type="text" name="strappenHtKd" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Q(kamer)/Loods/A</td>

                            <td>
                                <div @error('kamerTick') is-danger @enderror" >
                                <label for="kamerTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="kamerTick" value="1" @if(old('kamerTick') ==  '1') checked @endif>
                                <label for="kamerTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="kamerTick" value="0" @if(old('kamerTick') ==  '0') checked @endif>
                                </div>
                                @error('kamerTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="kamerAang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="kamerHtKd" id="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Speciale Instructie</td>

                            <td>
                                <div @error('specialeTick') is-danger @enderror" >
                                <label for="specialeTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="specialeTick" value="1" @if(old('specialeTick') ==  '1') checked @endif>
                                <label for="specialeTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px"    id="" name="specialeTick" value="0" @if(old('specialeTick') ==  '0') checked @endif>
                                </div>
                                @error('specialeTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="specialeAang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input " type="text" name="specialeHtKd" id="">
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
