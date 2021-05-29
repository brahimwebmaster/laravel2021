@extends('master')

@section('content')
<div class="card text-center">

  <div class="card-body">
    <h5 class="card-title">{{$livre->titre}}</h5>
    <p class="card-text">{{$livre->description}}</p>
    <a href="{{route('acceuil')}}" class="btn btn-primary">Retour à la liste</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>

@endsection