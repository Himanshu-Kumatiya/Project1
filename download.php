<?php
    if(isset($_POST["value"]))
    {
        $file="files/note.txt";
        $fp= fopen($file,"w");
        fwrite($fp,$_POST["value"]);
        fclose($fp);
        echo true;
    }
    else
    {
        echo false;
    }
?>