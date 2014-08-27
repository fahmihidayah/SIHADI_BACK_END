<?php

class Message {
    public $message_data;
    public $id;
    public $nama;
    public $gcm_id;
    
    function __construct($message, $id, $nama, $gcm_id) {
        $this->message_data = $message;
        $this->id = $id;
        $this->nama = $nama;
        $this->gcm_id = $gcm_id;
    }


}
?>
