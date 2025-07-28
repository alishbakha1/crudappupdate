<?php
include 'connection.php';

?>





<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #ecf0f1;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .table-wrapper {
            margin: auto;
            width: 90%;
            border: 2px solid #3498db; /* Outer Border */
            border-radius: 8px;
            overflow: hidden;
            background-color: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #3498db; /* Inner cell borders */
            text-align: center;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #dff9fb;
        }

        /* Buttons styling */
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
        }

        .btn-update {
            background-color: #27ae60; /* Green */
        }
        .btn-update:hover {
            background-color: #219150;
        }

        .btn-delete {
            background-color: #e74c3c; /* Red */
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
  

<h2>Registered Users</h2>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password (Hashed)</th>
                <th>Actions</th>  <!-- New column for buttons -->
            </tr>
        </thead>
        <tbody>
            <!-- PHP se yahan data show hoga, example ek row: -->
            <?Php
            $sql =  "select * from `crudapp`.`users`";
            $result = mysqli_query($connect , $sql);

            if($result){
                // $row = mysqli_fetch_assoc($result);
                // echo $row ['username'];

                 while( $row = mysqli_fetch_assoc($result)){
                      $id= $row ['id'];
                $username= $row ['username'];
                 $email= $row ['email'];
                  $password= $row ['password'];




                  
            echo'
    
           
            <tr>
                <td>'.$id.'</td>
                <td>'.$username.'</td>
                <td>'.$email.'</td>
                <td>'.$password.'</td>
                <td>
                    <a href="update.php?updateid='.$id.'" class="btn btn-update">Update</a>
                    <a href="delete.php?deleteid='.$id.'" class="btn btn-delete">delete</a>
               
                </td>
            </tr> ';

            }
            }


           
            
            ?>
        





           
        </tbody>
    </table>
</div>

</body>
</html>
