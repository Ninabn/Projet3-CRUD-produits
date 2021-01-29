<?php
try{
    $user = "root";
    $pass = "";
    $bdd = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", $user, $pass);
    //debug
    $bdd-> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// use exec() because no results are returned

echo "Connecter";
} catch(PDOException $e) {
echo $sql . "<br>Erreur" . $e->getMessage();
}

$sql = "SELECT password_user, email_user, name_user FROM users";
foreach($bdd->query($sql) as $row){

$email = $_POST['email_user'];
$pass = $_POST['password_user'];

if (!empty($email) && !empty($pass)) {

    if($email === $row['email_user'] && $pass === $row['password_user']){
        session_start();
        $_SESSION['email'] = $row['email_user'];
        $_SESSION['password'] = $row['password_user'];
        $_SESSION['name'] = $row ['name_user'];
        header('Location: http://localhost/ecommerce/listeProduit.php');
        
    }else{
        echo "<a href='index.php' class='btn btn-danger'>Retour</a>";
    }
}else{
    echo "Les champs n'ont pas été remplit";
    echo "<a href='index.php' class='btn btn-danger'>Retour</a>";
}

}
var_dump($row['password_user']);
var_dump($email);
var_dump($row['email_user']);
var_dump($pass);

var_dump($row ['name_user'])
?>