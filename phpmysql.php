<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<?php if (isset($_POST['modifier'])) {  ?>
  
  
  
  <p  align ="center"  > <font size="7"><b>Modifier un étudiant</b> </font>  </p> <br>
  <hr width="300" size="2"> <br> <br>
      <form action="phpmysql.php"  method="post">
         <table  width="300" border="2" align="center">
              <tr>
                <td>Nom :</td>
                <td><input type="text" name="NOM" maxlenth="20"></td>
              </tr>
              <tr>
                <td>Prénom :</td>
                <td><input type="text" name="PRENOM" maxlenth="20"></td>
              </tr>
              <tr>
                <td>Sexe :</td>
                <td> <select name="SEXE"> <option selected value="H">Homme</option><option value="F">Femme</option></select></td>
              </tr>
  
         </table>
               <p align ="center "><button type="submit" name="update" value ="<?php echo $_POST['modifier'] ; ?>" > valider</button><button  type="reset" name ="annuler" >Annuler</button></p>

                <p align="center"><u><a href="raslen.php"> Retour</a></u></p>

                </form> 








<?php } ?>
<?php  
if (isset($_POST['update']) ) {
$nom = $_POST['NOM'] ;
$prenom =$_POST['PRENOM'] ;
$sexe =$_POST['SEXE'] ;
$id = $_POST['update'] ;
$connect = mysqli_connect('localhost' , 'root' , '' , 'tpmysql') ;
$modif = "UPDATE etudiant SET " ;
$modif .= " NOM = '$nom'  , PRENOM ='$prenom' , SEXE ='$sexe'  " ; 
$modif .= "WHERE NCIN = '$id' " ;
$update = mysqli_query($connect , $modif) ;
if ($update) {
  echo  '<p align="center">'. '<font size="7"> ' . " Merci , l'etudiant au n° CIN  " .  '<u>'. '<b>' . $id . '</b>'    .'</u>'. '<br>'   . "          est bien été modifier" . '</font>' . '</p>'  . '<br>' ;
} 
echo "<p align='center'>"." <a href='phpmysql.php'>"."retour"."</a>"."</p>" ;


}     ?>





              
 <?php if (!isset($_POST['modifier']) && !isset($_POST['supprimer']) && !isset ($_POST['update'])  ) { ?>


<form action="raslen.php" method ="post">
<p  align ="center"  > <font size="7"><b>Saisie d'un nouveau étudiant</b> </font>  </p> <br>
   <hr width="250" size="2"> <br> <br>
          <table  width="300" border="2" align="center">
               <tr>
                 <td>N°.CIN :</td>
                 <td> <textarea name="cin" cols="8" rows="1"></textarea></td>
               </tr>
               <tr>
                 <td>Nom :</td>
                 <td><input type="text" name="nom" maxlenth="20"></td>
               </tr>
               <tr>
                 <td>Prénom :</td>
                 <td><input type="text" name="prénom" maxlenth="20"></td>
               </tr>
               <tr>
                 <td>Sexe :</td>
                 <td> <select name="sexe"> <option selected value="H">Homme</option><option value="F">Femme</option></select></td>
               </tr>
   
          </table>
                <p align ="center "><button type="submit" name="submit" > valider</button><button  type="reset" name ="annuler" >Annuler</button></p>

                 <p align="center"><button type="submit" name="listes">Listes des étudiant</button></p>
                  
                 </form> 


<?php } ?>
<?php 
if (isset($_POST['supprimer'])) {
    $id = ($_POST['supprimer']) ;
    $connecte =mysqli_connect('localhost' , 'root' , '' , 'tpmysql') ;
    $supprimer ="DELETE FROM etudiant " ;
    $supprimer .="WHERE NCIN = '$id' " ;
    $delete = mysqli_query ($connecte , $supprimer ) ;
    if ($delete) {
      echo  '<p align="center">'. '<font size="7"> ' . " Merci , l'etudiant au n° CIN  " .  '<u>'. '<b>' . $id . '</b>'    .'</u>'. '<br>'   . "          est bien été supprimer" . '</font>' . '</p>'  . '<br>' ;
    } 
    echo "<p align='center'>"." <a href='phpmysql.php'>"."retour"."</a>"."</p>" ;
  
  
  }

?>



</body>
</html>