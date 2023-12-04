<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">DANH SÁCH LOẠI VÉ</h5>
                <table class="table table-light text-center">
                    <tr>
                        <th>Mã loại vé</th>
                        <th>Loại vé</th>
                        <th>Giá</th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($ds_loai_ve as $ds) {
                        extract($ds);

                        $delete = "index.php?act=delete_loai_ve&id_loaive=" . $id_loaive;
                        $edit = "index.php?act=edit_loai_ve&id_loaive=" . $id_loaive;

                        echo "
                                <tr>
                                    <td>$id_loaive </td>
                                    <td>$dinh_dang_ve</td>
                                    <td>$price.000</td>
                                    <td>
                                        <a class='btn btn-primary'  href='$edit'>Sửa</a>
                                        <button class='btn btn-outline-danger' type='button' onclick=\"if (confirm('Bạn có chắc muốn xóa ?')) window.location.href='$delete'\">Xóa</button>
                                    </td>
                                </tr>
                            ";
                    }

                    ?>
                </table>
                <a class="btn btn-outline-primary" href="index.php?act=them_moi_loai_ve">Thêm mới ve</a>
            </div>
    </section>
</main>