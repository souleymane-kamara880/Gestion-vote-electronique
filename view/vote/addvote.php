<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>D</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12 ">
        <form method='POST' action='controller/votecontroller.php'> 
<div class="row">
        <?php             
            foreach($listeCandidat as $ele){
         ?>   
        <div class="col-md-4">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header"><?php echo $ele['nom_candidat'] ?> </div>
                <div class="card-header"><?php echo $ele['nom_partie'] ?>  </div>
                <div class="card-body text-primary">
                   <h5 class="card-title"><img src="<?php echo $ele['photo_parti'];?>" class="img-fluid"></h5>
                   <p class="card-text"> <input type="radio" style="width:30px; height:30px;margin-right:60px;margin-top:10px;" name="choix_vote" value="<?php echo $ele['id_candidat']; ?>"></p>
               </div>
            </div>
         </div>
        <?php    
             }
        ?>  
            <div class="row col-md-4 offset-md-4">
               <button type="submit" name="btn_vote" class="btn btn-primary">voter</button>
            </div>
            </div>
      </form>      
        </div>
    </div>
</div>
</body>
</html>