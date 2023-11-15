<?php
    require_once "pdo.php";
    
    function loai_phim_all(){
        $sql = "SELECT * FROM loai_phim ORDER BY STT DESC";
        return pdo_query($sql);
    }

    // cấu lệnh kết nối 2 bảng phim với loai_phim
    function phim_connect_loai_phim(){
        $sql = "SELECT * FROM loai_phim INNER JOIN phim ON loai_phim.id_loaiphim = phim.id_loaiphim";
        return pdo_query($sql);
    }   
?>
