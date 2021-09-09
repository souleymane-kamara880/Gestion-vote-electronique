<?php
if($_POST['id']){
    $id=$_POST['id'];
    if($id==0){
        echo "<option>Select City</option>";
    }else{
        require_once "../model/departement.php";
        $sql = Departement::getDepById_Region($id);
        foreach($sql as $row){
            echo '<option value="'.$row['id_dep'].'">'.$row['nom_dep'].'</option>';
            }
        }
    }

?>