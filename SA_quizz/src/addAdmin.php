<?php
    //------insert.php------
include('cnx.php');
    //  $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "bd_quizz";
 $servername = "mysql-ldsteve.alwaysdata.net";
    $username = "ldsteve";
    $password = "SONATELODC";
    $dbname = "ldsteve_bd_quizz";
// $connect = new PDO("mysql:host=mysql-ldsteve.alwaysdata.net;dbname=ldsteve_bd_quizz", "ldsteve", "SONATELODC");
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(!empty($_POST['password']) and !empty($_POST['login'])){
    if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])){
          $extensionsValides=["jpg","jpeg","png"];
          $nomImage = $_FILES['image']['name'];
            $extensionToUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
            if (in_array($extensionToUpload, $extensionsValides)){
              $chemin = "images".$_FILES['image']['name'];
              move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
            }
      } 

            $pass=$_POST['password'];
            $prenom=$_POST['prenom'];
            $nom=$_POST['nom'];
            $login=$_POST['login'];
            $image=$_POST['image'];
            $statut=$_POST['statut'];
            $data=mysqli_query($conn,"SELECT login FROM utilisateur where login='$login'");
            $row=mysqli_num_rows($data);
            if ($row==0) {
             $sql= mysqli_query($conn,"INSERT INTO utilisateur(pass,prenom,Nom,Login,image,statut,privilege) VALUES('".$pass."','".$prenom."','".$nom."','".$login."','".$image."',1,'admin')");
             
           }
}
 ?>