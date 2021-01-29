<?php
session_start();
$title = "Inscription";
ob_start();


$name =htmlspecialchars($_POST['name_user']);
$email = htmlspecialchars($_POST['email_user']);
$password = htmlspecialchars($_POST['password_user']);
$_SESSION['name'] = $row ['name_user'];

try{
    $user = "root";
    $pass = "";
    $bdd = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", $user, $pass);
    //debug
    $bdd-> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO users (email_user, password_user, name_user)
  VALUES ('$email', '$password','$name')";

$bdd->exec($sql);
  echo "Le compte a bien été créé !";
var_dump($sql);

}catch(PDOException $exception){
    die("Error : " .$exception->getMessage());
}
?>

<a href="listeProduit.php"><button type="button" class="btn btn-success">Acceder au site</button></a>

<?php
 header('Location: http://localhost/ecommerce/listeProduit.php');
$content = ob_get_clean();
require "template.php";
?>