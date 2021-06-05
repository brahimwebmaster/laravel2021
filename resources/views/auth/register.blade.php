@extends('master')

@section('content')
<div class="container">
<div class="d-flex justify-content-center">
   <div class="col-md-8">
   <form class="form-signin" method="POST", action="{{route('subscribe')}}">
    @csrf
     <div class="text-center mb-4">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  </div>
  <div class="form-label-group mb-3">
   <label for="inputName">Nom</label>
    <input type="text" id="inputName" name="name" class="form-control" value="{{old('name')}}" placeholder="Nom"  autofocus>
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
   <div class="form-label-group mb-3">
   <label for="inputEmail">Email</label>
    <input type="text" id="inputEmail" name="email" class="form-control" value="{{old('email')}}" placeholder="Email"  autofocus>
    </div>
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

   <div class="form-label-group mb-3">
   <label for="inputPassword">Mot de passe</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" >
   </div>
   @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

   <div class="form-label-group mb-3">
   <label for="inputPasswordConfirmation">Confirmation Mot de passe</label>
    <input type="password" id="inputPasswordConfirmation" name="password_confirmation" class="form-control" placeholder="Confirmation Mot de passe">
   </div>

  <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2021</p>
</form>
</div>
</div>
</div>

@endsection