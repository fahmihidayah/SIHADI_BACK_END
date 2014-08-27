<?php

function success_format_json($data){
    $format = array("status"=>"200", "message" => "success", "data"=>$data);
    echo json_encode($format);
}

function error_format_json($notification){
    $format = array("status" => "404", "message"=> $notification);
    echo json_encode($format);
}

function get_array_from_json($json_string){
    $array_json = json_decode(stripcslashes($json_string), true);
    return $array_json;
}
?>
