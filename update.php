<?php
include 'connection.php';
$id = $_GET['updateid'];
echo $id;

$sql =  "select * from `crudapp`.`users`";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];



if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "update  `crudapp` . `users` set
    username = '$username',
    email = '$email',
    password = '$password'
    where `users`.`id` = $id ";
    $result = mysqli_query($connect, $sql);

    if($result){
      echo "
      <script> 
      alert('update has been submitted');
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
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
    .error {
    border: 2px solid red;
  }

  .error-message {
    color: red;
    font-size: 0.9em;
    margin-top: -8px;
    margin-bottom: 8px;
  }
  </style>
</head>

<body>


<div class="form-container">
  <h2>Create Update</h2>
  <form id="updateForm" method="post" onsubmit="return updateform()">
    <label>Username</label>
    <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username ?>">
    <div class="error-message" id="username-error"></div>

    <label>Email</label>
    <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email ?>">
    <div class="error-message" id="email-error"></div>

    <label>Password</label>
    <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $password ?>">
    <div class="error-message" id="password-error"></div>

    <button type="submit" name="submit">Update</button>
  </form>
</div>

</body>

<script>
  document.getElementById("updateForm").addEventListener("submit", function (e) {
    let isValid = true;

    const username = document.getElementById("username");
    const email = document.getElementById("email");
    const password = document.getElementById("password");

    const usernameError = document.getElementById("username-error");
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");

    // Reset previous errors
    [username, email, password].forEach(field => field.classList.remove("error"));
    [usernameError, emailError, passwordError].forEach(el => el.textContent = '');

    // Username validation
    if (username.value.trim() === "") {
      username.classList.add("error");
      usernameError.textContent = "Username is required.";
      isValid = false;
    }

    // Email validation
    if (email.value.trim() === "") {
      email.classList.add("error");
      emailError.textContent = "Email is required.";
      isValid = false;
    } else {
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email.value.trim())) {
        email.classList.add("error");
        emailError.textContent = "Enter a valid email.";
        isValid = false;
      }
    }

    // Password validation
    if (password.value.trim() === "") {
      password.classList.add("error");
      passwordError.textContent = "Password is required.";
      isValid = false;
    }

    if (!isValid) {
      e.preventDefault(); // prevent form submission
    }
  });
</script>
</html>