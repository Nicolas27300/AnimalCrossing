<?php

include('class/Navet.php');

$pseudo = $_POST['pseudo'];
$price = $_POST['price'];
$morning = $_POST['morning'];
if ($morning == "Matin"){
    $morning = true;
} else {
    $morning = false;
}

$navet = new Navet();
$navet->addCours($pseudo, $price, $morning);

header('Location: ../');