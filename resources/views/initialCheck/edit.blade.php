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
                                <label for="afmetingTickB" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmetingTickB" value="1"  {{$initial->afmetingTickB === 1 ? 'checked': '' }}  >
                                <label for="afmetingTickB" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmetingTickB" value="0" {{$initial->afmetingTickB === 0 ? 'checked': '' }} >
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
                                <label for="aantalTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="aantalTick" value="1" {{$initial->aantalTick === 1 ? 'checked': '' }}>

                                <label for="aantalTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="aantalTick" value="0" {{$initial->aantalTick === 0 ? 'checked': '' }}>
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
                                <label for="klampenTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="klampenTick" value="1" {{$initial->klampenTick === 1 ? 'checked': '' }}>
                                <label for="klampenTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="klampenTick" value="0" {{$initial->klampenTick === 0 ? 'checked': '' }}>
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
                                <label for="schimmelTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="schimmelTick" value="1" {{$initial->schimmelTick === 1 ? 'checked': '' }}>
                                <label for="schimmelTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="schimmelTick" value="0" {{$initial->schimmelTick === 0 ? 'checked': '' }}>
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
                                <label for="waanTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="waanTick" value="1" {{$initial->waanTick === 1 ? 'checked': '' }}>
                                <label for="waanTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="waanTick" value="0" {{$initial->waanTick === 0 ? 'checked': '' }}>
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
                            <h5 class="card bg-gradient-purple">Klossen</h5>
                        </div>
                        <p class="card bg-gradient-red subtitle">Select at least one </p>
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
                                <div class="control">
                                    <select name="soort" class="textarea  @error('soort') is-danger @enderror ">
                                        <option value="">Choose Type</option>
                                        <option value='Spaan'{{$initial->soort === "Spaan" ? 'selected':''}}>Spaan</option>
                                        <option value="Hout" {{$initial->soort === "Hout" ? 'selected':''}}>Hout</option>
                                    </select>
                                </div>
                                @error('soort')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                                </div>

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
                                <div class="control">
                                    <select name="balk" class="textarea  @error('balk') is-danger @enderror ">
                                        <option value="">Choose Type</option>
                                        <option value='Afmeting1'{{$initial->balk === "Afmeting1" ? 'selected':''}}>Afmeting 1</option>
                                        <option value="Afmeting2" {{$initial->balk === "Afmeting2" ? 'selected':''}}>Afmeting 2</option>
                                    </select>

                                </div>
                                @error('balk')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </td>


                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="balkAang" id="" value={{$initial->soortAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="balkHtKd" id="" value={{$initial->soortHtKd}}>
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
                            <th>Type</th>
                            <th>Aangepast naar</th>
                            <th>Ht/Kd: vocht %</th>
                        </tr>

                        <tr>

                            <td>
                                <div class="control">
                                    <select name="onderdek" class="textarea  @error('onderdek') is-danger @enderror ">
                                        <option value="">Choose Type</option>
                                        <option value='Brug'{{$initial->onderdek === "Brug" ? 'selected':''}}>Brug</option>
                                        <option value="Ronddloper Afm(2x)" {{$initial->onderdek === "Ronddloper Afm(2x)" ? 'selected':''}}>Ronddloper Afm(2x)</option>
                                        <option value="Ronddloper Afm(3x)" {{$initial->onderdek === "Ronddloper Afm(3x)" ? 'selected':''}}>Ronddloper Afm(3x)</option>
                                        <option value='Kruisdek'{{$initial->onderdek === "Kruisdek" ? 'selected':''}}>Kruisdek</option>
                                        <option value='Elementen'{{$initial->onderdek === "Elementen" ? 'selected':''}}>Elementen</option>
                                        <option value='Dubbel Dek'{{$initial->onderdek === "Dubbel Dek" ? 'selected':''}}>Dubbel Dek</option>
                                    </select>
                                </div>
                                @error('onderdek')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </td>


                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="onderdekAang" id="" value={{$initial->brugAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="onderdekHtKd" id="" value={{$initial->brugHtKd}}>
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
                            <th>Note</th>
                        </tr>

                        <tr>
                            <td>Hoeken zaag</td>

                            <td>
                                <label for="hoekenTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="hoekenTick" value="1" {{$initial->hoekenTick === 1 ? 'checked': '' }}>
                                <label for="hoekenTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="hoekenTick" value="0" {{$initial->hoekenTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="hoekenAang" id="" value={{$initial->hoekenAang}}>
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td>Extra Stempel</td>

                            <td>
                                <label for="stempelsTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stempelsTick" value="1" {{$initial->stempelsTick === 1 ? 'checked': '' }}>
                                <label for="stempelsTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">	&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stempelsTick" value="0" {{$initial->stempelsTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="stempelsAang" id="" value={{$initial->stempelsAang}}>
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td>Stapel hoogte St/M</td>

                            <td>
                                <label for="stapelTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stapelTick" value="1" {{$initial->stapelTick === 1 ? 'checked': '' }}>
                                <label for="stapelTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stapelTick" value="0" {{$initial->stapelTick === 0 ? 'checked': '' }}>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="stapelAang" id="" value={{$initial->stapelAang}}>
                                </div>

                            </td>

                        </tr>

                        <tr>
                            <td>Strappen/ Markeren</td>

                            <td>
                                <div class="control">
                                    <select name="strappenTick" class="textarea  @error('strappenTick') is-danger @enderror ">
                                        <option value="">Choose Type</option>
                                        <option value='Strappen'{{$initial->strappenTick === "Strappen" ? 'selected':''}}>Strappen</option>
                                        <option value="Markeren" {{$initial->strappenTick === "Markeren" ? 'selected':''}}>Markeren</option>
                                    </select>
                                </div>
                                @error('strappenTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="strappenAang" id="" value={{$initial->strappenAang}}>
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <td>Q(kamer)/Loods/A</td>

                            <td>
                                <div class="control">
                                    <select name="kamerTick" class="textarea  @error('kamerTick') is-danger @enderror ">
                                        <option value="">Choose Type</option>
                                        <option value='Q(kamer)'{{$initial->kamerTick === "Q(kamer)" ? 'selected':''}}>Q(kamer)</option>
                                        <option value="Loods" {{$initial->kamerTick === "Loods" ? 'selected':''}}>Loods</option>
                                        <option value="A" {{$initial->kamerTick === "A" ? 'selected':''}}>A</option>
                                    </select>
                                </div>
                                @error('kamerTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="kamerAang" id="" value={{$initial->kamerAang}}>
                                </div>

                            </td>

                        </tr>

                    </table>
                </section>

                <label class='' for='additionalNotes'>Additional Notes:</label>
                <div class="control "><input class="table table-bordered table-hover table-secondary" type="text" name="additionalNotes" id="" placeholder="Optional comments" value={{$initial->additionalNotes}} >
                </div>

                <section class="section">
                    <div>
                        <button type="submit" class="btn btn-info btn-lg btn-lg btn-block" id="submitNew">Save</button>
                    </div>
                    <div class="float-left">
                        <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                        <a type="button" href="{{route('initial.show', $initial)}}" class="btn btn-light btn-lg">Cancel</a>
                    </div>
                </section>

            </section>
        </form>
    </section>
@endsection
