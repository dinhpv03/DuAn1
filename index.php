<?php
include "view/header.php";

    if((isset($_GET['act'])) && ($_GET['act'] != "")){
        $act = $_GET['act'];
        switch($act) {
            case "dang_nhap": {
                include "view/tai_khoan/dang_nhap.php";
                break;
            }
            case "dang_ky": {
                include "view/tai_khoan/dang_ky.php";
                break;
            }
            case "quen_mat_khau": {
                include "view/tai_khoan/quen_mat_khau.php";
                break;
            }
            case "cap_nhat_tai_khoan": {
                include "view/tai_khoan/cap_nhat_tai_khoan.php";
                break;
            }
            case "chi_tiet_phim": {
                include "view/chi_tiet_phim.php";
                break;
            }
            case "gia_ve": {
                include "view/gia_ve.php";
                break;
            }
            case "lich_chieu": {
                include "view/lich_chieu.php";
                break;
            }
            default : {
                include "view/home.php";
                break;
            }
        }
    } else {
        include "view/home.php";
    }

include "view/footer.php";