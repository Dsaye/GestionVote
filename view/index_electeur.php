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
<?php include('../controller/voteController.php');?>
<?php include('../model/candicatModel.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Espace Vote</title>
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
     <div class="row"> 
         <div class="col-md-9">
           <h2><?php echo $bienvenue?></h2>
        </div><div class="col-md-3">
      [ <a href="../model/deconnexion.php" class="btn btn-danger">Se déconnecter</a> ]
      </div>
     
      </div>
      <?php
                if(isset($_GET['voter'])){
                  echo "<div class='alert alert-success' role='alert'>vote bien effectuer merci</div>";
                  
                }
            ?> 
      <div class="card-group">
          <!-- cards 1 -->
           <!-- liste des candidats -->
          <?php $candidat  = new Candidat (); ?>
       <?php if($candidat->listeCandidat()) : ?>
        <?php foreach($candidat ->listeCandidat() as $candi) : 
          $image=$candi['nomfic'];
          $image_src="../images/".$image; ?>
        <div class="card">
          <img class="p-5 border bg-light" src='<?php echo $image_src; ?>' width="900" height="900" alt="" class="card-img-top" id="" alt="">
          <div class="card-body">
            <h3 class="card-title"><?= $candi['NomCandidat'] ?></h3>
                <br>
              <b><?= $candi['NomParti'] ?></b>
                <br>
              <b>Sénégal Pour Tous</b>
                <br>
        <form actionT="../controller/voteController.php" method="POST">         
        <input type="hidden" name="IDCandidat"  value="<?= $candi['IDCandidat']?>" class="form-control modal-dialog" required >
        <input type="hidden" name="IDElecteur"  value="<?= $_SESSION["ID_electeur"]?>" class="form-control modal-dialog" required >
            <input style="align-items: center;" id="vo" type="submit" value="voter" name="voter" class="btn btn-primary">
        </form>

            
            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
          </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
</div>
   </body>
   <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

</html>
