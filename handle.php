<?php
    session_start();
    $table=$_SESSION["username"];
    $servername="localhost";
    $username="root";
    $password="";
    $database="digitalnotes";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn)
    {
        echo "not connected";
    }
    $element=json_decode($_POST["value"]);
    $sql="INSERT INTO `$table` ( `title`, `note`,`date`) VALUES ( '$element[0]', '$element[1]', '$element[2]')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo true;
    }

?>