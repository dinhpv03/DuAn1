<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">CHI TIẾT VÉ PHIM</h5>
                <table class="table table-light text-center">
                    <tr>
                        <th>Mã</th>
                        <th>Mã vé</th>
                        <th>Tên người dùng</th>
                        <th>Tên phim</th>
                        <th>Giờ chiếu</th>
                        <th>Ngày chiếu</th>
                        <th>Ghế ngồi</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức thanh toán</th>
                    </tr>

                    <?php
                    foreach ($chi_tiet_ve_phim as $chi_tiet):
                        extract($chi_tiet);
                        ?>
                            <tr>
                                <td><?php echo $id_chitietvephim ?> </td>
                                <td><?php echo $ma_ve ?></td>
                                <td><?php echo $username ?> </td>
                                <td><?php echo $film_name ?> </td>
                                <td><?php echo $showtime ?> </td>
                                <td><?php echo $date ?></td>
                                <td><?php echo $ghe_ngoi ?></td>
                                <td><?php echo $total ?>.000đ</td>
                                <td>
                                    <?php
                                    if ($pttt == 1) {
                                        echo 'Tiền mặt';
                                    } elseif ($pttt == 2) {
                                        echo 'Ví điện tử';
                                    } elseif ($pttt == 3) {
                                        echo 'Chuyển khoản';
                                    } elseif ($pttt == 4) {
                                        echo 'Thanh toán online';
                                    } else {
                                        echo 'Không xác định';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                <a class="btn btn-outline-primary" href="index.php?act=danh_sach_ve_phim">Danh sách vé phim</a>
            </div>
        </div>
    </section>
</main>