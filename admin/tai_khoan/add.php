
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">THÊM MỚI TÀI KHOẢN</h5>
                        <form class="row g-3" action="index.php?act=them_moi_tai_khoan" method="post">
                            <div class="col-12">
                                <label for="" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" name="name" placeholder="Full name">
                                <span style="color: red"><?= isset($errUser) ? $errUser : '' ?></span>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <span style="color: red"><?= isset($errEmail) ? $errEmail : '' ?></span>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address">
                                    <span style="color: red"><?= isset($errAddress) ? $errAddress : '' ?></span>
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" name="tel" placeholder="Phone number">
                                    <span style="color: red"><?= isset($errPhone) ? $errPhone : '' ?></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <span style="color: red"><?= isset($errPass) ? $errPass : '' ?></span>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Vai trò</label>
                                <input name="role" class="form-control" type="number" placeholder="0 - User, 1 - Admin">

                                <span style="color: red"><?= isset($errRole) ? $errRole : '' ?></span>
                            </div>
                            <div class="mt-4">
                                <input type="submit" class="btn btn-primary" name="them_moi" value = " Thêm mới ">
                                <button type="reset" class="btn btn-outline-success">Reset</button>
                                <a class="btn btn-outline-success" href="index.php?act=danh_sach_tai_khoan">Danh sách</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </section>
</main>