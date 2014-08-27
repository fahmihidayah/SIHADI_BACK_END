<?php

include '../untilities/connection.php';
include '../untilities/json_manager.php';
include '../untilities/send_gcm.php';
include '../class/Message.php';
include '../class/User.php';

$user_name = $_POST["user_name"];
$password = $_POST["password"];

$con = connectToDb();
$query = "SELECT * FROM user WHERE user_name = '$user_name' AND password = '$password'";
$result_query = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result_query)){
    $user = new User($row["id"], $row["nama"]);
    $user->gcm_id = $row["gcm_id"];
}

if(strcmp($user->gcm_id, "0") == 0 ){
    success_format_json($user);
}
else {
    error_format_json("user in used");
}
?>
