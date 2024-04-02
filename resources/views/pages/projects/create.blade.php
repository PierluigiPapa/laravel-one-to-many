@extends('layouts.app')

@section('content')

<h1 class="text-center py-3">Crea un nuovo progetto</h1>

<main class="container py-3">
    <form action="{{route('dashboard.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
            @error('title')
            <div class="text-danger text-center">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover" class="form-label fw-bold">Carica una nuova immagine</label>
            <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover" name="cover">
            @error('cover')
            <div class="text-danger text-center">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label fw-bold">Seleziona una tipologia</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option selected>Seleziona una tipologia</option>
                @foreach ($types as $item)
                <option value="{{$item->id}}"
                    {{$item->id == old('type_id') ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
              </select>
        </div>


        <div class="mb-3">
            <label for="content" class="form-label fw-bold">Descrizione</label>
            <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            @error('content')
            <div class="text-danger text-center">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">CREA NUOVO PROGETTO</button>
        </div>
    </form>

</main>
@endsection
