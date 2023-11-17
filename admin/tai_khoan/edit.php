
<?php
if (is_array($tai_khoan)) {
    extract($tai_khoan);
}
?>
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">THÊM MỚI TÀI KHOẢN</h5>
                        <form class="row g-3" action="index.php?act=update_user" method="post">
                            <input type="hidden" name="id_user" value="<?=$id_user?>" >
                            <div class="col-12">
                                <label for="" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" name="name" value="<?=$username?>" >
                                <span style="color: red"><?= isset($errUser) ? $errUser : '' ?></span>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="<?=$email?>">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" value="<?=$address?>" >
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control" name="tel" value="<?=$number_phone?>" >
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" value="<?=$password?>" >
                                <span style="color: red"><?= isset($errPass) ? $errPass : '' ?></span>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Vai trò</label>
                                <input type="number"  min="0" max="1" class="form-control" name="role" value="<?=$role?>" >
                            </div>
                            <div class="mt-4">
                                <input type="submit" class="btn btn-primary" name="cap_nhat" value = "Cập nhật">
                                <button type="reset" class="btn btn-outline-success">Reset</button>
                                <a class="btn btn-outline-success" href="index.php?act=danh_sach_tai_khoan">Danh sách</a>
                                <a class="btn btn-outline-success" href="index.php?act=them_moi_tai_khoan">Thêm mới</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>