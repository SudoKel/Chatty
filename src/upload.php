<?php
  session_start();

  $user = $_SESSION['uName'];

    function GetImageExtension($imagetype) {
           if(empty($imagetype)) return false;
           switch($imagetype)
           {
               case 'image/bmp': return '.bmp';
               case 'image/gif': return '.gif';
               case 'image/jpeg': return '.jpg';
               case 'image/png': return '.png';
               default: return false;
           }
    }
         
    if (!empty($_FILES["fileToUpload"]["name"])) {

        $file_name = $_FILES["fileToUpload"]["name"];
        $temp_name = $_FILES["fileToUpload"]["tmp_name"];
        $imgtype = $_FILES["fileToUpload"]["type"];
        $ext =  GetImageExtension($imgtype);
        $imagename = date("d-m-Y")."-".time().$ext;
        $target_path  =  "uploads/".$imagename;
        $date = date("Y-m-d");
        move_uploaded_file($temp_name, $target_path);
    }

    echo $target_path;

    $img = "<span class=\"user\">$user: </span><img src=\"" . $target_path ."\" height=\"200px\" >\n"; 

    $src = "data/log.txt";

    file_put_contents($src, $img, FILE_APPEND);

    $history = file($src);

    foreach($history as $msg)
      echo "<p>$msg</p>";    

?>