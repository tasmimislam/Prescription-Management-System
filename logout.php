<?php
include('header.php');
if (isset ($_COOKIE[session_name() ] ) ) {
    setcookie( session_name(), '', time()-86400, '/');
}

session_unset();
session_destroy();
   header('Location: http://' . $_SERVER['HTTP_HOST'] .'/doctor/');
    
?>



