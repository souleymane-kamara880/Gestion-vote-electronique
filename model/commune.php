<?php
require_once 'db.php';

    class Commune{
        public $id_commune=null;
        public $nom_commune;
        public $id_arron;

        public function addDepartement($nom_commune,$id_arron){
            $ob_connexion=new Connexion();
            // l appel de la methode de connexion getdb()
            $db=$ob_connexion->getDB();
            $ret=false;
            if (!is_null($db))
             {
                $sql="INSERT INTO commune(nom_commune,id_arron)values(:nom_commune,:id_arron)";
                $element=$db->prepare($sql);
                $element->execute(array(
                  ':nom_commune' => $nom_commune,
                  ':id_arron' => $id_arron
                   ));
                $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
        }
      // les commune par arrondissement
     public static function getCommuneById_Arron($id_arron){
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $all_com_id_arron=null;
        if (!is_null($db))
         {
            $sql="SELECT * from commune WHERE id_arron=$id_arron";
            $result=$db->query($sql);
            $all_com_id_arron=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $all_com_id_arron;
   }
    
    }

?>