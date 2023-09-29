<?php
include 'connect.php';

session_start();

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    
    $email=$_POST['email'];
    $password=$_POST['password'];
   

    
    $email=$conn->real_escape_string($email);
    $password=$conn->real_escape_string($password);
    
    $select_user=mysqli_query($conn,"SELECT * FROM `users` WHERE email='$email'") or die('query failed');

    if(mysqli_num_rows($select_user)>0){
        $row=mysqli_fetch_assoc($select_user);
        if($row['user_type']=='admin'){
            $_SESSION['admin_name']=$row['name'];
            $_SESSION['admin_email']=$row['email'];
            $_SESSION['admin_id']=$row['id'];
            header('location:admin_pannel.php');
        }else
            if($row['user_type']=='user'){
                $_SESSION['user_name']=$row['name'];
                $_SESSION['user_email']=$row['email'];
                $_SESSION['user_id']=$row['id'];
                header('location:index.php');
            }else{
                $message[] = 'Incorrect email or password';
            }
    
  }
}
?>

<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
            <h1>Login now</h1>
            <div class="input-field">
                <label>Email</label><br>
                <input type="text" name="email" required>
              </div>

              <div class="input-field">
                <label>Password</label><br>
                <input type="password" name="password" required>
        </div>
              
              
              
              <input type="submit" name="submit-btn" value="login now" class="btn">
              <p>Do not have an account ?<a href="register.php">&nbsp&nbspRegister now</a></p>
        </form>
    </section>
              
        
</body>
</html>