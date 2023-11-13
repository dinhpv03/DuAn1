<div class = "shadow p-3 mb-5 bg-white rounded mt-5">
    <div class = "">
        <h5 class = "text-center text-dark mt-5">Quên mật khẩu</h5>
        <div class="text-center text-danger m-4">
            <?php
            if(isset($thongbao)) {
                echo $thongbao;
            };
            ?>
        </div>
        <div class = "row">
            <div class = "col-4">
            </div>
            <div class="col-lg-4 col-md-12 wow shadow p-3 mb-5 mt-3 bg-white rounded">
                <form action="#" method="post">
                    <div class="row g-3">
                        <div class="col-md-12">
                        <p class="text-center text-dark">Vui lòng nhập địa chỉ Email của bạn vào ô bên dưới. Bạn sẽ nhận được một liên kết để đặt lại mật khẩu của mình.</p>
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" placeholder="">
                                <label for="email">Nhập email ở đây</label>
                                <span style="color: red"><?= isset($errEmail) ? $errEmail : '' ?></span>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <input class="btn btn-primary w-100 py-3" type="submit" name="quen_mat_khau" value="Xác nhận">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>