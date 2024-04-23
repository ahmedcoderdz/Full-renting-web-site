<?php
    session_start();
 if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) { //pour sucurisé, il faut s'inscrir pour entre à cette page.
    $a = 1;
    $_SESSION['$a']=$a;
    header('location: login.php');
}else { 

    if (isset($_GET['postid'])) {
        include("connexion.php"); //connecté avec base des données.
        
        if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
            echo '<script>alert("'.$_SESSION['msg'].'");</script>';
            unset($_SESSION['msg']);
        }

        $email = $_SESSION['email'];
        $id = $_SESSION['$id'];
        
        $idpost = $_GET['postid'];



     $nv = 1; //me aider dans check.php, pour verefier si l'announce inculde une image ou non.
     $_SESSION['$nv'] = $nv;
    
    
    ?>

<!DOCTYPE html>
<html>
<head>
    <h1>Nouvelle location</h1>
</head>
    
<form action="saveimg.php?postid=<?php echo $idpost; ?>" method="POST" enctype="multipart/form-data">

   <h4>Notice: Obtenez vos photos en une seule fois.</h4>
   <input type="file" name="img[]" multiple required>
    <br><br><input type="submit" name="addimg" value="Sauvgarder"> 

</form>
<a href="check.php?postid=<?php echo $idpost; ?>"><button>Annuller</button></a>

<body>
</body>

</html>

    <?php }else {
        $_SESSION['msg'] = "Respectez vous les étapes SVP!";
        header('location: owner.php');
    }
}
//enctype="multipart/form-data" ==> car on a type "file" dans la form.

 ?>