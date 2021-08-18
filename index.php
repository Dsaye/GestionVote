<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion de Vote</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css" integrity="sha512-IgmDkwzs96t4SrChW29No3NXBIBv8baW490zk5aXvhCD8vuZM3yUSkbyTBcXohkySecyzIrUwiF/qV0cuPcL3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"/>
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"/>
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css"rel="stylesheet"/>
    <!-- Animate CSS -->
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
 
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> <title>Document</title>
</head>
<body>
 <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 pt-5">
        <article class="panel is-info">
            <p class="panel-heading">Authentification</p>
            <?php
                if(isset($_GET['non_ok'])){
                    echo "<div class='alert alert-danger' role='alert'>Veillez verifier votre Profil ou Mot de passe</div>";
                }
            ?>
<form action="controller/electeurController.php" method="post">
  <!-- Email input -->
  <div class="md-form">
    <i class="fas fa-user prefix grey-text"></i>
      <input type="text" name="Profil"  class="form-control" required>
      <label for="Profil">Profil</label>
    </div>

  <!-- Password input -->
  <div class="md-form">
    <i class="fas fa-key prefix grey-text"></i>
      <input type="password" name="mdp"  class="form-control" required >
      <label for="mdp">Mot de passe</label>
    </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block" name="valider" value="connecter">Connecter</button>
    
</form><br>
<div class="col-md-5">
      <!-- Simple link -->
      <a href="view/form_inscription.php" >S'inscrire</a>
    </div>
        </article>

</div>
          <div class="col-md-6 pt-5">
            <img src="images/votlingne.jpeg" alt="">
          </div>
      </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>