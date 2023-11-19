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

    function them_phim_moi($name,$poster, $banner, $thoi_luong_phim, $mo_ta, $ngay_phat_hanh, $id_suatchieu, $id_loai_phim) {
        $sql = "INSERT INTO phim (film_name, poster, banner, thoi_luong_phim ,mo_ta, release_date, id_suatchieu,id_loaiphim) 
                VALUES ('.$name.', '.$poster.','.$banner.', '.$thoi_luong_phim.', '.$mo_ta.','.$ngay_phat_hanh.','.$id_suatchieu.','.$id_loai_phim.')";
//        var_dump($sql);
//        die;
        pdo_execute($sql);
    }

function all_phim() {
    $sql = "SELECT p.id_phim, p.film_name, p.poster,p.banner,p.thoi_luong_phim, p.mo_ta, p.release_date, 
                   c.id_suatchieu,
                   date.day,date.month, 
                   sh.time, 
                   l.the_loai_phim
            FROM phim p
            INNER JOIN chon_suat_chieu c ON p.id_suatchieu = c.id_suatchieu
            INNER JOIN loai_phim l ON p.id_loaiphim = l.id_loaiphim     
            INNER JOIN bien_the_date date ON c.id_date = date.id_date
            INNER JOIN bien_the_showtimes sh ON c.id_time = sh.id_time
            ORDER BY id_phim DESC";
    return pdo_query($sql);
}

    function delete_phim($id_phim)    {
        $sql = "DELETE  FROM phim WHERE id_phim =" . $_GET['id_phim'];
        pdo_execute($sql);
    }

    function load_one_phim($id_phim)   {
        $sql = "SELECT * FROM phim WHERE id_phim =" . $id_phim;
        return pdo_query_one($sql);
    }

function cap_nhat_phim($id_phim, $name, $thoi_luong_phim, $ngay_phat_hanh, $poster, $banner, $mo_ta, $id_suatchieu, $id_loaiphim) {
    $sql = "UPDATE phim 
            SET film_name = '".$name."', 
            thoi_luong_phim = '".$thoi_luong_phim."', 
            release_date = '".$ngay_phat_hanh."', 
            poster = '".$poster."',
            banner = '".$banner."',
            mo_ta = '".$mo_ta."',   
            id_suatchieu = '".$id_suatchieu."',   
            id_loaiphim = '".$id_loaiphim."'   
            WHERE id_phim=" . $id_phim;


    pdo_execute($sql);
}


    function get_current_poster_name($id_phim) {
        $sql = "SELECT poster FROM phim WHERE id_phim = $id_phim";
        $result = pdo_query_one($sql);
        return $result['poster'];
}
