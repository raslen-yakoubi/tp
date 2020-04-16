<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

if (isset($_POST['submit'])) {  
    $cin =$_POST['cin'] ;
    $nom = $_POST['nom'] ;
    $prénom = $_POST['prénom'] ;
    $sexe = $_POST['sexe'] ;
$connect = mysqli_connect('localhost' , 'root' , '' ,'tpmysql') ;
$insertion = "INSERT INTO etudiant (ncin ,nom,prenom,sexe ) " ;
$insertion .= " VALUES('$cin' , '$nom' ,'$prénom', '$sexe') " ;
$teste = mysqli_query($connect , $insertion) ;
    if ($teste) { echo  '<p align="center">'. '<font size="7"> ' . " Merci , l'etudiant  " .  '<u>'. '<b>' . $nom ." ". $prénom . '</b>'    .'</u>'. '<br>'   . "          est bien été enregistré" . '</font>' . '</p>'  . '<br>' ;}
        else {
            echo  "<p align='center'>". "<font size='7'> ". "L'etudiant " . '<u>'. '<b>' . $nom ." ".  $prénom  . '</b>'    .'</u>'. '<br>'. "        est déja existe" .  "</font>" . "</p>"   ;
        }
      


echo "<p align='center'>"." <a href='phpmysql.php'>"."retour"."</a>"."</p>" ;

    }


       elseif (isset($_POST['listes']) || !isset($_POST['submit'])){
        $cin =$_POST['cin'] ;
        $nom = $_POST['nom'] ;
        $prénom = $_POST['prénom'] ;
        $sexe = $_POST['sexe'] ;
        $connect = mysqli_connect('localhost' , 'root' , '' ,'tpmysql') ;
        $affiche =" SELECT * FROM etudiant" ;
        $affichage = mysqli_query($connect , $affiche ) ;
        
      
?>
<b><h1>Liste des étudiants </h1></b>
<hr align="left" width="600" size ="6" >
<br> <br>



<form action="phpmysql.php" method="post">
<b><h3>Sexe : Homme</h3></b>
<br>
 <table border="3">
<tr color ="red">
<td>N°CIN </td>
<td>Nom</td>
<td>Prénom</td>
<td>Sexe </td>
<td><b>Modif/Suppr</b></td>
</tr>


<?php 
while ( $row=mysqli_fetch_array($affichage)) {
    if ($row['SEXE']=="H") {
?> 
<tr>
<td><?php echo $row['NCIN'] ;?></td>
<td><?php echo $row['NOM']  ;?></td>
<td><?php echo $row['PRENOM'] ;?></td>
<td><?php echo $row['SEXE'] ;?></td>
<?php $id =$row['NCIN'] ; ?>
<td> <pre><button type="submit" name="modifier" value = "<?php echo $id ; ?>" > Modifier</button> <button type="submit" name="supprimer" value = "<?php echo $id  ;?>"  > Supprimer</button> </pre></td>
</tr>
<?php }   }  ?>


</table>
<br>


<b><h3>Sexe : femme</h3></b>
<br>
 <table border ="3" >
<tr >
<td>N°CIN </td>
<td>Nom</td>
<td>Prénom</td>
<td>Sexe </td>
<td><b>Modif/Suppr</b></td>
</tr> 
<?php 
$afficher = mysqli_query($connect , $affiche ) ;
while ( $col=mysqli_fetch_array($afficher)) {
    if ($col['SEXE']=="F") {
?> 
<tr>
<td><?php echo $col['NCIN'] ;?></td>
<td><?php echo $col['NOM']  ;?></td>
<td><?php echo $col['PRENOM'] ;?></td>
<td><?php echo $col['SEXE'] ;?></td>
<?php $id =$col['NCIN'] ; ?>
<td> <pre><button type="submit" name="modifier" value =  "<?php echo $id  ; ?>" > Modifier</button> <button type="submit" name="supprimer" value =  "<?php echo $id ; ?>" > Supprimer</button> </pre></td>
</tr>

<?php } }  ?>



</table>

</form>
<?php }  ?>

</body>
</html>