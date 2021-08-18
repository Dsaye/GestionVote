<?php
require_once "db.php";
class Candidat {
    public $IDCandidat;
    public $NomCandidat;
    public $NomParti;
    public $nomfic;

  public  function listeCandidat() 
{
  $db=getDB();
//   $return=false;
  if (!is_null($db)) {
   $sql="SELECT * from candidat";
   $element=$db->prepare($sql);
   $element->execute();
   while ($result = $element->fetchAll()) {
    return $result;
}  
}
}
}