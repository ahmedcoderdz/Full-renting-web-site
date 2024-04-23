<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) { //pour sucurisé, il faut s'inscrir pour entre à cette page.
$a = 1;
$_SESSION['$a']=$a;
header('location: login.php');
}else {  

if (isset($_GET['postid']) && isset($_POST['addimg'])) {

    include("connexion.php"); //connecté avec base des données.
    $email = $_SESSION['email'];
    $id = $_SESSION['$id'];
    $idpost = $_GET['postid']; //idpropriete

    if (!empty($_FILES['img']['name'][0])) {
    $verifie = array('png', 'jpg', 'jpeg');

       foreach ($_FILES['img']['tmp_name'] as $key => $value) {
           $nomimg = $_FILES['img']['name'][$key];
           $tmpnom = $_FILES['img']['tmp_name'][$key];
           $typeimg = strtolower(end(explode('.',$nomimg))); //couper le nom de l'image par '.', aprés j'ai prend dernier élément ,car il contient type d'image. 
           if (in_array($typeimg, $verifie)) {
               $finalnom = 'img/'.$nomimg;
            if (!file_exists($finalname)) {
                move_uploaded_file($tmpnom, $finalnom); //enrégistrer l'image dans le fishier 'img'.
            }
               $insertion = "INSERT INTO image (img, idpropriete) VALUES ('$finalnom', '$idpost')";
               if ($conect->query($insertion) === TRUE) {
                header('location: owner.php');
            }else { //si erreur dans l'insertion.
                $_SESSION['msg'] = "Dzl, erreur de sauvgarder l'image";
                header('location: img.php?postid='.$idpost);
            }

           }else { //si l'utilisateur inserer fichier de type défferent(n'est pas img).
            $_SESSION['msg'] = "Seulement fichier de type (png, jpg, jpeg) est accepté";
            header('location: img.php?postid='.$idpost);
           }

        }

    }else {
    header('location: img.php?postid='.$idpost); //si vide retourné
}
   
}
}

?>