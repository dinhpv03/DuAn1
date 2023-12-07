<?php
require_once "pdo.php";

function get_showtimes_by_id($id_phim){
    $sql = "SELECT DATE_FORMAT(time, '%H:%i') AS time FROM showtimes WHERE id_phim = ".$id_phim;
    return pdo_query($sql);
}

function get_showtimes_by_id_date($id_phim,$id_date){
    $sql = "SELECT DATE_FORMAT(time, '%H:%i') AS time FROM showtimes WHERE id_phim = ".$id_phim;
    // if ($id_date > 0) {
        $sql .= " AND id_date = ".$id_date;
    // }
    return pdo_query($sql);
}

// function phim_connect_bt_showtimes_by_id($id_phim){
//     $sql = "SELECT time FROM phim
//     INNER JOIN showtimes ON phim.id_phim = showtimes.id_phim
//     WHERE showtimes.id_phim = ".$id_phim;
//     return pdo_query($sql);
// }

// function load_all_suat_chieu() {
//     $sql = "SELECT c.id_suatchieu, c.id_date, c.id_time, date.day, date.month, time.time
//             FROM chon_suat_chieu c
//             INNER JOIN date date ON c.id_date = date.id_date
//             INNER JOIN showtimes time ON c.id_time                          
//             ORDER BY id_suatchieu DESC";
//     return pdo_query($sql);
// }

// function them_moi_suat_chieu($ngay_chieu, $gio_chieu) {
//     $sql = "INSERT INTO chon_suat_chieu(id_date, id_time) VALUES ($ngay_chieu, $gio_chieu)";
// //    var_dump($sql);
// //    die;
//     pdo_execute($sql);
// }

?>