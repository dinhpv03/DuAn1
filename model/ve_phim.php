<?php 
    require_once "pdo.php";

    function insert_ve_phim($id_date , $time , $id_phim , $id_user , $price , $seat , $id_chitietvephim) {
        $sql = "INSERT INTO ve_phim (id_date , time , id_phim , id_user , price , seat , id_chitietvephim ) VALUES (?,?,?,?,?,?,?)";
        pdo_execute($sql, $id_date , $time , $id_phim , $id_user , $price , $seat , $id_chitietvephim);
    }

?>