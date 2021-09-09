<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <div class="container">
            <?php
                if(isset($_GET['reussi'])){
                    echo "
                    <div class='alert alert-success text-center' role='alert'>
                      Bureau Ajouter !!!! 
                    </div>
                    ";
                }
                if(isset($_GET['non_reussi'])){
                    echo "
                    <div class='alert alert-danger text-center' role='alert'>
                     Ajout de Bureau ne passe pas !
                    </div>
                    ";
                }

            ?>
            <div class="col-md-10 offset-md-1 bg-primary text-light fw-bold" style="padding:8px;">FORMULAIRE D'AJOUT DE BUREAU DE VOTE</div>
            <hr class="col-md-10 offset-md-1" style="border: 1px solid black;">
            <div class="row">
            <div class="col-md-2 offset-md-1">
                Region
            </div>
            <div class="col-md-2">
                departement
            </div>
            <div class="col-md-2">
                Arrondissement
            </div>
            <div class="col-md-2">
                Commune
            </div>
            <div class="col-md-2">
                Bureau
            </div>
            </div>
            <form action="controller/bureauController.php" method="post">
            <div class="row">
                <div class="col-md-2 offset-md-1">
                <select name="region" class="region form-control mt-3" required>
          <option value="0">Select Region</option>
            <?php
            
                require_once "model/region.php";
                $ob=new Region();
                $liste = $ob->getAllRegion();
                foreach($liste as $row)
                {
                echo '<option value="'.$row['id_region'].'">'.$row['nom_region'].'</option>';
                } 
            ?>
            </select>
                </div>
                <div class="col-md-2">
                 <select name="dep" class="dep form-control mt-3" required>
                    <option value="0">Select Departement</option>
                </select>
                </div>
                <div class="col-md-2">
                 <select name="arron" class="arron form-control mt-3" required>
                    <option value="0">Select Arrondissement</option>
                </select>
                </div>
                <div class="col-md-2">
                 <select name="commune" class="commune form-control mt-3" required>
                    <option value="0">Select Commune</option>
                </select>
                </div>
                <div class="col-md-2">
                <input type="text" class=" form-control mt-3" required name="nom_bureau" placeholder="Entrez le nom du Bureau">
                </div>
            </div>
            <div class="row col-md-10 offset-1 mt-5">
               <div>
               <button type="submit" name="btn_add_bureau" class="btn btn-primary">Valider Bureau</button>
               </div>
            </div>
        </form>  

        
    </div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="css/ajax.js"></script>
</body>
</html>