<?php
    require_once "pdo.php";

    function get_phim_new($limit){
        $sql = "SELECT * FROM phim ORDER BY id_phim DESC limit ".$limit;
        return pdo_query($sql);
    }
    
    function select_phim($dsphim) {
        $html_select_phim = "";
        foreach ($dsphim as $film) {
            extract($film);
            $html_select_phim.='<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="package-item">
                <div class="overflow-hidden">
                    <a href="index.php?act=chi_tiet_phim"><img class="img-fluid" src="admin/style/img/'.$poster.'" alt="" style="width: 100%; height: 450px;"></a></h5>
                </div>
                <div class="d-flex border-bottom">
                    <small class="flex-fill text-center border-end py-2"><i class="fa-solid fa-bars fa-sm" style="color: #88b816;"></i> '.$the_loai_phim.'</small>
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>'.$release_date.'</small>
                    <small class="flex-fill text-center py-2"><i class="fa-solid fa-clock fa-sm" style="color: #88b816;"></i> '.$thoi_luong_phim.'</small>
                </div>
                <div class="text-center p-4">
                    <h5 class="mb-0 text-truncate"><a href="index.php?act=chi_tiet_phim">'.$film_name.'</a></h5>
                    <div class="mb-3">
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <a href="index.php?act=chi_tiet_phim" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Xem thêm</a>
                        <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Đặt vé</a>
                    </div>
                </div>
            </div>
        </div>';
        }
        return $html_select_phim;
    }
?>