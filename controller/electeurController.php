<?php
require_once "../model/electeur.php";
if (isset($_POST['inscription'])) {
    $nom_electeur=$_POST['nom_electeur'];
    $prenom_electeur=$_POST['prenom_electeur'];
    $cni=$_POST['cni'];
    $num_electeur=$_POST['num_electeur'];
    $sexe=$_POST['sexe'];
    $date_nais=$_POST['date_nais'];
    $lieu_nais=$_POST['lieu_nais'];
    $adress=$_POST['adress'];
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];
    $region=$_POST['region'];
    $dep=$_POST['dep'];
    $arron=$_POST['arron'];
    $commune=$_POST['commune'];
    $id_bureau=$_POST['id_bureau'];
    // Verification si le numero electeur existe dans la base de donnee
    if(!Electeur::verifie_Num_Electeur($num_electeur)){
      // creation d'objet d'electeur
      $obj_electeur=new Electeur($nom_electeur,$prenom_electeur,$cni,$num_electeur,$sexe,$date_nais,$lieu_nais,$adress,$login,$mdp,$region,$dep,$arron,$commune,$id_bureau);
      // appel de la methode saveElecteur pour enregistrer l'electeur dans la base de donnee
      if ($obj_electeur->saveElecteur()) {
        header("location:../?page=connexion&inscrpt_reussi");
      }else {
        header("location:../?page=inscription&non_valider");
      }
   }else{
    header("location:../?page=inscription&existe_num_electeur");
     }
  }


  // verifie connexion d'un electeur
  if (isset($_POST['btn_connexion'])) {
      $login= $_POST['login'];
      $mdp = $_POST['mdp'];
     if (Electeur::verifieElecteur($login,$mdp)) {
          session_start();
          if($_SESSION["CURRENT_electeur"]['type']=="admin"){
            header("location:../?page=Admin_connect");
          }else{
            header("location:../?page=Electeur_connect");
          }
       
     }else {
      header("location:../?page=connexion&non_correct_info");
     }
}
?>