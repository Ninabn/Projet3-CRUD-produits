<?php
$title = "test";
?>

<?php 
ob_start();
?>

<div style="display: flex; justify-content: center;">
<section id="user_form">

<h1 class="text-center">BAZAR.COM</h1>

<div class="container">

<div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword">        
    </div>

    <div class="text-center">
        <a href="listeProduit.php"><button type="button" class="btn btn-secondary">Connexion</button></a>
    </div>
</div>

</section>
</div>


<?php
$content = ob_get_clean();
require "template.php";
?>


