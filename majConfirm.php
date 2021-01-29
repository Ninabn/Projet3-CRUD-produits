<?php
$title = "Mise à jour";
ob_start();
?>

<?php
try{
  $user = "root";
  $pass = "";
  $bdd = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", $user, $pass);
  //debug
  $bdd-> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
echo $sql . "<br>" . $e->getMessage();
}

//Recuperation des champs remplis

if(isset($_POST['nom_produit']) && !empty($_POST['nom_produit'])){
    $nom_produit = htmlspecialchars(strip_tags($_POST['nom_produit']));
    //var_dump ($nom_produit);
}
//Description
if(isset($_POST['description_produit']) && !empty($_POST['description_produit'])){
    $description_produit = htmlspecialchars(strip_tags($_POST['description_produit']));
    //var_dump($description_produit);
}
//Photo
if(isset($_POST['image_produit']) && !empty($_POST['image_produit'])){
    $image_produit = htmlspecialchars(strip_tags($_POST['image_produit']));
    //var_dump($image_produit);
}
//Prix
if(isset($_POST['prix_produit']) && !empty($_POST['prix_produit'])){
    $prix_produit = htmlspecialchars(strip_tags($_POST['prix_produit']));
    //var_dump($prix_produit);
}
?>

<?php
$sql = "UPDATE produits
        SET nom_produit = ?,
            description_produit = ?,
            image_produit = ?,
            prix_produit = ?
        WHERE id_produit = ?";

$update = $bdd->prepare($sql);

$update->bindParam(1, $nom_produit);
$update->bindParam(2, $description_produit);
$update->bindParam(3, $image_produit);
$update->bindParam(4, $prix_produit);

$majvalid = $_GET['id_maj'];
//var_dump($majvalid);

$resultat = $update->execute(array($nom_produit, $description_produit, $image_produit, $prix_produit, $majvalid));

if($resultat){
    $sql = "SELECT * FROM produits WHERE id_produit = ?";
    
    $requete = $bdd->prepare($sql);

    $maj = $_GET['id_maj'];

    $requete->bindParam(1, $maj);

    $requete->execute();

    $resultat = $requete->fetch();
?>


<h1 style="margin: 15px;">Mise à jour accepter !</h1>

<h2>Detail du produit modifié</h2>

<ul class="liste-group">
<li class="list-group-item"> <?= $resultat['nom_produit']?> </li>
<li class="list-group-item"> <?= $resultat['description_produit']?> </li>
<li class="list-group-item"> <?= $resultat['image_produit']?> </li>
<li class="list-group-item"> <?= $resultat['prix_produit']?> </li>
</ul>
<?php
}else{
    echo "Une erreur est survenue";
}
?>
<a href="listeProduit.php"><button type="button" class="btn btn-info">Retour</button></a>
<?php
$content = ob_get_clean();
require "template.php";
