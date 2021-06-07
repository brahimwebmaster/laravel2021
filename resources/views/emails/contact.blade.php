<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>INFO</h2>
    <p>{{ $contact['message'] }}</p>
    <ul>
      <li><strong>Votre Nom</strong> : {{ $contact['nom'] }}</li>
      <li><strong>Votre Email</strong> : {{ $contact['email'] }}</li>
    </ul>
  </body>
</html>