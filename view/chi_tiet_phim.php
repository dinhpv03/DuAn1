<?php
    $html_showtimes = "";
    extract($chi_tiet_phim);
    foreach ($chi_tiet_showtimes as $times) {
        extract($times);
        // $html_showtimes.= '<a class="btn btn-primary py-3 px-5 mt-2 mx-1" href="index.php?act=chon_ghe">'.$time.'</a>';
        $html_showtimes.='<input type="submit" class="btn btn-primary py-3 px-5 mt-2 mx-1" value="'.$time.'">';
    }
?>
<div class="container-xxl py-5">    
    <div class="row g-5">
        <div class="col-lg-6 wow " style="min-height: 600px;">
            <div class="position-relative h-100">
                <!-- ảnh phim ở đây -->
                <img class="img-fluid position-absolute w-100 h-100" src="admin/upload/<?=$poster?>" alt="" style="object-fit: contain;">
            </div>
        </div>
        
        <div class="col-lg-6 wow">
            <h6 class="section-title bg-dark text-start text-primary pe-3">Thông tin</h6>
            <!-- tên phim -->
            <h1 class="mb-4 text-light"><?=$film_name?></h1>
            <!-- mô tả phim -->
            <p class="mb-4">
            <?=$mo_ta?>
            </p>
            <div class="row gy-2 gx-4 mb-4">
                <div class="col-sm-6">
                    <!-- thời gian phim -->
                    <p class="mb-0"><i class="fa-solid fa-clock fa-sm" style="color: #88b816;"></i> <?=$thoi_luong_phim?></p>
                </div>
                <div class="col-sm-6">
                    <!--Ngày chiếu phim -->
                    <p class="mb-0"><i class="fa fa-calendar-alt text-primary me-2"></i><?=$release_date?></p>
                </div>

                <div class="col-sm-6">
                    <!-- Thể loại phim -->
                    <p class="mb-0"><i class="fa-solid fa-bars fa-sm" style="color: #88b816;"></i> <?=$the_loai_phim?></p>
                </div> 
            </div>
            <form action="index.php?act=chon_ghe" method="post">
            <input type="hidden" name="<?=$id_phim?>">
            <?=$html_showtimes;?>
            </form>
        </div>
    </div>
    <hr class="bg-while">
</div>