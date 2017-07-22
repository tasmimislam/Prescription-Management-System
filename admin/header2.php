<?php 
session_start();
//error_reporting(0);
//error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel | Personal Medical System </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    

</head>

<body style="padding-top: 60px;">
   
        
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
            
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="patients.php"><strong>Personal Medical System</strong></a>
                </div>
                
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <?php 
                     //  if(isset($_SESSION['loggedInUser'])){  
                   
                       
                    ?>
                    <ul class="nav navbar-nav">
                        <li><a href="patients.php"> Patients</a></li>
                        <li><a href="addPatients.php">Add Patinets</a></li>
                        <li><a href="addMedicine.php">Add Medicine</a></li>
                        <li><a href="medicines.php">Medicine List</a></li>
                        
                        
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <p class="navbar-text">Admin, <?php  echo $_SESSION['loggedInUser']; ?></p>
                        <li><a href="logout.php">Log out</a></li>
                    </ul>
                    <?php 
                  //  }
                //    else {
                    ?>
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Log in</a></li>
                    </ul>
                    <?php 
                //    } 
                    ?>
                </div>
            </div>
            
        </nav>
    
     <div class="container">