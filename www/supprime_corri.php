<meta charset=UTF-8>
<?php 
session_start();
require_once('logout_admi.php');
if(!$_SESSION['mdp']){
    header("Location: espace_admi.php");

}
if(!$_SESSION['password']){
  session_destroy();
  header('Location: espace_admi.php');
}
require_once ('base_corri.php');

if(!$_SESSION['password']){
    header('Location: espace_admi.php');
}

   if(isset($_GET['id']) and !empty($_GET['id'])){
       $getid=$_GET['id'];
       $recupUsers=$ddo->prepare('SELECT * FROM corriges WHERE id=?');
       $recupUsers->execute(array($getid));
       if($recupUsers->rowCount()>0){
           $banirUsers=$ddo->prepare('DELETE FROM corriges WHERE id=?');
           $banirUsers->execute(array($getid));
           header('Location:affiche_correction.php');
       }else{
           echo "aucun memebre n'a ete trouver";
       }
     }else{
       echo "l'identrifiant n'a pas ete recuperer";
   }
?>