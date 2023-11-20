<?php
session_start();
include "header.php";
include "../model/pdo.php";
include "../model/loai_phim.php";
include "../model/tai_khoan.php";
include "../model/phim.php";
include "../model/suat_chieu.php";
include "../model/loai_ve.php";

    if((isset($_GET['act'])) && ($_GET['act'] != "")){
        $act = $_GET['act'];
        switch($act) {
            // thêm mới
            case "them_moi_phim" : {
                if (isset($_POST['them_moi']) && ($_POST['them_moi'])) {
                    $name = $_POST['name'];
                    $thoi_luong_phim = $_POST['thoi_luong_phim'];
                    $ngay_phat_hanh = $_POST['ngay_phat_hanh'];
                    $poster = $_FILES['poster']['name'];
                    $banner = $_FILES['banner']['name'];
                    $mo_ta = $_POST['mo_ta'];
                    $id_suatchieu = $_POST['id_suat_chieu'];
                    $id_loai_phim = $_POST['id_loai_phim'];

                    $errName = $errThoi_luong = $errNgay_phat_hanh = $errMota = $errSuat_chieu = $errLoai_phim = $errBanner = $errPoster = null;

                    if (empty($name)) {
                        $errName = 'Vui lòng nhập tên phim';
                    }
                    if (empty($thoi_luong_phim)) {
                        $errThoi_luong = 'Vui lòng nhập thời lượng phim';
                    }
                    if (empty($ngay_phat_hanh)) {
                        $errNgay_phat_hanh = 'Vui lòng nhập ngày phát hành';
                    }
                    if (empty($mo_ta)) {
                        $errMota = 'Vui lòng nhập mô tả';
                    }
                    if (empty($id_suatchieu) && $id_suatchieu > 0) {
                        $errSuat_chieu = 'Vui chọn suất chiếu';
                    }
                    if (empty($id_loai_phim)) {
                        $errLoai_phim = 'Vui lòng chọn loaij phim';
                    }
                    if($_FILES['banner']['error'] != UPLOAD_ERR_OK) {
                        $errBanner = 'Vui lòng chọn ảnh banner';
                    }
                    if($_FILES['poster']['error'] != UPLOAD_ERR_OK) {
                        $errPoster = 'Vui lòng chọn ảnh poster';
                    }

                    if(empty($errName) && empty($errThoi_luong) && empty($errNgay_phat_hanh)
                        && empty($errMota) && empty($errSuat_chieu) && empty($errLoai_phim)
                        && empty($errBanner && empty($errPoster))) {

                        $target_poster = 'upload/' . $_FILES['poster']['name'];
                        $target_banner = 'upload/' . $_FILES['banner']['name'];

                        move_uploaded_file($_FILES['poster']['tmp_name'], $target_poster);
                        move_uploaded_file($_FILES['banner']['tmp_name'], $target_banner);

                        them_phim_moi($name, $poster, $banner,$thoi_luong_phim ,$mo_ta,$ngay_phat_hanh ,$id_suatchieu,$id_loai_phim);
                        $ds_phim = all_phim();
                        include "phim/list.php";
                        break;
                    }
                }
                $ds_loai_phim = loai_phim_all();
                $ds_suat_chieu = load_all_suat_chieu();
                include "phim/add.php";
                break;
            }


            case "them_moi_loai_phim" : {
                if($_SERVER["REQUEST_METHOD"] == 'POST') {
                    $name = $_POST['name'];
                    $STT = $_POST['stt'];

                    $errName = $errStt = null;

                    if (empty($name)) {
                        $errName = 'Vui lòng nhập tên loai phim';
                    }
                    if (empty($STT)) {
                        $errStt = 'Vui lòng nhập so thu tu';
                    }
                    if(empty($errName) && empty($errStt)) {
                        insert_loai_phim($STT,$name);
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

            case "delete":
            {
                if (isset($_GET['id_loaiphim']) && ($_GET['id_loaiphim'] > 0)) {
                    delete_loai_phim($_GET['$d_loaiphim']);
                }
                $ds_loai_phim = loai_phim_all();
                include "loai_phim/list.php";
                break;
            }

            case "delete_phim" : {
                if (isset($_GET['id_phim']) && ($_GET['id_phim'] > 0)) {
                    delete_phim($_GET['id_phim']);
                }
                $ds_phim = all_phim();
                include "phim/list.php";
                break;
            }




//            sửa
            case "edit_loai_phim" : {
                if (isset($_GET['id_loaiphim']) && ($_GET['id_loaiphim'] > 0)) {
                    $list_loai_phim = load_one_loai_phim($_GET['id_loaiphim']);
                }
                include "loai_phim/edit.php";
                break;
            }
            case "edit_user" : {
                if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                    $tai_khoan = load_one_tai_khoan($_GET['id_user']);
                }
                include "tai_khoan/edit.php";
                break;
            }

            case "edit_phim" : {
                if (isset($_GET['id_phim']) && ($_GET['id_phim'] > 0)) {
                    $phim = load_one_phim($_GET['id_phim']);
                }
                $ds_loai_phim = loai_phim_all();
                $ds_suat_chieu = load_all_suat_chieu();
                include "phim/edit.php";
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

            case "update_loai_phim" : {
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['name'];
                    $id_loaiphim = $_POST['id_loaiphim'];
                    update_loai_phim($id_loaiphim,$name);
                }
                $ds_loai_phim = loai_phim_all();
                include "loai_phim/list.php";
                break;
            }

            case "update_phim" : {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id_phim = $_POST['id_phim'];
                    $name = $_POST['name'];
                    $thoi_luong_phim = $_POST['thoi_luong_phim'];
                    $ngay_phat_hanh = $_POST['ngay_phat_hanh'];
                    $mo_ta = $_POST['mo_ta'];
                    $id_suatchieu = $_POST['id_suat_chieu'];
                    $id_loaiphim = $_POST['id_loai_phim'];


                    $current_images = get_current_images($id_phim);

                    if (!empty($_FILES['poster']['name'])) {
                        $poster = $_FILES['poster']['name'];
                        $target_poster = 'upload/' . $_FILES['poster']['name'];
                        move_uploaded_file($_FILES['poster']['tmp_name'], $target_poster);
                    } else {
                        $poster = $current_images['poster'];
                    }

                    if (!empty($_FILES['banner']['name'])) {
                        $banner = $_FILES['banner']['name'];
                        $target_banner = 'upload/' . $_FILES['banner']['name'];
                        move_uploaded_file($_FILES['banner']['tmp_name'], $target_banner);
                    } else {
                        $banner = $current_images['banner'];
                    }


                    cap_nhat_phim($id_phim, $name, $thoi_luong_phim, $ngay_phat_hanh, $poster, $banner,$mo_ta,$id_suatchieu,$id_loaiphim);

                }
                $ds_phim = all_phim();
                include "phim/list.php";
                break;
            }



            // danh sách
            case "danh_sach_loai_phim" : {
                $ds_loai_phim = loai_phim_all($dsphim);
                include "loai_phim/list.php";
                break;
            }
            case "danh_sach_phim" : {
                    $ds_phim = all_phim();
    //                var_dump($ds_phim);
    //                die;
                    include "phim/list.php";
                    break;
            }
            case "danh_sach_tai_khoan" : {
                $ds_tai_khoan = load_all_tai_khoan();
                include "tai_khoan/list.php";
                break;
            }
            case "danh_sach_suat_chieu" : {
                $ds_suat_chieu = load_all_suat_chieu();
                include "suat_chieu/list.php";
                break;
            }
            case "danh_sach_loai_ve" : {
                $ds_loai_ve = load_add_loai_ve();
                include "loai_ve/list.php";
                break;
            }



            // các trang view phụ
            case "thong_tin_tai_khoan" : {
                include "tai_khoan/thong_tin_tai_khoan.php";
                break;
            }
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
            case "dang_xuat" : {
                session_unset();
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