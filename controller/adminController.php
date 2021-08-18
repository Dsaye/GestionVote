<?php
require_once "../model/adminModel.php";
if (isset($_POST['valider'])) {
    $Nom= $_POST['Nom'];
    $Prenom= $_POST['Prenom'];
    $Login= $_POST['Login'];
    $MD=$_POST['MD'];

    $obj_admin=new Admin();

    if($obj_admin->saveAdmin('',$Nom,$Prenom,$Login,$MD)){
        header("location:../");

    }else {
        echo "l'inscription ne passe pas";
    }
}

// verifier connexion
if (isset($_POST['valider'])) {
    $Login= $_POST['Login'];
    $MD=$_POST['MD'];
    $obj_admin=new Admin();
    if($obj_admin->verifieAdmin($Login,$MD)){
        var_dump($_SESSION["CURRENT_ADMIN"]);
        header("location:../view/admin_view.php");
    }else{
       echo" <script>
       alert('Prenom ou numero electeur incorrecte');
       </script>";
      
    }
}

?>