<div class = "shadow p-3 mb-5 bg-dark rounded">
    <h5 class = "text-center text-white">Thông tin tài khoản</h5>
    <div class="text-center m-5 ">
        <a class="btn btn-outline-light"  href="index.php?act=thong_tin_tai_khoan">Tài khoản của tôi</a>
        <a class="btn btn-outline-light"  href="index.php?act=lich_su_mua_ve">Lịch sử mua vé</a>
        <a class="btn btn-outline-light"  href="index.php?act=lich_su_diem_thuong">Lịch sử điểm thưởng</a>
    </div>
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
                <div class="row g-3 text-dark">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-dark text-light"  placeholder="Tên đăng nhập" name="name" value="<?="$username"?>">
                            <span style="color: red"><?= isset($errUser) ? $errUser : '' ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control bg-dark text-light"  placeholder="Email" name="email" value="<?="$email"?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type=tel class="form-control bg-dark text-light"  placeholder="Số điện thoại" name="tel" value="<?="$number_phone"?>">
                        </div>
                    </div>
                    <div class="col-md-6">
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
                            <a class="btn btn-outline-light w-100 py-3" href="../../du-an-1/admin/index.php">Đăng nhập vào admin</a>
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
</div>