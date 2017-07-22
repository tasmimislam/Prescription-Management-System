<?php 

ob_start();
session_start(); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Prescription Management Software </title>
    
    <link rel="stylesheet" type="text/css" href="hoverStyle.css">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" height="70px" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                   
                   
                   
                  <?php 
                       if( isset($_SESSION['loggedInUser'])){  
                   
                       
                    ?>
                   
                        <li><a href="prescription.php"> Prescription </a></li>
                        <li><a href="dompdf1.php"> Download Prescription </a></li>
                       <!-- <li><a href="editProfile.php">Edit Profile</a></li>-->
                        
                  
                   
                        <li class="navbar-text">Hi, <?php  echo $_SESSION['loggedInUser']; ?></li>
                        <li><a href="logout.php">Log out</a></li>
                  
                    <?php 
                    }
                    else {
                    ?>
                     
                          <li><a href="userRegistration.php">Registration</a> </li>
                        <li><a href="login.php">Log in</a></li>
                    
                    <?php 
                    } 
                    ?>
                        
                    
                    
                    
                    
                            
                            
                           
                        </ul>
                    </li>
                    
                    
                    
                </ul>
            </div>
        </div>
    </div><!--/header-->
    <br>
    <br>

