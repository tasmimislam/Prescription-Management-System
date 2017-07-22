<?php
include('header.php'); 
include('functions.php'); 
 include('connection.php');


    $errorAlert=$medicine_group=$power=$medicine_name=$company_name="";
    if (isset( $_POST['save'] ) ){
        
  
        
    $medicine_name = validateFormData($_POST['medicine_name']);
     
   $medicine_group = validateFormData($_POST['medicine_group']);
  
   $power = validateFormData($_POST['power']);
        
    $medicine_type = validateFormData($_POST['medicine_type']);
        
   $company_name = validateFormData($_POST['company_name']);
   
   
 
        
    

        
    $query = "INSERT INTO medicines VALUES (NULL, '" . $medicine_name . "', '" . $medicine_group . "', '" . $power . "','" . $medicine_type . "', '"  . $company_name."')";
        
    $result = mysqli_query($conn,$query);
        
        if($result == false)
		 echo "Insert Not successful"."<br>";
	   else
            {
         //  echo "Insert Successful"."<br>";   
                
                 $query="SELECT * FROM medicines WHERE medicine_name='$medicine_name'";
       
                $result = mysqli_query($conn,$query);
                    
             if(mysqli_num_rows($result)>0) {
            while($row=mysqli_fetch_assoc($result)) {
                
                 $medicine_name =$row['medicine_name'];
                $medicine_group =$row['medicine_group'];
                $power =$row['power'];
                $medicine_type =$row['medicine_type'];
                $company_name =$row['company_name'];
               
            }
            
           
                      
            
        }
            
             header('Location: http://' . $_SERVER['HTTP_HOST'] .'/doctor/admin/medicines.php?alert=success');
           
             
        
       
     }
        
       
        
    }


?>
    <div class="container">
        <h1 class="page-header">Add New Medicine</h1>
        <?php echo $errorAlert; ?>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2">Medicine Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="medicine_name" placeholder="Medicine Name" id="medicine_name" value="<?php echo $medicine_name; ?>" required> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Medicine Group</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="medicine_group" placeholder="Medicine Group" value="<?php echo $medicine_group; ?>" required> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Power</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="power" placeholder="Power" id="power" value="<?php echo $power; ?>" required> </div>
                </div>
                
               
                
                
                
                
                
                <div class="form-group">
                    <label class="control-label col-sm-2" >Medicine Type </label>
                    <div class="col-sm-5">
                        <select class="form-control" name="medicine_type">
                                    <option value="" selected disabled>Please select</option>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Syrup">Syrup</option>
                                    <option value="Injection">Injection</option>
                                    <option value="Saline">Saline</option>
                                    <option value="Drop">Drop</option>
                                    <option value="Injection">Injection</option>
                                    <option value="Suppository">Suppository</option>
                                    
                                </select>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="control-label col-sm-2">Medicine Company</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="company_name" placeholder="Medicine Company" id="company_name" value="<?php echo $company_name; ?>" required> </div>
                </div>
              <hr>
               
                <button class="btn  btn-primary col-sm-2 col-sm-offset-2 " type="submit" name="save">Save</button>
            </form>
       
        <br>
        <br>
        <br>
    </div>
    <?php include('footer.php'); ?>