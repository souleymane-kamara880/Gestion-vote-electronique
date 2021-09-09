<?php
if($_POST['id']){
    $id=$_POST['id']; 
    if($id==0){
        echo "<option>Select arron</option>";
    }else{
        require_once "../model/arrondissement.php";
        $sql = Arrondissement::getArron_ById_Dep($id);
        foreach($sql as $row){
            echo '<option value="'.$row['id_arron'].'">'.$row['nom_arron'].'</option>';
            }
        }
    } 

?>