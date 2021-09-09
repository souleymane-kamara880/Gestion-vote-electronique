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
  
       <?php
          if(isset($_GET['result'])){
            echo "<script>
                alert($_GET[result]);
            </script>";
          }
       ?>
  <div class="container">
      <div class="row">
      <div class="col-md-10 offset-md-1">
        <?php
          if(isset($_GET['ok_mofif'])){
            echo "
            <div class='alert alert-success text-center' role='alert'>
                   Modification reussi ! 
             </div>
            ";
          }
          if(isset($_GET['non_ok_mofif'])){
            echo "
            <div class='alert alert-danger text-center' role='alert'>
                   Echec Modification  !! 
             </div>
            ";
          }

        ?>
      <div class="panel-heading bg-primary">Liste des Candidat</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped">
            <tr>
                <th>Id Candidat</th>
                <th>Nom Candidat</th>
                <th>Parti</th>
                <th>Photo de Partie</th>
                <th>Supprimer</th>
                <th>Modifier</th>
                <th>Voix</th>
            </tr>   
            <tr>
                <?php
                  require_once "model/candidat.php";
                  $obj_candidat=new Candidat();
                  $liste_candidat=$obj_candidat->getAllCandidat();
                  foreach($liste_candidat as $candidat){
                    echo"<tr>
                            <td>$candidat[id_candidat]</td> 
                            <td>$candidat[nom_candidat]</td> 
                            <td>$candidat[nom_partie]</td>
                            <td><img src='$candidat[photo_parti]' width='50' height='50' ></td> 
                            <td><a href='controller/candidatController.php?id_Candidat=$candidat[id_candidat]' class='btn btn-danger'><i class='far fa-trash-alt'></i><a/></td>
                            <td><a href='?page=editCandidat&id_Candidat=$candidat[id_candidat]' class='btn btn-info '><i class='far fa-edit'></i><a/></td>
                            <td><a href='controller/candidatController.php?id_Candidat_nb_vote=$candidat[id_candidat]' class='btn btn-success '><i class='far fa-eye'></i><a/></td>
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