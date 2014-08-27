<?php


class User {
    public $id;
    public $nama;
    public $gcm_id;
    function __construct($id, $nama) {
        $this->id = $id;
        $this->nama = $nama;
    }

}

?>
