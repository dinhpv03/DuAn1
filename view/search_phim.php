<div class="wow fadeInUp mt-5"  data-wow-delay="0.1s">
    <?php
    echo ' <div class="text-light mb-3 h5">Kết quả với từ khóa "  '.$the_loai_phim.' '.$kyw.'"</div>';
    ?>
</div>

<div class="text-center">
    <?php
    if (isset($no_result_message)) {
        echo $no_result_message;
    }
    ?>
</div>

<?php
    foreach ($ds_search as $phim) {
    extract($phim);
        $link = "index.php?act=chi_tiet_phim&id_phim=".$id_phim;
        echo '
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="package-item">
                <div class="overflow-hidden">
                    <a href="'.$link.'"><img class="img-fluid" src="admin/upload/'.$poster.'" alt=""></a>
                </div>
                <div class="d-flex border-bottom">
                    <small class="flex-fill text-center border-end py-2"><i class="fa-solid fa-bars fa-sm" style="color: #88b816;"></i> '.$the_loai_phim.'</small>
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>'.$release_date.'</small>
                    <small class="flex-fill text-center py-2"><i class="fa-solid fa-clock fa-sm" style="color: #88b816;"></i> '.$thoi_luong_phim.'</small>
                </div>
                <div class="text-center p-4">
                    <h5 class="mb-0 text-truncate"><a href="'.$link.'">'.$film_name.'</a></h5>
                    <div class="mb-3">
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <a href="'.$link.'" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Xem thêm</a>
                        <a href="'.$link.'" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Đặt vé</a>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
?>