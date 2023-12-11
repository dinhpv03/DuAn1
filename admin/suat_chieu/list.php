<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">DANH SÁCH SUẤT CHIẾU</h5>
                <table class="table table-light text-center">
                    <tr>
                        <th>Mã suất chiếu</th>
                        <th>Ngày chiếu</th>
                        <th>Giờ chiếu</th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($ds_suat_chieu as $ds) {
                        extract($ds);
//                        var_dump($ds);
//                        die;
                        echo '<tr>';
                        echo '<td>' . $id_suatchieu . '</td>';
                        echo '<td>' . $day . ' / ' . $month . '</td>';
                        echo '<td>' . $time . '</td>';
                        echo '<td>
                                   <a class="btn btn-primary" href="">Xóa</a>
                              </td>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
</main>
