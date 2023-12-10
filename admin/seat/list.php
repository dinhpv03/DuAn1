<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">DANH SÁCH GHẾ</h5>
                <table class="table table-light text-center">
                    <tr>
                        <th>Mã</th>
                        <th>Ghế ngồi</th>
                        <th>Trạng thái</th>
                        <th>Loại vé</th>
                    </tr>

                    <?php
                    foreach ($ds_ghe as $ds) {
                        extract($ds);


                        echo "
                            <tr>
                                <td>$id_seat </td>
                                <td>$seat_name$stt</td>
                                <td>$status</td>
                                <td>$dinh_dang_ve </td>
                            </tr>
                        ";
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
</main>