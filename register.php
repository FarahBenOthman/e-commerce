<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    $name=$conn->real_escape_string($name);
    $email=$conn->real_escape_string($email);
    $password=$conn->real_escape_string($password);
    $cpassword=$conn->real_escape_string($cpassword);

   // $hashedPassword=password_hash($password,PASSWORD_DEFAULT);

  $select_user=mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' ") or die ('query failed');

  if(mysqli_num_rows($select_user)>0){
    $message[] = 'User already exist !';
  }else{
    if ($password != $cpassword) {
        $message[]= 'Wrong password';
    }else{
        mysqli_query($conn, "INSERT INTO `users` (`name`,`email`,`password`) VALUES ('$name','$email','$password')") or die('query failed');
        $message[] = 'Registered successfully';
        header('location:login.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Register page</title>
</head>
<body>

       
    <section class="form-container">

    <?php
         if(isset($message)){
            foreach($message as $message){
                echo '
                <div class="message">
                  <span>'.$message.'</span>
                    <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
                </div>
                
                ';
            }
         }
        ?>


        <form method="post">
            <h1>Register now</h1>
              <input type="text" name="name" placeholder="Name" required>
              <input type="text" name="email" placeholder="Email" required>
              <input type="password" name="password" placeholder="Password" required>
              <input type="password" name="cpassword" placeholder="Confirm your password" required>
              <input type="submit" name="submit-btn" value="register now" class="btn">
              <p>Already have an account ?<a href="login.php">&nbsp&nbspLogin now</a></p>
        </form>
    </section>
              
        
</body>
</html>