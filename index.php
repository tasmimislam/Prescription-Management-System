<?php
    include('header.php');
    include('functions.php');
    include('connection.php');


  if(isset($_SESSION['loggedInUser'])){
        
        if($_SESSION['loggedInUserType']=="doctor"){
            
                header('Location: http://' . $_SERVER['HTTP_HOST'] .'pms/admin/');
      
            
        }
   
    }





?>




<div class="container">

    <div class="row">
        
        
        
        
        <div class="col-sm-8">
           
            <h3><b></b> Welcome to Prescription Management Software</h3> <br>
            
            </div>   
           
           
        
        </div>
        
        </div>
        
    
    </div>
<br>
<br>
</div>





