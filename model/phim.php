<?php
require_once "pdo.php";

<<<<<<< HEAD
    function get_phim_new($limit){
        $sql = "SELECT * FROM phim ORDER BY id_phim DESC limit ".$limit;
        return pdo_query($sql);
    }
    
    function get_phim_by_id($id_phim){
        $sql = "SELECT * FROM phim 
                INNER JOIN loai_phim ON phim.id_loaiphim = loai_phim.id_loaiphim 
                WHERE id_phim =" . $id_phim;
        return pdo_query_one($sql);
    }
=======
>>>>>>> 4bd41f91a37190900c6e088351807a6f4552ca37

function get_phim($limit){
    $sql = "SELECT * FROM phim ORDER BY id_phim DESC limit ".$limit;
    return pdo_query($sql);
}

function get_phim_by_id($id_phim){
    $sql = "SELECT * FROM phim INNER JOIN loai_phim ON phim.id_loaiphim = loai_phim.id_loaiphim WHERE id_phim =" . $id_phim;
    return pdo_query_one($sql);
}

function select_phim($dsphim){
    $html_select_phim = "";
    foreach ($dsphim as $film) {
        extract($film);
        $link = "index.php?act=chi_tiet_phim&id_phim=".$id_phim;
        $html_select_phim.='<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="package-item">
            <div class="overflow-hidden">
                <a href="'.$link.'"><img class="img-fluid" src="admin/upload/'.$poster.'" alt="" style="width: 100%; height: 450px;"></a>
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
    </div>';
    }
    return $html_select_phim;
}

function them_phim_moi($name, $poster, $banner, $thoi_luong_phim, $mo_ta, $ngay_phat_hanh, $id_suatchieu, $id_loai_phim) {
    $sql = "INSERT INTO phim (film_name, poster, banner, thoi_luong_phim, mo_ta, release_date, id_suatchieu, id_loaiphim) 
            VALUES ('$name', '$poster', '$banner', '$thoi_luong_phim', '$mo_ta', '$ngay_phat_hanh', $id_suatchieu, $id_loai_phim)";
    pdo_execute($sql);
}


<<<<<<< HEAD
    function all_phim() {
        $sql = "SELECT *
                FROM phim p
                INNER JOIN loai_phim l ON p.id_loaiphim = l.id_loaiphim     
                INNER JOIN bien_the_date date ON c.id_date = date.id_date
                INNER JOIN bien_the_showtimes sh ON c.id_time = sh.id_time
                ORDER BY id_phim DESC";
    //    var_dump($sql);
    //    die;
        return pdo_query($sql);
    }

    function delete_phim(){
        $sql = "DELETE  FROM phim WHERE id_phim =" . $_GET['id_phim'];
        pdo_execute($sql);
    }
=======
function all_phim() {
    $sql = "SELECT *
            FROM phim p
            INNER JOIN chon_suat_chieu c ON p.id_suatchieu = c.id_suatchieu
            INNER JOIN loai_phim l ON p.id_loaiphim = l.id_loaiphim     
            INNER JOIN bien_the_date date ON c.id_date = date.id_date
            INNER JOIN bien_the_showtimes sh ON c.id_time = sh.id_time
            ORDER BY id_phim DESC";
//    var_dump($sql);
//    die;
    return pdo_query($sql);
}

function delete_phim($id_phim){
    $sql = "DELETE  FROM phim WHERE id_phim =" . $_GET['id_phim'];
    pdo_execute($sql);
}
>>>>>>> 4bd41f91a37190900c6e088351807a6f4552ca37

function load_one_phim($id_phim){
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


function get_current_images($id_phim) {
    $sql = "SELECT poster, banner FROM phim WHERE id_phim = $id_phim";
    $result = pdo_query_one($sql);
    return $result;
}
?>