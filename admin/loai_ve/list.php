<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">DANH SÁCH LOẠI VÉ</h5>
                <table class="table table-light text-center">
                    <tr>
                        <th>Mã loại vé</th>
                        <th>Loại vé</th>
                        <th>Loại ghế</th>
                        <th>Giá</th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($ds_loai_ve as $ds) {
                        extract($ds);

//                        $delete = "index.php?act=edit_loai_phim&id_loaiphim=" . $id_loaiphim;
//                        $edit = "index.php?act=edit_loai_phim&id_loaiphim=" . $id_loaiphim;

                        echo "
                                <tr>
                                    <td>$id_bienthevephim</td>
                                    <td>$loai_ve</td>
                                    <td>$loai_ghe</td>
                                    <td>$price</td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            ";
                    }

                    ?>
                </table>
            </div>
    </section>
</main>