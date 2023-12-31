<?php
if (is_array($phim)) {
    extract($phim);
//    var_dump($phim);
//    die;
}
?>
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center" >CẬP NHẬT PHIM</h5>
                        <form class="row g-3" action="index.php?act=update_phim" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_phim" value="<?=$id_phim?>" >
                            <div class="col-12">
                                <label for="" class="form-label">Tên phim</label>
                                <input type="text" class="form-control" name="name" placeholder="Film name" value="<?= $film_name ?>">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Poster</label>
                                <input type="file" class="form-control" name="poster">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Banner</label>
                                <input type="file" class="form-control" name="banner">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Thời lượng phim</label>
                                <input type="text" class="form-control" name="thoi_luong_phim" placeholder="Movie duration" value="<?= $thoi_luong_phim ?>">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Ngày phát hành</label>
                                <input type="text" class="form-control" name="ngay_phat_hanh" placeholder="Release date" value="<?= $release_date ?>">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Mô tả</label>
                                <textarea type="text" class="form-control" name="mo_ta" placeholder="Description"><?= $mo_ta ?></textarea>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Loại phim</label>
                                <select  name="id_loai_phim" class="form-control">
                                    <option value="0">Chọn thể loại phim</option>
                                    <?php foreach ($ds_loai_phim as $ds_loai) {
                                        extract($ds_loai);
                                        if($id_loaiphim == $id_loaiphim) $s = "selected"; else $s = "";
                                        echo '<option value="' . $id_loaiphim . '"'. $s .'>' . $the_loai_phim . '</option>';
                                    }  ?>
                                </select>
                            </div>
                            <div class="mt-4">
                                <input type="submit" class="btn btn-primary" name="cap_nhat" value = "Cập nhật">
                                <button type="reset" class="btn btn-outline-success">Reset</button>
                                <a class="btn btn-outline-success" href="index.php?act=danh_sach_phim">Danh sách</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>