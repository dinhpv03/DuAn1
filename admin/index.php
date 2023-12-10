<?php

session_name("admin_session");
session_start();

ob_start();
require_once "check-login.php";
if (isset($_SESSION['login_success']) && $_SESSION['login_success'] === true) {
    include "header.php";
    include "../model/pdo.php";
    include "../model/loai_phim.php";
    include "../model/tai_khoan.php";
    include "../model/phim.php";
    include "../model/loai_ve.php";
    include "../model/binh_luan.php";
    include "../model/thong_ke.php";
    include "../model/ve_phim.php";
    include "../model/seat.php";
    include "../model/date.php";
    include "../model/showtimes.php";


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
                        $errName = '*Vui lòng nhập tên phim';
                    }
                    if (empty($thoi_luong_phim)) {
                        $errThoi_luong = '*Vui lòng nhập thời lượng phim';
                    }

                    if (empty($ngay_phat_hanh)) {
                        $errNgay_phat_hanh = '*Vui lòng nhập ngày phát hành';
                    } elseif (!preg_match('/^\d{4}\/\d{2}\/\d{2}$/', $ngay_phat_hanh)) {
                        $errNgay_phat_hanh = '*Ngày phát hành không đúng định dạng (yyyy/mm/dd)';
                    }

                    if (empty($mo_ta)) {
                        $errMota = '*Vui lòng nhập mô tả';
                    }
                    if (empty($id_loai_phim)) {
                        $errLoai_phim = '*Vui lòng chọn loại phim';
                    }
                    if($_FILES['banner']['error'] != UPLOAD_ERR_OK) {
                        $errBanner = '*Vui lòng chọn ảnh banner';
                    }
                    if($_FILES['poster']['error'] != UPLOAD_ERR_OK) {
                        $errPoster = '*Vui lòng chọn ảnh poster';
                    }

                    if(empty($errName) && empty($errThoi_luong) && empty($errNgay_phat_hanh)
                        && empty($errMota) && empty($errSuat_chieu) && empty($errLoai_phim)
                        && empty($errBanner && empty($errPoster))) {

                        $target_poster = 'upload/' . $_FILES['poster']['name'];
                        $target_banner = 'upload/' . $_FILES['banner']['name'];

                        move_uploaded_file($_FILES['poster']['tmp_name'], $target_poster);
                        move_uploaded_file($_FILES['banner']['tmp_name'], $target_banner);

                        them_phim_moi($name, $poster, $banner,$thoi_luong_phim ,$mo_ta,$ngay_phat_hanh ,$id_loai_phim);
                        $ds_phim = all_phim();
                        include "phim/list.php";
                        break;
                    }
                }
                $ds_loai_phim = loai_phim_all();
                include "phim/add.php";
                break;
            }


            case "them_moi_loai_phim" : {
                if($_SERVER["REQUEST_METHOD"] == 'POST') {
                    $name = $_POST['name'];
                    $STT = $_POST['stt'];

                    $errName = $errStt = null;

                    if (empty($name)) {
                        $errName = '*Vui lòng nhập tên loai phim';
                    }
                    if (empty($STT)) {
                        $errStt = '*Vui lòng nhập số thứ tự';
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

                    $errEmail = $errUser = $errPass = $errAddress = $errTel = $errRole = null;
                    if (empty($email)) {
                        $errEmail = '*Vui lòng nhập email';
                    }

                    if (empty($name)) {
                        $errUser = '*Vui lòng nhập username';
                    }

                    if(empty($password)) {
                        $errPass = '*Vui lòng nhập mật khẩu';
                    }
                    if (!isset($role)) {
                        $errRole = '*Vui lòng nhập';
                    } elseif ($role != 0 && $role != 1) {
                        $errRole = 'Chỉ nhập 0 và 1';
                    }


                    if(empty($errEmail) && empty($errUser) && empty($errPass)&& empty($errRole)) {
                        insert_taikhoan_admin($name,$email,$address,$number_phone,$password,$role);
                        $ds_tai_khoan = load_all_tai_khoan();
                        include "tai_khoan/list.php";
                        break;
                    }
                }
                include "tai_khoan/add.php";
                break;
            }
            case "them_moi_loai_ve" : {
                if($_SERVER["REQUEST_METHOD"] == 'POST') {
                    $loai_ve = $_POST['loai_ve'];
                    $loai_ghe = $_POST['loai_ghe'];
                    $price = $_POST['price'];

                    if (empty($loai_ve)) {
                        $errLoai = '*Vui lòng chọn loại vé';
                    } elseif (!in_array($loai_ve, ['2D', '3D'])) {
                        $errLoai = '*Loại vé không hợp lệ, chỉ nhập 2D và 3D';
                    }

                    if (empty($loai_ghe)) {
                        $errGhe = '*Vui lòng chọn loại ghế';
                    } elseif (!in_array($loai_ghe, ['0', '1'])) {
                        $errGhe = '*Loại ghế không hợp lệ, chỉ 0 và 1';
                    }

                    if (empty($price)) {
                        $errPrice = '*Vui lòng nhập giá vé';
                    } elseif (!is_numeric($price)) {
                        $errPrice = '*Giá vé phải là một số';
                    }


                    if(empty($errLoai) && empty($errGhe) && empty($errPrice)) {
                        them_moi_loai_ve($loai_ve,$loai_ghe,$price);
                        include "tai_khoan/list.php";
                        break;
                    }
                }
                include "loai_ve/add.php";
                break;
            }

//            case "them_moi_gio_chieu" : {
//                if($_SERVER["REQUEST_METHOD"] == 'POST') {
//                    $gio_chieu = $_POST['gio_chieu'];
//                    $id_phim = $_POST['id_phim'];
//                    $id_date = $_POST['id_date'];
//
//                        them_moi_gio_chieu($gio_chieu, $id_phim,$id_date);
//
//
//                }
//                $ds_date = date_all();
//                $ds_phim = all_phim();
//                 include "showtimes/add.php";
//                 break;
//            }


//            xóa
            case "delete_user" : {
                if (isset($_GET['id_user']) && ($_GET['id_user'] > 0)) {
                    delete_tai_khoan($_GET['id_user']);
                }
                $ds_tai_khoan = load_all_tai_khoan();
                include "tai_khoan/list.php";
                break;
            }

            case "delete_loai_phim":
            {
                if (isset($_GET['id_loaiphim']) && ($_GET['id_loaiphim'] > 0)) {
                    delete_loai_phim($_GET['$id_loaiphim']);
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
            case "delete_loai_ve" : {
                if (isset($_GET['id_loaive']) && ($_GET['id_loaive'] > 0)) {
                    delete_ve($_GET['id_phim']);
                }
                $ds_loai_ve = load_add_loai_ve();
                include "loai_ve/list.php";
                break;
            }

            case "delete_binh_luan" : {
                if(isset($_GET['id_binhluan']) && ($_GET['id_binhluan'])) {
                    delete_binhluan($_GET['id_binhluan']);
                    $ds_binh_luan = load_binh_luan();
                    include "binh_luan/list.php";
                }
                break;
            }
            case "deleteAll" : {
                delete_all();
                include "binh_luan/list.php";
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
                include "phim/edit.php";
                break;
            }
            case "edit_loai_ve" : {
                if (isset($_GET['id_loaive']) && ($_GET['id_loaive'] > 0)) {
                    $loai_ve = load_one_loai_ve($_GET['id_loaive']);
                }
                $ds_loai_ve = load_add_loai_ve();
                include "loai_ve/edit.php";
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
                    $stt = $_POST['STT'];
                    $id_loaiphim = $_POST['id_loaiphim'];
                    update_loai_phim($id_loaiphim,$stt,$name);
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
                    cap_nhat_phim($id_phim, $name, $thoi_luong_phim, $ngay_phat_hanh, $poster, $banner,$mo_ta,$id_loaiphim);

                }
                $ds_phim = all_phim();
                include "phim/list.php";
                break;
            }

            case "update_loai_ve" : {
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $loai_ve = $_POST['loai_ve'];
                    $loai_ghe = $_POST['loai_ghe'];
                    $price = $_POST['price'];
                    $id_loaive = $_POST['id_loaive'];


                    update_loai_ve($loai_ve,$loai_ghe,$price,$id_loaive);
                }
                $ds_loai_ve = load_add_loai_ve();
                include "loai_ve/list.php";
                break;
            }



            // danh sách
            case "danh_sach_loai_phim" : {
                $ds_loai_phim = loai_phim_all();
                include "loai_phim/list.php";
                break;
            }
            case "danh_sach_phim" : {
                    $ds_phim = all_phim();
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

            case "danh_sach_binh_luan" : {
                $ds_binh_luan = load_binh_luan();
                include "binh_luan/list.php";
                break;
            }
            case "danh_sach_ve_phim" : {
                $ds_ve_phim = load_all_ve_phim();
                include "ve_phim/list.php";
                break;
            }

            case "danh_sach_ghe" : {
                $ds_ghe = seat_all();
                include "seat/list.php";
                break;
            }

            case "danh_sach_showtimes" : {
                $ds_showtime = showtimes_all();
                include "showtimes/list.php";
                break;
            }
            case "danh_sach_date" : {
                $ds_date = date_all();
                include "date/list.php";
                break;
            }




            case "chi_tiet_ve" : {
                if((isset($_GET['id_chitietvephim'])) && ($_GET['id_chitietvephim'] != "")){
                    $chi_tiet_ve_phim = load_chi_tiet_ve_phim($_GET['id_chitietvephim']);
                }
                include "ve_phim/chi_tiet_ve.php";
                break;
            }
            //Thống kê

            case "thong_ke_tai_khoan" : {
                $tong_tai_khoan = thong_ke_tai_khoan();
            }
            case "bieu_do" : {
                $listThongKe = loadall_thongke();
                $thongke_ve = thong_ke_ve_phim();
                $listThongKeBinhLuan = load_thongke_binhluan();
                include "thong_ke/bieu_do.php";
                break;
            }
            case "tong_hop" : {
                $listThongKe = loadall_thongke();
                $thongke_ve = thong_ke_ve_phim();
                $listThongKeBinhLuan = load_thongke_binhluan();
//                var_dump($doanh_thu);
                include "thong_ke/thong_ke.php";
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
                include "log-out.php";
                break;
            }
            default : {
                include "home.php";
                break;
                }
            }
        } else {
            $doanh_thu = doanh_thu();
            $thongke_ve = thong_ke_ve_phim();
            $tong_tai_khoan = thong_ke_tai_khoan();
            $thong_ke_doanh_thu_phim = thong_ke_doanh_thu_phim();
            $thong_ke_so_ve = thong_ke_so_ve();
            include "home.php";
        }

    include "footer.php";

}else {
    header("Location: login.php");
}
ob_end_flush();