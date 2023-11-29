<?php
require_once "pdo.php";


function loai_phim_all(){
    $sql = "SELECT * FROM loai_phim ORDER BY STT DESC";
    return pdo_query($sql);
}

// cấu lệnh kết nối 2 bảng phim với loai_phim
function phim_connect_loai_phim(){
    $sql = "SELECT * FROM phim 
            INNER JOIN loai_phim ON phim.id_loaiphim = loai_phim.id_loaiphim";
    return pdo_query($sql);
}

function insert_loai_phim($stt,$name) {
    $sql = "INSERT INTO loai_phim(stt,the_loai_phim) VALUES ($stt,'$name')";
    pdo_execute($sql);
}

function delete_loai_phim() {
    $sql = "DELETE  FROM loai_phim WHERE id_loaiphim =".$_GET['id_loaiphim'];
    pdo_execute($sql);
}

function load_one_loai_phim($id_loaiphim) {
    $sql = "SELECT * FROM loai_phim WHERE id_loaiphim =".$id_loaiphim;
    $loai_phim = pdo_query_one($sql);
    return $loai_phim;
}

function update_loai_phim($id_loaiphim,$stt, $name) {
    $sql = "UPDATE loai_phim SET STT = $stt, the_loai_phim = '".$name."' WHERE id_loaiphim = ".$id_loaiphim;
    pdo_execute($sql);
}

?>