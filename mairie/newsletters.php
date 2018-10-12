<?php

function inputVerify($var){

    $var = trim($var);
    $var = htmlspecialchars($var);
    $var = stripslashes($var);

    return $var;
}

$champ = inputVerify($_POST["mailnewletter"]);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(!empty($_POST["mailnewletter"]))
    {
        $db = new PDO('mysql:host=localhost;dbname=mairie;charset=utf8','root', '');
        $req=$db->prepare("INSERT INTO newsletters (mail) VALUES (?)");
		$req->execute(array($_POST["mailnewletter"]));
		
    }
    header("location:index.php");
}

?>