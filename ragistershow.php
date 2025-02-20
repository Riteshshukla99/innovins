<?php include 'get_db_connection.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Ragister Data</title>
</head>
<body>
    <div class="container">
      <button class="bnt btn-primary mb-3" style="margin-top: 20px;"><a href="userragister.php" class="text-light" style="text-decoration:none;">Add Ragister</a></button>
<table class="table table-bordered display" >
  <thead>
    <tr style="background-color: Yellow">
      <th class="text-center">ID</th>
      <th class="text-center">USERNAME</th>
      <th class="text-center">EMAIL</th>
      <th class="text-center">PASSWORD</th>
      <th class="text-center">ACTION</th>
    </tr>
  </thead>
  <tbody>
    
   
  </tbody>

</div>

<?php

$sql="SELECT * FROM usermaster";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $username  =$row['username'];
        $email     =$row['email'];
        $password  =$row['password'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$username.'</td>
        <td>'.$email.'</td>
        <td>'.$password.'</td>
       <td> <button class="btn btn-primary"><a href="ragister_update.php?updateid='.$id.'" class="text-light" style="text-decoration:none;">Edit</a></button> <button class="btn btn-danger"><a href="ragister_delete.php?deleteid='.$id.'" class="text-light" style="text-decoration:none;" onclick="">Delete</a></button></td>
      </tr>'; 
      
    }
}

?>

</table>
</body>
</html>