<?php
include('db.php');
if($_POST['id']){
$id=$_POST['id'];
$db=getDB();
if($id==0){
	echo "<option>choisir votre Departement</option>";
}else{
	
    $sql="SELECT * FROM `departement` WHERE IDRegion='$id'";
   $element=$db->prepare($sql);
   $element->execute();

   $result=$element->fetchAll(PDO::FETCH_ASSOC);
   foreach($result as $row){ echo '<option value="'.$row['IDDepartement'].'">'.$row['NomDepartement'].'</option>';
		}
	}
}

/* commune  */
if($_POST['iddep']){
    $id=$_POST['iddep'];
    $db=getDB();
    if($id==0){
        echo "<option>choisir votre Commune</option>";
    }else{
        
        $sql="SELECT * FROM `commune` WHERE IDDepartement='$id'";
       $element=$db->prepare($sql);
       $element->execute();
    
       $result=$element->fetchAll(PDO::FETCH_ASSOC);
       foreach($result as $row){ echo '<option value="'.$row['IDCommune'].'">'.$row['NomCommune'].'</option>';
            }
        }
    }

    /* Arrondissement */
if($_POST['idco']){
    $id=$_POST['idco'];
    $db=getDB();
    if($id==0){
        echo "<option>choisir votre Arrondissement</option>";
    }else{
        
        $sql="SELECT * FROM `arrondissement` WHERE IDCommune='$id'";
       $element=$db->prepare($sql);
       $element->execute();
    
       $result=$element->fetchAll(PDO::FETCH_ASSOC);
       foreach($result as $row){ echo '<option value="'.$row['IDArrondissement'].'">'.$row['NomArrondissement'].'</option>';
            }
        }
    }

     /* bureau de vote */
if($_POST['idbu']){
    $id=$_POST['idbu'];
    $db=getDB();
    if($id==0){
        echo "<option>choisir votre bureau de vote</option>";
    }else{
        
        $sql="SELECT * FROM `bureau_de_vote` WHERE IDArrondissement='$id'";
       $element=$db->prepare($sql);
       $element->execute();
    
       $result=$element->fetchAll(PDO::FETCH_ASSOC);
       foreach($result as $row){ echo '<option value="'.$row['IDBureau_de_vote'].'">'.$row['NomBureau_de_vote'].'</option>';
            }
        }
    }
?>