<?php

include '../untilities/connection.php';
include '../untilities/json_manager.php';
include '../untilities/send_gcm.php';
include '../class/Message.php';
include '../class/User.php';

$user_id = $_POST["user_id"];

if ($user_id === NULL) {
    error_format_json("require data");
} else {
    $con = connectToDb();

    $query = "SELECT * FROM user WHERE gcm_id <> '0' AND id <> '$user_id'";
    $result = mysqli_query($con, $query);
    $list_user = array();
    while ($row = mysqli_fetch_array($result)) {
        $user = new User($row["id"], $row["nama"]);
        $user->gcm_id = $row["gcm_id"];
        $user->alamat = $row["alamat"];
        $user->kelompok_tani = $row["kelompok_tani"];
        $list_user [] = $user;
    }
    success_format_json($list_user);

    mysqli_close($con);
}
?>

