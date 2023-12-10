<?php

session_start();
ob_start();
if(!isset($_SESSION["ticket"])){
    $_SESSION["ticket"]=[];
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentDate = date('Y-m-d / H:i:s');

include "view/header.php";

include "model/pdo.php";    
include "model/tai_khoan.php";
include "model/phim.php";
include "model/loai_phim.php";
include "model/showtimes.php";
include "model/date.php";
include "model/seat.php";
include "model/cinema_room.php";
include "model/chi_tiet_ve_phim.php";
include "model/ve_phim.php";
include "model/voucher.php";

    // data trang chủ
    $ds_phim = get_phim(4);

    // data kết nối 2 hay nhiều bảng với nhau
    $phim_LK_loai_phim = phim_connect_loai_phim();

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
                            header('location: index.php');
                        } else {
                            $thongbao = "Tài khoản không tồn tại. Đăng ký ngay!";
                            include "view/tai_khoan/dang_ky.php";
                            break;
                        }
                    }
                    if (!empty($_SESSION["ticket"])) {
                        header('location: index.php?act=thanh_toan');
                    }
                }
                // unset($_SESSION["ticket"]);
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

                    if (!empty($_SESSION["ticket"])) {
                        header('location: index.php?act=thanh_toan');
                    }
                }
                // unset($_SESSION["ticket"]);
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
                // unset($_SESSION["ticket"]);
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
                // unset($_SESSION["ticket"]);
                include "view/tai_khoan/thong_tin_tai_khoan.php";
                break;
            }
            case "lich_su_mua_ve": {
                include "view/tai_khoan/thong_tin_tai_khoan.php";
                break;
            }

            case "dang_xuat": {
                session_destroy();  
                header('location:index.php');
                break;
            }

            case "chi_tiet_phim": {
                if (isset($_GET['id_phim'])) {
                    $id_phim = $_GET['id_phim'];
                    // $ds_loai_phim = loai_phim_all();
                    $chi_tiet_phim = get_phim_by_id($id_phim);
                    $chi_tiet_date = get_date($id_phim);
                    if (!isset($_GET['id_date'])) {
                        $id_date = 0;
                    } else {
                        $id_date = $_GET['id_date'];
                    }
                    $ds_showtimes = get_showtimes_by_id_date($id_phim,$id_date);
                    // var_dump($_SESSION['user']['username']);
                } else {
                    include "view/home.php";
                }
                unset($_SESSION["ticket"]);
                include "view/chi_tiet_phim.php";
                break;
            }

            case "search_phim":
                {
                    if((isset($_POST['kyw'])) && ($_POST['kyw'] != "")) {
                        $kyw = $_POST['kyw'];
                    } else {
                        $kyw = "";
                    }
                    if((isset($_GET['id_loaiphim'])) && ($_GET['id_loaiphim'] > 0)) {
                        $id_loaiphim = $_GET['id_loaiphim'];
                    } else {
                        $id_loaiphim = 0;
                    }
                    $ds_search = search_phim($kyw, $id_loaiphim);
                    $the_loai_phim = load_the_loai_phim($id_loaiphim);

                    if (empty($ds_search)) {
                        $no_result_message = "Không có kết quả phù hợp.";
                    }
                    include "view/search_phim.php";
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

            case "chon_ghe": {
                $seats = seat_LK_loai_ve();
                if (isset($_POST['thanh_toan']) && $_POST['thanh_toan']) {
                    if (isset($_GET['id_phim'])) {
                        $id_phim = $_GET['id_phim'];
                    }
    
                    if (isset($_GET['time'])) {
                        $time = $_GET['time'];
                    }
    
                    if (isset($_GET['id_date'])) {
                        $id_date = $_GET['id_date'];
                    }

                    $seat = $_POST['seat'];
                    $price = $_POST['price'];

                    $_SESSION['get_link'] = $_SERVER['REQUEST_URI'];
                    
                    $ticket = array("id_phim" => $id_phim,"id_date" => $id_date,"time" => $time,"seat" => $seat,"price" => $price);
                    array_push($_SESSION["ticket"],$ticket);
                    header('location: index.php?act=thanh_toan');
                } else {
                    unset($_SESSION["ticket"]);
                    include "view/chon_ghe.php";
                }
                break;
            }
            case "delete_binh_luan" : {
                if (isset($_POST['commentId'])) {
                    $commentId = $_POST['commentId'];
                    delete_binhluan($commentId);
                    // Respond with a success message (optional)
                    echo "Comment deleted successfully!";
                    exit();
                }
            }

            case "thanh_toan": {
                if (empty($_SESSION["ticket"])) {
                    header('location: index.php');
                }
                include "view/thanh_toan.php";
                break;
            }

            case "thanh_toan_submit": {
                if (empty($_SESSION['user'])) {
                    header('location: index.php?act=dang_nhap');
                    break;
                } else {
                    if (isset($_POST['payment']) && ($_POST['payment'])) {
                        $ma_ve = "NC".rand(1000,9999).date('Ymd');
                        $id_user = $_SESSION['user']['id_user'];
                        $film_name = $_POST['film_name'];
                        $showtime = $_POST['suat_chieu'];
                        $date = $_POST['date_month'];
                        $ghe_ngoi = $_POST['ghe_ngoi'];
                        $total = $_POST['total'];
                        $pttt = $_POST['pttt'];
                        $ngay_giao_dich = $currentDate;
                        $id_chitietvephim = insert_chi_tiet_ve_phim($ma_ve , $id_user , $film_name , $showtime , $date , $ghe_ngoi , $total , $pttt, $ngay_giao_dich);
                        foreach ($_SESSION["ticket"] as $tik) {
                            extract($tik);
                            insert_ve_phim($id_date , $time , $id_phim , $id_user , $total , $seat , $id_chitietvephim);

                            $arraySeat = explode(", ", $seat);
                            $pattern = '/^([A-Za-z]+)(\d+)$/';
                            foreach ($arraySeat as $key) {
                                if (preg_match($pattern, $key, $matches)) {
                                    $seat_name = $matches[1];
                                    $stt = $matches[2];
                                    update_status($seat_name, $stt);
                                }
                            }
                        }
                        header('location: index.php?act=confirm');
                    }
                }
                break;
            }

            case "confirm": {
                unset($_SESSION["ticket"]);
                include "view/confirm.php";
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
ob_end_flush();