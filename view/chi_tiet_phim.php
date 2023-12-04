<?php
    extract($chi_tiet_phim);
    // var_dump($ds_showtimes);
    $html_showtimes = "";
    // $linkPro = "";
    foreach ($ds_showtimes as $times) {
        extract($times);
        $linkPro = 'index.php?act=chon_ghe&id_phim='.$id_phim.'&id_date='.$id_date.'&time='.$time.'';

        $html_showtimes.= '<a class="btn btn-primary py-1 px-3 mt-2 mx-1" href="'.$linkPro.'">'.$time.'</a>';
        // $html_showtimes.='<form action="index.php?act=chon_ghe&time='.$time.'" method="post">
        //                     <input type="hidden" name="">
        //                     <input type="submit" class="btn btn-primary py-3 px-5 mt-2 mx-1" value="'.$time.'">
        //                 </form>';
    }

$html_date = "";
foreach ($chi_tiet_date as $d) {
    extract($d);
    $link = 'index.php?act=chi_tiet_phim&id_phim='.$id_phim.'&id_date='.$id_date;
    // if ($stt == 1) {
    //     $active = 'active';
    // } else {
    //     $active = "";
    // }
    if ($id_phim == $_GET['id_phim']) {
        $html_date.='
            <a href="'.$link.'">
                <div class="box btn text-white py-3 px-5 mt-2 mx-1 border-1" onclick="changeColor(this)">'.$date_month.'</div>
            </a>';
    }
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
            <p class="mb-4"><?=$mo_ta?></p>

            <div class="row gy-2 gx-4 mb-4">
                <div class="col-sm-4">
                    <!-- thời lượng phim -->
                    <p class="mb-0"><i class="fa-solid fa-clock fa-sm" style="color: #88b816;"></i> <?=$thoi_luong_phim?></p>
                </div>

                <div class="col-sm-4">
                    <!--Ngày chiếu phim -->
                    <p class="mb-0"><i class="fa fa-calendar-alt text-primary me-2"></i><?=$release_date?></p>
                </div>

                <div class="col-sm-4">
                    <!-- Thể loại phim -->
                    <p class="mb-0"><i class="fa-solid fa-bars fa-sm" style="color: #88b816;"></i> <?=$the_loai_phim?></p>
                </div>
            </div>

            <h6 class="section-title bg-dark text-start text-primary pe-3">Chọn ngày</h6>
            <div class="row gy-2 gx-4 mb-4">
                <div class="col-sm-12">
                    <?=$html_date;?>
                </div>
            </div>

            <h6 class="section-title bg-dark text-start text-primary pe-3">Chọn khung giờ</h6>
            <div class="row gy-2 gx-4 mb-4">
                <div class="col-sm">
                    <?=$html_showtimes;?>
                </div>
            </div>

        </div>
    </div>
    <hr class="bg-while">
</div>
<script>

    var boxes = document.getElementsByClassName("box");

    // Gán sự kiện onclick cho từng phần tử
    for (var i = 0; i < boxes.length; i++) {
        boxes[i].onclick = function() {
            // Thêm lớp "active" cho box được nhấp vào
            this.classList.add("active");

            // Loại bỏ lớp "active" từ các box còn lại
            for (var j = 0; j < boxes.length; j++) {
                if (boxes[j] !== this) {
                    boxes[j].classList.remove("active");
                }
            }

            // Lưu trạng thái của box đã được chọn vào localStorage
            localStorage.setItem("selectedBox", this.textContent);
        };
    }

    // Hàm được gọi khi tải lại trang
    window.onload = function() {
        var selectedBox = localStorage.getItem("selectedBox");

        if (selectedBox) {
            // Nếu có box được chọn trước đó, tìm và thêm lớp "active" vào box đó
            for (var k = 0; k < boxes.length; k++) {
                if (boxes[k].textContent === selectedBox) {
                    boxes[k].classList.add("active");
                    break;
                }
            }
        }
    };
  </script>
