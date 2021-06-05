<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="{{route('acceuil')}}">{{ $application_name }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('acceuil')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="{{route('ajouter_livre')}}">Ajouter Livre</a>
          <a class="dropdown-item" href="{{route('ajouter_categorie')}}">Ajouter Catégorie</a>
        </div>
      </li>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
        @foreach ($categories as $categorie )
           <a class="dropdown-item" href="{{route('recherche_par_categorie',$categorie->id)}}">{{ $categorie->nom_categorie }}</a>
        @endforeach
        </div>
      </li>
    </ul>
    <div class="mr-3">
    <ul class="navbar-nav ml-auto">
         <!-- Authentication Links -->
         @guest
          <li class="nav-item">
           <a class="nav-link" href="{{ route('login') }}">Login</a>
           </li>                     
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Créer un compte</a>
            </li>
            @else
            <li>
             <a  class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        Logout
               </a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
              </form>
                </li>
          @endguest
        </ul>
      </div>



    <form class="form-inline my-2 my-lg-0" method='POST' action="{{route('recherche_par_titre')}}">
    @csrf
      <input class="form-control mr-sm-2" type="text" name='recherche' placeholder="Tapez un titre .." aria-label="Tapez un titre">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Chercher Livre</button>
    </form>
  </div>
</nav>