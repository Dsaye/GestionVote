<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:../");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".$_SESSION["ID_Nom"]." ".$_SESSION["ID_Prenom"]." ".
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".$_SESSION["ID_Nom"]." ".$_SESSION["ID_Prenom"]." ".
      " dans votre espace personnel";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="node_modules/bulma/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>

<nav class="navbar has-shadow is-link">
  <div class="navbar-brand">
    <a href="admin_view.php" class="navbar-item"></a>
    <img src="../images/voting.png" width="50" height="10" alt="logo">
  </div>
  <div class="navbar-burger">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <div class="navbar-menu">
    <div class="navbar-start">
      <a href="#" class="navbar-item"><small>Accueil</small></a>
    </div>
    <div class="navbar-end">
      <div class="navbar-item dropdown is-hoverable">
        <div class="navbar-link">Admin</div>
        <div class="navbar-dropdown">
          <a href="../model/admindeconnexion.php" class="navbar-item">Déconnexion</a>

        </div>
      </div>
    </div>
  </div>
</nav>
<div class="row">
<?php echo"<h1>". $bienvenue."</h1>"?>
</div>
<div class="columns is-variable is-0 mt-4">
  <div class="menu-container px-0">
      <div class="menu-wrapper">
          <aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a class="is-active">Tableau de bord</a></li>
  </ul>
  <p class="menu-label">
    Administration
  </p>
  <ul class="menu-list">
    <li><a></a></li>
    <li>
      <a class="is-active">les votants</a>
      <ul>
        <li><a>Liste des votants</a></li>
        <li><a>liste des inscrits</a></li>
        <li><a>Liste des bureaux</a></li>
        <li><a href="votant.php">Liste des candidats</a></li>

      </ul>
    </li>
    <li><a></a></li>
    <li><a></a></li>
    <li><a></a></li>
  </ul>
  <p class="menu-label">
  
  </p>
  <ul class="menu-list">
    <li><a></a></li>
    <li><a></a></li>
    <li><a></a></li>
  </ul>
</aside>
      </div>
  </div>
  
</div>
  
</body>
</HTML>