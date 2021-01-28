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

$sql = "INSERT INTO `produits` (`id_produit`, `nom_produit`, `description_produit`, `image_produit`, `prix_produit`) 
VALUES (NULL, '', '', '', '')";

}catch(PDOException $exception){
    die("Error : " .$exception->getMessage());
}
?>




<h1>Ajouter un article</h1>

<form action="ajouteProduitBack.php" method="POST">
  <div class="mb-3">
    <label>Nom de l'article</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" name="nom_produit" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Description</label>
    <input type="text" class="form-control" name="description_produit" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Image(url)</label>
    <input type="url" class="form-control" name="image_produit" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Prix</label>
    <input type="text" class="form-control" name="prix_produit" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Ajouter l'article</button>
</form>


<?php
$content = ob_get_clean();
require "template.php";
?>
