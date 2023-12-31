<?php
    if ($_SESSION['user']) {
        $id_user = $_SESSION['user']['id_user'];
        $get_chi_tiet_ve_phim = chi_tiet_ve_phim_by_user($id_user);
    }
?>
<div class = "shadow p-3 mb-5 bg-dark">
    <h5 class = "text-center text-white">Thông tin cá nhân</h5>
    <div class="text-center m-5 ">
        <a class="btn btn-outline-light rounded mx-1"  href="index.php?act=thong_tin_tai_khoan">Tài khoản của tôi</a>
        <a class="btn btn-outline-light rounded mx-1"  href="index.php?act=lich_su_mua_ve">Lịch sử mua vé</a>
        <!-- <a class="btn btn-outline-light"  href="index.php?act=lich_su_diem_thuong">Lịch sử điểm thưởng</a> -->
    </div>
    <?php if ($_SERVER['REQUEST_URI'] == '/index.php?act=thong_tin_tai_khoan') : ?>
    <div class = "row ">
        <div class = "col-2">
        </div>
        <div class="col-lg-8 col-md-12 wow p-3 mb-5 bg-dark rounded">
            <form action="index.php?act=thong_tin_tai_khoan" method="post">
                <input type="hidden" name="iduser" value="<?= "$id_user" ?>">
                <?php
                    if(isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                    }
                ?>
                <div class="row g-3 text-dark ">
                    <div class="col-md-6 rounded ">
                        <label class="text-light mb-1" for="name">Tên</label>
                        <div class="form-floating">
                            <input type="text" class="form-control bg-dark text-white-50"  disabled name="name" value="<?="$username"?>">
                            <span style="color: red"><?= isset($errUser) ? $errUser : '' ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-light mb-1" for="email">Email</label>
                        <div class="form-floating">
                            <input type="email" class="form-control bg-dark text-light"  placeholder="Email" name="email" value="<?="$email"?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-light mb-1" for="tel">Số điện thoại</label>
                        <div class="form-floating">
                            <input type=tel class="form-control bg-dark text-light"  placeholder="Số điện thoại" name="tel" value="<?="$number_phone"?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-light mb-1" for="address">Địa chỉ</label>
                        <div class="form-floating">
                            <input type="text" class="form-control bg-dark text-light" placeholder="" name="address" value="<?="$address"?>">
                        </div>
                    </div>

                    <div class="col-6">
                        <input class="btn btn-primary w-100 py-3" type="submit" name="cap_nhat" value="Cập nhật tài khoản">
                    </div>
                    <div class="col-6">
                        <input class="btn btn-outline-light w-100 py-3" type="submit" name="doi_mat_khau" value="Đổi mật khẩu">
                    </div>

                    <?php if($role == 1) { ?>
                        <div class="col-6">
                            <a class="btn btn-outline-light w-100 py-3" href="../../admin/index.php">Đăng nhập vào admin</a>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="text-center text-danger m-4">
                    <?php
                    if(isset($thongbao)) {
                        echo $thongbao;
                    };
                    ?>
                </div>
            </form>
        </div>
    </div>
    <?php else : ?>
        <div class="row">
            <div class="col-12 rounded border my-3 p-0">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <!-- <th class="py-3 text-white text-sm">STT</th> -->
                            <th scope="col" class="py-3 text-white text-sm">Ngày giao dịch</th>
                            <th scope="col" class="py-3 text-white text-sm">Tên phim</th>
                            <th scope="col" class="py-3 text-white text-sm">Mã vé</th>
                            <th scope="col" class="py-3 text-white text-sm">Ngày chiếu</th>
                            <th scope="col" class="py-3 text-white text-sm">Giờ chiếu</th>
                            <th scope="col" class="py-3 text-white text-sm">Chỗ ngồi</th>
                            <th scope="col" class="py-3 text-white text-sm">Số tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($get_chi_tiet_ve_phim)) : ?>
                            <?php foreach ($get_chi_tiet_ve_phim as $ve) : extract($ve)?>
                            <tr style="border-top: 1px solid white;">
                                <td class="py-3 text-white text-sm"><?= $ngay_giao_dich ?></td>
                                <td class="py-3 text-white text-sm"><?= $film_name ?></td>
                                <td class="py-3 text-white text-sm"><?= $ma_ve ?></td>
                                <td class="py-3 text-white text-sm"><?= $date ?></td>
                                <td class="py-3 text-white text-sm"><?= $showtime ?></td>
                                <td class="py-3 text-white text-sm"><?= $ghe_ngoi ?></td>
                                <td class="py-3 text-white text-sm"><?= $total ?>.000 đ</td>
                            </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td class="text-center py-5 fs-5" colspan="7">Không có dữ liệu</td>
                            </tr>
                            <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>
</div>