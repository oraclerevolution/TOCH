<?php 

require "database.php";
$nom = $mail = $mdp = $mdp2 = $imageError = "";
function inputVerify($var){

    $var = trim($var);
    $var = htmlspecialchars($var);
    $var = stripslashes($var);

    return $var;
}

if (!empty($_POST)) {
    $nom = inputVerify($_POST["username"]);
    $mail = inputVerify($_POST["usermail"]);
    $mdp = inputVerify($_POST["motDePasse"]);
    $mdp2 = inputVerify($_POST["motDePasse2"]);
    $image = inputVerify($_FILES["pp"]["name"]);
    $imagePath = 'images/'.basename($image);
    $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);
    
    $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["pp"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["pp"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
    
    if($isUploadSuccess){
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO users_tables (nom,email,mot_de_passe) values(?, ?, ?)");
        $statement->execute(array($nom,$mail,$mdp,$image));
        Database::disconnect();
        header("location:index.php");
    }
    
}

?>