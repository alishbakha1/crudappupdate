<?php

include 'connection.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `crudapp`.`users` (username, email, password) VALUES ('$username', '$email', '$password')";

    $result = mysqli_query($connect, $sql);

    if($result){
      echo "
      <script> 
      alert('Form has been submitted');
      window.location.href = 'display.php'
      </script>
      ";
        // header('location: update.php');
     }else{
        die(mysqli_connect_error($connect));
     }

     mysqli_close($connect);

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Curd App</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2980b9, #6dd5fa);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      width: 350px;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      background: #f0f0f0;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #3498db;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background: #2980b9;
    }

    .error-message {
    color: red;
    font-size: 13px;
    margin-top: 2px;
    display: block;
  }

  input.error {
    border: 1px solid red;
  }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Create Account</h2>
  <form method="post" onsubmit="return validateForm()">
    <label>Username</label>
    <input type="text" name="username" id="username" placeholder="Username" >
    <span class="error-message" id="username-error"></span>

    <label>Email</label>
    <input type="email" name="email" id="email" placeholder="Email">
    <span class="error-message" id="email-error"></span>

    <label>Password</label>
    <input type="password" name="password" id="password" placeholder="Password" >
    <span class="error-message" id="password-error"></span>

    <button type="submit" name="submit">Submit</button>
  </form>
</div>

</body>
<script>
  function validateForm() {
    let isValid = true;

    // Clear previous errors
    const fields = ['username', 'email', 'password'];
    fields.forEach(field => {
      document.getElementById(field).classList.remove('error');
      document.getElementById(field + '-error').textContent = '';
    });

    // Validate each field
    fields.forEach(field => {
      const input = document.getElementById(field);
      if (input.value.trim() === '') {
        input.classList.add('error');
        document.getElementById(field + '-error').textContent = 'This field is required';
        isValid = false;
      }
    });

    return isValid; // prevent form submission if false
  }
</script>
</html>
