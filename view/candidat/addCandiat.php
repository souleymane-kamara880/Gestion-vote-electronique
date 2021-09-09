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
             <div class="col-md-6 offset-md-3" style="box-shadow: 1px 1px 4px 0 rgba(0,0,0,.8); padding:20px">
             <div class="card" style="margin-top:10px;">
                <div class="card-header bg-primary">
                   Formulaire d'ajout de Candidat
                </div>
                <div class="card-body">
                      <form action="controller/candidatController.php" method="post">
                          <div class="form-group">
                             <label class="control-label">Nom Canditat</label>
                             <input name="nom_candidat" type="text" class="form-control"  required placeholder="entrez le nom du candidat">
                          </div>
                          <div class="form-group mt-3">
                             <label class="control-label">Nom du Partie</label>
                             <input name="nom_partie" type="text" class="form-control" required placeholder="Nom du Partie">
                          </div>
                          <div class="form-group mt-3">
                             <label class="control-label">Photo</label>
                             <input name="photo_parti" type="text" class="form-control" required placeholder="photo du Partie">
                          </div>
                          <div class="form-group mt-3">
                              <button type="submit" class="btn btn-primary" name="btn_valider_candidat">Valider</button>
                              <button type="submit" class="btn btn-danger" name="">Annuler</button>

                            </div>
                      </form>
                </div>
                </div>
             </div>
         </div>
     </div>
</body>
</html>