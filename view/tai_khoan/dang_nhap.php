<?php 
    // session_start();
    if (isset($_POST['dang_nhap'])) {
        $_SESSION['notification'] = true;
    }
?>
<div class="shadow p-3 mb-5 bg-white rounded mt-5">
    <h5 class="text-center text-dark mt-5">Đăng nhập</h5>
    <div class="row ">
        <div class="col-4">
        </div>
        <div class="col-lg-4 col-md-12 wow shadow p-3 mb-5 bg-white rounded">
            <form action="index.php?act=dang_nhap" method="post">
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" placeholder="Tên đăng nhập" >
                            <label for="name">Tên đăng nhập</label>
                            <span style="color: red"><?= isset($errUser) ? $errUser : '' ?></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="email" name="password" placeholder="Mật khẩu" required>
                            <label for="password">Mật khẩu</label>
                            <span style="color: red"><?= isset($errPass) ? $errPass : '' ?></span>
                        </div>
                    </div>

                    <div class="col-md-12 text-lg-end">
                        <p class=""><a href="index.php?act=quen_mat_khau">Quên mật khẩu?</a></p>
                    </div>

                    <div class="col-12">
                        <input class="btn btn-primary w-100 py-3" id="showButton" type="submit" name="dang_nhap" value="Đăng nhập">
                    </div>
                </div>
            </form>
            <div class="text-center mt-3 mb-3">
                <p>Bạn chưa có tài khoản? <a style="text-decoration: none" href="index.php?act=dang_ky">Đăng ký</a></p>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var showButton = document.getElementById("showButton");
        var notification = document.getElementById("notification");

        // Hiển thị thông báo khi tải lại trang
        // notification.classList.add("showSuccess");
        // setTimeout(function() {
        //     notification.classList.remove("showSuccess");
        // }, 3000);

        // showButton.addEventListener("click", function() {
        //     notification.classList.add("showSuccess");
        //     setTimeout(function() {
        //         notification.classList.remove("showSuccess");
        //     }, 3000);
        // });
    });
</script>