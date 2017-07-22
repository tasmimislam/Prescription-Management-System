<?php
include('header.php'); 
include('functions.php'); 
 include('connection.php');


    $errorAlert=$email =$firstName=$lastName=$contact=$age="";
    if (isset( $_POST['register'] ) ){
        
  
        
    $firstName = validateFormData($_POST['firstName']);
     
   $lastName = validateFormData($_POST['lastName']);
  
   $age = validateFormData($_POST['age']);
         $gender = validateFormData($_POST['gender']);
   $contact = validateFormData($_POST['contact']);
   
   
    $email = validateFormData($_POST['email']);
    $user_type = "patient";
    $pass = validateFormData($_POST['password']);
    $con_pass = validateFormData($_POST['con_password']);
        
     if($pass==$con_pass) {
            
         
         $eQuery = "SELECT * from users where email = '$email' "; 
         $result = mysqli_query($conn,$eQuery);
         
         if(mysqli_num_rows( $result  ) >0){
             
              $errorAlert =  "<div class='alert alert-danger'>This email is already registered . Try with another email id! <a class ='close' data-dismiss='alert'>&times;</a></div>" ; 
     
         }
         else{
           
    

        
    $query = "INSERT INTO users VALUES (NULL, '" . $firstName . "', '" . $lastName . "', '" . $age . "','" . $gender . "','" . $email . "','" . $contact . "', '"  . $pass."', '"  . $user_type ."',NULL)";
        
    $result = mysqli_query($conn,$query);
        
        if($result == false)
		 echo "Insert Not successful"."<br>";
	   else
            {
        
                
                 $query="SELECT * FROM users WHERE email='$email'";
       
                $result = mysqli_query($query);
                    
             if(mysqli_num_rows($result)>0) {
            while($row=mysqli_fetch_assoc($result)) {
                 $firstName =$row['firstName'];
                $lastName =$row['lastName'];
                $age =$row['age'];
                $gender =$row['gender'];
                $email =$row['email'];
                $contact =$row['Contact'];
                
                $password = $row['password'];
            }
            
           
                      
            
        }
            
            
              header("Location: patients.php?alert=success");
           
           
           
          
            }
		  
         }
       
     }
        
        else{
            $errorAlert =  "<div class='alert alert-danger'>Password did not match. Try again! <a class ='close' data-dismiss='alert'>&times;</a></div>" ; 
        }
        
    }


?>
    <div class="container">
        <h1 class="page-header">Registration</h1>
        <?php echo $errorAlert; ?>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="firstName" placeholder="First Name" id="login_firstName" value="<?php echo $firstName; ?>" required> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Last Name:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name " value="<?php echo $lastName; ?>" required> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Age</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="age" placeholder="Age" id="patient_age" value="<?php echo $age; ?>" required> </div>
                </div>
                
               
                
                 <div class="form-group">
                    <label class="control-label col-sm-2">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" placeholder="Email" id="email" value="<?php echo $email?>" required> </div>
                </div>
                
                
                
                <div class="form-group">
                    <label class="control-label col-sm-2" >Gender: </label>
                    <div class="col-sm-5">
                        <label>
                            <input type="radio" name="gender" value="male" required>Male </label>
                        <br>
                        <label>
                            <input type="radio" name="gender" value="female" required>Female</label>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="control-label col-sm-2">Contact</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="contact" placeholder="Contact" id="contact" value="<?php echo $contact; ?>" required> </div>
                </div>
             
                <div class="form-group">
                    <label class="control-label col-sm-2">Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" placeholder="Password" id="login_pass" required> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Confirm Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="con_password" placeholder="Retype Password" id="con_login_pass" required> </div>
                </div>
                <button class="btn  btn-primary  col-sm-offset-2 " type="submit" name="register">Register</button>
            </form>
    </div>
