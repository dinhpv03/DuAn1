<?php
    // $html_showtimes = "";
    // foreach ($get_bien_the_showtimes as $times) {
    //     extract($times);
    //     $html_showtimes.='<a class="btn btn-primary py-1 px-3 mt-2 mx-1" href="">'.$time.'</a>';
    //     $html_showtimes.='
    //     <form action="index.php?act=chon_ghe" method="post">
    //     <input type="submit" class="btn btn-primary py-1 px-3 mt-2 mx-1" value="'.$time.'">
    //     </form>';
    // }

    $html_get_phim = "";
    foreach ($phim_LK_loai_phim as $phim) {
        extract($phim);
        $link = "index.php?act=chi_tiet_phim&id_phim=".$id_phim;
        $html_get_phim.='
                        <div class = "row col-6">
                            <div class = "col-6">
                            <a href="'.$link.'"><img class="img-fluid" src="admin/upload/'.$poster.'" alt="" "></a>
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
                                <a class="btn btn-primary py-3 px-5 mt-2 mx-1" href="'.$link.'">Đặt Vé</a>
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
        </div>
    </div>
</div>    