@extends('master')
@section('content')
{{$livres->links()}}
<h2>{{$livres->count()}} Livres affiché(s) sur {{$livres->total()}}</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Catégorie</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($livres as $livre)
    <tr>
      <th scope="row">{{$livre->id}}</th>
      <td>{{$livre->titre}}</td>
      <td>{{$livre->category->nom_categorie}}</td>
      <td>
        <a class="btn btn-primary" href="{{route('afficher_livre', $livre->id)}}">Voir</a>
        <a class="btn btn-warning" href="{{route('editer_livre', $livre->id)}}">Editer</a>
        <a class="btn btn-danger" href="{{route('supprimer_livre', $livre->id)}}">Supprimer</a>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$livres->links()}}
@endsection
