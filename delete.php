<?php

include 'connection.php';

$id = $_GET ['deleteid'];
    $sql = "delete from `crudapp` . `users` where id= $id";
    $result = mysqli_query ($connect , $sql);


if ($result){
echo "
      <script> 
      alert('data has been deleted successfully');
      window.location.href = 'display.php'
      </script>
      ";
    // header('location: update.php');
}

mysqli_close($connect)
?>