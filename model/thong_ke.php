<?php
    function thong_ke_tai_khoan() {
        $sql = "SELECT COUNT(*) as tong_so_tai_khoan FROM user";
        return pdo_query($sql);
    }