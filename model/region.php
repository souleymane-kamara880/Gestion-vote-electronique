<?php
require_once 'db.php';

    class Region{
        public $id_region=null;
        public $nom_region;
      
        public function SaveRegion($id_region,$nom_region)
        {
            $ob_connexion=new Connexion();
            // l appel de la methode de connexion getdb()
            $db=$ob_connexion->getDB();
            $ret=false;
            if (!is_null($db))
             {
                $sql="INSERT INTO region(id_region,nom_region)values(:id_region,:nom_region)";
                $element=$db->prepare($sql);
                $element->execute(array(
                  ':id_region' => $id_region,
                  ':nom_region' => $nom_region
                   ));
                $ret=true;
              }else{
                echo "erreur de connexion a la basse";
              }
              return $ret;
        }
        // recuperation des region
        public function getAllRegion(){
          $ob_connexion=new Connexion();
          $db=$ob_connexion->getDB();
          $allRegion=null;
          if (!is_null($db))
           {
              $sql="SELECT * from region";
              $result=$db->query($sql);
              $allRegion=$result->fetchAll(PDO::FETCH_ASSOC);
           }
           return $allRegion;
  }      
    
}
?>