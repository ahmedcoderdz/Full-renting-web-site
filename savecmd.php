<?php
    session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) { //pour sucurisé, il faut s'inscrir pour entre à cette page.
    $a = 1;
    $_SESSION['$a']=$a;
    header('location: login.php');
}else { 
    
include("connexion.php"); //connecté avec base des données.
$email = $_SESSION['email'];
$id = $_SESSION['$id'];

if (isset($_GET['idpostc'])) {
    

    $duree = $_POST['duree'];
    $date = date('y-m-d',strtotime($_POST['date']));
    
    $tel_1 = $_POST['tel_1'];
    $tel_2 = $_POST['tel_2'];

    $idp = $_GET['idpostc'];

    $sql = "INSERT INTO command (id_l, duree, date_depart, tel1, tel2, idpropriete)
     VALUES ('$id', '$duree', '$date', '$tel_1', '$tel_2', '$idp')";

     if($conect->query($sql)){
         $_SESSION['msg'] = "Réussi!";
         header('location: client.php');
        }
     


}else {
    header('location: client.php');
}
}
?>