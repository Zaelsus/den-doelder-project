@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12"> {{-- These divs are needed for proper layout --}}
                    <form method="POST" action="{{ route('notes.store') }}">
                        @csrf
                        <div class="card"> {{-- The form is placed inside a Bulma Card component --}}
                            <header class="card-header">
                                <p class="card-header-title"> {{-- The Card header content --}}
                                    Add a new note
                                </p>
                            </header>

                            <div class="card-content">
                                <div class="content">

                                    {{-- Here are all the form fields --}}
                                    <div class="field">
                                        <label for="order_id">Order ID</label>
                                        <div class="control">
                                            <select
                                                class="@error('order_id') button-error @enderror inputField" name="order_id" id="order_id">
                                                <option value="">Choose an order id</option>
                                                @foreach($orders as $order)
                                                    <option value={{$order->id}}>{{$order->id}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label class="label">Title</label>
                                        <div class="control">
                                            <input name="title" class="input @error('title') is-danger @enderror"
                                                   type="text" value="{{old('title')}}">
                                        </div>
                                        @error('title')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="field">
                                        <label class="label">Content</label>
                                        <textarea class="@error('content') button-error @enderror text-area" name="content"
                                        >{{old('content')}}</textarea>
                                        @error('content')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field is-grouped">
                                    {{-- Here are the form buttons: save, reset and cancel --}}
                                    <div class="control">
                                        <button type="submit">Save</button>
                                    </div>
                                    <div class="control">
                                        <button href="history.go(-1)">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
