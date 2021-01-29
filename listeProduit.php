
<?php
session_start();
$title = "Produits";
ob_start();
try{
    $user = "root";
    $pass = "";
    $bdd = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", $user, $pass);
    //debug
    $bdd-> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $exception){
    die("Error : " .$exception->getMessage());
}

//Titre de la page et bouton create
echo'<h1 class="text-center">Produits mis en ventes par : ' .$_SESSION['name']. '</h1>';

echo '<a href="ajouteProduit.php"> <button type="button" class="btn btn-success m-4">Ajouter un article</button></a>';

$req = "SELECT * FROM produits";
    foreach($bdd->query($req) as $row){
?>

<!--AFFICHAGE DES PRODUIT ONE BY ONE-->

<section style="margin-bottom: 80px; padding: 20px; background-color: #F2F2F2;" id="produits">

<div style="display: flex; align-items : center" id="row_produits">
<img class="m-5" src="<?= $row['image_produit'] ?>" alt="<?= $row['nom_produit'] ?>" title="<?= $row['nom_produit'] ?>" />

<div>
    <h3 style="display: flex;" class="text-center"><?php echo $row['nom_produit'] ?></h3>
    <p style="width: 65%;"><?php echo $row['description_produit'] ?></p>
    <p><?php echo 'Prix : ' .$row['prix_produit'] ?> €</p>


    <!--------------------------------------BOUTON--------------------------------------->
    <table class="table">
        <tr>
            <td><a href="delete.php?id_produit=<?= $row["id_produit"]?>" class="btn btn-danger">Supprimer</a></td>

            <td><a href="detailProduit.php?id_produit=<?= $row["id_produit"]?>" class="btn btn-info" >Détails</a></td>

            <td><a href="editProduit.php?id_maj=<?= $row["id_produit"]?>" class="btn btn-warning">Editer</></td>     

        </tr>
    </table>
</div>

</div>

</section>

<?php
    }
?>

<?php
$content = ob_get_clean();
require "template.php";

