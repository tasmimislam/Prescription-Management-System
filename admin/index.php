<?php
    include('header.php');
    include('functions.php');
    include('connection.php');

 if(isset($_SESSION['loggedInUserType'])){
      
      if($_SESSION['loggedInUserType']!="doctor"){
            header("Location: ../");
      }
            
        }


?>




<div class="container">

    <div class="row">
        
        
        
        

           
        
       <div class="col-sm-8">
           
            <h3><b></b> Welcome to Prescription Management Software</h3> <br>
            
            </div>  




