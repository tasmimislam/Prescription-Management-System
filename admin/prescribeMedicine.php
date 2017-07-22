<?php
include('connection.php');

$medicine_id = $_GET['medicine_id'];
$medicine_time = $_GET['medicine_time'];
$patient_id = $_GET['id'];

echo $medicine_id . $medicine_time . $patient_id;


 $query = "INSERT INTO prescribed_medicine VALUES (NULL, '" . $medicine_name . "', '" . $medicine_group . "', '" . $power . "','" . $medicine_type . "', '"  . $company_name."')";

$result = mysqli_query($conn, $query);


header('Location: http://' . $_SERVER['HTTP_HOST'] .'/doctor/admin/prescription.php?id='.$patient_id.'');




?>