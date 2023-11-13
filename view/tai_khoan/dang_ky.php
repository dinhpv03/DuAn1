<div class = "shadow p-3 mb-5 bg-white rounded mt-5">
    <h5 class = "text-center text-dark mt-5">Đăng ký tài khoản</h5>
    <div class="text-center text-danger m-4">
        <?php
        if(isset($thongbao)) {
            echo $thongbao;
        };
        ?>
    </div>
    <div class = "row ">
        <div class = "col-4">
        </div>
        <div class="col-lg-4 col-md-12 wow shadow p-3 mb-5 bg-white rounded">
            <form action="#" method="post">
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" placeholder="Họ tên">
                            <label for="name">Họ tên</label>
                            <span style="color: red"><?= isset($errUser) ? $errUser : '' ?></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <label for="email">Email</label>
                            <span style="color: red"><?= isset($errEmail) ? $errEmail : '' ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="tel" placeholder="Số điện thoại">
                            <label for="tel">Số điện thoại</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                            <label for="email">Địa chỉ</label>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                            <label for="">Mật khẩu</label>
                            <span style="color: red"><?= isset($errPass) ? $errPass : '' ?></span>
                        </div>  
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="repassword" placeholder="Xác nhận mật khẩu">
                            <label for="">Xác nhận mật khẩu</label>
                            <span style="color: red"><?= isset($errRepass) ? $errRepass : '' ?></span>
                        </div>  
                    </div>
                    <div class="col-12">
                        <input class="btn btn-primary w-100 py-3" name="dang_ky" type="submit" value="Đăng ký">
                    </div>
                </div>
            </form>
            <div class="text-center mt-3">
                <p>Bạn đã có tài khoản? <a style="text-decoration: none" href="index.php?act=dang_nhap">Đăng nhập</a></p>
            </div>
        </div>
    </div>