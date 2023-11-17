<?php
include "header.php";
include "../model/pdo.php";
include "../model/loai_phim.php";
include "../model/tai_khoan.php";

    if((isset($_GET['act'])) && ($_GET['act'] != "")){
        $act = $_GET['act'];
        switch($act) {
            // thêm mới
            case "them_moi_phim" : {
                include "phim/add.php";
                break;
            }
            case "them_moi_loai_phim" : {
                include "loai_phim/add.php";
                break;
            }
            case "them_moi_tai_khoan" : {
                include "tai_khoan/add.php";
                break;
            }
            case "them_moi_suat_chieu" : {
                include "suat_chieu/add.php";
                break;
            }
            case "them_moi_loai_ve" : {
                include "ve_phim/add.php";
                break;
            }


            

            // danh sách
            case "danh_sach_loai_phim" : {
                $ds_loai_phim = load_all_loai_phim();
                include "loai_phim/list.php";
                break;
            }
            case "danh_sach_phim" : {
                include "phim/list.php";
                break;
            }
            case "danh_sach_tai_khoan" : {
                $ds_tai_khoan = load_all_tai_khoan();
                include "tai_khoan/list.php";
                break;
            }
            case "danh_sach_suat_chieu" : {
                include "suat_chieu/list.php";
                break;
            }
            case "danh_sach_loai_ve" : {
                include "ve_phim/list.php";
                break;
            }



            // các trang view phụ
            case "f_a_q" : {
                include "f_a_q.php";
                break;
            }
            case "contac" : {
                include "contac.php";
                break;
            }
            case "erro_404" : {
                include "erro_404.php";
                break;
            }
            default : {
                include "home.php";
                break;
            }
        }
    } else {
        include "home.php";
    }

include "footer.php";