<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center" >THÊM MỚI PHIM</h5>
                        <form class="row g-3" action="index.php?act=them_moi_phim" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="" class="form-label">Tên phim</label>
                                <input type="text" class="form-control" name="name" placeholder="Film name">
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
                                <input type="text" class="form-control" name="thoi_luong_phim" placeholder="Movie duration">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Ngày phát hành</label>
                                <input type="text" class="form-control" name="ngay_phat_hanh" placeholder="Release date">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Mô tả</label>
                                <textarea type="text" class="form-control" name="mo_ta" placeholder="Description"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Suất chiếu</label>
                                <select name="id_suat_chieu" class="form-control">
                                    <option value="0">Chọn suất chiếu</option>
                                    <?php foreach ($ds_suat_chieu as $ds) {
                                        extract($ds);
                                        echo '
                                            <option value ="'.$id_suatchieu.'">Ngày '.$day.' / '.$month.' , '.$time.'</option>
                                        ';
                                    } ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Loại phim</label>
                                <select  name="id_loai_phim" class="form-control">
                                    <option value="0">Chọn thể loại phim</option>
                                    <?php foreach ($ds_loai_phim as $ds) {
                                        extract($ds);
                                        echo '
                                            <option value = "'.$id_loaiphim.'">'.$the_loai_phim.'</option>
                                        ';
                                    }  ?>
                                </select>
                            </div>
                            <div class="mt-4">
                                <input type="submit" class="btn btn-primary" name="them_moi" value = "Thêm mới">
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