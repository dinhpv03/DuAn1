<?php
session_start();
include "view/header.php";
include "model/pdo.php";
include "model/tai_khoan.php";
include "model/phim.php";
include "model/loai_phim.php";

    // data trang chủ
    $phim_new = get_phim_new(4);
    

    // data 2 bảng
    $phim_vs_loai_phim = phim_connect_loai_phim();

    if((isset($_GET['act'])) && ($_GET['act'] != "")){
        $act = $_GET['act'];
        switch($act) {
            case "dang_nhap":
            {
                if ((isset($_POST['dang_nhap'])) && ($_POST['dang_nhap'])) {
                    $user = $_POST['name'];
                    $pass = $_POST['password'];

                    $errUser = $errPass = null;

                    if (empty($user)) {
                        $errUser = '*Vui lòng nhập tên tài khoản! ';
                    }
                    if (empty($pass)) {
                        $errPass = '*Vui lòng nhập pass! ';
                    }
                    if(empty($errUser) && empty($errPass)) {
                        $check_user = check_user($user, $pass);
                        if (is_array($check_user)) {
                            $_SESSION['user'] = $check_user;
                            echo '<h6 class="text-danger">Đăng nhập thành công!</h6>';
                            include "view/home.php";
                        } else {
                            $thongbao = "Tài khoản không tồn tại. Đăng ký ngay!";
                            include "view/tai_khoan/dang_ky.php";
                            break;
                        }
                    }
                }
                include "view/tai_khoan/dang_nhap.php";
                break;
            }
            case "dang_ky":
            {
                if ((isset($_POST['dang_ky'])) && ($_POST['dang_ky'])) {
                    $email = $_POST['email'];
                    $user = $_POST['name'];
                    $pass = $_POST['password'];
                    $address = $_POST['address'];
                    $number_phone = $_POST['tel'];
                    $repass = $_POST['repassword'];

                    $errEmail = $errUser = $errPass = $errRepass = null;

                    if (empty($email)) {
                        $errEmail = "*Vui lòng nhập Email!";
                    } else {
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $errEmail = "*Lỗi cú pháp Email. Vui lòng nhập lại!";
                        }
                    }

                    if (empty($user)) {
                        $errUser = '*Vui lòng nhập tên tài khoản!';
                    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $user)) {
                        $errUser = '*Tên tài khoản chỉ được chứa chữ cái, số và dấu gạch dưới.';
                    } elseif (strlen($user) < 6 || strlen($user) > 20) {
                        $errUser = '*Tên tài khoản phải có độ dài từ 6 đến 20 ký tự.';
                    }

                    if (empty($repass)) {
                        $errRepass = '*Vui lòng nhập lại mật khẩu!';
                    } elseif ($repass !== $pass) {
                        $errRepass = '*Mật khẩu xác nhận không trùng khớp!';
                    }

                    if (empty($pass)) {
                        $errPass = '*Vui lòng nhập mật khẩu!';
                    } else {
                        if (!preg_match("/^[a-zA-Z0-9]*$/", $pass)) {
                            $errPass = "*Mật khẩu chỉ chứa kí tự từ A-Z 0-9. Vui lòng nhập lại!";
                        }
                    }

                    if (empty($errEmail) && empty($errUser) && empty($errPass) && empty($errRepass)) {
                        insert_tai_khoan($email, $user, $pass, $address, $number_phone);
                        $thongbao =  "Đăng ký tài khoản thành công!";
                    }
                }
                include "view/tai_khoan/dang_ky.php";
                break;
            }

            case "quen_mat_khau":
            {
                if ((isset($_POST['quen_mat_khau'])) && ($_POST['quen_mat_khau'])) {
                    $email = $_POST['email'];
                    $errEmail = null;
                    if(empty($email)) {
                        $errEmail = '*Vui lòng nhập Email!';
                    }
                    if(empty($errEmail)) {
                        $checkEmail = check_email($email);
                        if(is_array($checkEmail)) {
                            $thongbao = "Mật khẩu của bạn là: " . $checkEmail['password'];
                        } else {
                            $thongbao = "Tài khoản không tồn tại";
                        }
                    }
                }
                include "view/tai_khoan/quen_mat_khau.php";
                break;
            }

            case "thong_tin_tai_khoan":
            {
                if ((isset($_POST['cap_nhat'])) && ($_POST['cap_nhat'])) {
                    $email = $_POST['email'];
                    $user = $_POST['name'];
                    $number_phone = $_POST['tel'];
                    $address = $_POST['address'];
                    $iduser = $_POST['iduser'];

                    $errUser = $errPass = null;
                    if(empty($user)) {
                        $errUser = "*Không được để tên đăng nhập trống";
                    }
                    if(empty($pass)) {
                        $errPass = "*Không được để mật khẩu trống";
                    }

                    if(empty($errUser)) {
                        update_taikhoan($iduser,$email,$user,$address,$number_phone);
                        $_SESSION['user'] = check_user($user, "");
                        $thongbao = "Cập nhật tài khoản thành công!";
                    }
                }
                include "view/tai_khoan/thong_tin_tai_khoan.php";
                break;
            }

            case "dang_xuat": {
                session_unset();
                include "view/home.php";
                break;
            }

            case "chi_tiet_phim": {
                if (isset($_GET['id_phim'])) {
                    $id = $_GET['id_phim'];
                    $ds_loai_phim = loai_phim_all();
                    $chi_tiet_phim = get_phim_by_id($id);
                } else {
                    include "view/home.php";
                }
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

//    đây sẽ test git