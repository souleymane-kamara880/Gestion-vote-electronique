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
   <?php
            if(isset($_GET['non_valider'])){
                echo "
                <div class='alert alert-danger text-center' role='alert'>
                    Inscription invalide !!!! 
                </div>
                ";
            }
            if(isset($_GET['existe_num_electeur'])){
                echo "
                <div class='alert alert-danger text-center' role='alert'>
                    Le Numero d'electeur existe deja !!!! 
                </div>
                ";
            }
      ?>
<div class="row">
    <div class="col-md-12" style="box-shadow: 0px 0px 4px 4px rgba(0.1,0.1,0.1,0.1); padding:20px">
    <div class="card">
    <div class="card-header bg-primary">
        Formulaire d'Inscription
    </div>
    <div class="card-body">
<form action="controller/electeurController.php" method="post">
 <div class="row">
    <div class="col-md-3 offset-md-1">
        <div class="form-group">
            <label class="control-label">Nom</label>
            <input name="nom_electeur" type="text" class="form-control" placeholder="Entrez votre nom"  required>
        </div>
        <div class="form-group mt-3">
            <label class="control-label">Prenom</label>
            <input name="prenom_electeur" type="text" class="form-control" placeholder="Entrez votre prenom"  required>
        </div>
        <div class="form-group mt-3">
            <label class="control-label">Numero carte d'identite</label>
            <input name="cni" type="number" class="form-control" placeholder="Entrez votre CNI"  required>
        </div>
        <div class="form-group mt-3">
            <label class="control-label">Numero carte electeur</label>
            <input name="num_electeur" type="number" class="form-control" placeholder="Entrez votre NCE"  required>
        </div>
        <div class="form-group mt-3">
        <label class="control-label">Sexe</label> </br>
        <input type="radio" style="width:50px; " value="masculin" name="sexe"  required><label for="masculin">Masculin</label>
        <input type="radio" style="width:50px; " value="feminin" name="sexe"  required ><label for="feminin">Feminin</label>
         </div>
    </div>
    <div class="col-md-3 offset-md-1">
         <div class="form-group">
            <label class="control-label">date naissance</label>
            <input name="date_nais" type="Date" class="form-control" placeholder="Entrez votre date naissance"  required>
        </div>
        <div class="form-group mt-3">
            <label class="control-label">lieu naissance</label>
            <input name="lieu_nais" type="text" class="form-control" placeholder="Entrez votre lieu de naissance"  required>
       </div>
        <div class="form-group mt-3">
            <label class="control-label">Adresse</label>
            <input name="adress" type="text" class="form-control" placeholder="Adresse"  required>
       </div>
       <div class="form-group mt-3">
            <label class="control-label">Login</label>
            <input name="login" type="text" class="form-control" placeholder="Login"  required>
       </div>
       <div class="form-group mt-3">
            <label class="control-label">mdp</label>
            <input name="mdp" type="password" class="form-control" placeholder="Entrez votre mdp"  required>
       </div>
    </div>
    <div class="col-md-3 offset-md-1">
       <div class="form-group">
        <label>Region :</label>
        <select  name="region" class="form-control region" required >
            <option value="0" disabled="disabled">Select Region</option>
            <?php
            require_once "model/region.php";
            $ob=new Region();
            $liste = $ob->getAllRegion();
                foreach($liste as $row){
                echo '<option value="'.$row['id_region'].'">'.$row['nom_region'].'</option>';
                } 
            ?>
        </select>
       </div>
       <div class="form-group mt-3">
       <label>Departement :</label><select name="dep" class="form-control dep" required>
          <option value="0" disabled="disabled">Select Departement</option>
        </select>
         
       </div>
       <div class="form-group mt-3">
       <label>Arrondissement :</label><select name="arron" class="form-control arron" required>
        <option value="0" disabled="disabled">Select arron</option>
        </select>
       </div>
        <div class="form-group mt-3">
         <label>Commune :</label><select name="commune" class="form-control commune" required>
           <option value="0" disabled="disabled">Select commune</option>
         </select>   
        </div>
        <div class="form-group mt-3">
            <label>bureau :</label><select name="id_bureau" class="form-control bureau" required>
            <option value="0" disabled="disabled">Select bureau</option>
            </select>
        </div>
    </div>
    <div class="row">
            <div class="col-md-5 offset-md-1">
        <div class="form-group mt-3">
            <button type="submit" class="button is-link is-outlined" name="inscription">Inscription</button>
            <button type="reset" class="button is-danger is-outlined" >Annuler</button>
        </div>
    </div>

    </form>
    </div>
    </div>
    </div>
</div>
</div>


<!-- code  de chargement automatique formulaire -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="css/ajax.js"></script>
</body>
</html>