<?php 
class Candidat{
	private $IDCandidat;
	private $NomCandidat;
	private $NomParti;
	private $nomfic;
		function __construct ($NomCandidat,$NomParti,$nomfic) {
			$this->IDCandidat=$IDCandidat;
			$this->NomCandidat=$NomCandidat;
			$this->NomParti=$NomParti;
			$this->nomfic=$nomfic;




		}

		public function getIDCandidat(){
			return $this->IDCandidat;
		}

		public function getNomCandidat(){
			return $this->NomCandidat;
		}

		public function getNomParti(){
			return $this->NomParti;
		}
		public function getnomfic(){
			return $this->nomfic;
		}

		public function setIDCandidat($IDCandidat){
			$this->IDCandidat=$IDCandidat;
		}

		public function setNomCandidat($NomCandidat){
			$this->NomCandidat=$NomCandidat;
		}
		public function setNomParti($NomParti){
			$this->NomParti=$NomParti;
		}
		public function setnomfic($nomfic){
			$this->nomfic=$nomfic;
		}
}
 ?>
