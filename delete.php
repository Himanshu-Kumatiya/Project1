<?php
    session_start();
    $table=$_SESSION["username"];
    $servername="localhost";
    $username="root";
    $password="";
    $database="digitalNotes";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn)
    {
        echo "not connected";
    }
    $element=$_POST["value"];
    $sql="DELETE FROM `$table` WHERE `$table`.`id` = $element";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo true;
    }
?>