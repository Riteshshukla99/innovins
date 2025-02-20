<?php  
include 'get_db_connection.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from usermaster where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location:ragistershow.php");
    }else{
        die(mysqli_error($conn));
    }

}