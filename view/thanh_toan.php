<?php
if (isset($_SESSION['ticket'])) {
    foreach ($_SESSION['ticket'] as $ve) {
        extract($ve);
        $get_film_name = get_film_name_by_id($id_phim);
        $get_date = get_date_by_id($id_date);
        $suat_chieu = $time;
        $ghe_ngoi = $seat;
        $tong_tien = $price;
    }
}
extract($get_film_name);
foreach ($get_date as $d) {
    extract($d);
}
if (isset($_POST['apply_voucher']) && !empty($_POST['voucher_name'])) {
    $voucher_name = $_POST['voucher_name'];
    $get_voucher = get_voucher($voucher_name);
    extract($get_voucher);
}
?>
<div class="container">
    <div class="row justify-content-around">
        <div class="col-7">
            <div class="row custom-bg rounded p-4">
                <h5 class="text-white mb-4">Thông tin phim</h5>
                <div class="col-12">
                    <p class="text-white m-0 fs-5">Phim</p>
                    <h5 class="text-white mb-4"><?= $film_name ?></h5>
                </div>
                <div class="col-6">
                    <p class="text-white m-0 fs-5">Suất chiếu</p>
                    <h5 class="text-white mb-4"><?= $suat_chieu ?> / <?= $date_month ?></h5>

                </div>
                <div class="col-6">
                    <p class="text-white m-0 fs-5">Ghế ngồi</p>
                    <h5 class="text-white mb-4"><?= $ghe_ngoi ?></h5>
                </div>
            </div>
            <div class="row custom-bg rounded p-4 mt-4 ">
                <div class="col-12">
                    <h5 class="text-white ">Thông tin thanh toán</h5>
                </div>

                <div class="col-12 rounded border my-3 p-0">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3 text-white text-sm">Danh mục</th>
                                <th scope="col" class="py-3 text-white text-sm">Số lượng</th>
                                <th scope="col" class="py-3 text-white text-sm">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-style:none">
                                <td class="py-3 text-white text-sm pl-4">Ghế(<?= $ghe_ngoi ?>)</td>
                                <td class="py-3 text-white text-sm">
                                    <?php 
                                    $arraySeat = explode(", ", $seat);
                                    $pattern = '/^([A-Za-z]+)(\d+)$/';
                                    echo count($arraySeat);
                                    ?>
                                </td>
                                <td class="py-3 text-white text-sm"><?= $price ?>.000đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-4 custom-bg rounded p-3">
            <div class="col-12 py-3 px-5">
                <h5 class="text-white">Voucher:</h5>
                <!-- <p class="text-white m-0 fs-5 ">Voucher:</p> -->
                <form action="" method="post">
                    <input class="py-1 px-3 rounded" type="text" name="voucher_name" placeholder="Nhập mã voucher">
                    <input class="btn btn-primary py-1 px-3 mx-1 rounded-pill" type="submit" name="apply_voucher" value="Áp mã">
                </form>
            </div>
            <div class="row">
                <form action="index.php?act=thanh_toan_submit" method="post">
                    <div class="col-12 py-3 px-5 ">
                        <h5 class="text-white pb-3">Phương thức thanh toán:</h5>
                        <input type="radio" name="pttt" value="1" id="" checked> Tiền mặt<br>
                        <input type="radio" name="pttt" value="2" id=""> Ví điện tử<br>
                        <input type="radio" name="pttt" value="3" id=""> Chuyển khoản<br>
                        <input type="radio" name="pttt" value="4" id=""> Thanh toán online<br>
                    </div>
                    <div class="col-12 py-3 px-5">
                        <h5 class="text-white ">Tổng thanh toán: <?= !empty($_POST['voucher_name']) ? $price -= $price * $value : $price ?>.000đ</h5>
                        <div class="col-12 text-center">
                                <input type="hidden" name="film_name" value="<?= $film_name ?>">
                                <input type="hidden" name="suat_chieu" value="<?= $suat_chieu ?>">
                                <input type="hidden" name="date_month" value="<?= $date_month ?>">
                                <input type="hidden" name="ghe_ngoi" value="<?= $ghe_ngoi ?>">
                                <input type="hidden" name="total" value="<?= $price ?>">
                            <?php if(isset($_SESSION['user'])) {
                                echo '<input class="btn btn-primary py-2 px-5 mt-2 mx-1 rounded-pill" name="payment" type="submit" value="Thanh toán">';
                            } else {
                                echo '<a class="btn btn-danger py-2 px-5 mt-2 mx-1 rounded-pill" href="index.php?act=dang_nhap">Đăng nhập để thanh toán</a>';
                            } ?>

                                <!-- <input class="btn btn-primary py-2 px-5 mt-2 mx-1 rounded-pill" name="return" type="submit" value="Quay lại"> -->
                                <a class="btn text-white py-2 px-5 mt-2 mx-1 rounded-pill" href="<?= $_SESSION['get_link'] ?>">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>