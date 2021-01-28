<?php
$title = "Produits";
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
?>

<h1 style="margin: 15px;">Details de l'article</h1>


<?php
$sql = "SELECT * FROM produits WHERE id_produit = ?";
$requete = $bdd->prepare($sql);

$id = $_GET['id_produit'];
//Passage du ? à la valeur de $_GET['id_produit']
$requete->bindParam(1, $id);
//Execute la requète
$requete->execute();
//pour afficher les valeurs de la table "produits" on doit utilisé la fonction fectch = rechercher
$resultat = $requete->fetch();


if($resultat){
    ?>
<div style="display: flex; align-items : center" id="row_produits">
        <img class="m-5" src="<?= $resultat['image_produit'] ?>" alt="<?= $resultat['nom_produit'] ?>" title="<?= $resultat['nom_produit'] ?>" />
    <div>
        <h3 style="display: flex;" class="text-center"><?php echo $resultat['nom_produit'] ?></h3>
        <p style="width: 65%;"><?php echo $resultat['description_produit'] ?></p>
        <p><?php echo 'Prix : ' .$resultat['prix_produit'] ?> €</p>
    </div>
</div>
    <?php
}else{
    echo "<p class='alert-danger p-5'>Erreur : cet ID (produit) n'existe pas</p>";
}
?>

<a href="listeProduit.php"><button type="button" class="btn btn-info">Retour</button></a>

<?php
$content = ob_get_clean();
require "template.php";
?>