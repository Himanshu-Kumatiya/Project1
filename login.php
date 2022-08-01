<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="digitalNotes";
    $login=false;
    $showalert1=false;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $conn=mysqli_connect($servername,$username,$password,$database);
        if(!$conn)
        {
            echo "not connected";
        }
        $user_name=$_POST["username"];
        $user_password=$_POST["password"];
        if($user_name!="" && $user_password!="")
        {
            
            $sql="SELECT * FROM `user` WHERE `username`='$user_name' AND `password`='$user_password'";
            $result=mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if($num ==1)
            {
                $login=true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user_name;
                header("location: windowloggedin.php");
            }    
            else
            {
                $showalert1=true;
                
            }
        }
        else{
            $showalert1=true;
        }
    }

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="styleNT.css">
    <link rel="stylesheet" media="screen and (max-width:250px)" href="styleNTPhone.css">
</head>
  <body>
  <header id="header">
        <div id="logo">
            <a  style=" text-decoration: none;" href="index.php"><span style="color: rgb(250, 234, 12);">Digital</span><span style="color: rgb(226, 120, 6);">Notes</span></a>
        </div>
        
       
        <div id="signbutt">
            <a href="signup.php" class="signcls" id="singup">Signup</a>
            <a href="login.php" class="signcls" id="login">Login</a>
        </div>
    </header>
   
    <?php
        if($login)
        {
            echo '<div class="alert alert-success text-center" role="alert"> 
                    you are successfully logged in
                    </div>';
        }
        if($showalert1)
        {
            echo '<div class="alert alert-danger text-center" role="alert"> 
                    invalid credentials
                    </div>';
        }
    ?>
    
    <div class="container mt-5">
        <h1 class="text-center ">Login </h1> 
        <form action="login.php" method="post" style="display:flex;flex-direction:column;align-items:center;">
            <div class="mb-3 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label" >Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

   
  </body>
</html>