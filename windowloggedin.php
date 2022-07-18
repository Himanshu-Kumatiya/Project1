<?php
  session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!=true)
  {
    header("location : login.php");
  }
  $servername="localhost";
    $username="root";
    $password="";
    $database="digitalnotes";
    $login=false;
    $showalert1=false;
    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn)
    {
        echo "not connected";
    }
    $un=$_SESSION["username"];
    $sql="SELECT `name` FROM `user` where username='$un' ";
    $result=mysqli_query($conn,$sql);
    $element=mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notes taking website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="styleNT.css">
    <link rel="stylesheet" media="screen and (max-width:250px)" href="styleNTPhone.css">

</head>

<body>
    <header id="header">
        <div id="logo">
            <a   style=" text-decoration: none;" href="windowloggedin.php"><span style="color: rgb(250, 234, 12);">Digital</span><span style="color: rgb(226, 120, 6);">Notes</span></a>
        </div>
        <div id="buttons">
            <button class="addcls" id="add">Add note</button>
            <button class="addcls" id="added">My Notes</button>
        </div>
       
        <div id="user">
        <?php
                echo "<div class='user-name'>User - ".$element['name']."</div>";
            ?>
            <a href="logout.php" class="logout" >Logout</a>
        </div>
        
    </header>
    <div id="confirm"></div>
    <section id="text">
        <div id="text1">

            <div>
                <div id="title-heading" class="heading-edit">Title</div>
                <input type="text" class="elem-text elem1" id="title">
            </div>
            <div>
                <div id="textarea-heading" class="heading-edit">Write note</div>
                <textarea class="elem-text elem2" id="area"></textarea>
            </div>
        </div>
        <div id="addbtn">
            <button id="btn1">Add</button>
        </div>
    </section>
    <section id="notes">
        <div id="heading">
            <h1>Notes</h1>
        </div>
        <div id="notes-list">
        
        </div>
    </section>
    <script src="userloggedin.js"></script>
</body>


</html>