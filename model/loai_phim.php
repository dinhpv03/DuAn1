<?php
    require_once "pdo.php";
    
    function loai_phim_all(){
        $sql = "SELECT * FROM loai_phim ORDER BY stt DESC";
        return pdo_query($sql);
    }
?>
