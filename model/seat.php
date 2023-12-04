<?php
require_once "pdo.php";

function seat_all(){
    $sql = "SELECT * FROM seat";
    return pdo_query($sql);
}

function seat_LK_loai_ve(){
        $sql = "SELECT * FROM seat INNER JOIN loai_ve ON seat.id_loaive = loai_ve.id_loaive";
    return pdo_query($sql);
}

// ,(NULL,'C','1','0'),(NULL,'C','2','0'),(NULL,'C','3','0'),(NULL,'C','4','0'),(NULL,'C','5','0'),(NULL,'C','6','0'),(NULL,'C','7','0'),(NULL,'C','8','0'),(NULL,'C','9','0'),(NULL,'C','10','0')
?>