<?php 
include('header.php');
include('connection.php');
include('functions.php');

$per_page=5;
if(isset($_GET['page'])) {
    $page= $_GET['page'];
} else {
    $page=1;
}

$start_form= ($page-1)*$per_page;

$alertMessage=$searchName="";


$query = "SELECT * FROM users  where user_type='patient' LIMIT $start_form,$per_page";
$pagenation_query = "SELECT * FROM users  where user_type='patient' ";



if(isset ($_GET['alert'] ) ) {
    if ($_GET['alert'] =='success') {
        
         $alertMessage = "<div class='text-center alert alert-success'><b>New patient added! </b><a class ='close' data-dismiss='alert'>&times;</a></div>" ;
    }
    elseif($_GET['alert'] =='updatesuccess')
    {
        $alertMessage = "<div class='text-center alert alert-success'><b>Patient updated! </b> <a class ='close' data-dismiss='alert'>&times;</a></div>" ;
    }
     elseif($_GET['alert'] =='deleted')
    {
        $alertMessage = "<div class='text-center alert alert-success'>Patient deleted! <a class ='close' data-dismiss='alert'>&times;</a></div>" ;
    }
}


if(isset($_POST['searchButton'])){
    
     $searchName = validateFormData($_POST['searchName']);
    
    $query = "SELECT * FROM users  where user_type='patient' and ( firstName LIKE '%".$searchName."%' or lastName LIKE '%".$searchName."%' ) LIMIT $start_form,$per_page";

    $pagenation_query = "SELECT * FROM users  where user_type='patient' and ( firstName LIKE '%".$searchName."%' or lastName LIKE '%".$searchName."%' ) ";

}

$result = mysqli_query($conn,$query);

?>
<div class="container">
<h1>Patients </h1>
    <hr>
<?php echo $alertMessage ; ?>
    
<div class="row">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] ); ?>" method="post">
    
    <div class="form-group">
         <label class="control-label col-sm-2 text-right">Patient Name:</label>
         <div class="col-sm-5">
            <input type="text" class="form-control" name="searchName" placeholder="Search by Name" id="login_firstName" value="<?php echo $searchName; ?>" required> 
        </div>
        
        <div class="col-sm-3">
             <button class="btn  btn-success  col-sm-offset-2" type="submit" name="searchButton">Search</button>
        </div>
    </div>

</form>
    
</div>   
    <hr>
    
<table class="table table-striped table-bordered table-responsive">

<tr>
    <th>Name</th>
    
    <th>Age</th>
    <th>Gender</th>
    <th style="width:6%;">Blood Group</th>
     <th>Email</th>
     <th style="width:10%;">Contact</th>
     <th style="width:25%;">Address</th>
    <th>Prescriptions</th>
   
</tr>

<?php
    if (mysqli_num_rows( $result ) >0 ) {
            
            while( $row = mysqli_fetch_assoc($result) ) {
                echo "<tr>";
                echo "<td>". $row['firstName']. " ". $row['lastName']. "</td>
                    
                      <td>". $row['age']. "</td>
                      <td>". $row['gender']. "</td>
                      <td>". $row['blood_group']. "</td>
                      <td>". $row['email']. "</td>
                      <td>". $row['contact']. "</td>
                      <td>". $row['address']. "</td>";
                echo '<td> <a href="prescription.php?id='.$row['user_id']. '" type="button" class="btn btn-primary btn-sm">
                                 <span class="glyphicon glyphicon-edit"></span> Prescription</a> </td>';
                echo "</tr>";
            }
        
    }
    
    else {
        echo "<div class='alert alert-danger'>You have no clients!</div>" ;
    }
   
?>
    <tr>
        <td colspan="8">
            <div class="text-center">
                <a href="addPatients.php" type="button" class="btn btn-sm btn-danger">
                    <span class="glyphicon glyphicon-plus"></span>Add New Patient
                </a>
            </div>
        </td>
    </tr>

</table>



<div class="text-center">
    <ul class="pagination">
<?php
//$pagenation_query = "SELECT * FROM users where user_type='patient'";
        
$pagenation_result = mysqli_query($conn, $pagenation_query);

$count= mysqli_num_rows($pagenation_result);
$total_page=ceil($count/$per_page);
        
    for($i=1;$i<=$total_page;$i++) {
        echo "<li><a href='patients.php?page=".$i."' >".$i."</a></li>";
    }
?>
    </ul>
</div>

</div>
<?php include('footer.php'); ?>