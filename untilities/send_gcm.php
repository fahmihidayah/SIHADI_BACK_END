<?php

function send_gcm_notify($reg_id, $message) {
        $api_key = "AIzaSyDaLpO3MRRh0Dbp7mJn8td18VSzUvbMHGw";
        $url = 'https://android.googleapis.com/gcm/send';
	$fields = array(
                'registration_ids'  => $reg_id,
                'data'              => array("message"=>$message),
                );

	$headers = array('Authorization: key=' . $api_key,'Content-Type: application/json');
        
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_HTTPHEADER,  $headers);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
	$result = curl_exec($ch);
	
	echo $result;
curl_close($ch);
 }
?>
