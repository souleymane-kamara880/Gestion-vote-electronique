<?php
require_once '../model/bureau.php';
    if(isset($_POST['btn_add_bureau'])){
        $commune=$_POST['commune'];
        $nom_bureau=$_POST['nom_bureau'];
        $ob=new Bureau(null,$nom_bureau,$commune);
        if($ob->addBureau()){
            header("location:../?page=addBureau&reussi");
        }else{
            header("location:../?page=addBureau&non_reussi");
        }
    }

    if($_POST['id']){
        $id=$_POST['id']; 
        if($id==0){
            echo "<option>Select bureau</option>";
        }else{
            require_once "../model/bureau.php";
            $sql=Bureau::getBureauById_Commun($id);
            foreach($sql as $row){
                echo '<option value="'.$row['id_bureau'].'">'.$row['nom_bureau'].'</option>';
                }
            }
        } 
    

?>