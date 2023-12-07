<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">DANH SÁCH BÌNH LUẬN</h5>
                <table class="table table-light">
                    <tr>
                        <th></th>
                        <th>Mã bình luận</th>
                        <th>Nội dung</th>
                        <th>ID người bình luận</th>
                        <th>Người bình luận</th>
                        <th>ID phim</th>
                        <th>Ngày bình luận</th>
                        <th>Hành động</th>
                    </tr>
                    <?php
                    if ($ds_binh_luan && is_array($ds_binh_luan)) {
                        foreach ($ds_binh_luan as $binhluan) {
                            extract($binhluan);

                            $xoabl = "index.php?act=delete_binh_luan&id_binhluan=" . $id_binhluan;

                            echo "
                                <tr>
                                <td></td>
                                    <td>$id_binhluan</td>
                                    <td>$noi_dung</td> 
                                    <td>$id_user</td> 
                                    <td>$user</td> 
                                    <td>$id_phim</td> 
                                    <td>$ngay_binh_luan</td> 
                                    <td>
                                        <button class='btn btn-outline-danger' type='button' onclick=\"if (confirm('Bạn có chắc muốn xóa ?')) window.location.href='$xoabl'\">Xóa</button>
                                    </td>
                                </tr>";
                        }
                    }
                    ?>

                </table>

            </div>
            <div>
                <button  id="selectAll" class="btn btn-outline-success" type="button">Chọn tất cả</button>
                <button  id="deselectAll" class="btn btn-outline-success" type="button">Bỏ chọn tất cả</button>
                <button class="btn btn-danger" type="button" onclick="if (confirm('Bạn có chắc muốn xóa tất cả bình luận ??'))window.location.href='index.php?act=deleteAll'">Xóa tất cả bình luận</button>
            </div>
        </div>
    </div>
    </section>
</main>>
