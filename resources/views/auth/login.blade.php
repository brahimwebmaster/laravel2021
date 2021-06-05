@extends('master')

@section('content')
<div class="container">
<div class="d-flex justify-content-center">
   <div class="col-md-8">
   <form class="form-signin" method="POST" action="{{route('postLogin')}}">
   @csrf
     <div class="text-center mb-4">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  </div>
  @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
   <div class="form-label-group mb-3">
   <label for="inputEmail">Email</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
    </div>

   <div class="form-label-group">
   <label for="inputPassword">Mot de passe</label>

    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required>
   </div>

   <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2021</p>
</form>
</div>
</div>
</div>

@endsection