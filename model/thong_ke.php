<?php
    function thong_ke_tai_khoan() {
        $sql = "SELECT COUNT(*) as tong_so_tai_khoan FROM user";
        return pdo_query($sql);
    }
function thong_ke_so_ve() {
    $sql = "SELECT COUNT(*) as tong_so_ve FROM ve_phim";
    return pdo_query($sql);
}
    function loadall_thongke() {
        $sql = "SELECT lp.id_loaiphim as ma_theloai, lp.the_loai_phim as the_loai, 
                COUNT(p.id_phim) as countphim
                FROM phim p
                INNER JOIN loai_phim lp ON lp.id_loaiphim = p.id_loaiphim
                GROUP BY lp.id_loaiphim
                ORDER BY countphim DESC";
        $listThongKe = pdo_query($sql);
        return $listThongKe;
    }

function load_thongke_binhluan() {
    $sql = "SELECT p.id_phim as ma_phim, p.film_name as ten_phim, 
                COUNT(bl.id_binhluan) as countbinhluan
                FROM phim p
                LEFT JOIN binh_luan bl ON bl.id_phim = p.id_phim
                GROUP BY p.id_phim
                ORDER BY countbinhluan DESC";
    $listThongKe = pdo_query($sql);
    return $listThongKe;
}

function thong_ke_ve_phim() {
    $sql = "SELECT phim.film_name, COUNT(ve_phim.id_vephim) as count_ve 
            FROM ve_phim 
            INNER JOIN phim ON ve_phim.id_phim = phim.id_phim
            GROUP BY phim.film_name";

    $result = pdo_query($sql);

    $data = [];
    foreach ($result as $row) {
        $data[] = [
            'film_name' => $row['film_name'],
            'count_ve' => intval($row['count_ve']),
        ];
    }

    $json_data = json_encode($data);
    return $json_data;
}

function doanh_thu() {
    $sql = "SELECT SUM(price) as total_revenue FROM ve_phim";
    return pdo_query_value($sql);
}

function thong_ke_doanh_thu_phim() {
    $sql = "SELECT
            p.film_name AS movie_name,
            p.poster AS movie_image,
            COUNT(v.id_vephim) AS ticket_count,
            GROUP_CONCAT(v.seat) AS seats,
            SUM(v.price) AS total_revenue
        FROM
            ve_phim v
        JOIN
            phim p ON v.id_phim = p.id_phim
        GROUP BY
            v.id_phim
        ORDER BY ticket_count DESC;";
        return pdo_query($sql);
}


