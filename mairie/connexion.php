<?php session_start(); ?>
<?php
require "database.php";
function inputVerify($var){

    $var = trim($var);
    $var = htmlspecialchars($var);
    $var = stripslashes($var);

    return $var;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usermail = inputVerify($_POST['email']);
    $password = inputVerify($_POST['password']);

    if(!empty($_POST['email']) and !empty($_POST['password']) )
    {
        $db = new PDO('mysql:host=localhost;dbname=mairie;charset=utf8','root', '');
        $req=$db->prepare("SELECT * from users_tables where email=? AND  mot_de_passe=?");
        $req->execute(array($_POST['email'],$_POST['password']));
       

        $userHasBeenFound = $req->rowCount();
        if ($userHasBeenFound) {
            $user = $req->fetch(PDO::FETCH_OBJ);
            
            $_SESSION['id'] = $user->id;
            $id=$_SESSION['id'];
            $_SESSION['nom'] = $user->nom;
            $nom = $user->nom;
            $_SESSION['NIV0'] = 1 ;
            $_SESSION['photo'] = $user->photo;
            $photo = $user->photo;
            $_SESSION['email'] = $user->email;
            $email = $user->email;
            
        }
    } 
}

header('location:dashboard.php');
// if (isset($_POST['remember'])) {
//     setcookie('auth_id', $user->id . '-----' . sha1($user->user), time() + 3600 * 24 * 3, '/', 'localhost', false, true);
// }

?>