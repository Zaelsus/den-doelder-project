@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12"> {{-- These divs are needed for proper layout --}}
                    <form method="POST" action="{{ route('notes.update',$note) }}">
                        @csrf
                        @method('PUT')
                        <div class="card"> {{-- The form is placed inside a Bulma Card component --}}
                            <header class="card-header">
                                <p class="card-header-title"> {{-- The Card header content --}}
                                    Edit note <b>{{$note->title}}</b> for order  <b>{{$note->order->order_number}}</b>
                                </p>
                            </header>

                            <div class="card-content">
                                <div class="content">

                                    {{-- Here are all the form fields --}}
                                    <div class="field">
                                        <label class="label">Note title</label>
                                        <div class="control">
                                            <input name="title" class="input @error('title') is-danger @enderror"
                                                   type="text" value="{{$note->title}}">
                                        </div>
                                        @error('title')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label">Content</label>
                                        <div class="control">
                                            <textarea rows="3" cols="75" name="content" class="input @error('content') is-danger @enderror"
                                                   type="text">{{$note->content}}</textarea>
                                        </div>
                                        @error('content')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                <div class="field is-grouped">
                                        <button type="submit" class="button is-primary">Save</button>
                                        <a type="button" href="{{ route('notes.show', $note) }}" class="button is-light">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form method="POST" action="{{route('notes.destroy', $note)}}">
                        @csrf
                        @method('DELETE')
                        <button  onclick="return confirm('Are you sure?')" class="button is-primary" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
