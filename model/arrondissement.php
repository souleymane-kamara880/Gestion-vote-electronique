<?php
require_once 'db.php';
    class Arrondissement{
        public $id_arron;
        public $nom_arron;
        public $id_dep;
        
        public function addArrondissement($nom_arron,$id_dep){
            $ob_connexion=new Connexion();
            // l appel de la methode de connexion getdb()
            $db=$ob_connexion->getDB();
            $ret=false;
            if (!is_null($db))
             {
                $sql="INSERT INTO arrondissement(nom_arron,id_dep)values(:nom_arron,:id_dep)";
                $element=$db->prepare($sql);
                $element->execute(array(
                  ':nom_arron' => $nom_arron,
                  ':id_dep' => $id_dep
                   ));
                $ret=true;
        }else{
          echo "erreur de connexion a la base";
        }
        return $ret;
        }
     
    public static function  getArron_ById_Dep($id_dep){
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $all_dep_by_id_dep=null;
      if (!is_null($db))
       {
          $sql="SELECT * from arrondissement WHERE id_dep=$id_dep";
          $result=$db->query($sql);
          $all_dep_by_id_dep=$result->fetchAll(PDO::FETCH_ASSOC);
       }
    return $all_dep_by_id_dep;
        }

    }

?>