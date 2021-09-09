<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <title>Document</title>
</head>
<body>
       
  <div class="container">
      <div class="row">
      <div class="col-md-10 offset-md-1" style="margin-top:80px">
      <div class="panel-heading bg-primary">Liste des Vote</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped">
            <tr>
                <th>Numero Vote</th>
                <th>Candidat</th>
                <th>Electeur</th>
                <th>Numero Electeur</th>
                <th>Date de Naissance</th>
                <th> Lieu de Naissance</th>
                 
            </tr>   
            <tr>
                <?php
                  require_once "model/vote.php";
                  require_once "model/electeur.php";
                  $liste_vote=Vote::listeVote();
                  foreach($liste_vote as $vote){
                    $Electeur=Electeur::ElecteurByID($vote['id_electeur']);
                    
                    echo"<tr>
                            <td>$vote[id_vote]</td> 
                            <td>$vote[nom_candidat]</td> 
                            <td>".$Electeur[0]['prenom_electeur']." ".$Electeur[0]['nom_electeur']."</td>
                            <td>".$Electeur[0]['num_electeur']."</td> 
                            <td>".$Electeur[0]['date_nais']."</td> 
                            <td>".$Electeur[0]['lieu_nais']."</td> 
                      </tr>";

                  }

                ?>
            </tr>     
       </table>
       </div>
      </div>
   </div>
  </div>


 
</body>
</html>