<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
       
  <div class="container">
      <div class="row">
      <div class="col-md-10 offset-md-1">
        <table class="table table-bordered">
            <tr>
                <th>Nom Candidat</th>
                <th>Nombre de Voix</th>
            </tr>   
            <tr>
                <?php
                  require_once "model/candidat.php";
                  require_once "model/vote.php";
                  $resutats=Vote::Resultat();
                  foreach($resutats as $resutat){
                    echo"<tr>
                            <td>".$resutat['nom_candidat']."</td>
                            <td>".$resutat['COUNT(*)']."  "."Voix</td>
                        </tr>";

                  }

                ?>
            </tr>     
       </table>
      </div>
  </div>

</body>
</html>