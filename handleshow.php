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
    $sql="SELECT * FROM `$table`";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);
    if($row>0)
    {
        $div="";
        for($index=0;$index<$row;$index++)
        {
            $arr=mysqli_fetch_assoc($result);
            $div = $div.'<div class="divs"><div class="heading-notes">'.$arr["title"].'</div><textarea class="text-note">'.$arr["note"].'</textarea><div ><div class="date">'.$arr["date"].'</div><button class="delete date" id="'.$arr["id"].'" onclick="deleteNode(this.id)">Delete</button></div></div>';

        }
        echo $div;
    }
    else{
        echo "<center style='font-size:25px;'> Please add some notes</center>";
    }

?>