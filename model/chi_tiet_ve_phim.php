<?php 
    require_once "pdo.php";

    function insert_chi_tiet_ve_phim($ma_ve , $id_user , $film_name , $showtime , $date , $ghe_ngoi , $total , $pttt) {
        $sql = "INSERT INTO chi_tiet_ve_phim (ma_ve , id_user , film_name , showtime , date , ghe_ngoi , total , pttt) VALUES (?,?,?,?,?,?,?,?)";
        return pdo_execute_id($sql, $ma_ve , $id_user , $film_name , $showtime , $date , $ghe_ngoi , $total , $pttt);
    }

?>