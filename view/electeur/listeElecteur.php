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
      <div class="col-md-10 offset-md-1">
        <table class="table table-bordered">
            <tr>
                <th>Id Electeur</th>
                <th>Nom Electeurs</th>
                <th>Preom Electeur</th>
                <th>Numero Electeur</th>
                <th>Sexe</th>
                <th>Date de Naissance</th>
                <th>Vote</th>
            </tr>   
            <tr>
                <?php
                  require_once "model/electeur.php";
                  $liste_electeur=Electeur::Afficher_electeur();
                  foreach($liste_electeur as $ele)
                  {
                   ?><tr>
                      <td><?php echo $ele['id_electeur'] ?></td>
                      <td><?php echo $ele['nom_electeur'] ?></td> 
                      <td><?php echo $ele['prenom_electeur'] ?></td> 
                      <td><?php echo $ele['num_electeur'] ?></td>
                      <td><?php echo $ele['sexe'] ?></td>
                      <td><?php echo $ele['date_nais'] ?></td>
                      <?php
                        if($ele['status_vote']==false)
                        {
                          echo "<td class='bg-danger text-light'>Non voté</td>";
                        }else{
                          echo "<td class='bg-success text-light'>Voté</td>";
                        }
                      ?>
                    
                  </tr>
              <?php
                  }

                ?>
            </tr>     
       </table>
      </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>