<?php

function load_all_loai_phim() {
    $sql = "SELECT * FROM loai_phim;";
    $list = pdo_query($sql);
    return $list;
}