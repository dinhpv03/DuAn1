<?php
    $html_chieu_phim = "";
    foreach ($phim_vs_bien_the_showtimes as $film) {
        extract($film);
        $html_chieu_phim.='<a class="btn btn-primary py-3 px-5 mt-2" href="">'.$time.'</a>';
    }
    $html_get_phim = "";
    foreach ($phim_vs_loai_phim as $phim) {
        extract($phim);
        $html_get_phim.='
                        <div class = "row col-6">
                            <div class = "col-6">
                                <img class="img-fluid" src="admin/style/img/'.$poster.'" alt="">
                            </div>
                            <div class = "col-6">   
                                <h6 class="mb-4 text-light">'.$film_name.'</h6>
                                <p class="mb-4">
                                    '.$mo_ta.'
                                </p>
                                <div class="row gy-2 gx-4 mb-4">
                                    <div class="col-sm-6">
                                        <!-- thời gian phim -->
                                        <p class="mb-0"><i class="fa-solid fa-clock fa-sm" style="color: #88b816;"></i> '.$thoi_luong_phim.'</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <!--Ngày chiếu phim -->
                                        <p class="mb-0"><i class="fa fa-calendar-alt text-primary me-2"></i>'.$release_date.'</p>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- Thể loại phim -->
                                        <p class="mb-0"><i class="fa-solid fa-bars fa-sm" style="color: #88b816;"></i> '.$the_loai_phim.'</p>
                                    </div> 
                                </div>
                                '.$html_chieu_phim.'
                            </div>
                        </div>';
    }
?>
<div class="container-xxl py-5">
    <div class="container">
        <div class = "text-center mt-3">
            <h6 class="section-title bg-dark text-center text-primary px-3">
            <i class="fa-solid fa-circle fa-sm" style="color: #df0c0c;"></i> Phim Đang chiếu</h6>
        </div>

        <div class = "row">
            <?=$html_get_phim;?>
            <!-- <div class = "row col-6">
                <div class = "col-6">
                    <img class="img-fluid" src="admin/style/img/p_avengersendgame.jpeg" alt="">
                </div>
                <div class = "col-6">   
                    <h6 class="mb-4 text-light">Avengers: Endgame</h6>
                    <p class="mb-4">
                        Avengers: Hồi kết (tựa gốc tiếng Anh: Avengers: Endgame)
                        là phim điện ảnh siêu anh hùng Mỹ ra mắt năm 2019, 
                        do Marvel Studios sản xuất và Walt Disney Studios Motion Pictures phân phối độc quyền tại thị trường Bắc Mỹ.
                    </p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            thời gian phim
                            <p class="mb-0"><i class="fa-solid fa-clock fa-sm" style="color: #88b816;"></i>  101 phút.</p>
                        </div>
                        <div class="col-sm-6">
                            Ngày chiếu phim
                            <p class="mb-0"><i class="fa fa-calendar-alt text-primary me-2"></i>06/11/2023.</p>
                        </div>

                        <div class="col-sm-6">
                            Thể loại phim
                            <p class="mb-0"><i class="fa-solid fa-bars fa-sm" style="color: #88b816;"></i> Thể loại: Hành động.</p>
                        </div> 
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>

            <div class = "row col-6">
                <div class = "col-6">
                    <img class="img-fluid" src="admin/style/img/p_avengersendgame.jpeg" alt="">
                </div>
                <div class = "col-6">   
                    <h6 class="mb-4 text-light">Avengers: Endgame</h6>
                    <p class="mb-4">
                        Avengers: Hồi kết (tựa gốc tiếng Anh: Avengers: Endgame)
                        là phim điện ảnh siêu anh hùng Mỹ ra mắt năm 2019, 
                        do Marvel Studios sản xuất và Walt Disney Studios Motion Pictures phân phối độc quyền tại thị trường Bắc Mỹ.
                    </p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            thời gian phim
                            <p class="mb-0"><i class="fa-solid fa-clock fa-sm" style="color: #88b816;"></i>  101 phút.</p>
                        </div>
                        <div class="col-sm-6">
                            Ngày chiếu phim
                            <p class="mb-0"><i class="fa fa-calendar-alt text-primary me-2"></i>06/11/2023.</p>
                        </div>

                        <div class="col-sm-6">
                            Thể loại phim
                            <p class="mb-0"><i class="fa-solid fa-bars fa-sm" style="color: #88b816;"></i> Thể loại: Hành động.</p>
                        </div> 
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div> -->

        </div>
    </div>
</div>    