<?php


if($_POST['id']){
    $id=$_POST['id']; 
    if($id==0){
        echo "<option>Select commune</option>";
    }else{
        require_once "../model/commune.php";
        $sql = Commune::getCommuneById_Arron($id);
        foreach($sql as $row){
            echo '<option value="'.$row['id_commune'].'">'.$row['nom_commune'].'</option>';
            }
        }
    } 

?>