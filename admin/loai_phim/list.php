<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">DANH SÁCH LOẠI PHIM</h5>
                <table class="table table-light text-center">
                    <tr>
                        <th>Mã loại phim</th>
                        <th>Số thứ tự</th>
                        <th>Tên loại phim</th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($ds_loai_phim as $ds) {
                        extract($ds);

                        $delete = "index.php?act=edit_loai_phim&id_loaiphim=" . $id_loaiphim;
                        $edit = "index.php?act=edit_loai_phim&id_loaiphim=" . $id_loaiphim;

                        echo "
                                <tr>
                                    <td>$id_loaiphim</td>
                                    <td>$STT</td>
                                    <td>$loai_phim</td>
                                    <td>
                                        <a class='btn btn-primary' href='$edit'>Sửa</a>
                                        <button class='btn btn-outline-danger' type='button' onclick=\"if (confirm('Bạn có chắc muốn xóa ?')) window.location.href='$delete'\">Xóa</button>
                                    </td>
                                </tr>
                            ";
                    }

                    ?>
                </table>   
            </div>
    </section>
</main>