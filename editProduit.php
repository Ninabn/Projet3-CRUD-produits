<?php
$title = "Modifier le produits";
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



<!--MODIFICATION DE L'ARTICLE-->


<?php
$sql = "SELECT * FROM produits WHERE id_produit = ?";

$requete = $bdd->prepare($sql);

$maj = $_GET['id_maj'];

$requete->bindParam(1, $maj);

$requete->execute();

$resultat = $requete->fetch();

  ?>


<h1>Modifier l'article</h1>

<form style="margin: 50px;" action="majConfirm.php?id_maj=<?=$resultat['id_produit']?>" method="POST">
  <div class="mb-3">
    <label>Nom de l'article</label>
    <input value="<?= $resultat['nom_produit']?>" type="text" class="form-control" aria-describedby="emailHelp" name="nom_produit" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea rows="4" type="text" class="form-control" name="description_produit" required > <?= $resultat['description_produit']?></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Image(url)</label>
    <input value="<?= $resultat['image_produit']?>" type="url" class="form-control" name="image_produit" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Prix</label>
    <input value="<?= $resultat['prix_produit']?>" type="text" class="form-control" name="prix_produit" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Modifier</button>
  <a href="listeProduit.php"><button type="button" class="btn btn-info">Retour</button></a>
</form>


<?php
$content = ob_get_clean();
require "template.php";
?>