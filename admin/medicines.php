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


$query = "SELECT * FROM medicines LIMIT $start_form,$per_page";
$pagenation_query = "SELECT * FROM medicines ";


if(isset($_POST['searchButton'])){
    
     $searchName = validateFormData($_POST['searchName']);
    
    $query = "SELECT * FROM medicines  where  medicine_name LIKE '%".$searchName."%'  LIMIT $start_form,$per_page";

    $pagenation_query = "SELECT * FROM medicines  where  medicine_name LIKE '%".$searchName."%'  ";

}

$result = mysqli_query($conn,$query);

if(isset ($_GET['alert'] ) ) {
    if ($_GET['alert'] =='success') {
        
         $alertMessage = "<div class='alert alert-success'>New Medicine added! <a class ='close' data-dismiss='alert'>&times;</a></div>" ;
    }
    elseif($_GET['alert'] =='updatesuccess')
    {
        $alertMessage = "<div class='alert alert-success'>Medicine successfully updated! <a class ='close' data-dismiss='alert'>&times;</a></div>" ;
    }
     elseif($_GET['alert'] =='deleted')
    {
        $alertMessage = "<div class='alert alert-success'>User deleted! <a class ='close' data-dismiss='alert'>&times;</a></div>" ;
    }
}


?>

<h1>Medicine List </h1>
<hr>
<?php echo $alertMessage ; ?>

<div class="row">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] ); ?>" method="post">
    
    <div class="form-group">
         <label class="control-label col-sm-2 text-right">Medicine Name:</label>
         <div class="col-sm-5">
            <input type="text" class="form-control" name="searchName" placeholder="Search by Medicine Name" id="login_firstName" value="<?php echo $searchName; ?>" required> 
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
    <th>Medicine Name</th>
    <th>Medicine Group</th>
    <th>Power</th>
    <th>Medicine Type</th>
     <th>Company Name</th>
    
    <th>Edit Medicine Info.</th>
   
</tr>

<?php
    if (mysqli_num_rows( $result ) >0 ) {
            
            while( $row = mysqli_fetch_assoc($result) ) {
                echo "<tr>";
                echo "<td>". $row['medicine_name']. "</td>
                      <td>". $row['medicine_group']. "</td>
                     
                      <td>". $row['power']. "</td>
                      <td>". $row['medicine_type']. "</td>
                      <td>". $row['company_name']. "</td>";
                echo '<td> <a href="editMedicine.php?id='.$row['medicine_id']. '" type="button" class="btn btn-info btn-sm">
                                 <span class="glyphicon glyphicon-edit"></span>Edit Medicine</a> </td>';
                echo "</tr>";
            }
        
    }
    
    else {
        echo "<div class='alert alert-danger'>You have no clients!</div>" ;
    }
   
?>
    <tr>
        <td colspan="7">
            <div class="text-center">
                <a href="addMedicine.php" type="button" class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-plus"></span>Add New Medicine
                </a>
            </div>
        </td>
    </tr>

</table>



<div class="text-center">
    <ul class="pagination">
<?php
//$pagenation_query = "SELECT * FROM medicines";
        
$pagenation_result = mysqli_query($conn, $pagenation_query);

$count= mysqli_num_rows($pagenation_result);
$total_page=ceil($count/$per_page);
        
    for($i=1;$i<=$total_page;$i++) {
        echo "<li><a href='medicines.php?page=".$i."'>".$i."</a></li>";
    }
?>
    </ul>
</div>
<br>
<br>

<?php include('footer.php'); ?>