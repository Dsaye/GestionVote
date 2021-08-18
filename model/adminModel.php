<?php
require_once "db.php";
class Admin{
    public $IDAdmin;
    public $Prenom;
    public $Nom;
    public $Login;
    public $MD;
    
   
    // fonction pour incription electeur
    public function saveAdmin($IDAdmin,$Prenom,$Nom,$Login,$MD)  :bool
    {
        $db=getDB();
        $ret=false;
          if (!is_null($db))
           {
            $sql="INSERT INTO admin(IDAdmin,Prenom,Nom,Login,MD)values(?,?,?,?,?)";
            $element=$db->prepare($sql);
              $element->execute(array(null,$Prenom,$Nom,$Login,md5($MD) ));
              $ret=true;

            }else{
                echo "erreur de connexion a la basse";
            }
      return $ret;
    }

   function verifieAdmin($Login,$MD) :bool
{
  $db=getDB();
  $return=false;
  if (!is_null($db)) {
   $sql="SELECT * from admin where Login=:Login and MD=:MD";
   $element=$db->prepare($sql);
   $element->execute(array(
    ":Login" => $Login,
     ":MD" => $MD
   ));

   $result=$element->fetchAll(PDO::FETCH_ASSOC);
   $nb_ligne=$element->rowCount();
   if($nb_ligne==1 ) 
   {
      session_start();
    $_SESSION["CURRENT_ADMIN"]=$result;
    $_SESSION["ID_ADMIN"]=$result[0]["IDAdmin"];
    $_SESSION["ID_Nom"]=$result[0]["Nom"];
    $_SESSION["ID_Prenom"]=$result[0]["Prenom"];
    $_SESSION["autoriser"]="oui";
     $return=true;
    
   }
   else{
    header("location:../index_Admin.php?non_ok");
   }
//    
  }else{
    echo "veillez verifier votre connexion";
  }

  return $return;

}

}
?>