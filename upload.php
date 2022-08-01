<?php
    if(isset($_POST['upload']))
    {
        $file="files/".$_FILES['myfile']['name'];
        $temp_file=$_FILES['myfile']["tmp_name"];
        if(move_uploaded_file($temp_file,$file))
        {  
            $fp= fopen($file,"r");
            $f_data=fread($fp,filesize($file));
            // echo $f_data;
            unlink($file);
            //echo "<script>document.getElementById('area').innerHTML='$f_data';</script>";
            echo $f_data;
        }
        else
        {
            echo "Please add a valid text file<br>";
        }
    } 
    else {
        echo "some error";
    }

?>