@extends('master')
@section('content')
<form method="POST" action="{{route('post_editer_livre',$livre->id)}}">
   @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Titre Livre</label>
    <input type="text" name="titre" value="{{old('titre',$livre->titre)}}" class="form-control">
  </div>
  @error('titre')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    {{old('category_id')}}
    <div class="form-group">
      <label for="sel1">Choisir Categorie :</label>
      <select class="form-control" name="category_id">
       <option value="">Choisir Catégorie</option>
        @foreach($categories as $cat)   
       <option value="{{ $cat->id }}" 
       @if((old('category_id') && old('category_id') == $cat->id )|| (($livre->category->id == $cat->id && !old('category_id'))))   
       
       selected 
       
       @endif
       
        >{{ $cat->nom_categorie }}</option>
        @endforeach
      </select>

   
    </div>
       @error('category_id')
    <div class="alert alert-danger">{{ $message }}</div>
      @enderror

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea name="description" class="form-control"  rows="3">{{old('description',$livre->description)}}</textarea>
  </div>
  <div class="form-group">
  <input type="submit" class="btn btn-primary" value="Modifier">
  </div>
  @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
</form>
@endsection