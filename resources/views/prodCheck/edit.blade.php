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
                            <h5 class="card bg-gradient-purple">Bovendek</h5>
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
                                <label for="afmetingTickB" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="afmetingTickB" value="1"  {{$production->afmetingTickB === 1 ? 'checked': '' }} >
                                <label for="afmetingTickB" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="afmetingTickB" value="0" {{$production->afmetingTickB === 0 ? 'checked': '' }} >
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
                                <label for="aantalTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="aantalTick" value="1" {{$production->aantalTick === 1 ? 'checked': '' }}>

                                <label for="aantalTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="aantalTick" value="0" {{$production->aantalTick === 0 ? 'checked': '' }}>
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
                                <label for="spatiesTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="spatiesTick" value="1" {{$production->spatiesTick === 1 ? 'checked': '' }}>
                                <label for="spatiesTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="spatiesTick" value="0" {{$production->spatiesTick === 0 ? 'checked': '' }}>
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
                                <label for="klampenTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="klampenTick" value="1" {{$production->klampenTick === 1 ? 'checked': '' }}>
                                <label for="klampenTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="klampenTick" value="0" {{$production->klampenTick === 0 ? 'checked': '' }}>
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
                                <label for="overstekTickB" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="overstekTickB" value="1" {{$production->overstekTickB === 1 ? 'checked': '' }}>
                                <label for="overstekTickB" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="overstekTickB" value="0" {{$production->overstekTickB === 0 ? 'checked': '' }}>
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
                            <h5 class="card bg-gradient-purple">Klossen</h5>
                            <p class="card bg-gradient-red subtitle">Select at least one </p>
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
                            <td>Soort</td>


                            <td>
                                <div class="control">
                                    <select name="soort" class="textarea  @error('soort') is-danger @enderror ">
                                        <option value="">Choose Type</option>
                                        <option value='Spaan'{{$production->soort === "Spaan" ? 'selected':''}}>Spaan</option>
                                        <option value="Hout" {{$production->soort === "Hout" ? 'selected':''}}>Hout</option>
                                    </select>
                                </div>
                                @error('soort')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="soortAang" id="" value={{$production->soortAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="soortHtKd" id="" value={{$production->soortHtKd}}>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Balk</td>


                            <td>
                                <div class="control">
                                    <select name="balk" class="textarea  @error('balk') is-danger @enderror ">
                                        <option value="">Choose Type</option>
                                        <option value='Afmeting1'{{$production->balk === "Afmeting1" ? 'selected':''}}>Afmeting 1</option>
                                        <option value="Afmeting2" {{$production->balk === "Afmeting2" ? 'selected':''}}>Afmeting 2</option>
                                    </select>
                                </div>
                                @error('balk')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </td>


                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="balkAang" id="" value={{$production->soortAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="balkHtKd" id="" value={{$production->soortHtKd}}>
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
                                        <option value='Brug'{{$production->onderdek === "Brug" ? 'selected':''}}>Brug</option>
                                        <option value="Ronddloper" {{$production->onderdek === "Ronddloper" ? 'selected':''}}>Ronddloper</option>
                                        <option value='Kruisdek'{{$production->onderdek === "Kruisdek" ? 'selected':''}}>Kruisdek</option>
                                        <option value='Afmetingen'{{$production->onderdek === "Afmetingen" ? 'selected':''}}>Afmetingen</option>
                                        <option value='Overstek'{{$production->onderdek === "Overstek" ? 'selected':''}}>Overstek</option>
                                    </select>

                                </div>
                                @error('onderdek')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </td>


                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="onderdekAang" id="" value={{$production->brugAang}}>
                                </div>

                            </td>

                            <td>
                                <div class="control ">
                                    <input class="input" type="text" name="onderdekHtKd" id="" value={{$production->brugHtKd}}>
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
                                <label for="hoekenTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="hoekenTick" value="1" {{$production->hoekenTick === 1 ? 'checked': '' }}>
                                <label for="hoekenTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="hoekenTick" value="0" {{$production->hoekenTick === 0 ? 'checked': '' }}>
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
                                <label for="stempelsTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stempelsTick" value="1" {{$production->stempelsTick === 1 ? 'checked': '' }}>
                                <label for="stempelsTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">	&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="stempelsTick" value="0" {{$production->stempelsTick === 0 ? 'checked': '' }}>
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
                                <label for="stapelTick" class="has-text-success has-text-weight-bold" style = "font-size: 35px;">&check;</label>
                                <input type="radio" style = "width:40px; height:40px" id="" name="stapelTick" value="1" {{$production->stapelTick === 1 ? 'checked': '' }}>
                                <label for="stapelTick" class="has-text-danger has-text-weight-bold" style = "font-size: 35px;">&cross;</label>

                                <input type="radio" style = "width:40px; height:40px" id="" name="stapelTick" value="0" {{$production->stapelTick === 0 ? 'checked': '' }}>
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
                                <div class="control">
                                    <select name="strappenTick" class="textarea  @error('strappenTick') is-danger @enderror ">
                                        <option value="">Choose Type</option>
                                        <option value='Strappen'{{$production->strappenTick === "Strappen" ? 'selected':''}}>Strappen</option>
                                        <option value="Markeren" {{$production->strappenTick === "Markeren" ? 'selected':''}}>Markeren</option>
                                    </select>
                                </div>
                                @error('strappenTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                                </div>

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
                                <div class="control">
                                    <select name="spijkerTick" class="textarea  @error('spijkerTick') is-danger @enderror ">
                                        <option value="">Choose Type</option>
                                        <option value='BD'{{$production->spijkerTick === "BD" ? 'selected':''}}>BD</option>
                                        <option value="TD" {{$production->spijkerTick === "TD" ? 'selected':''}}>TD</option>
                                        <option value="OD" {{$production->spijkerTick === "OD" ? 'selected':''}}>OD</option>
                                    </select>
                                </div>
                                @error('spijkerTick')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror
                                </div>

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
                <div class="control "><input class="table table-bordered table-hover table-secondary" type="text" name="additionalNotes" id="" placeholder="Optional comments" value={{$production->additionalNotes}} >
                </div>

                <section class="section">
                    <section class="section">
                        <div>
                            <button type="submit" class="btn btn-info btn-lg btn-lg btn-block" id="submitNew">Save</button>
                        </div>
                        <div class="float-left">
                            <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                            <a type="button" href="{{route('production.show', $production)}}" class="btn btn-light btn-lg">Cancel</a>
                        </div>
                    </section>
                </section>

            </section>
        </form>
    </section>
@endsection
