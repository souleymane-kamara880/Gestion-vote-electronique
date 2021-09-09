<?php
   require_once "../model/candidat.php";
   if(isset($_POST['btn_valider_candidat'])){
    $nom_candidat=$_POST['nom_candidat'];
    $nom_partie=$_POST['nom_partie'];
    $photo_parti=$_POST['photo_parti'];
    $ob_candidat=new Candidat();
    if($ob_candidat->addCandidat($nom_candidat,$nom_partie,$photo_parti)){
        header("location:../?page=listCandidat");
    }else{
        header("location:../?page=addCandidat&non_ok");
    }
}

    // suppression
    if(isset($_GET['id_Candidat'])){
        $id_candidat=$_GET['id_Candidat'];
        $obj_can=new Candidat();
        $nbr_lign=$obj_can->deleteCandidat($id_candidat);
        if($nbr_lign!=0){
            header("location:../?page=listCandidat&reussi");
        }else{
            header("location:../?page=listCandidat&non_reussi");    
        }
   }
//   modifier
   if(isset($_POST['btn_modif_candidat'])){
    $id_candidat=$_POST['id_candidat'];
    $nom_candidat=$_POST['nom_candidat'];
    $nom_partie=$_POST['nom_partie'];
    $photo_parti=$_POST['photo_parti'];
    echo $id_candidat."br";
    echo $nom_candidat."br";
    echo $nom_partie;
    $ob_candidat=new Candidat();
    if($ob_candidat->MofifCandidat($id_candidat,$nom_candidat,$nom_partie,$photo_parti)){
        header("location:../?page=listCandidat&ok_mofif");
    }else{
        header("location:../?page=listCandidat&non_ok_mofif");
    }
   }
//    nombre de vote effectuer sur lui
  if(isset($_GET['id_Candidat_nb_vote'])){
      require_once "../model/vote.php";
      $tab_result=Vote::nb_voix_by_id_candidat($_GET['id_Candidat_nb_vote']);
      $result=$tab_result[0]["COUNT(id_candidat)"];
      var_dump($result);
      header("location:../?page=listCandidat&result=$result");
  }

?>