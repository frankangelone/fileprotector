<?php

$my_connection = mysql_connect("localhost:8888", "root", "root"); // Default settings for MAMP.
$my_database = mysql_select_db("passwords");
$password = sha1($_POST['password']);
$uploads = "/Users/Frank/Documents/LocalServer/fileprotector"; // Set directory to your own file path.


if (isset($password)) {
    $query = mysql_query('SELECT * FROM passcode WHERE passcode="'.mysql_real_escape_string($password).'" ');
    
    if (mysql_num_rows($query) == 1) {
       
       move_uploaded_file($_FILES['file']['tmp_name'], $uploads . $_FILES['file']['name']);
        $success = "filesent";
        header("Location: file.html?=$success");
      
    } 
    else {    
        $error =  "passcodeincorrect";
        header("Location: file.html?=$error");
    } 
    
} 


mysql_close($my_connection);

?>