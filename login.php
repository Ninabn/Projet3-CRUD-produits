<?php
$title = "Connexion";
ob_start();
?>

<form action="loginBack.php" method="POST" class="container">
  <div  class="mb-3">
    <label for="exampleInputEmail1">Email </label>
    <input name="email_user" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>

  <div  class="mb-3">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input name="password_user" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  <button type="submit" class="btn btn-success">Connexion</button>
</form>


<?php
$content = ob_get_clean();
require "template.php";
?>