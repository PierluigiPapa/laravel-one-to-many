@extends('layouts.app')

@section('content')
<h1 class="mt-2 my-3 fw-bold text-center">{{$project->title}}</h1>

<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="card" style="width: 40rem;">
            @if ($project->cover)
            <img src="{{ asset( '/storage/' . $project->cover) }}" alt="">
            @endif
            <div class="card-body">
              <p class="card-text text-center fw-bold fs-3">{{$project->slug}}</p>
              <p class="card-text text-center">{{$project->content}}</p>
            </div>
          </div>
    </div>
</div>
@endsection
