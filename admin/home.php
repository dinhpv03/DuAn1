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
                                    <li><a class="dropdown-item" href="#">Hôm nay</a></li>
                                    <li><a class="dropdown-item" href="#">Tháng</a></li>
                                    <li><a class="dropdown-item" href="#">Năm</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Vé đã bán </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
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
                    <div id="reportsChart"></div>
                        <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#reportsChart"), {
                            series: [{
                                name: 'Bán hàng',
                                data: [31, 40, 28, 51, 42, 82, 56],
                            }, {
                                name: 'Doanh thu',
                                data: [11, 32, 45, 32, 34, 52, 41]
                            }, {
                                name: 'Khách hàng',
                                data: [15, 11, 32, 18, 9, 24, 11]
                            }],
                            chart: {
                                height: 350,
                                type: 'area',
                                toolbar: {
                                show: false
                                },
                            },
                            markers: {
                                size: 4
                            },
                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                            fill: {
                                type: "gradient",
                                gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.3,
                                opacityTo: 0.4,
                                stops: [0, 90, 100]
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth',
                                width: 2
                            },
                            xaxis: {
                                type: 'datetime',
                                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                            },
                            tooltip: {
                                x: {
                                format: 'dd/MM/yy HH:mm'
                                },
                            }
                            }).render();
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
                                <h5 class="card-title">Top Bán chạy <span>| Hôm nay</span></h5>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Xem trước</th>
                                            <th scope="col">Phim</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Đã bán</th>
                                            <th scope="col">Tổng doanh thu</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="layout_admin/assets/img/product-1.jpg" alt=""></a></th>
                                            <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                                            <td>$64</td>
                                            <td class="fw-bold">124</td>
                                            <td>$5,828</td>
                                        </tr>
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