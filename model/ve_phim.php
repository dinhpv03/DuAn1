<?php 
    require_once "pdo.php";

    function insert_ve_phim($id_date , $time , $id_phim , $id_user , $price , $seat , $id_chitietvephim) {
        $sql = "INSERT INTO ve_phim (id_date , time , id_phim , id_user , price , seat , id_chitietvephim ) VALUES (?,?,?,?,?,?,?)";
        pdo_execute($sql, $id_date , $time , $id_phim , $id_user , $price , $seat , $id_chitietvephim);
    }

    function load_all_ve_phim() {
        $sql = "SELECT * FROM ve_phim
                INNER JOIN user ON ve_phim.id_user = user.id_user;
                ";
        return pdo_query($sql);
    }
    function load_chi_tiet_ve_phim($id_chitietvephim) {
        $sql = "SELECT * FROM chi_tiet_ve_phim 
         INNER JOIN user ON chi_tiet_ve_phim.id_user = user.id_user
         WHERE id_chitietvephim =".$id_chitietvephim;
        $ds = pdo_query($sql);
        return $ds;
    }

