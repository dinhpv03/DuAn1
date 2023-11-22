<?php
function load_all_suat_chieu() {
    $sql = "SELECT c.id_suatchieu, c.id_date, c.id_time, date.day, date.month, time.time
            FROM chon_suat_chieu c
            INNER JOIN bien_the_date date ON c.id_date = date.id_date
            INNER JOIN bien_the_showtimes time ON c.id_time                          
            ORDER BY id_suatchieu DESC";
    return pdo_query($sql);
}

function them_moi_suat_chieu($ngay_chieu, $gio_chieu) {
    $sql = "INSERT INTO chon_suat_chieu(id_date, id_time) VALUES ($ngay_chieu, $gio_chieu)";
//    var_dump($sql);
//    die;
    pdo_execute($sql);
}
