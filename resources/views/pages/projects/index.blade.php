@extends('layouts.app')

@section('content')

<main class="container">
    <h1 class="text-center py-3">PierFolio</h1>

    <div class="text-center">
        <a class="btn btn-primary mb-3" href="{{ route('dashboard.projects.create') }}">CREA</a>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col" class="text-center">Id</th>
            <th scope="col" class="text-center">Titolo</th>
            <th scope="col" class="text-center">Descrizione</th>
            <th scope="col" class="text-center">Cover</th>
            <th scope="col" class="text-center">Slug</th>
            <th scope="col" class="text-center">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($project as $item)
            <tr>
                <td><a href="{{route('dashboard.projects.show', $item->id)}}">{{ $item->id }}</a></td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->content }}</td>
                <td>{{ $item->cover }}</td>
                <td>{{ $item->slug }}</td>
                <td>
                    <a class="btn btn-primary my-3" href="{{ route('dashboard.projects.edit', $item->id) }}">MODIFICA</a>
                    <form method="POST" action="{{ route('dashboard.projects.destroy', $item->id) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">CANCELLA</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>

@endsection
