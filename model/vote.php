<?php
require_once 'db.php';
    class Vote{
        public $id_vote;
        public $id_candidat;
        public $id_electeur;
        public $nom_candidat;

        public function __construct($id_vote=null,$id_candidat,$id_electeur,$nom_candidat){
            $this->id_vote=$id_vote;
            $this->id_candidat=$id_candidat;
            $this->id_electeur=$id_electeur;
            $this->nom_candidat=$nom_candidat;
        }
        public function addVote(){
            $ob_connexion=new Connexion();
            // l appel de la methode de connexion getdb()
            $db=$ob_connexion->getDB();
            $ret=false;
            if (!is_null($db))
             {
                $sql="INSERT INTO vote(id_candidat,id_electeur,nom_candidat)values(:id_candidat,:id_electeur,:nom_candidat)";
                $element=$db->prepare($sql);
                $element->execute(array(
                  ':id_candidat' => $this->id_candidat,
                  ':id_electeur' => $this->id_electeur,
                  ':nom_candidat' => $this->nom_candidat
                   ));
                $ret=true;
        }else{
          echo "erreur de connexion a la base";
        }
        return $ret;
        }

        public static function detail_vote($id_electeur){
            $ob_connexion=new Connexion();
            $db=$ob_connexion->getDB();
            $ret=false;
            if (!is_null($db))
             {
                $sql="SELECT * From vote where id_electeur=$id_electeur";
                $resule= $db->query($sql);
                $ret=$resule->fetchAll(PDO::FETCH_ASSOC);
             }
             return $ret;
        }
       public static function listeVote(){
            $ob_connexion=new Connexion();
            $db=$ob_connexion->getDB();
            $ret=null;
            if (!is_null($db))
            {
               $sql="SELECT * From vote";
               $resultat=$db->query($sql);
               $ret=$resultat->fetchAll(PDO::FETCH_ASSOC);
            }
          return $ret;
        }

        // requjet de resultat vote
        public static function Resultat(){
          $ob_connexion=new Connexion();
          $db=$ob_connexion->getDB();
          $ret=null;
          if (!is_null($db))
          {
             $sql="SELECT nom_candidat,COUNT(*) From vote Group by id_candidat ORDER BY count(*) DESC ";
             $resultat=$db->query($sql);
             $ret=$resultat->fetchAll(PDO::FETCH_ASSOC);
          }
            return $ret;
          }
          public static function nb_voix_by_id_candidat($id_candidat){
            $ob_connexion=new Connexion();
            $db=$ob_connexion->getDB();
            $ret=null;
            if (!is_null($db))
            {
               $sql="SELECT COUNT(id_candidat) From vote where id_candidat=$id_candidat ";
               $resultat=$db->query($sql);
               $ret=$resultat->fetchAll(PDO::FETCH_ASSOC);
            }
              return $ret;
            }
       
       
       
       
        }

    

?>