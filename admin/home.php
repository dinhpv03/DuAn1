<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                    <h6>Lọc</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="index.php?act=danh_sach_ve_phim">Danh sách vé phim</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Vé đã bán </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $thong_ke_so_ve[0]['tong_so_ve'] ?? ''; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start"><h6>Lọc</h6></li>
                                    <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                    <li><a class="dropdown-item" href="#">Tháng </a></li>
                                    <li><a class="dropdown-item" href="#">Năm</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Doanh thu </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $doanh_thu ?>.000đ</h6>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                    <!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                    <h6>Xem</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="index.php?act=danh_sach_tai_khoan">Danh sách</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=them_moi_tai_khoan">Thêm mới</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Khách hàng </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $tong_tai_khoan[0]['tong_so_tai_khoan'] ?? ''; ?></h6>
<!--                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">tăng</span>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Customers Card -->

                    <!-- bieu thong ke -->
                    <div id="lineChart""></div>
                    <p class="h6 text-center text-danger mb-5">SỐ VÉ THEO TỪNG PHIM</p>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            const chartData = <?php echo $thongke_ve; ?>;

                            const seriesData = chartData.map(item => item.count_ve);
                            const categories = chartData.map(item => item.film_name);

                            const lineChart = new ApexCharts(document.querySelector("#lineChart"), {
                                series: [{
                                    name: "Số lượng vé",
                                    data: seriesData,
                                }],
                                chart: {
                                    height: 350,
                                    type: 'line',
                                    zoom: {
                                        enabled: false
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    curve: 'straight'
                                },
                                grid: {
                                    row: {
                                        colors: ['#f3f3f3', 'transparent'],
                                        opacity: 0.5
                                    },
                                },
                                xaxis: {
                                    categories: categories,
                                }
                            });

                            lineChart.render();
                        });
                    </script>
                    <!-- end bieu thong ke -->


                    <!-- top bán chạy hôm nay -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                    <li><a class="dropdown-item" href="#">Tháng</a></li>
                                    <li><a class="dropdown-item" href="#">Năm</a></li>
                                </ul>
                            </div>
                            <div class="card-body pb-0">
                                <h5 class="card-title">Top bán chạy</h5>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Xem trước</th>
                                            <th scope="col">Phim</th>
                                            <th scope="col">Ghế</th>
                                            <th scope="col">Đã bán</th>
                                            <th scope="col">Tổng doanh thu</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        <?php foreach($thong_ke_doanh_thu_phim as $doanh_thu_phim) {
                                            extract($doanh_thu_phim);


                                            $imagePath = './upload/' . $movie_image;
                                            if(is_file($imagePath)) {
                                                $movie_image = "<img src = '".$imagePath."' height = '80'>";
                                            } else {
                                                $movie_image = "Không có ảnh banner.";
                                            }

                                        ?>
                                        <tr>
                                            <th><?php echo $movie_image ?></th>
                                            <td><?php echo $movie_name ?></td>
                                            <td><?php echo $seats ?></td>
                                            <td><?php echo $ticket_count ?></td>
                                            <td><?php echo $total_revenue ?>.000đ</td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="index.php?act=dang_xuat">LOG OUT</a>
    </section>
</main>
<!-- end top bán chạy hôm nay -->
<!-- end main -->