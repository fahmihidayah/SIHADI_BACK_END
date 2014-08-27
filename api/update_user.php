<?php
include '../untilities/connection.php';
include '../untilities/json_manager.php';
include '../untilities/send_gcm.php';
include '../class/Message.php';
include '../class/User.php';

$id = $_POST["id"];
$gcm_id = $_POST["gcm_id"];

$con = connectToDb();
$query = "UPDATE user SET gcm_id = '$gcm_id' WHERE id = '$id'";
$result_query = mysqli_query($con, $query);
success_format_json("sukses update gcm_id");
mysqli_close($con);
?>