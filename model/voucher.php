<?php 
    require_once "pdo.php";

    function get_voucher($voucher_name){
        $sql = "SELECT * FROM voucher WHERE voucher_name = ?";
        return pdo_query_one($sql,$voucher_name);
    }
?>