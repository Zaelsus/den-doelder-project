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
                                <label for="afmetingTickB" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmetingTickB" value="1" @if(old('afmetingTickB') ==  '1') checked @endif>
                                <label for="afmetingTickB" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">	&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="afmetingTickB" value="0" @if(old('afmetingTickB') ==  '0') checked @endif>
                                </div>
                                @error('afmetingTickB')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('afmetingAangB')}}" type="text" name="afmetingAangB" id=""  >
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('afmetingCorrectB')}}" type="text" name="afmetingCorrectB" id="" >
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Aantal planken</td>
                            <td>
                                <div @error('aantalTick') is-danger @enderror" >
                                <label for="aantalTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="aantalTick" value="1" @if(old('aantalTick') ==  '1') checked @endif>
                                <label for="aantalTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="aantalTick" value="0" @if(old('aantalTick') ==  '0') checked @endif>
                                </div>
                                @error('aantalTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('aantalAang')}}" type="text" name="aantalAang" id="" >
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('aantalCorrect')}}" type="text" name="aantalCorrect" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Spaties</td>

                            <td>
                                <div @error('spatiesTick') is-danger @enderror" >
                                <label for="spatiesTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="spatiesTick" value="1" @if(old('spatiesTick') ==  '1') checked @endif>
                                <label for="spatiesTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="spatiesTick" value="0" @if(old('spatiesTick') ==  '0') checked @endif>
                                </div>
                                @error('spatiesTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('spatiesAang')}}" type="text" name="spatiesAang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('spatiesCorrect')}}" type="text" name="spatiesCorrect" id="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Klampen</td>
                            <td>
                                <div @error('klampenTick') is-danger @enderror" >
                                <label for="klampenTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="klampenTick" value="1" @if(old('klampenTick') ==  '1') checked @endif>
                                <label for="klampenTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="klampenTick" value="0" @if(old('klampenTick') ==  '0') checked @endif>
                                </div>
                                @error('klampenTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('klampenAang')}}" type="text" name="klampenAang" id=" ">
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('klampenCorrect')}}" type="text" name="klampenCorrect" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Overstek</td>

                            <td>
                                <div @error('overstekTickB') is-danger @enderror" >
                                <label for="overstekTickB" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="overstekTickB" value="1" @if(old('overstekTickB') ==  '1') checked @endif>
                                <label for="overstekTickB" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="overstekTickB" value="0" @if(old('overstekTickB') ==  '0') checked @endif>
                                </div>
                                @error('overstekTickB')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('overstekAangB')}}" type="text" name="overstekAangB" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('overstekCorrectB')}}" type="text" name="overstekCorrectB" id="">
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
                        <p class="card bg-gradient-red subtitle form-control">Select only one </p>
                    </section>

                    <table class="table table-bordered table-hover table-secondary">
                        <tr>
                            <th></th>
                            <th>Type</th>
                            <th>Aangepast naar</th>
                            <th>Ht/Kd: vocht %</th>
                        </tr>

                        <tr>
                            <td>Soort</td>
                            <td>
                                <div>
                                    <div class="control">
                                        <select name="soort" class="textarea custom-select  @error ('soort') is-danger @enderror ">
                                            <option value="">Choose Type</option>
                                            <option value='Spaan' @if(old('soort') ==  'Spaan') selected @endif>Spaan</option>
                                            <option value="Hout" @if(old('soort') ==  'Hout') selected @endif>Hout</option>
                                        </select>
                                    </div>
                                    @error('soort')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('soortAang')}}" type="text" name="soortAang" id="" >
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('soortHtKd')}}" type="text" name="soortHtKd" id="">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Balk</td>

                            <td>
                                <div>
                                    <div class="control">
                                        <select name="balk" class="textarea  custom-select @error ('balk') is-danger @enderror ">
                                            <option value="">Choose Measurement</option>
                                            <option value="Afmeting1">Afmeting 1</option>
                                            <option value="Afmeting2">Afmeting 2</option>
                                        </select>
                                    </div>
                                    @error('balk')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('balkAang')}}" type="text" name="balkAang" id="">
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('balkHtKd')}}" type="text" name="balkHtKd" id="" >

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
                            <th>Type</th>
                            <th>Aangepast naar</th>
                            <th>Ht/Kd: vocht %</th>
                        </tr>

                        <tr>
                            <td>Description</td>
                            <td>
                                <div>
                                    <div class="control">
                                        <select name="onderdek" class="textarea custom-select @error('onderdek') is-danger @enderror">
                                            <option value="">Choose Type</option>
                                            <option value='Brug'>Brug</option>
                                            <option value="Ronddloper">Ronddloper</option>
                                            <option value="Kruisdek">Kruisdek</option>
                                            <option value="Afmetingen">Afmetingen</option>
                                            <option value="Overstek">Overstek</option>
                                        </select>
                                    </div>
                                    @error('onderdek')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('onderdekAang')}}" type="text" name="onderdekAang" id="" >
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('onderdekHtKd')}}" type="text" name="onderdekHtKd" id="">
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

                                <label for="hoekenTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="hoekenTick" value="1" @if(old('hoekenTick') ==  '1') checked @endif>
                                <label for="hoekenTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="hoekenTick" value="0" @if(old('hoekenTick') ==  '0') checked @endif>
                                </div>
                                @error('hoekenTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('hoekenAang')}}" type="text" name="hoekenAang" id="" >
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('hoekenCorrect')}}" type="text" name="hoekenCorrect" id="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Stempels</td>
                            <td>
                                <div @error('stempelsTick') is-danger @enderror" >
                                <label for="stempelsTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stempelsTick" value="1" @if(old('stempelsTick') ==  '1') checked @endif>
                                <label for="stempelsTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="stempelsTick" value="0" @if(old('stempelsTick') ==  '0') checked @endif>
                                </div>
                                @error('stempelsTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('stempelsAang')}}" type="text" name="stempelsAang" id="" >
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('stempelsCorrect')}}" type="text" name="stempelsCorrect" id="" >
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Stapel hoogte</td>

                            <td>
                                <div @error('stapelTick') is-danger @enderror" >
                                <label for="stapelTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stapelTick" value="1" @if(old('stapelTick') ==  '1') checked @endif>
                                <label for="stapelTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="stapelTick" value="0" @if(old('stapelTick') ==  '0') checked @endif>
                                </div>
                                @error('stapelTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('stapelAang')}}" type="text" name="stapelAang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('stapelCorrect')}}" type="text" name="stapelCorrect" id="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Strappen/ Markeren</td>
                            <td>
                                <div >
                                    <div class="control">
                                        <select name="strappenTick" class="textarea custom-select @error('strappenTick') is-danger @enderror">
                                            <option value="">Choose Type</option>
                                            <option value='Strappen'>Strappen</option>
                                            <option value="Markeren">Markeren</option>
                                        </select>
                                    </div>
                                    @error('strappenTick')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('strappenAang')}}" type="text" name="strappenAang" id=" ">
                                </div>
                            </td>


                        </tr>

                        <tr>
                            <td>Spijkers </td>


                            <td>

                                <div @error('spijkerTick') is-danger @enderror" >
                                <label for="spijkerTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="spijkerTick" value="1" @if(old('spijkerTick') ==  '1') checked @endif>
                                <label for="stapelTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="spijkerTick" value="0" @if(old('spijkerTick') ==  '0') checked @endif>
                                </div>
                                @error('spijkerTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('spijkerAang')}}" type="text" name="spijkerAang" id=" ">
                                </div>
                            </td>
                            <td>
                                <div class="control ">
                                    <input class="input form-control" value="{{old('spijkerCorrect')}}" type="text" name="spijkerCorrect" id="">
                                </div>
                            </td>
                        </tr>
                    </table>
                </section>

                <section class="section">
                    <label class='' for='additionalNotes'>Additional Notes:</label>
                    <div class="control ">
                        <input class="table table-bordered table-hover table-secondary" value="{{old('additionalNotes')}}" type="text" name="additionalNotes" id="" placeholder="Optional comments">
                    </div>
                </section>
                <section class="section">
                    <section class="section">
                        <div>
                            <button type="submit" class="btn btn-info btn-lg btn-lg btn-block" id="submitNew">Save</button>
                        </div>
                        <div class="float-left">
                            <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                            <a type="button" href="/home" class="btn btn-light btn-lg">Cancel</a>
                        </div>
                    </section>
                </section>
            </section>
        </form>
    </section>
    <script src="/js/disable.js"></script>
@endsection
