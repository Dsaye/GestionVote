<?php
require_once "../model/electeur.php";
if (isset($_POST['valider_inscription'])) {
    $CNIElecteur= $_POST['CNIElecteur'];
    $NumElecteur= $_POST['NumElecteur'];
    $NomElecteur= $_POST['NomElecteur'];
    $PrenomElecteur= $_POST['PrenomElecteur'];
    $Sexe= $_POST['sexe'];
    $DateNaiss= $_POST['DateNaiss'];
    $Lieu= $_POST['lieu'];
    $IDRegion= $_POST['IDRegion'];
    $IDDepartement= $_POST['IDDepartement'];
    $IDCommune= $_POST['IDCommune'];
    $IDArrondissement= $_POST['IDArrondissement'];
    $IDBureau_de_vote= $_POST['IDBureau_de_vote'];
    
    $Profil= $_POST['Profil'];
    $mdp=$_POST['mdp'];

    $obj_electeur=new Electeur();

    if($obj_electeur->saveElecteur('',$CNIElecteur,$NumElecteur,$NomElecteur,$PrenomElecteur,$Sexe,$DateNaiss,$Lieu,$IDDepartement,$IDCommune,$IDArrondissement,$IDBureau_de_vote,$IDRegion,$Profil,$mdp)){
        header("location:../");

    }else {
        echo "l'inscription ne passe pas";
    }
}

// verifier connexion
if (isset($_POST['valider'])) {
    $Profil=$_POST['Profil'];
    $mdp=md5($_POST['mdp']);
    $obj_electeur=new Electeur();
    if($obj_electeur->verifieElecteur($Profil,$mdp)){
        var_dump($_SESSION["CURRENT_ELECTEUR"]);
        header("location:../view/index_electeur.php");
    }else{
       echo" <script>
       alert('Prenom ou numero electeur incorrecte');
       </script>";
      
    }
}

?>