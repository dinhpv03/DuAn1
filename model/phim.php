<?php
require_once "pdo.php";


function get_phim($limit){
    $sql = "SELECT * FROM phim ORDER BY id_phim DESC limit ".$limit;
    return pdo_query($sql);
}

function get_phim_by_id($id_phim){
    $sql = "SELECT * FROM phim INNER JOIN loai_phim ON phim.id_loaiphim = loai_phim.id_loaiphim WHERE id_phim =" . $id_phim;
    return pdo_query_one($sql);
}

function get_film_name_by_id($id_phim){
    $sql = "SELECT film_name FROM phim WHERE id_phim =" . $id_phim;
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

function them_phim_moi($name, $poster, $banner, $thoi_luong_phim, $mo_ta, $ngay_phat_hanh, $id_loai_phim) {
    $sql = "INSERT INTO phim (film_name, poster, banner, thoi_luong_phim, mo_ta, release_date, id_loaiphim) 
            VALUES ('$name', '$poster', '$banner', '$thoi_luong_phim', '$mo_ta', '$ngay_phat_hanh', $id_loai_phim)";
    pdo_execute($sql);
}


function all_phim() {
    $sql = "SELECT *
            FROM phim p
            INNER JOIN loai_phim l ON p.id_loaiphim = l.id_loaiphim
            ORDER BY p.id_phim DESC";
//    var_dump($sql);
//    die;
    return pdo_query($sql);
}

function delete_phim($id_phim){
    $sql = "DELETE  FROM phim WHERE id_phim =" . $_GET['id_phim'];
    pdo_execute($sql);
}

function load_one_phim($id_phim){
    $sql = "SELECT * FROM phim WHERE id_phim =" . $id_phim;
    return pdo_query_one($sql);
}

function cap_nhat_phim($id_phim, $name, $thoi_luong_phim, $ngay_phat_hanh, $poster, $banner, $mo_ta, $id_loaiphim) {
    $sql = "UPDATE phim 
            SET film_name = '".$name."', 
            thoi_luong_phim = '".$thoi_luong_phim."', 
            release_date = '".$ngay_phat_hanh."', 
            poster = '".$poster."',
            banner = '".$banner."',
            mo_ta = '".$mo_ta."',     
            id_loaiphim = '".$id_loaiphim."'   
            WHERE id_phim=" . $id_phim;
    pdo_execute($sql);
}


function get_current_images($id_phim) {
    $sql = "SELECT poster, banner FROM phim WHERE id_phim = $id_phim";
    $result = pdo_query_one($sql);
    return $result;
}

function search_phim($keyw = "", $id_loaiphim = 0) {
    $sql = "SELECT *
            FROM phim p
            INNER JOIN loai_phim lp 
            ON lp.id_loaiphim = p.id_loaiphim
            WHERE 1";

    if ($keyw != "") {
        $sql .= " AND (p.film_name LIKE '%" . $keyw . "%' OR lp.the_loai_phim LIKE '%" . $keyw . "%')";
    }

    if ($id_loaiphim > 0) {
        $sql .= " AND lp.id_loaiphim = '" . $id_loaiphim . "'";
    }

    $sql .= " GROUP BY p.id_phim, p.film_name, p.mo_ta, lp.id_loaiphim ORDER BY p.id_phim DESC";
    $listphim = pdo_query($sql);

    return $listphim;
}




function load_the_loai_phim($id_loaiphim)   {
    if($id_loaiphim > 0) {
        $sql = "SELECT * FROM loai_phim WHERE id=" . $id_loaiphim;
        $ten = pdo_query_one($sql);
        extract($ten);
        return $the_loai_phim;
    } else {
        return "";
    }
}




