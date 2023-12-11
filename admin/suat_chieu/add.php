<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">THÊM MỚI SUẤT CHIẾU</h5>
                    <!-- Vertical Form -->
                    <form class="row g-3" action="index.php?act=them_moi_suat_chieu" method="post">
                        <div class="col-12">
                            <label for="" class="form-label">Ngày chiếu</label>
                            <select  name="ngay_chieu" class="form-control">
                                <option value="0">Chọn ngày chiếu</option>
                                <?php foreach ($ds_suat_chieu as $day) {
                                    extract($day);
                                    echo '
                                            <option value = "'.$id_date.'">'.$day.'/'.$month.'</option>
                                        ';
                                }  ?>
                            </select>
                            <span style="color: red"><?= isset($errLoai_phim) ? $errLoai_phim : '' ?></span>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Giờ chiếu</label>
                            <select  name="gio_chieu" class="form-control">
                                <option value="0">Chọn giờ chiếu</option>
                                <?php foreach ($ds_suat_chieu as $time) {
                                    extract($time);
                                    echo '
                                            <option value = "'.$id_time.'">'.$time.'</option>
                                        ';
                                }  ?>
                            </select>
                            <span style="color: red"><?= isset($errLoai_phim) ? $errLoai_phim : '' ?></span>
                        </div>
                        <div class="mt-4">
                            <input type="submit" class="btn btn-primary" value = "Thêm mới">
                            <button type="reset" class="btn btn-outline-success">Reset</button>
                            <a class="btn btn-outline-success" href="index.php?act=danh_sach_suat_chieu">Danh sách</a>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
    </section>
</main>