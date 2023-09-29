<?php
include 'connect.php';
session_start();
$admin_id=$_SESSION['admin_name'];

if(!isset($admin_id)){
    header('location:login.php');
}
if(isset($_POST['logout'])){
    session_destroy();
    header('location:login.php');
}




//delete

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    
    mysqli_query($conn, "DELETE FROM `message` WHERE id='$delete_id' ") or die ('query failed');

    header('location:admin_message.php');
}


?>

<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin Pannel</title>
</head>
<body>
    <?php include 'admin_header.php'; ?>
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

   <div class="line4"></div>
   <section class="message-container">
     <h1 class="title">Unread message</h1>
       <div class="box-container">
          
          <?php
             $select_message = mysqli_query($conn, "SELECT * FROM `message` ") or die ('query failed');
             if(mysqli_num_rows($select_message)>0){
                while($fetch_message = mysqli_fetch_assoc($select_message)){
             
          ?>
          <div class="box">
            <p>User id: <span><?php echo $fetch_message['id']; ?></span>
            <p>Name: <span><?php echo $fetch_message['name']; ?></span>
            <p>Email: <span><?php echo $fetch_message['email']; ?></span>
            <p><?php echo $fetch_message['message']; ?></p>
            <a href="admin_message.php?delete=<?php echo $fetch_message['id']; ?>;" 
            onclick="return confirm('Delete this message ?');">Delete</a>
          </div>
          <?php
            }
            }else{
                     echo '
                        <div class="msg">
                            <p>No messages added yet ! </p>
                        </div>
                    ';
            }
            ?>

       </div>
    
   </section>
<div class="line"></div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>