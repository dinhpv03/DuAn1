<?php
    extract($chi_tiet_phim);
    $html_showtimes = "";
    foreach ($ds_showtimes as $times) {
        extract($times);
        $linkPro = 'index.php?act=chon_ghe&id_phim='.$id_phim.'&id_date='.$id_date.'&time='.$time.'';

        $html_showtimes.= '<a class="btn btn-primary py-1 px-3 mt-2 mx-1" href="'.$linkPro.'">'.$time.'</a>';
    }

    $html_date = "";
    foreach ($chi_tiet_date as $d) {
        extract($d);
        // $link = '';
        $link = 'index.php?act=chi_tiet_phim&id_phim='.$id_phim.'&id_date='.$id_date;
        // if ($stt == 1) {
        //     $active = 'active';
        // } else {
        //     $active = "";
        // }
        if ($id_phim == $_GET['id_phim']) {
            $html_date.='<li><a class="dropdown-item" href="'.$link.'">'.$date_month.'</a></li>';
                // '<a href="'.$link.'">
                //     <div class="box btn text-white py-3 px-5 mt-2 mx-1 border-1" onclick="changeColor(this)">'.$date_month.'</div>
                // </a>';
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
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Ngày chiếu
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?= $html_date; ?>
                            <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    jQuery.noConflict();
    jQuery(document).ready(function ($) {
        $("#binhluan").load("view/binh_luan.php", {id_movie: <?= $id_phim ?>});

    });
</script>
<div class="row">
    <div class="col-md-12 bg-light px-4">
        <div id="binhluan"></div>
    </div>
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
    console.log(this.textContent);
    // Hàm được gọi khi tải lại trang
    window.onload = function() {
        var selectedBox = localStorage.getItem("selectedBox");

        if (selectedBox) {
            // Nếu có box được chọn trước đó, tìm và thêm lớp "active" vào box đó
            for (var k = 0; k < boxes.length; k++) {
                if (boxes[k].textContent === selectedBox) {
                    if (window.onload == true) {
                        
                    } else {
                        
                    }
                    boxes[k].classList.add("active");
                    break;
                }
            }
        }
    };
  </script>
