<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">DANH SÁCH GHẾ</h5>
                <table class="table table-light text-center">
                    <tr>
                        <th>Mã</th>
                        <th>Ngày</th>
                        <th>Phim</th>
                        <th>STT</th>
                    </tr>

                    <?php
                    foreach ($ds_date as $ds) {
                        extract($ds);


                        echo "
                            <tr>
                                <td>$id_date  </td>
                                <td>$date_month</td>
                                <td>$film_name </td>
                                <td>$stt</td>
                            </tr>
                        ";
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
</main>