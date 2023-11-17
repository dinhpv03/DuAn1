<?php
    require_once "pdo.php";

    
    function loai_phim_all(){
        $sql = "SELECT * FROM loai_phim ORDER BY STT DESC";
        return pdo_query($sql);
    }

    // cấu lệnh kết nối 2 bảng phim với loai_phim
    function phim_connect_loai_phim(){
        $sql = "SELECT * FROM phim INNER JOIN loai_phim ON phim.id_loaiphim = loai_phim.id_loaiphim";
        return pdo_query($sql);
    }   

    function insert_loai_phim($name) {
        $sql = "INSERT INTO loai_phim(loai_phim) VALUES ('.$name.')";
        pdo_execute($sql);
    }

