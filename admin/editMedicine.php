<?php

include('header.php');
$alertMessage="";



$medicine_id = $_GET['id'];
include('connection.php');
include('functions.php');



if (isset ($_POST['update'] ) ) {
        $medicine_name = validateFormData($_POST['medicine_name']) ;
        $medicine_group = validateFormData($_POST['medicine_group']) ;
        $power = validateFormData($_POST['power']) ;
        $medicine_type = validateFormData($_POST['medicine_type']) ;
        $company_name = validateFormData($_POST['company_name']) ;
      

       
    $query2 ="UPDATE medicines
            SET medicine_name='$medicine_name',
                medicine_group='$medicine_group',
                power='$power',               
                medicine_type='$medicine_type',               
                company_name='$company_name'               
                
                WHERE medicine_id = $medicine_id ";
     $result2 = mysqli_query($conn, $query2);

        if($result2) {
            header("Location: medicines.php?alert=updatesuccess");
        }
        else{
            echo "Error updating record: ".  mysqli_error($conn);
        }
}



$query = "SELECT * FROM medicines where medicine_id=$medicine_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows( $result ) >0 ) {
            
        while( $row = mysqli_fetch_assoc($result) ) {

                $medicine_name =$row['medicine_name'];
                $medicine_group =$row['medicine_group'];
                $power =$row['power'];
                $medicine_type =$row['medicine_type'];
                $company_name =$row['company_name'];
               

       
    }
}

else {
        $alertMessage = "<div class='alert alert-warning'> Nothing to see here. <a href='medicines.php'> Go back </a></div>" ;
}




?>
    <div class="container">
    <h1 class="page-header">Edit Medicine</h1>
    <?php echo $alertMessage; ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] ); ?>?id=<?php echo $medicine_id; ?>" method="post" class="form-horizontal">
            <div class="col-sm-8 col-sm-offset-2">
             <div class="form-group">
                    <label class="control-label col-sm-2">Medicine Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="medicine_name" placeholder="Medicine Name" id="medicine_name" value="<?php echo $medicine_name; ?>" required> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" >Medicine Group</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="medicine_group" placeholder="Medicine Group" value="<?php echo $medicine_group; ?>" required> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Power</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="power" placeholder="Age" id="power" value="<?php echo $power; ?>" required> </div>
                </div>
                
                
                <div class="form-group">
                    <label class="control-label col-sm-2" >Medicine Type </label>
                    <div class="col-sm-6">
                        <select class="form-control" name="medicine_type">
                                    <option value="<?php echo $medicine_type; ?>" selected><?php echo $medicine_type; ?></option>
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
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="company_name" placeholder="Contact" id="company_name" value="<?php echo $company_name; ?>" required> </div>
                </div>
                
            <div class="col-sm-12">
                <hr>
                 <button type="submit" class="btn btn-md col-sm-2 btn-success" name="update">Update</button>
                 <a href="users.php" type="button" class="pull-right btn btn-md col-sm-2 btn-info">Cancel</a>
                    
                   
                
            </div>
                
            </div>
        </form>
        </div>
        <?php include('footer.php'); ?>