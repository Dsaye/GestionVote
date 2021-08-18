<?php
require_once "db.php";
class Vote{
    public $IDVote;
    public $IDElecteur;
    public $IDCandidat;
   
    // fonction pour effectuer un vote
    public function saveVote($IDVote,$IDCandidat,$IDElecteur)  :bool
    {
        $db=getDB();
        $ret=false;
          if (!is_null($db))
           {
            $sql="INSERT INTO vote(IDVote,IDCandidat,IDElecteur)values(?,?,?)";
            $element=$db->prepare($sql);
              $element->execute(array(null,$IDCandidat,$IDElecteur));
              $ret=true;

            }else{
                echo "erreur de connexion a la basse";
            }
      return $ret;
    }

   function verifieVote($IDElecteur) :bool
{
  $db=getDB();
  $return=false;
  if (!is_null($db)) {
   $sql="SELECT * from vote where IDElecteur=:IDElecteur";
   $element=$db->prepare($sql);
   $element->execute(array(
    ":IDElecteur" => $IDElecteur
   ));

   $result=$element->fetchAll(PDO::FETCH_ASSOC);
   $nb_ligne=$element->rowCount();
   if($nb_ligne!=1 ) 
   {  
     $return=true;
    
   }
   else{
    header("location:../?Deja_voter");
   }
//    
  }else{
    echo "veillez verifier votre connexion";
  }

  return $return;

}

}
?>