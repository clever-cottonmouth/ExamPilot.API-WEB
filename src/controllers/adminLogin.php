<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/840b1ebd19.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <title>Online Examinaton in India | MyExam.com</title>
</head>
<body>
    <form method="post" action="adminLogin.php">
    <div class="container">
        <h1>Welcome to Admin Panel</h1>
        <div class="box">
            <i class="fa fa-envelope-o"></i>
            <input type="text" name="username" placeholder="Enter your Username">

        </div>
        <div class="box">
            <i class="fa fa-key"></i>
            <input type="password" name="password" placeholder="Enter your password">
        </div>
        <input class="btn" type="submit" name="submit" value="Login"/>
    </div>
</form>
</body>
</html>
 

 <?php
include("config.php");
 
 if(isset($_POST['submit']))
 {
     $username = $_POST['username'];
     $password = $_POST['password'];
     $query = "select * from admin where username='$username' && password='$password'";
     $data = mysqli_query($con, $query);
     $total = mysqli_num_rows($data);
     if($total == 1)
     {
         $_SESSION['username'] = $username;
         header('location:dashboard.php');
     }else{
         echo "Login Fialed";
     }
 }
 
 ?>