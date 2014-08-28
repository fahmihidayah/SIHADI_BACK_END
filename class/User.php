<?php


class User {
    public $id;
    public $nama;
    public $alamat;
    public $kelompok_tani;
    public $gcm_id;
    
    function __construct($id, $nama) {
        $this->id = $id;
        $this->nama = $nama;
    }

}

?>
