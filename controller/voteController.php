<?php
require_once "../model/voteModel.php";
if (isset($_POST['voter'])) {
    $IDElecteur= $_POST['IDElecteur'];
    $IDCandidat= $_POST['IDCandidat'];
    $obj_vote=new Vote();

    if($obj_vote->saveVote('',$IDCandidat,$IDElecteur)){
        
       echo"<script>alert ('votre choix à été bien enrégistrer merci!!')</script>";
        echo"<script type='text/javascript'>  HTMLSelectElement.getElementById('vo').disabled=true; </script>";
        header("location:../view/index_electeur.php?voter");

    }else {
        echo "DEJA VOTER";
    }
}

// verifier connexion
if (isset($_POST['valider'])) {
    $IDElecteur=$_POST['IDElecteur'];
    $obj_vote=new Vote();
    if($obj_vote->verifieVote($IDElecteur)){
        var_dump($_SESSION["CURRENT_VOTE"]);
        echo" <script>
       alert('T'AS DEJA VOTE');
       </script>";
        header("location:../view/index_electeur.php");
    }else{
       echo" <script>
       alert('Prenom ou numero electeur incorrecte');
       </script>";
      
    }
}

?>