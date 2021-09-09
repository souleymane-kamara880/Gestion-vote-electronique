<?php
 
 if(isset($_GET['page'])){
  switch($_GET['page']){
    case 'inscription':
      require_once 'menu/menu1.php';
      require_once 'view/electeur/inscription.php';
      break;
      case 'connexion':
        require_once 'menu/menu1.php';
        require_once 'view/electeur/connexion.php';
        break;
        case 'Admin_connect':
          require_once 'menu/menu3.php';
          break;
          case 'Electeur_connect':
              require_once 'menu/menu2.php';
            break;
            case 'addCandidat':
              require_once 'menu/menu3.php';
              require_once "view/candidat/addCandiat.php";
              break;
              case 'addvote':
                require_once "model/candidat.php";
                $ob_candidat=new Candidat();
                $listeCandidat=$ob_candidat->getAllCandidat();
                  require_once "menu/menu2.php";
                  require_once "view/vote/addvote.php";
                break;
                case 'detail_vote':
                  require_once "menu/menu2.php";
                  require_once "view/vote/detail.php";
                break;
                case 'addBureau':
                    require_once "menu/menu3.php";
                    require_once "view/bureau/addBureau.php";
                  break;
                case 'listeElecteur':
                    require_once "menu/menu3.php";
                    require_once "view/electeur/listeElecteur.php";
                break;
                case 'listCandidat':
                  require_once "menu/menu3.php";
                  require_once "view/candidat/listCandidat.php";
                break;
                case 'les_resultat':
                  require_once "menu/menu3.php";
                  require_once "view/candidat/Resultat.php";
                break;
                case 'liste_vote':
                  require_once "menu/menu3.php";
                  require_once "view/vote/liste_vote.php";
                break;
                case 'editCandidat':
                  require_once "menu/menu3.php";
                  require_once "view/candidat/modifCandidat.php";
                break;      
        
  }
 }else{
   require_once 'menu/menu.php';
 }

?>