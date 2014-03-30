<?php

$my_connection = mysql_connect("localhost:8888", "root", "root"); // Default settings for MAMP.
$my_database = mysql_select_db("passwords");
$password = sha1($_POST['password']);

if (!empty($password)) {
    $query = mysql_query('SELECT * FROM passcode WHERE passcode="'.mysql_real_escape_string($password).'" ');
    
    if (mysql_num_rows($query) == 1) {
   
          $file_download = $_POST['fileDownload'];
          
       		if (!empty($file_download)) {
                if (file_exists("/Users/Frank/Documents/LocalServer/fileprotector" . $file_download)) // Configure your file path directory accordingly {
                    header("Content-Description: File Transfer");
                    header("Content-Type: application/octet-stream");
                    header("Content-Disposition: attachment; filename=".basename($file_download));
                    header("Content-Length: " . filesize($file_download));
                    readfile($file_download);
                
                 } else {
                      $no_file = "none";
                      header("Location: file.html?=$no_file");
                 }
                 
       		} else {
       		     $empty_filename = "nofileentered";
       		  	 header("Location: file.html?=$empty_filename");
       		}
       		  
    } else { 
         $no_results = "noresultsfound";
         header("Location: file.html?=$no_results");
    } 

} else { 
   $no_password = "nopasswordentered";
   header("Location: file.html?=$no_password");
} 
   
mysql_close($my_connection);

?>