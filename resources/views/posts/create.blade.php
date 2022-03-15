@extends('common.minimal')

@section('title', 'Nieuw artikel toevoegen')

@section('section')

    {{-- Here are all the form fields --}}
    <div class="field">
        <label class="label">Titel</label>
        <div class="control">
            <input name="title" class="input @error('title') is-danger @enderror"
                   type="text" placeholder="De titel hier...">
        </div>
        @error('title')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Samenvatting</label>
        <div class="control">
            <textarea name="excerpt"
                      class="textarea @error('excerpt') is-danger @enderror"
                      type="text" placeholder="De samenvatting hier..."></textarea>
        </div>
        @error('excerpt')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Inhoud</label>
        <div class="control">
            <textarea name="body" class="textarea @error('body') is-danger @enderror"
                      rows="15" placeholder="De hoofdtekst hier..."></textarea>
        </div>
        @error('body')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    </div>
    <div class="field is-grouped">
        {{-- Here are the form buttons: save, reset and cancel --}}
        <div class="control">
            <button type="submit" class="button is-primary">Opslaan</button>
        </div>
        <div class="control">
            <button type="reset" class="button is-warning">Reset</button>
        </div>
        <div class="control">
            <a type="button" href="/posts" class="button is-light">Annuleren</a>
        </div>
    </div>
@endsection


