<?php 
    require_once "pdo.php";

    function insert_chi_tiet_ve_phim($ma_ve , $id_user , $film_name , $showtime , $date , $ghe_ngoi , $total , $pttt, $ngay_giao_dich) {
        $sql = "INSERT INTO chi_tiet_ve_phim (ma_ve , id_user , film_name , showtime , date , ghe_ngoi , total , pttt, ngay_giao_dich) VALUES (?,?,?,?,?,?,?,?,?)";
        return pdo_execute_id($sql, $ma_ve , $id_user , $film_name , $showtime , $date , $ghe_ngoi , $total , $pttt, $ngay_giao_dich);
    }

    function chi_tiet_ve_phim_by_user($id_user) {
        $sql = "SELECT * FROM `chi_tiet_ve_phim` WHERE id_user = ? ORDER BY id_chitietvephim DESC";
        return pdo_query($sql, $id_user);
    }
?>