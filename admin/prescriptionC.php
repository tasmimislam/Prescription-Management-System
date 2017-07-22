<?php

include('header.php');
$alertMessage=$patient_cc=$patient_oe="";

include('connection.php');
include('functions.php');

$patient_id = $_GET['id'];

if(isset($_POST['addMedicine'])){
    
    $medicine = $_POST['medicine_list'];
    $m_time = $_POST['medicine_time_list'];
    
    $query = "INSERT INTO prescribed_medicine VALUES (NULL, '" . $patient_id . "', '" . $medicine . "', '" . $m_time . "')";

$result = mysqli_query($conn, $query);

    

    
}







$query = "SELECT * FROM users where user_id=$patient_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows( $result ) >0 ) {
            
        while( $row = mysqli_fetch_assoc($result) ) {

                $firstName =$row['firstName'];
                $lastName =$row['lastName'];
                $age =$row['age'];
                $gender =$row['gender'];
            $email =$row['email'];
                $contact =$row['contact'];
                
            
               

       
    }
}

else {
        $alertMessage = "<div class='alert alert-warning'> Nothing to see here. <a href='users.php'> Head back </a></div>" ;
}




?>
    <div class="container">
        

        <h1 class="page-header">Prescription</h1>
        <?php echo $alertMessage; ?>


           
            <hr>

        
        
            <div class="container">
                
                
                

               

                            <div class="row">
                                


                        <div class="col-sm-12">

                         
                                                  
                        <div class="col-sm-10 col-sm-offset-1">
                             
                           <?php 
                        
                            $query = "SELECT * FROM medicines natural join prescribed_medicine where patient_id=$patient_id";
                            $result = mysqli_query($conn, $query);
                            
                                                      
                           echo '                           
                            <table class="table table-striped table-bordered table-responsive">

                                    <tr>
                                        <th>Medicine Name</th>
                                        <th>Medicine Time</th>
    
    
                                      <th>Remove Medicine</th>
   
                                </tr>
                                    ';                  
                               
                        if (mysqli_num_rows( $result ) >0 ) {
            
                            while( $row = mysqli_fetch_assoc($result) ) {

                                $medicine_name =$row['medicine_name'];
                                $medicine_time =$row['medicine_time'];
                                
                                
                              echo "<tr>";
                                echo "<td>". $row['medicine_name']. ' - '.$row['power']. ' - '. $row['medicine_type']."</td>
                               
                                
                                <td>". $row['medicine_time']. "</td>";
                                echo '<td> <a href="removePrescribedMedicine.php?medicine_id='.$row['pm_id'].'&id='.$patient_id.'" type="button" class="btn btn-danger btn-sm">
                                 <span class="glyphicon glyphicon-edit"></span>Remove Medicine</a> </td>';
                                echo "</tr>";
                
                       

                            }
                        }
                        
                        
                        
                        ?>
                                </table>

                        </div>
                             
                       
                                
                                
                   
                                
                             
                             
                             
                            <div class="row">
                                 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] ); ?> ? id=<?php echo $patient_id; ?>" method="post" class="form-horizontal">
                             <div class="form-group">
                                        <label class="control-label col-sm-3" for="area">Medicine:</label>
                                        <div class="col-sm-8">
                                            <select name="medicine_list"  class="form-control"  required>
                                                <option value="" selected disabled>Select Medicine </option>
                                                <?php
                    $query = "SELECT * FROM medicines";
                    $result = mysqli_query($conn,$query);
    
	               if($result == false)
		              echo "Query Not successful"."<br>";
	               else
		              echo "Query Successful"."<br>";  
                    
                    foreach ($result as $medicine)
                    { 
                ?>
                                                    <option value="<?php echo $medicine["medicine_id"]; ?>">
                                                        <?php echo $medicine["medicine_name"] ." - ". $medicine["power"] ." - ". $medicine["medicine_type"] ; ?>
                                                    </option>
                                                    <?php 
                    } 
                ?>
                                            </select>
                                        </div>
                                    </div>
                                
                                <!---- ---->
                                
                                <div class="form-group">
                                        <label class="control-label col-sm-3"> Time: </label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="medicine_time_list" required >
                                                <option value="" selected disabled>Please select</option>
                                                <option value="1-1-1">1-1-1</option>
                                                <option value="1-0-1">1-0-1</option>
                                                <option value="0-0-1">0-0-1</option>
                                                <option value="0-1-0">0-1-0</option>
                                                <option value="1-0-0">1-0-0</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <center>
                                            
                                            <button type="submit" name="addMedicine" class="btn btn-primary"> Add Medicine </button>
                                            
                                           
                                            
                                           
                                        </center>
                                    </div>
                                </form>
                             </div>
                                 
                                    
                        </div>




                                <br>
       

                           
                            </div>


                      
                    
                    </div>

                    
                        
                        
                        
                    </div>


                </div>


            </div>

        
          
    </div>

  <br>
           
    
    <?php include('footer.php'); ?>