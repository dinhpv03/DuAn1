<?php
    $html_get_phim = "";
    foreach ($phim_LK_loai_phim as $phim) {
        extract($phim);
        $link = "index.php?act=chi_tiet_phim&id_phim=".$id_phim;
        $html_get_phim.='
                        <div class = "row col-6 my-3">
                            <div class = "col-6">
                            <a href="'.$link.'"><img class="img-fluid" src="admin/upload/'.$poster.'" alt="" style="width: 100%; height: 400px;"></a>
                            </div>
                            <div class = "col-6">
                                <h6 class="mb-4 text-light">'.$film_name.'</h6>
                                <p class="limitedText mb-4">
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
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8 align-self-end">
                                        <a class="btn btn-primary py-3 px-5 my-1" href="'.$link.'">Đặt Vé</a>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                            </div>
                        </div>';
    }
?>
<div class="container-xxl py-4">
    <div class="container">
        <div class = "text-center my-3">
            <h5 class="section-title bg-dark text-center text-primary px-3">
            <i class="fa-solid fa-circle fa-sm" style="color: #df0c0c;"></i> Phim Đang chiếu</h5>
        </div>

        <div class = "row">
            <?=$html_get_phim;?>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var paragraphs = document.getElementsByClassName("limitedText");

    for (var i = 0; i < paragraphs.length; i++) {
        var paragraph = paragraphs[i];
        var originalText = paragraph.innerHTML;
        var limitedText = originalText.substring(0, 250);

        if (originalText.length > 250) {
        limitedText += "...";
        }

        paragraph.innerHTML = limitedText;
    }
    });
</script>