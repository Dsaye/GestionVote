<?php
require_once "db.php";
class Electeur{
    public $IDElecteur;
    public $CNIElecteur;
    public $NumElecteur;
    public $NomElecteur;
    public $PrenomElecteur;
    public $Sexe;
    public $DateNaiss;
    public $Lieu;
    public $IDDepartement;
    public $IDCommune;
    public $IDArrondissement;
    public $IDBureau_de_vote;
    public $IDRegion;
    public $Profil;
    public $mdp;
   
    // fonction pour incription electeur
    public function saveElecteur($IDElecteur,$CNIElecteur,$NumElecteur,$NomElecteur,$PrenomElecteur,$Sexe,$DateNaiss,$Lieu,$IDDepartement,$IDCommune,$IDArrondissement,$IDBureau_de_vote,$IDRegion,$Profil,$mdp)  :bool
    {
        $db=getDB();
        $ret=false;
          if (!is_null($db))
           {
            $sql="INSERT INTO electeur(IDElecteur,CNIElecteur,NumElecteur,NomElecteur,PrenomElecteur,Sexe,DateNaiss,Lieu,IDDepartement,IDCommune,IDArrondissement,IDBureau_de_vote,IDRegion,Profil,Mdp)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $element=$db->prepare($sql);
              $element->execute(array(null,$CNIElecteur,$NumElecteur,$NomElecteur,$PrenomElecteur,$Sexe,$DateNaiss,$Lieu,$IDDepartement,$IDCommune,$IDArrondissement,$IDBureau_de_vote,$IDRegion,$Profil,md5($mdp) ));
              $ret=true;

            }else{
                echo "erreur de connexion a la basse";
            }
      return $ret;
    }

   function verifieElecteur($Profil,$mdp) :bool
{
  $db=getDB();
  $return=false;
  if (!is_null($db)) {
   $sql="SELECT * from electeur where Profil=:Profil and Mdp=:Mdp";
   $element=$db->prepare($sql);
   $element->execute(array(
    ":Profil" => $Profil,
     ":Mdp" => $mdp
   ));

   $result=$element->fetchAll(PDO::FETCH_ASSOC);
   $nb_ligne=$element->rowCount();
   if($nb_ligne==1 ) 
   {
      session_start();
    $_SESSION["CURRENT_ELECTEUR"]=$result;
    $_SESSION["ID_electeur"]=$result[0]["IDElecteur"];
    $_SESSION["ID_Nom"]=$result[0]["NomElecteur"];
    $_SESSION["ID_Prenom"]=$result[0]["PrenomElecteur"];
    $_SESSION["autoriser"]="oui";
     $return=true;
    
   }
   else{
    header("location:../?non_ok");
   }
//    
  }else{
    echo "veillez verifier votre connexion";
  }

  return $return;

}

}
?>