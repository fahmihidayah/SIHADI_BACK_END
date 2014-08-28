<?php

class Message {
    public $message_data;
    public $id;
    public $nama;
    public $alamat;
    public $kelompok_tani;
    public $gcm_id;
    public $grup;
    
    function __construct($message, $id, $nama, $gcm_id, $alamat, $kelompok_tani) {
        $this->message_data = $message;
        $this->id = $id;
        $this->nama = $nama;
        $this->gcm_id = $gcm_id;
    }


}
?>
