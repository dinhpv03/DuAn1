<?php
function insert_binhluan($noi_dung, $user_name,$iduser, $id_phim, $ngaybinhluan) {
    $sql = "INSERT INTO binh_luan(noi_dung, user, id_user, id_phim, ngay_binh_luan) 
            VALUES ('$noi_dung','$user_name','$iduser','$id_phim','$ngaybinhluan')";
    pdo_execute($sql);
}

function loadall_binhluan($id_movie) {
    $sql = "SELECT * FROM binh_luan WHERE id_phim =".$id_movie;
    $sql .= " ORDER BY id_binhluan DESC";
    $listBinhLuan = pdo_query($sql);
    return $listBinhLuan;
}

function load_binh_luan() {
    $sql = "SELECT * FROM binh_luan";
    return pdo_query($sql);
}


function delete_binhluan($id_binhluan) {
    $sql = "DELETE  FROM binh_luan WHERE id_binhluan =".$id_binhluan;
    return pdo_execute($sql);
}
function delete_all() {
    $sql = "DELETE FROM binh_luan";
    pdo_execute($sql);
}
