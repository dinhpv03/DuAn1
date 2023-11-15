<?php
    require_once "pdo.php";

    function get_phim_new($limit){
        $sql = "SELECT * FROM phim ORDER BY id_phim DESC limit ".$limit;
        return pdo_query($sql);
    }
    
?>