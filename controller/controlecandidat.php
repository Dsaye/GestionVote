<?php 
//injection de dependance
include('../model/candidat.php');
include('../controller/recuperercandidat.php');
/*
instance de la classe controlercandidat 
et creation de l'objet qui s'appele Recuperercandidat de la classecontrollercandidat
*/

$Recuperercandidat= new Recuperercandidat();
if (isset($_POST['ajouter'])) {
//	$IDCandidat= $_POST['IDCandidat'];
	$NomCandidat = $_POST['NomCandidat'];
	$NomParti = $_POST['NomParti'];
    $nomfic= basename($_FILES['monfic']['name']);	
            $dossier ='../images/';
            $fichier = basename($_FILES['monfic']['name']);
            $taille_maxi = 1000000;
            $taille = filesize($_FILES['monfic']['tmp_name']);
            $extensions = array('.png','.PNG', '.gif','.GIF', '.jpg','.JPG', '.jpeg','.JPEG');
            $extension = strrchr($_FILES['monfic']['name'], '.');
  
   
            if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
            {
                $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg...';
            }
            if($taille>$taille_maxi)
            {
                $erreur = 'Le fichier est trop gros...';
            }
            if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
            {
                //On formate le nom du fichier ici...
                $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($_FILES['monfic']['tmp_name'], $dossier . $fichier)) 
            {
                echo '<font color="blue"><b><center>Upload effectué avec succès !</center></b></font>';

	//instance de classe candidat
	$candidat= new Candidat($NomCandidat,$NomParti,$nomfic);

	//appele a la fonction ajoutcandidat de la controllercandidat qui permet d'inserer des users a la base de donnée
	
	
	$Recuperercandidat->ajoutcandidat($candidat);
}else{
    echo "<script>alert('Erreur lors de l'enregistrement!');</script>";
    
}
}
else //Sinon (la fonction renvoie FALSE).
{
    echo 'Echec de l\'upload !';
}
}
else
{
    echo $erreur;
}
	

	if(isset($_GET['Candi'])){
	$Recuperercandidat->suprimercandidat();
	}
    ?>