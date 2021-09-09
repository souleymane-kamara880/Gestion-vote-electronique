<?php
require_once 'db.php';
class  Electeur {
 public $id_electeur;
 public $nom_electeur;
 public $prenom_electeur;
 public $cni;
 public $num_electeur;
 public $sexe;
 public $date_nais;
 public $lieu_nais;
 public $adress;
 public $login;
 public $mdp;
 public $region;
 public $dep;
 public $arron;
 public $commune;
 public $id_bureau;
  
    public function __construct(
           $nom_electeur,
           $prenom_electeur,
           $cni,$num_electeur,$sexe,$date_nais,
           $lieu_nais,$adress,$login,$mdp,$region,$dep,$arron,$commune,$id_bureau)
           {
        $this->nom_electeur=$nom_electeur;
        $this->prenom_electeur=$prenom_electeur;
        $this->cni=$cni;
        $this->num_electeur=$num_electeur;
        $this->sexe=$sexe;
        $this->date_nais=$date_nais;
        $this->lieu_nais=$lieu_nais;
        $this->adress=$adress;
        $this->login=$login;
        $this->mdp=$mdp;
        $this->region=$region;
        $this->dep=$dep;
        $this->arron=$arron;
        $this->commune=$commune;
        $this->id_bureau=$id_bureau;
    }

    // function de recuperation de tous les electeurs
    function getAllElecteur(){
        // instancier la class de connexion a la base de donnee
        $ob_connexion=new Connexion();
        // l appel de la methode de connexion getdb()
        $db=$ob_connexion->getDB();
        $allElecteur=null;
        if (!is_null($db))
         {
            $sql="SELECT * from electeur";
            $result=$db->query($sql);
            $allElecteur=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $allElecteur;
}
 
// fonction pour enregistrer un electeur dans la base de donnee
    function saveElecteur() :bool
    {
      // instancier la class de connexion a la base de donnee
      $ob_connexion=new Connexion();
      // l appel de la methode de connexion getdb()
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO electeur(
          nom_electeur,  
          prenom_electeur,  
          cni,
          num_electeur,
          sexe,
          date_nais,  
          lieu_nais,
          adress,login,mdp,
          region,dep,arron,commune,
          id_bureau
          )values(:nom_electeur,:prenom_electeur,:cni,:num_electeur,:sexe,:date_nais,:lieu_nais,:adress,:login,:mdp,:region,:dep,:arron,:commune,:id_bureau)";
          $element=$db->prepare($sql);
          $element->execute(array(
            ':nom_electeur'=>$this->nom_electeur,
            ':prenom_electeur'=>$this->prenom_electeur,
            ':cni'=>$this->cni,
            ':num_electeur'=>$this->num_electeur,
            ':sexe' =>$this->sexe,
            ':date_nais'=>$this->date_nais,
            ':lieu_nais'=>$this->lieu_nais,
            ':adress'=>$this->adress,
            ':login'=>$this->login,
            ':mdp'=>$this->mdp,
            ':region'=>$this->region,
            ':dep'=>$this->dep,
            ':arron'=>$this->arron,
            ':commune'=>$this->commune,
            ':id_bureau'=>$this->id_bureau
             ));
          $ret=true;
  }else{
    echo "erreur de connexion a la basse";
  }
  return $ret;
}

//  methode de verification d un electeur par son CNI et son MOTS DE PASS
public static function verifieElecteur($login,$mdp) :bool
{
  $ob_connexion=new Connexion();
    $db=$ob_connexion->getDB();
    $return=false;
    if (!is_null($db)) {
    $sql="SELECT * from electeur where login=:login and mdp=:mdp";
    $element=$db->prepare($sql);
    $element->execute(array(
      ":login" => $login,
      ":mdp" => $mdp
    ));
    $result=$element->fetchAll(PDO::FETCH_ASSOC);
    $nb_ligne=$element->rowCount();
    if($nb_ligne==1 ) 
    {
      session_start();
      $_SESSION["CURRENT_electeur"]=$result[0];
      $return=true;
      
    }
    }else{
  echo " votre connexion a la base de donner est null";
    }
    return $return;
  }

  // mettre le status a votes
  public static function changerStatus($id_electeur) :bool
  {
    $ob_connexion=new Connexion();
    $db=$ob_connexion->getDB();
    $return=false;
    if (!is_null($db)) {
      $sql="UPDATE electeur SET status_vote=1 WHERE id_electeur=$id_electeur";
      $result=$db->query($sql);
      $ele=$result->fetchAll(PDO::FETCH_ASSOC);
    $nb_ligne=$result->rowCount();
    if($nb_ligne==1 ) 
    {
      $return=true;
    }
    }else{
        echo " votre connexion a la base de donner est null";
    }
    return $return;
}
 public static function Afficher_electeur(){
  $ob_connexion=new Connexion();
  $db=$ob_connexion->getDB();
  $Tab_result=null;
  if (!is_null($db)) {
    $sql="SELECT * From electeur";
    $result=$db->query($sql);
    $Tab_result=$result->fetchAll(PDO::FETCH_ASSOC);
  }
  return $Tab_result;
 }
 
 public static function ElecteurByID($id_electeur){
  $ob_connexion=new Connexion();
  $db=$ob_connexion->getDB();
  $ret=false;
  if (!is_null($db))
   {
      $sql="SELECT * From electeur where id_electeur=$id_electeur";
      $resule= $db->query($sql);
      $ret=$resule->fetchAll(PDO::FETCH_ASSOC);
   }
   return $ret;
}
// verifier si l'electeur a vote ou non
public static function verifieIFvote($id_electeur) :bool
{
  $ob_connexion=new Connexion();
  $db=$ob_connexion->getDB();
  $return=false;
  if (!is_null($db)) {
    $sql="SELECT * from electeur where id_electeur=:id_electeur";
    $element=$db->prepare($sql);
    $element->execute(array(
      ":id_electeur" => $id_electeur
    ));
    $tab=$element->fetchAll(PDO::FETCH_ASSOC);
    $return= $tab[0]['status_vote'];
  }
  return $return;
}

//  methode de verification d un electeur par son CNI et son MOTS DE PASS
public static function verifie_Num_Electeur($num_electeur) :bool
{
  $ob_connexion=new Connexion();
    $db=$ob_connexion->getDB();
    $return=false;
    if (!is_null($db)) {
    $sql="SELECT * from electeur where num_electeur=:num_electeur";
    $element=$db->prepare($sql);
    $element->execute(array(
      ":num_electeur" => $num_electeur,
      
    ));
    $result=$element->fetchAll(PDO::FETCH_ASSOC);
    $nb_ligne=$element->rowCount();
    if($nb_ligne==1 ) 
    {
      $return=true;
      
    }
    }else{
  echo " votre connexion a la base de donner est null";
    }
    return $return;
  }


 
 
}


?>