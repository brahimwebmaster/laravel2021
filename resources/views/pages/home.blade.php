@extends('master')
@section('content')
{{$livres->links()}}
<h2>{{$livres->count()}} Livres affiché(s) sur {{$livres->total()}}</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($livres as $livre)
    <tr>
      <th scope="row">{{$livre->id}}</th>
      <td>{{$livre->titre}}</td>
      <td>
        <a class="btn btn-primary" href="{{route('afficher_livre', $livre->id)}}">Voir</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$livres->links()}}
@endsection
