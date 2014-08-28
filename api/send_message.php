<?php

include '../untilities/connection.php';
include '../untilities/json_manager.php';
include '../untilities/send_gcm.php';
include '../class/Message.php';
include '../class/User.php';

$id_sender = $_POST["id_sender"];
$message = $_POST["message"];

$con = connectToDb();
$query = "SELECT * FROM user WHERE id NOT IN ('$id_sender') AND gcm_id NOT IN ('0')";
$result = mysqli_query($con, $query);

$list_gcm_message = array();
while ($row = mysqli_fetch_array($result)) {
    $id_receiver = $row["id"];
    $list_gcm_message[] = $row["gcm_id"];
}

$query = "SELECT * FROM user WHERE id = '$id_sender'";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){
    $user = new User($row["id"], $row["nama"]);
    $user->gcm_id = $row["gcm_id"];
    $user->alamat = $row["alamat"];
    $user->kelompok_tani = $row["kelompok_tani"];
}

$message_obj = new Message($message, $user->id, $user->nama, $user->gcm_id, $user->alamat, $user->kelompok_tani);
//var_dump($list_gcm_message);
send_gcm_notify($list_gcm_message, $message_obj);

success_format_json($message_obj);
?>
