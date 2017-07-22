<?php
include('header.php'); 
include('functions.php'); 

 include('connection.php');


 


$nextAlert=$errorAlert=$admission_class=$email=$hashedPassword=$saveDataAlert=$patient_cc=$patient_oe="";
$regAlert=' <button type="submit" class="btn btn-primary btn-md col-sm-6 col-sm-offset-3" name="startRegistration" >Save </a></button>';


if(isset($_SESSION['loggedInUser']))
{
  if($_SESSION['loggedInUserType']=="doctor"){
            
                header('Location: http://' . $_SERVER['HTTP_HOST'] .'/doctor/admin/');
      
            
        }
   
    
    
    $user_id = $_SESSION['loggedInUser_id'];
    $q2 = "SELECT * FROM users  where user_id=$user_id";
             $result2 = mysqli_query($conn, $q2);
          
           if(mysqli_num_rows($result2)>0) {
            while($row=mysqli_fetch_assoc($result2)) {
               
                $user_id =$row['user_id'];
                $firstName =$row['firstName'];
                $lastName =$row['lastName'];
                $age =$row['age'];
                $gender =$row['gender'];
                $email =$row['email'];
                $contact =$row['contact'];
               
                
                $user_type =$row['user_type'];
                
            }
              
               
           }
            
} else{
       header('Location: http://' . $_SERVER['HTTP_HOST'] .'/doctor/');
    
    }





?>




    <div class="container">
        

       
            

            <div class="row" >
                
                        <div class="container panel panel-info"  style="background-color:#d7ffe0;" >
                            <br>
                            <div class="row" style="background-color:#d7ffe0;" >
                                <div class="container"> 
                                <div class="col-sm-4 text-left">
                                   
                                  <h5>
                                      <p><b>Name:</b> <?php echo $firstName . " ".$lastName; ?> </p>
                                  
                                    <p><b>Gender:</b> <?php echo $gender; ?> </p>
                                    <p><b>Age:</b> <?php echo $age; ?> </p>
                                    <p><b>Email:</b> <?php echo $email; ?></p>
                                    <p><b>Contact:</b> <?php echo $contact; ?> </p>
                                </h5>


                                </div>
                                
                                <div class="col-sm-3"> </div>
                           
                                <div class="col-sm-5 text-right">
                                 
                                   <h5> <h4> Professor Dr. A. F. Shahin </h4>
                                  
                                    <p> MBBS, MD, FCPS , Phd ( London )  </p>
                                    <p><b>Expertise:</b>  Pediatric - Child   </p>
                                    <p><b>Chamber:</b> Central Hospital Limited  </p>
                                    </h5>
                                   

                                </div>
                              </div>
                            </div>
                                
                             
                                    
                         <div class="row " style="background-color: white;">
                            <br>
                            <div class="col-sm-4 panel panel-success">
                                
                                <?php 
                        
                                $q1 = "SELECT * FROM cc_and_oe where patient_id=$user_id and status=1";
                                $r1 = mysqli_query($conn, $q1);
                                
                                 if (mysqli_num_rows( $r1 ) >0 ) {
            
                                        while( $row1 = mysqli_fetch_assoc($r1) ) {
                                            
                                            $patient_cc= $row1['cc'];
                                            $patient_oe= $row1['oe'];
                                 
                                ?>
                                
                                <div class="from-group ">
                                        <h4 class=""><b>Cum Cibus</b></h4>
                                        <div class="">
                                            <textarea class="form-control input-lg" id="patient_cc_view" name="patient_cc_view" rows="4"   disabled><?php echo $patient_cc; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="from-group ">
                                        <label class=""><b>OE</b></label>
                                        <div class="">
                                            <textarea class="form-control input-lg" id="patient_oe_view" name="patient_oe_view" rows="4" disabled><?php echo $patient_oe; ?></textarea>
                                        </div>
                                    </div>
                                <?php 
                                   }
                                 
                                 }
                                
                                ?>
                            </div>
                            
                           <div class="col-sm-8 panel panel-success">
                               <h3>Rx</h3>
                               <div class="col-sm-10 col-sm-offset-1">
                                
                           <?php 
                        
                            $query = "SELECT * FROM medicines natural join prescriptions where patient_id='$user_id'  ORDER BY prescription_date  DESC LIMIT 0,5";
                            $result = mysqli_query($conn, $query);
                            
                            if (mysqli_num_rows( $result ) >0 ) {                  
                           echo '                           
                            <table class="table table-striped table-bordered table-responsive">

                                    <tr>
                                        
                                         <th>Date</th>
                                        <th>Medicine Name</th>
                                        <th>Medicine Time</th>
    
    
                                     
   
                                </tr>
                                    ';                  
                               
                        
            
                            while( $row = mysqli_fetch_assoc($result) ) {

                                $medicine_name =$row['medicine_name'];
                                $medicine_time =$row['medicine_time'];
                                
                                $prescription_date = $row['prescription_date'];
                                
                              echo "<tr>";
                                echo "
                                <td><b>". $row['prescription_date']. "</b></td>
                                <td>". $row['medicine_name']. ' - '.$row['power']. ' - '. $row['medicine_type']."</td>
                               
                                
                                <td>". $row['medicine_time']. "</td>
                                ";
                                
                                echo "</tr>";
                
                       

                            }
                        
                        
                        
                                echo "</table>";   
                               }
                        
                        ?>
                                
                                
                        </div>
                            </div>
                        
                        </div>
                                
                    <div class="row text-center">
                        
                        <h5>
                        <p>House # 21, Road # 15, Link Road , Badda , Dhaka - 1212 </p>
                                    <p>+880-2-0060015 - 19, 0024514-18 , Ext - 2004, 2002 ( Chamber )  </p>
                        </h5>
                            
                    </div>
                            
                    
                
                </div>
                                
                                

                                
              </div>
           </div>
            

