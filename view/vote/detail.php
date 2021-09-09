<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
     <link rel="stylesheet" href="../../css/style.php">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2" style="margin-top:80px;">
       
            <?php 
                if(isset($_GET['reussi_vote'])){
                echo "
                    <div class='alert alert-success text-center' role='alert'>
                        vote reussi Merci :les details sont les suivant ! 
                     </div>
                    ";
                }
                if(isset($_GET['deja_vote'])){
                    echo "
                        <div class='alert alert-danger text-center' role='alert'>
                            Vous avez deja Voter ! 
                         </div>
                        ";
                    }
                session_start();
                require_once "model/vote.php";
                require_once "model/electeur.php";
                $id_electeur= $_SESSION["CURRENT_electeur"]['id_electeur'];
                $tab_ele=Electeur::ElecteurByID($id_electeur);
                $detail_vote=Vote::detail_vote($id_electeur);
                 
                ?>
                
                    <div class="row">
                       <?php  echo 'vous :'.$tab_ele[0]['prenom_electeur'].' '.$tab_ele[0]['nom_electeur']; ?>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                         N° Vote
                        </div>
                        <div class="col-md-2">
                          Candidat
                        </div>
                        <div class="col-md-2">
                         N° Electeur
                        </div>
                        <div class="col-md-2">
                         Bureau
                        </div>
                        <div class="col-md-2">
                          Commune
                        </div>
                        <div class="col-md-2">
                         Status Vote
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                           <?php  echo $detail_vote[0]['id_vote']; ?>
                        </div>
                        <div class="col-md-2">
                           <?php echo $detail_vote[0]['nom_candidat']; ?>
                        </div>
                        <div class="col-md-2">
                           <?php echo $tab_ele[0]['num_electeur']; ?>
                        </div>
                        <div class="col-md-2">
                           <?php echo $tab_ele[0]['id_bureau']; ?>
                        </div>
                        <div class="col-md-2">
                          <?php echo $tab_ele[0]['commune']; ?>
                        </div>
                        <div class="col-md-2">
                          <?php if($tab_ele[0]['status_vote']==1){
                                 echo "Voté";
                          }else{
                              echo "non voté";
                          }
                          
                          ?>
                        </div>
                    </div>
        </div>
    </div>
    </div>
    
</body>
</html>