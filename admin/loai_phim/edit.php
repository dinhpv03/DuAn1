<?php
    if(is_array($list_loai_phim)) {
        extract($list_loai_phim);
//        var_dump($list_loai_phim);
//        die;
    }
?>
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">THÊM MỚI LOẠI PHIM</h5>
                        <form class="row g-3" action="index.php?act=update_loai_phim" method="post">
                            <input type="hidden" name="id_loaiphim" value="<?= $id_loaiphim ?>">
                            <div class="col-12">
                                <label for="" class="form-label">ID loại phim</label>
                                <input type="number" class="form-control"  disabled placeholder = "Tự tăng">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Số thự tự</label>
                                <input type="number" class="form-control" name="STT" value="<?= $STT ?>">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Tên thể loại phim</label>
                                <input type="text" class="form-control" name="name"  value="<?= $the_loai_phim ?>">
                            </div>
                            <div class="mt-3">
                                <input type="submit" class="btn btn-primary" name="them_moi" value="Cập nhật">
                                <button type="reset" class="btn btn-outline-success">Reset</button>
                                <a class="btn btn-outline-success" href="index.php?act=danh_sach_loai_phim">Danh sách</a>
                                <a class="btn btn-outline-success" href="index.php?act=them_moi_loai_phim">Thêm mới</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>