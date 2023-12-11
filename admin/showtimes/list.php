<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">DANH SÁCH GIỜ CHIẾU</h5>
                <table class="table table-light text-center">
                    <tr>
                        <th>Mã</th>
                        <th>Giờ</th>
                        <th>Ngày</th>
                        <th>Phim</th>
                    </tr>

                    <?php
                    foreach ($ds_showtime as $ds) {
                        extract($ds);

                        echo "
                            <tr>
                                <td>$id_showtimes  </td>
                                <td>$time</td>
                                <td>$date_month</td>
                                <td>$film_name  </td>
                            </tr>
                        ";
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
</main>