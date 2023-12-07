<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dự án 1 - Đặt vé xem phim online</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->

    <!-- Template Main CSS File -->
    <link href="admin/layout_admin/assets/css/style.css" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="admin/style/lib/animate/animate.min.css" rel="stylesheet">
    <link href="admin/style/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="admin/style/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="admin/style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="admin/style/css/style.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        .seat {
            width: 50px;
            height: 50px;
            margin: 5px;
            padding: 10px;
            background-color: #252A31;
            text-align: center;
            cursor: pointer;
            color: #fff;
            border-radius: 5px;
        }
        .vip-seat {
            background-color: #FF8413;
        }
        .no-seat {
            width: 50px;
            height: 50px;
            margin: 5px;
            padding: 12px 10px 0 10px;
            background-color: #252A31;
            text-align: center;
            border-radius: 5px;
        }

        .selected {
            --tw-bg-opacity: 1;
            background-color: rgb(59 130 246/var(--tw-bg-opacity)) !important;
            color: white;
            /* background-color: #28a745 !important; */
        }
        .custom-bg {
            --tw-bg-opacity: 1;
            background-color: rgb(26 29 35/var(--tw-bg-opacity));
        }
        .active {
            background-color: #86B817;
        }
    </style>
</head>
<body class="bg-dark">
<div class="container-fluid p-0 mt-4">
    <div class = "container">
        <div class = "row mb-3">
            <div class = "col-md-1">
                <a href="index.php" class="navbar-brand p-0">
                    <!-- <h3 class="text-primary m-0"><i class="fa-solid fa-film fa-lg" style="color: #88b816;"></i> Nature Cinema</h3> -->
                    <img src="admin/style/img/logo-black.png ">
                </a>
            </div>

            <div class = "col-md-6 text-center mt-4">
                <a class="text-light navbar-brand" href="index.php">Trang chủ</a>
                <a class="text-light navbar-brand" href="index.php?act=lich_chieu">Lịch chiếu</a>
                <a class="text-light navbar-brand" href="index.php?act=gia_ve">Giá vé</a>
                <!-- <a class="text-light navbar-brand" href="index.php?act=tin_tuc">Tin tức</a> -->
                <!-- <a class="text-light navbar-brand" href="index.php?act=khuyen_mai">Khuyến mãi</a> -->
                <a class="text-light navbar-brand" href="index.php?act=gioi_thieu"><?= $currentDate ?></a> 
            </div>

            <div class="col-md-3 mt-4">
                <form class="d-flex" action="index.php?act=search_phim" method="post">
                    <input class="form-control mr20" type="text" name="kyw" placeholder="Tìm kiếm phim" aria-label="Search" required>
                    <input class="btn btn-primary py-1 px-3 mx-3 rounded-pill" name="timkiem" value="Tìm kiếm" type="submit">
                </form>
            </div>

            <div class = "col-md-2 text-lg-end list-unstyled text-lg-end mt-4">
                <?php
                if(isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                    extract($_SESSION['user'])
                    ?>
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <i class="fa-regular fa-user fa-xl" style="color: #98a4b9;"></i>
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $username ?></span>
                        </a>
                        <!--end  thông tin tài khoản -->
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6> Hello <?php echo $username ?></h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="index.php?act=thong_tin_tai_khoan">
                                    <i class="bi bi-person"></i>
                                    <span>Thông tin tài khoản</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="index.php?act=dang_xuat">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Đăng xuất</span>
                                </a>
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->
                    <?php
                } else { ?>
                    <a href="index.php?act=dang_nhap" class="btn btn-primary rounded-pill py-2 px-4">Đăng nhập</a>
                    <?php
                }
                ?>

            </div>




    
    
