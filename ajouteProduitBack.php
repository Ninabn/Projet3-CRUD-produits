<?php
$title = "Delete";
ob_start();
?>
<?php

$nom =htmlspecialchars($_POST['nom_produit']);
$description = htmlspecialchars($_POST['description_produit']);
$image = htmlspecialchars($_POST['image_produit']);
$prix = htmlspecialchars($_POST['prix_produit']);

try{
    $user = "root";
    $pass = "";
    $bdd = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", $user, $pass);
    //debug
    $bdd-> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO produits (nom_produit, description_produit, image_produit, prix_produit)
  VALUES ('$nom', '$description', '$image', '$prix')";

$bdd->exec($sql);
  echo "Produit ajouter";
var_dump($sql);

}catch(PDOException $exception){
    die("Error : " .$exception->getMessage());
}
?>

<a href="listeProduit.php"><button type="button" class="btn btn-info">Retour</button></a>

<?php
$content = ob_get_clean();
require "template.php";
?>