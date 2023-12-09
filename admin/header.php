!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ADMIN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="layout_admin/assets/img/favicon.png" rel="icon" type="image/x-icon" >
  <link href="layout_admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="layout_admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="layout_admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="layout_admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="layout_admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="layout_admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="layout_admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="layout_admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="layout_admin/assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="layout_admin/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Quản lý</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                    </a>
                <!-- End Notification Nav -->

                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                    </a>
                </li>    
                <!-- End Messages Icon -->
                <?php
                if(isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                    extract($_SESSION['user'])?>
                        <li class="nav-item dropdown pe-3">
                            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                <i class="fa-regular fa-user fa-xl" style="color: #98a4b9;"></i>
                                <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $username ?></span>
                            </a>
                            <!--end  thông tin tài khoản -->

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">
                                    <h6><?php echo $username ?></h6>
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
                    }
                ?>
                <!-- thông tin tài khoản -->

            </ul>
        </nav><!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link " href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Trang chủ</span>
                </a>
            <li class="nav-item">
                <!-- form thêm mới -->
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Thêm mới</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="index.php?act=them_moi_loai_phim">
                        <i class="bi bi-circle"></i><span>Thêm thể loại phim</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?act=them_moi_phim">
                        <i class="bi bi-circle"></i><span>Thêm phim mới</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?act=them_moi_tai_khoan">
                        <i class="bi bi-circle"></i><span>Thêm mới tài khoản</span>
                        </a>
                    </li>
<!--                    <li>-->
<!--                        <a href="index.php?act=them_moi_suat_chieu">-->
<!--                        <i class="bi bi-circle"></i><span>Thêm suất chiếu</span>-->
<!--                        </a>-->
<!--                    </li>-->
                    <li>
                        <a href="index.php?act=them_moi_loai_ve">
                        <i class="bi bi-circle"></i><span>Thêm loại vé</span>
                        </a>
                    </li>
                </ul>
                <!-- end form thêm mới -->

                <!-- danh sách -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Danh sách</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="index.php?act=danh_sach_loai_phim">
                            <i class="bi bi-circle"></i><span>Danh sách loại phim</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?act=danh_sach_phim">
                            <i class="bi bi-circle"></i><span>Danh sách phim</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?act=danh_sach_tai_khoan">
                            <i class="bi bi-circle"></i><span>Danh sách tài khoản</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?act=danh_sach_loai_ve">
                            <i class="bi bi-circle"></i><span>Danh sách loại vé</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?act=danh_sach_binh_luan">
                            <i class="bi bi-circle"></i><span>Danh sách bình luận</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?act=danh_sach_ve_phim">
                            <i class="bi bi-circle"></i><span>Danh sách vé phim</span>
                        </a>
                    </li>
                </ul>
            </li>
                <!-- end danh sách -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Thống kê</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="index.php?act=bieu_do">
                            <i class="bi bi-circle"></i><span>Biểu đồ</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?act=tong_hop">
                            <i class="bi bi-circle"></i><span>Tổng hợp</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Charts Nav -->


            <li class="nav-heading">Pages</li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?act=f_a_q">
                    <i class="bi bi-question-circle"></i>
                    <span>F.A.Q</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?act=contac">
                    <i class="bi bi-envelope"></i>
                    <span>Liên hệ</span>
                </a>
            </li><!-- End Contact Page Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?act=erro_404">
                    <i class="bi bi-dash-circle"></i>
                    <span>Error 404</span>
                </a>
            </li><!-- End Error 404 Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?act=dang_xuat">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Đăng xuất</span>
                </a>
            </li><!-- End Login Page Nav -->
        </ul>
    </aside>
    <!-- End Sidebar-->