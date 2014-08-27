<?php

include '../untilities/connection.php';
include '../untilities/json_manager.php';
include '../untilities/send_gcm.php';
include '../class/Message.php';
include '../class/User.php';

$nama = $_POST["nama"];
$user_name = $_POST["user_name"];
$password = $_POST["password"];
$alamat = $_POST["alamat"];
$kelompok_tani = $_POST["kelompok_tani"];

if ($nama === NULL || $user_name === NULL || $password === NULL || $alamat === NULL || $kelompok_tani === NULL) {
    error_format_json("require data");
} else {

    $con = connectToDb();
    $id = uniqid();
    $query = "INSERT INTO user (id, nama, alamat, kelompok_tani, user_name, password, gcm_id) VALUES ('$id', '$nama', '$alamat', '$kelompok_tani', '$user_name', '$password' , '0')";
    $result = mysqli_query($con, $query);
    if ($result) {
        success_format_json("success create user");
    } else {
        error_format_json("error create user");
    }
}
?>
