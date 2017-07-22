<?php

 include('header.php'); 
 include('functions.php'); 
 include('connection.php');


    $errorAlert=$email =$firstName=$lastName=$contact=$age=$address="";
    if (isset( $_POST['register'] ) ){
        
  
        
    $firstName = validateFormData($_POST['firstName']);
     
   $lastName = validateFormData($_POST['lastName']);
  
   $age = validateFormData($_POST['age']);
         $gender = validateFormData($_POST['gender']);
   $contact = validateFormData($_POST['contact']);
   $address = validateFormData($_POST['address']);
   
   
    $email = validateFormData($_POST['email']);
    $blood_group = validateFormData($_POST['blood_group']);
    $user_type = "patient";
    $pass = validateFormData($_POST['password']);
    $con_pass = validateFormData($_POST['con_password']);
        
     if($pass==$con_pass) {
            
         
         $eQuery = "SELECT * from users where email = '$email' or contact= '$contact' "; 
         $result = mysqli_query($conn,$eQuery);
         
         if(mysqli_num_rows( $result  ) >0){
             
              $errorAlert =  "<div class='alert alert-danger'>This Patient is already registered . Try with another Email or Contact Number! <a class ='close' data-dismiss='alert'>&times;</a></div>" ; 
     
         }
         else{    
     
    $query = "INSERT INTO users VALUES (NULL, '" . $firstName . "', '" . $lastName . "', '" . $age . "','" . $gender . "','" . $email . "','" . $contact . "', '"  . $pass."', '"  . $blood_group ."','"  . $address ."','"  . $user_type ."',NULL)";
        
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
            
            
              header('Location: http://' . $_SERVER['HTTP_HOST'] .'/doctor/admin/patients.php?alert=success');
           
           
           
          
            }
		  
         }
       
     }
        
        else{
            $errorAlert =  "<div class='alert alert-danger'>Password did not match. Try again! <a class ='close' data-dismiss='alert'>&times;</a></div>" ; 
        }
        
    }


?>
    <div class="container">
        <h1 class="page-header">Add New Patient</h1>
        <?php echo $errorAlert; ?>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                    <label class="control-label col-sm-4">First Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="firstName" placeholder="First Name" id="login_firstName" value="<?php echo $firstName; ?>" required> </div>
                </div>
                
             
                 <div class="form-group">
                    <label class="control-label col-sm-4">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" placeholder="Email" id="email" value="<?php echo $email?>" required> </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-4">Contact</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="contact" placeholder="Contact" id="contact" value="<?php echo $contact; ?>" required> </div>
                </div>
                        
                    <div class="form-group">
                    <label class="control-label col-sm-4">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" placeholder="Password" id="login_pass" required> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="con_password" placeholder="Retype Password" id="con_login_pass" required> </div>
                </div>
                      
                 
                   
                </div>
                
                    
                    
                    <div class="col-sm-6">
                        
                        <div class="form-group">
                    <label class="control-label col-sm-4" >Last Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name " value="<?php echo $lastName; ?>" required> </div>
                </div>
                    <div class="form-group">
                    <label class="control-label col-sm-4">Age</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="age" placeholder="Age" id="patient_age" value="<?php echo $age; ?>" required> </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-4" >Gender: </label>
                    <div class="col-sm-8">
                        <label>
                            <input type="radio" name="gender" value="male" required>Male </label>
                        
                         <label>
                            <input type="radio" name="gender" value="female" required>Female</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-4" >Blood Group: </label>
                    <div class="col-sm-8">
                        <select class="form-control" name="blood_group">
                                    <option value="" selected disabled>Please select</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    
                                </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Address</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="address" placeholder="Address" id="address" rows="3" required><?php echo $address; ?></textarea>
                       
                     </div>
                        
                   
                    </div>
                 
             
                
                        
                    </div>
                    
                    
                
                </div>
                
                <hr>
                     <center><button class="btn  btn-primary " type="submit" name="register" style="width:180px;">Save</button></center>
                
                
               
            </form>
    </div>
    <?php include('footer.php'); ?>