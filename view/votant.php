<?php
require_once('../controller/recuperercandidat.php')
// require_once('../controller/controlecandidat.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liste Candidats</title>
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
    <div class="navbar-item">
      <a href="#ajouca" class="navbar-item"><small>ajouter candidat</small></a>
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

  <h1>Liste des candidats</h1>
<table class="table caption-top">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col"><b>Prénom</th>
      <th scope="col"><b>Nom du Parti</th>
      <th scope="col"><b>Avatar candidats</th>
      <th><b>OPERATION</th>
    </tr>
  </thead>
  <tbody>
    

               <!-- fin de la table -->

      <?php $Recuperercandidat  = new Recuperercandidat (); ?>
       <?php if($Recuperercandidat ->getcandidat()) : ?>
        <?php foreach($Recuperercandidat ->getcandidat() as $candidat) : 
             $image= $candidat['nomfic'];
             $image_src="../images/".$image; 
             ?>
      <tr>
      <td><b><?= $candidat['IDCandidat'] ?></td>
        <td><b><?= $candidat['NomCandidat'] ?></td>
        <td><b><?= $candidat['NomParti'] ?></td>
        <td><img src='<?php echo $image_src; ?>' width="100" height="60" alt=""></td>
        <td> <a href="#=<?php echo $candidat['IDCandidat'] ?>"   class='btn btn-warning'><i class="fas fa-user-edit"></i></a>
            <a href="../controller/controlecandidat.php?Candi=<?php echo $candidat['IDCandidat'] ?>" onclick="return confirm('voulez vous supprimer ce candidat?')" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
        
        

      </tr>
      <?php endforeach; ?>
        <?php endif; ?>
  </tbody>
</table>
<!-- fin de la table -->
<div class="error">
                    <?php if (isset($_GET['error'])){ echo '<p>'.$_GET['error'].'</p>';} ?>
                </div>
<!-- formulaire d'ajout de candidat uniquement par l'admin -->
<form action="../controller/controlecandidat.php " id="ajouca" method="POST" enctype="multipart/form-data">
    <legend>Ajouter Candidats</legend>
    
    <div class="mb-3">
        <input type="text" id="disabledTextInput" class="form-control" name="NomCandidat" placeholder="prenom">
    </div>
    <div class="mb-3">
        <input type="text" id="disabledTextInput" class="form-control" name="NomParti" placeholder="nom du parti">
    </div>
   
    <div class="mb-3">
        <label class="form-label" for="form3Example1">&nbsp&nbsp Photo Candidat</label>
        <input type="file" class="form-control" name="monfic" id="customFile" required />
                                
                            </div>
                       

    <button type="submit" id="disabledTextInput" class="btn btn-primary" name="ajouter">Valider</button>
</form>
</body>
</html>