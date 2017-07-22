<?php 

ob_start();
session_start();

error_reporting(0);
 

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
                <ul class="nav navbar-nav navbar-left">
                   
                   
                   
                        <li><a href="patients.php"> Patients</a></li>
                        <li><a href="addPatients.php">Add Patinets</a></li>
                        <li><a href="addMedicine.php">Add Medicine</a></li>
                        <li><a href="medicines.php">Medicine List</a></li>
                        
                  </ul>
                         
                    <ul class="nav navbar-nav navbar-right">
                        
                         <li><a> Doctor, <b><?php  echo $_SESSION['loggedInUser']; ?></b></a></li>
                        
                        <li><a href="logout.php">Log Out</a></li>
                        
                           
                    
                </ul>
            </div>
        </div>
    </div><!--/header-->
    <br>
    <br>
<div class="container">