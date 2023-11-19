<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="card-title text-center">DANH SÁCH TÀI KHOẢN</h5>
                <table class="table table-light text-center">
                    <tr>
                        <th>Mã</th>
                        <th>Tên tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>  
                        <th>Vai trò</th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($ds_tai_khoan as $ds) {
                        extract($ds);

                        $delete_user = "index.php?act=delete_user&id_user=" . $id_user;
                        $edit_user = "index.php?act=edit_user&id_user=" . $id_user;

                        echo "
                                <tr>
                                    <td>$id_user</td>
                                    <td>$username</td>
                                    <td>$password</td>
                                    <td>$email</td>
                                    <td>$address</td>
                                    <td>$number_phone</td>
                                    <td>$role</td>
                                    <td>
                                        <a class='btn btn-primary'  href='$edit_user'>Sửa</a>
                                        <button class='btn btn-outline-danger' type='button' onclick=\"if (confirm('Bạn có chắc muốn xóa ?')) window.location.href='$delete_user'\">Xóa</button>
                                    </td>
                                </tr>
                            ";
                        }
                    ?>
                </table>
                <a class="btn btn-outline-primary" href="index.php?act=them_moi_tai_khoan">Thêm mới tài khoản</a>
            </div>
        </div>
    </section>
</main>