<?php include("../model/db.php");
$db=getDB();

$sql="SELECT * from region ";
   $element=$db->prepare($sql);
   $element->execute();

   $result=$element->fetchAll(PDO::FETCH_ASSOC);
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
<div class="container is-max-desktop">
    <div class="row">
        <div class="col-md-6 pt-5">
<article class="panel is-info">
<p class="panel-heading">INSCRIPTION ELECTEUR</p>
<form action="../controller/electeurController.php" method="POST">
                      <div class="md-form">
                        <input type="text" name="NomElecteur"  class="form-control" required>
                        <label for="Nom">Nom</label>
                      </div>
            
                      <div class="md-form">
                        <input type="text" name="PrenomElecteur"  class="form-control" required>
                        <label for="Prenom">Prenom</label>
                      </div>

                      <div class="md-form">
                        <input type="text" name="NumElecteur"  class="form-control" maxlength="10" required>
                        <label for="Numero">Numero electeur</label>
                      </div>
            
                    <div class="md-form">
                    <label for="Sexe">Sexe</label>
                         <select class="select form-control" name="sexe"  required>
                      <option value=""></option>
                       <option value="homme">Homme</option>
                       <option value="femme">Femme</option>
                         </select>
                    </div>

                    <div class="md-form">
                        <input type="text" name="CNIElecteur"  class="form-control" maxlength="16" required>
                        <label for="CNIElecteur">CNI Electeur</label>
                      </div>

                      <div class="md-form">
                        <input type="date" name="DateNaiss"  class="form-control" required>
                        <label for="DateNaiss">Date de Naissance</label>
                      </div>
                      <div class="md-form">
                        <input type="text" name="lieu"  class="form-control" required>
                        <label for="lieu">Lieu de Naissance</label>
                      </div>
                      <div class="md-form">
                      <select class="select form-control IDRegion" name="IDRegion"  required>
                     <option value="0">Choisir votre Region</option>
     <?php foreach($result as $row){ echo '<option value="'.$row['IDRegion'].'">'.$row['NomRegion'].'</option>'; }?>
      <option value=""></option>
</select>
                        <label for="region"></label>
                      </div>
                      <div class="md-form">
                      <select class="select form-control IDDepartement" name="IDDepartement"  required>
                      <option >choisir votre departement</option>
      
</select>
                        <label for="IDDepartementt"></label>
                      </div>
            
                      <div class="md-form">
                      <select class="select form-control IDCommune" name="IDCommune"  required>
                      <option >Choisir votre Commune</option>
                      
      
</select>
                        <label for="IDCommune"></label>
                      </div>

                      <div class="md-form">
                      <select class="select form-control IDArrondissement" name="IDArrondissement"  required>
                              <option >Choisir votre Arrondissement</option>
                              
                     </select>
                        <label for="IDArrondissement"></label>
                      </div>

                      <div class="md-form">
                      <select class="select form-control IDBureau_de_vote" name="IDBureau_de_vote"  required>
                           <option></option>
                      </select>
                        <label for="IDBureau_de_vote"></label>
                      </div>
            
                      <div class="md-form">
                        <input type="text" name="Profil" class="form-control" required>
                        <label for="Profil">Profil</label>
                      </div>
                      <div class="md-form">
                        <input type="password" name="mdp" class="form-control" required>
                        <label for="mdp">Mot de Passe</label>
                      </div>
            
                      <div class="text-center mt-4">
                        <button type="submit" name="valider_inscription" class="btn btn-primary">Valider</button>
                        <button type="reset" name="annuler" class="btn btn-danger"  value="annuler">Annuler</button>
                      </div>
                    </form>
</article>
</div>
<div class="col-md-6 pt-5">
    <img src="../images/vv.jpg" alt="" >
    <img src="../images/vo.jpg" alt="" class="pt-5">
    <img src="../images/im.png" alt="" class="pt-5">
</div>
</div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".IDRegion").change(function()
{
var IDRegion=$(this).val();
var post_id = 'id='+ IDRegion;

$.ajax
({
type: "POST",
url: "../model/ajax.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".IDDepartement").html(cities);
} 
});

});
});

/*commmune */
$(document).ready(function()
{
$(".IDDepartement").change(function()
{
var IDDepartement=$(this).val();
var post_id = 'iddep='+ IDDepartement;

$.ajax
({
type: "POST",
url: "../model/ajax.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".IDCommune").html(cities);
} 
});

});
});

/*arrondissement */
$(document).ready(function()
{
$(".IDCommune").change(function()
{
var IDCommune=$(this).val();
var post_id = 'idco='+ IDCommune;

$.ajax
({
type: "POST",
url: "../model/ajax.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".IDArrondissement").html(cities);
} 
});

});
});

/*bureau de vote */
$(document).ready(function()
{
$(".IDArrondissement").change(function()
{
var IDArrondissement=$(this).val();
var post_id = 'idbu='+ IDArrondissement;

$.ajax
({
type: "POST",
url: "../model/ajax.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".IDBureau_de_vote").html(cities);
} 
});

});
});

</script>
</body>
  <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>
</html>