<?php
require_once 'db.php';

    class Departement{
        public $id_dep=null;
        public $nom_dep;
        public $id_region;

        public function addDepartement($nom_dep,$id_region){
            $ob_connexion=new Connexion();
            // l appel de la methode de connexion getdb()
            $db=$ob_connexion->getDB();
            $ret=false;
            if (!is_null($db))
             {
                $sql="INSERT INTO departement(nom_dep,id_region)values(:nom_dep,:id_region)";
                $element=$db->prepare($sql);
                $element->execute(array(
                  ':nom_dep' => $nom_dep,
                  ':id_region' => $id_region
                   ));
                $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
        }
            // recuperation des  departement
            function getAllDepartement(){
              $ob_connexion=new Connexion();
              $db=$ob_connexion->getDB();
              $allDepartement=null;
              if (!is_null($db))
               {
                  $sql="SELECT * from departement";
                  $result=$db->query($sql);
                  $allDepartement=$result->fetchAll(PDO::FETCH_ASSOC);
               }
            return $allDepartement;
      }
      // les departement par id region
     public static function getDepById_Region($id_region){
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $all_Dep_id_region=null;
        if (!is_null($db))
         {
            $sql="SELECT * from departement WHERE id_region=$id_region";
            $result=$db->query($sql);
            $all_Dep_id_region=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $all_Dep_id_region;
   }
    
    }

?>