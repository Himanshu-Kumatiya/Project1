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
    $sql="SELECT * FROM `$table`";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);
    if($row>0)
    {
        $div="";
        for($index=0;$index<$row;$index++)
        {
            $arr=mysqli_fetch_assoc($result);
            $div = $div.'<div class="divs"><div class="heading-notes">'.$arr["title"].'</div><textarea class="text-note" id="id'.$arr["id"].'">'.$arr["note"].'</textarea><div ><div class="date">'.$arr["date"].'</div><div class="option" ><button class="delete"  onclick="deleteNote('.$arr["id"].')">Delete</button><button class="edit"  onclick="editNote('.$arr["id"].')">Update</button><button class="download"  onclick="download('.$arr["id"].')"><a download id="file_load'.$arr["id"].'">Download</a></button></div></div></div>';

        }
        echo $div;
    }
    else{
        echo "<center style='font-size:25px;'> Please add some notes</center>";
    }

?>