<?php
if (is_array($loai_ve)) {
    extract($loai_ve);
//    var_dump($phim);
//    die;
}
?>
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">THÊM MỚI LOẠI VÉ</h5>
                <form class="row g-3" action="index.php?act=update_loai_ve" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                        <input type="hidden" name="id_loaive" value="<?= $id_loaive ?>">
                        <label for="" class="form-label">Định dạng vé</label>
                        <input type="text" class="form-control" name="loai_ve" placeholder="2D, 3D" value="<?= $dinh_dang_ve ?>">
                        <span style="color: red"><?= isset($errLoai) ? $errLoai : '' ?></span>
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Loại ghế</label>
                        <input type="number" class="form-control" name="loai_ghe" placeholder="0 - Ghế thường, 1 - Ghế VIP" value="<?= $hang_ghe ?>">
                        <span style="color: red"><?= isset($errGhe) ? $errGhe : '' ?></span>
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Giá</label>
                        <input type="number" class="form-control" name="price" value="<?= $price ?>">
                        <span style="color: red"><?= isset($errPrice) ? $errPrice : '' ?></span>
                    </div>

                    <div class="mt-4">
                        <input type="submit" class="btn btn-primary" name="them_moi" value = "Cập nhật">
                        <button type="reset" class="btn btn-outline-success">Reset</button>
                        <a class="btn btn-outline-success" href="index.php?act=danh_sach_loai_ve">Danh sách</a>
                    </div>
                </form>
            </div>
    </section>
</main>