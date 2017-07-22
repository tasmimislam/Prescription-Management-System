<?php
include('connection.php');

$medicine_id = $_GET['medicine_id'];
$patient_id = $_GET['id'];



$query = "DELETE FROM prescribed_medicine where pm_id=$medicine_id";
$result = mysqli_query($conn, $query);


header("Location: http://' . $_SERVER['HTTP_HOST'] .'/pms/admin/prescription.php?id=$patient_id");



?>