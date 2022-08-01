<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="digitalNotes";
    $showalert=false;
    $showalert1=false;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $conn=mysqli_connect($servername,$username,$password,$database);
        if(!$conn)
        {
            echo "not connected";
        }
        $name=$_POST["name"];
        $user_name=$_POST["username"];
        $user_password=$_POST["password"];
        $user_cpassword=$_POST["cpassword"];
        if($user_name!="" && $user_password!="" && $user_cpassword!=""){
            $result=mysqli_query($conn,"SELECT * FROM `user` WHERE username='$user_name'");
            $row= mysqli_num_rows($result);
            if($row>0)
            {
                $showalert1="Username already exits";
            }
            else{
                
                if(($user_password==$user_cpassword))
                {
                    $sql="INSERT INTO `user` ( `name`, `username`, `password`) VALUES ( '$name', '$user_name', '$user_password')";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        $showalert=true;
                        $sql="CREATE TABLE `$database`.`$user_name` (`id` INT NOT NULL AUTO_INCREMENT ,`title` TEXT NOT NULL , `note` TEXT NOT NULL,`date` VARCHAR(10) NOT NULL ,PRIMARY KEY (`id`) )";

                        mysqli_query($conn,$sql);
                    }
                    
                }
                else
                {
                    $showalert1="Passwords do not match ";
                }
            }    
        }
        else{
            $showalert1="fill all credentials";
        }
    }

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>signup</title>
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
        if($showalert)
        {
            echo '<div class="alert alert-success text-center" role="alert"> 
                    successfully created account
                    </div>';
        }
        if($showalert1)
        {
            echo '<div class="alert alert-danger text-center" role="alert"> '
                    .$showalert1.'
                    </div>';
        }
    ?>
<div class="container mt-5">
    <h1 class="text-center">Signup </h1> 
    <form action="signup.php" method="post" style="display:flex;flex-direction:column;align-items:center;">
        <div class="mb-3 col-md-6">
            <label for="exampleInput1" class="form-label">Name</label>
            <input type="text" maxlength="11" class="form-control" id="exampleInput1" name="name" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleInput2" class="form-label">Username</label>
            <input type="text" maxlength="11" class="form-control" id="exampleInput2" name="username" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3 col-md-6">
            <label for="password" class="form-label" >Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3 col-md-6">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control"  name="cpassword" id="cpassword">
        </div>
        <button type="submit" class="btn btn-primary">SignUp</button>
    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
</body>
</html>