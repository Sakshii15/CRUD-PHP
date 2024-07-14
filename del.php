<?php 
    include 'server.php';
    $id=$_GET['id'];

        $sql="DELETE FROM INFO WHERE ID='$id'";

        if(mysqli_query($conn,$sql)){
        header("location:view.php");
    }
    else{
        echo "Something went wrong";
    }
    


?>