<?php 
include('../model/db.php');


class Recuperercandidat {
	/**
	 * 
	 **/
	public function getcandidat(){
		$sql="SELECT * FROM candidat";
		$stmt= getDB()->prepare($sql);
		$stmt->execute();
		while ($result = $stmt->fetchAll()) {
			return $result;
		}
	}
	/**
	 * 
	 **/
	public function ajoutcandidat(Candidat $candidat){
		$sql="INSERT INTO candidat(NomCandidat,NomParti,nomfic) VALUES(:NomCandidat,:NomParti,:nomfic)";
		$stmt= getDB()->prepare($sql);
		//$stmt->bindValue('IDCandidat',$candidat->getIDCandidat(), PDO::PARAM_STR);
		$stmt->bindValue('NomCandidat',$candidat->getNomCandidat(), PDO::PARAM_STR);
		$stmt->bindValue('NomParti', $candidat->getNomParti(), PDO::PARAM_STR);
        $stmt->bindValue('nomfic', $candidat->getnomfic(), PDO::PARAM_STR);
		$stmt->execute();
		header("location: {$_SERVER['HTTP_REFERER']}");

	}
	public function suprimercandidat(){
		if(isset($_GET['Candi'])){
			$can=strip_tags($_GET['Candi']);
		$sql="DELETE FROM candidat where IDCandidat=?";
		$stmt= getDB()->prepare($sql);
	//	$stmt->bindValue('IDCandidat',$candidat->getIDCandidat(), PDO::PARAM_STR);
		// $stmt->bindValue('NomCandidat',$candidat->getNomCandidat(), PDO::PARAM_STR);
		// $stmt->bindValue('NomParti', $candidat->getNomParti(), PDO::PARAM_STR);
		$stmt->execute(array($can));
		header("location: {$_SERVER['HTTP_REFERER']}");
	}
	}
}
?>