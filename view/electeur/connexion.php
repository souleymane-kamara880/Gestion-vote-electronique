<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <title>Document</title>
</head>
<body>
     <div class="container">
         <div class="row">
             <div class="col-md-5 offset-md-1" style="box-shadow: 1px 1px 4px 0 rgba(0,0,0,.8); padding:20px">
             <div class="card">
             <!-- si on a click sur la bouton deconnexion -->
            <?php
               if(isset($_GET['deconnexion'])){
                  session_start();
                  unset($_SESSION["CURRENT_electeur"]);
                  echo "
                  <div class='alert alert-success text-center' role='alert'>
                     vous etes deconnecter, connecter a nouveau !!!! 
                  </div>
                  ";
               }
               if(isset($_GET['inscrpt_reussi'])){
                  echo "
                  <div class='alert alert-success text-center' role='alert'>
                     Inscription reussi ! Connecter 
                  </div>
                  ";
               }
               if(isset($_GET['non_correct_info'])){
                  echo "
                  <div class='alert alert-danger text-center' role='alert'>
                    veuillez verifier le information d authentification !
                  </div>
                  ";
               }
            ?>
                <div class="card-header bg-primary " style="margin-top:30px;">
                   Formulaire de connexion
                </div>
                <div class="card-body">
               <form action="controller/electeurController.php" method="post">
                  <div class="field">
                     <label class="label">Login</label>
                     <div class="control has-icons-left has-icons-right">
                        <input class="input is-success" type="text" placeholder="Login" name="login" required>
                        <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                        </span>
                     </div>
                     <p class="help is-success">Entrez un votre login</p>
                     </div>
                     <div class="field">
                     <label class="label">Mots de Passe</label>
                     <div class="control has-icons-left has-icons-right">
                        <input class="input is-success" type="password" placeholder="mots de passe" name="mdp" required>
                        <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                        </span>
                     </div>
                     <p class="help is-success">Entrez un votre mots de passe</p>
                     </div>
                     <div class="form-group mt-3">
                          <button  type="submit" name="btn_connexion" class="button is-link is-outlined">Connecter</button>
                          <button  type="reset"  class="button is-danger is-outlined">Annuler</button>
                   </div>
                      </form>
                </div>
                </div>
             </div>
             <div class="col-md-5 offset-md-1" style="box-shadow: 1px 1px 4px 0 rgba(0,0,0,.8); padding:20px">
              <img src="image/img_vote.png" class="img-fluid">
            </div>
         </div>
     </div>
</body>
</html>