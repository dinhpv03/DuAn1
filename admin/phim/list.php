<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">DANH SÁCH PHIM</h5>
                <table class="table table-light text-center">
                    <tr>
                        <th>Mã</th>
                        <th>Tên phim</th>
                        <th>Poster</th>
                        <th>Banner</th>
                        <th>Thời lượng phim</th>
                        <th>Ngày phát hành</th>
                        <th>Suất chiếu</th>
                        <th>Giờ chiếu</th>
                        <th>Thể loại</th>
                        <th></th>
                    </tr>

                    <?php
                        foreach ($ds_phim as $ds) {
                            extract($ds);
//                            var_dump($ds);
//                            die;

                            $delete = "index.php?act=delete_phim&id_phim=" . $id_phim;
                            $edit = "index.php?act=edit_phim&id_phim=" . $id_phim;

                            $imagePath = './upload/' . $poster;
                            if(is_file($imagePath)) {
                                $poster = "<img src = '".$imagePath."' height = '80'>";
                            } else {
                                $poster = "Không có ảnh poster.";
                            }

                            $imagePath = './upload/' . $banner;
                            if(is_file($imagePath)) {
                                $banner = "<img src = '".$imagePath."' height = '80'>";
                            } else {
                                $banner = "Không có ảnh banner.";
                            }

                            echo "
                                <tr>
                                    <td>$id_phim</td>
                                    <td>$film_name</td>
                                    <td>$poster</td>
                                    <td>$banner</td>
                                    <td>$thoi_luong_phim</td>
                                    <td>$release_date</td>
                                    <td>Ngày $day/$month</td>
                                    <td>$time</td>
                                    <td>$the_loai_phim</td>
                                    <td>
                                        <a class='btn btn-primary'  href='$edit'>Sửa</a>
                                        <button class='btn btn-outline-danger' type='button' onclick=\"if (confirm('Bạn có chắc muốn xóa ?')) window.location.href='$delete'\">Xóa</button>
                                    </td>
                                </tr>                                
                            ";
                        }
                    ?>
                </table>
                <a class="btn btn-outline-primary" href="index.php?act=them_moi_phim">Thêm mới phim</a>
            </div>
        </div>
    </section>
</main>