<?php
session_start();
require_once "../model/vote.php";
require_once "../model/electeur.php";
require_once "../model/candidat.php";
if(isset($_POST['btn_vote'])){
     $id_candidat=$_POST['choix_vote'];
     $id_electeur= $_SESSION["CURRENT_electeur"]['id_electeur'];
     $liste= Candidat::getNomCandidat($id_candidat);
     $nom_candidat=$liste[0]['nom_candidat'];
     if(!Electeur::verifieIFvote($_SESSION["CURRENT_electeur"]['id_electeur'])){
        //  creation d un objet vote
         $ob=new Vote(null, $id_candidat,$id_electeur,$nom_candidat);
         if($ob->addVote()){
            //  si le vote est ok on change le status de electeur connecter
             Electeur::changerStatus($_SESSION["CURRENT_electeur"]['id_electeur']);
             header("location:../?page=detail_vote&reussi_vote");
         }
     }else{
        header("location:../?page=detail_vote&deja_vote");
     }

}


?>