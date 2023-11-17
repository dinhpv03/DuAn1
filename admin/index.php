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
                if($_SERVER["REQUEST_METHOD"] == 'POST') {
                    $name = $_POST['name'];

                    $errName = null;

                    if (empty($name)) {
                        $errName = 'Vui lòng nhập tên loai phim';
                    }
                    if(empty($errName)) {
                        var_dump($name);
                        die;
                        insert_loai_phim($name);
                        header("Location: index.php?act=danh_sach_loai_phim");
                    }
                }
                include "loai_phim/add.php";
                break;
            }
            case "them_moi_tai_khoan" : {
                if($_SERVER["REQUEST_METHOD"] == 'POST') {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $number_phone = $_POST['tel'];
                    $password = $_POST['password'];
                    $role = $_POST['role'];

                    $errEmail = $errUser = $errPass = $errAddress = $errTel = null;
                    if (empty($email)) {
                        $errEmail = 'Vui lòng nhập email';
                    }

                    if (empty($name)) {
                        $errUser = 'Vui lòng nhập username';
                    }

                    if(empty($password)) {
                        $errPass = 'Vui lòng nhập mật khẩu';
                    }
                    if(empty($errEmail) && empty($errUser) && empty($errPass)) {
                        insert_taikhoan_admin($name,$email,$address,$number_phone,$password,$role);
                        $ds_tai_khoan = load_all_tai_khoan();
                        include "tai_khoan/list.php";
                        break;
                    }
                }
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


//            xóa
            case "delete_user" : {
                if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                    delete_tai_khoan($_GET['id_user']);
                }
                $ds_tai_khoan = load_all_tai_khoan();
                include "tai_khoan/list.php";
                break;
            }

//            sửa
            case "edit_user" : {
                if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                    $tai_khoan = load_one_tai_khoan($_GET['id_user']);
                }
                include "tai_khoan/edit.php";
                break;
            }

            case "update_user" : {
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id_user = $_POST['id_user'];
                    $user = $_POST['name'];
                    $pass = $_POST['password'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $number_phone = $_POST['tel'];
                    $role = $_POST['role'];

                    $errUser = $errPass = null;
                    if (empty($user)) {
                        $errUser = 'Không được để username trống!';
                    }

                    if(empty($pass)) {
                        $errPass = 'Không được để mật khẩu trống';
                    }
                    if(empty($errUser) && empty($errPass)) {
                        update_tai_khoan_admin($id_user,$user, $pass, $email, $address, $number_phone,$role);
                    }
                }
                $ds_tai_khoan = load_all_tai_khoan();
                include "tai_khoan/list.php";
                break;
            }



            // danh sách
            case "danh_sach_loai_phim" : {
                $ds_loai_phim = loai_phim_all();
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