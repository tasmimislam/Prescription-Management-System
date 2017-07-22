<?php

include('header.php');

include('connection.php');
include('functions.php');

$patient_id = $_GET['id'];
$alertMessage=$patient_cc=$patient_oe=$searchName="";


 $q2 = "SELECT * FROM users  where user_id=$patient_id";
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


  

if(isset($_POST['addMedicine'])){ 
    
      $medicine = validateFormData($_POST['medicine_list']);
    $m_time = validateFormData($_POST['medicine_time_list']);
    $query = "INSERT INTO prescribed_medicine VALUES (NULL, '" . $patient_id . "', '" . $medicine . "', '" . $m_time . "')";

$result = mysqli_query($conn, $query);

    

    
}

 $querySearch = "SELECT * FROM medicines";
if(isset($_POST['searchButton'])){
    
     $searchName = validateFormData($_POST['searchName']);
    
    $querySearch = "SELECT * FROM medicines  where  medicine_name LIKE '%".$searchName."%'";

  

}


if(isset($_POST['save'])){
    
    $prescription_date = date("Y-m-d h:i:sa");
    
      $query1 = "SELECT * FROM prescribed_medicine where patient_id=$patient_id";
        $result1 = mysqli_query($conn, $query1);
    
    if (mysqli_num_rows( $result1 ) >0 ) {
            
                   while( $row = mysqli_fetch_assoc($result1) ) {
                       
                     $medicine_id =$row['medicine_id'];
                       $medicine_time =$row['medicine_time'];
                       
                       
                        $query2 = "INSERT INTO prescriptions VALUES (NULL, '" . $medicine_id . "', '" . $patient_id . "', '" . $medicine_time . "', '" . $prescription_date . "')";

        $result2 = mysqli_query($conn, $query2);
             }
        
       
     }
    
    
     $patient_cc = validateFormData($_POST['patient_cc']);
        
   $patient_oe = validateFormData($_POST['patient_oe']);
    
    
    
     $queryCheckCC = "SELECT * FROM cc_and_oe where patient_id=$patient_id";
        $resultCheckCC = mysqli_query($conn, $queryCheckCC);
    
    if($resultCheckCC==false){
        
        $queryCC = "INSERT INTO cc_and_oe VALUES (NULL, '" . $patient_cc . "', '" . $patient_oe . "', '" . $patient_id . "',1)";

    $resultCC = mysqli_query($conn, $queryCC);
    }
    else{
        
        $query2cc ="UPDATE cc_and_oe
            SET status=0             
                
                WHERE patient_id=$patient_id ";
      
            $result2cc = mysqli_query($conn,$query2cc);
        
        
        
        $queryCC2 = "INSERT INTO cc_and_oe VALUES (NULL, '" . $patient_cc . "', '" . $patient_oe . "', '" . $patient_id . "',1)";

        $resultCC2 = mysqli_query($conn, $queryCC2);
    }
    
    
    
    $query3 = "DELETE FROM prescribed_medicine";
$result = mysqli_query($conn, $query3);
    
    header('Location: http://' . $_SERVER['HTTP_HOST'] .'/doctor/admin/prescription.php?id='.$patient_id.'');
    
    
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


            
           

        
        
            <div class="container">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs margin-top-20" role="tablist">
                    <li role="presentation" class="active"><a href="#newPrescription" aria-controls="newPrescription" role="tab" data-toggle="tab">New Prescription </a></li>
                    <li role="presentation"><a href="#oldPrescription" aria-controls="oldPrescription" role="tab" data-toggle="tab">Prescription History </a></li>

                </ul>
                
                

                <!-- Tab panes -->
                <div class="tab-content">
                    
                    <div role="tabpanel" class="tab-pane fade in active" id="newPrescription">
                        <br>
                        
                        
                        
                        
                       

                            <div class="row container panel panel-info"  style="background-color:#d7ffe0;">
                                
                                
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
                                
                             <div class="row" style="background-color:white;">
                                 <br>
                                <div class="col-sm-4" >
                          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] );?>?id=<?php echo $patient_id;?>" method="post" class="form-horizontal">
                                    <div class="from-group ">
                                        <label class=""><b>CC</b></label>
                                        <div class="">
                                            <textarea class="form-control input-lg" id="patient_cc" name="patient_cc" rows="4" required><?php echo $patient_cc; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="from-group ">
                                        <label class=""><b>OE</b></label>
                                        <div class="">
                                            <textarea class="form-control input-lg" id="patient_oe" name="patient_oe" rows="4" required><?php echo $patient_oe; ?></textarea>
                                        </div>
                                    </div>

                                        <br>
                                        <br>
                                        <br>
                                  <button type="submit" class="btn btn-lg btn-success col-sm-6 col-sm-offset-3" name="save">Save</button>

                                        
                                      </form>

                                </div>


                        <div class="col-sm-8 panel panel-success">

                         
                             <h2>Rx</h2>                      
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
 <hr>
                        </div>
                             
                       
                                
                                
                           
                             
                             
                            <div class="row">
                                
                                <div class="row">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] ); ?>?id=<?php echo $patient_id; ?>" method="post">
    
    <div class="form-group">
         <label class="control-label col-sm-3 text-right">Medicine Name:</label>
         <div class="col-sm-5">
            <input type="text" class="form-control" name="searchName" placeholder="Search by Medicine Name" id="login_firstName" value="<?php echo $searchName; ?>" required> 
        </div>
        
        <div class="col-sm-3">
             <button class="btn  btn-success  col-sm-offset-2" type="submit" name="searchButton">Search</button>
        </div>
    </div>

</form>
    
</div>   
   
                                
                               
                                 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] ); ?>?id=<?php echo $patient_id; ?>" method="post" class="form-horizontal">
                             <div class="form-group">
                                        <label class="control-label col-sm-3" for="area">Medicine:</label>
                                        <div class="col-sm-8">
                                            <select name="medicine_list"  class="form-control"  required>
                                                <option value="" selected disabled>Select Medicine </option>
                                                <?php
                   
                    $result = mysqli_query($conn,$querySearch);
    
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
                                        <br>
                                    </div>
                                </form>
                             </div>
                                 
                                    
                        </div>
                        </div>





                            <div class="row text-center">
                        
                        <h5>
                       <b> <p>House # 21, Road # 15, Link Road , Badda , Dhaka - 1212 </p>
                                    <p>+880-2-0060015 - 19, 0024514-18 , Ext - 2004, 2002 ( Chamber )  </p></b>
                        </h5>
                            
                    </div>
                            </div>


                      
                    
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="oldPrescription">
                       
                        
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
                                            <br>
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
                        
                            $queryMM1 = "SELECT * FROM medicines natural join prescriptions where patient_id='$user_id'  ORDER BY prescription_date  DESC LIMIT 0,5";
                            $resultMM1 = mysqli_query($conn, $queryMM1);
                            
                            if (mysqli_num_rows( $resultMM1 ) >0 ) {                  
                           echo '                           
                            <table class="table table-striped table-bordered table-responsive">

                                    <tr>
                                        
                                         <th>Date</th>
                                        <th>Medicine Name</th>
                                        <th>Medicine Time</th>
    
    
                                     
   
                                </tr>
                                    ';                  
                               
                        
            
                            while( $row = mysqli_fetch_assoc($resultMM1) ) {

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
                       <center>  <button class="btn btn-warning hide-print " onclick="myFunction()">Print Prescription</button> </center>


<style>
@media print {
  /* style sheet for print goes here */
  h1{  display:none; }

 body{  margin-top:-150px; }

 .hide-print{  display:none; }
}

</style>

<script>
function myFunction() {

 
    window.print();
  
}
</script>   
                    
                
                </div>
                                
                                

                                
              </div>
                        
                        
                        
                    </div>


                </div>


            </div>

        
          
    </div>

  <br>
           
    
    <?php include('footer.php'); ?>