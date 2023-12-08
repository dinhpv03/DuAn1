<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">DANH SÁCH VÉ PHIM</h5>
                <table class="table table-light text-center">
                    <tr>
                        <th>Mã</th>
                        <th>Mã ngày</th>
                        <th>Giờ chiếu</th>
                        <th>Mã phim</th>
                        <th>Tên người dùng</th>
                        <th>Giá</th>
                        <th>Ghế</th>
                        <th>Mã chi tiết vé phim</th>
                        <th>Hành động</th>
                    </tr>

                    <?php
                    foreach ($ds_ve_phim as $ds) {
                        extract($ds);

                        $chi_tiet = "index.php?act=chi_tiet_ve&id_chitietvephim=" . $id_chitietvephim;

                        echo "
                            <tr>
                                <td>$id_vephim</td>
                                <td>$id_date </td>
                                <td>$time</td>
                                <td>$id_phim </td>
                                <td>$username </td>
                                <td>$price</td>
                                <td>$seat</td>
                                <td>$id_chitietvephim </td>
                                <td>
                                    <a class='btn btn-primary'  href='$chi_tiet'>Xem chi tiết</a>
                                </td>
                            </tr>
                        ";
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
</main>