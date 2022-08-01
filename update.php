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
     $element=json_decode($_POST["value"]);
     $sql="UPDATE `$table` SET `note` = '$element[1]' WHERE `$table`.`id` = $element[0]";
     $result=mysqli_query($conn,$sql);
     if($result)
     {
         echo true;
     }
 


?>