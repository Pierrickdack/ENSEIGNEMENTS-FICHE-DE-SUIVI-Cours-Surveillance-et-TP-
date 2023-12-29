<?php

    $server="localhost";
    $pass="";
    $login="root";
  try{
    $connexion=new PDO("mysql:host=$server;dbname=ict201",$login,$pass);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'yo1';
    $id=$_POST['record'];
    echo 'yo2';
    $query="DELETE FROM fiche where ID_fiche='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Size Deleted";
    }
    else{
        echo"Not able to delete";
    }
  }
  catch(PDOException $e){
    echo "error";
  }
?>