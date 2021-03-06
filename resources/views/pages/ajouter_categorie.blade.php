@extends('master')
@section('content')

<form method="POST" action="{{route('post_ajouter_categorie')}}">
  @csrf
  <div class="form-group">
  @error('nom_categorie')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    <label for="exampleFormControlInput1">Nom Catégorie :</label>
    <input type="text" name="nom_categorie" value="{{ old('categorie')}}" class="form-control">
  </div>
  <div class="form-group">
  <input type="submit" class="btn btn-primary" value="Ajouter">
  </div>
</form>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom Catégorie</th>
      <th scope="col"> Nombre de livres</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $categorie)
    <tr>
      <th scope="row">{{$categorie->id}}</th>
      <td>{{$categorie->nom_categorie}}</td>
      <td>{{$categorie->livres->count()}}</td>
    </tr>
  @endforeach
  </tbody>
</table>

@endsection