<?php
    session_name("admin_session");
    session_start();

    $errUser = $errPass = $errRole = null; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include "../model/pdo.php";

        $username = $_POST['username'];
        $password = $_POST['password'];


        if (empty($username)) {
            $errUser = '*Vui lòng nhập tên đăng nhập';
        }


        if (empty($password)) {
            $errPass = '*Vui lòng nhập mật khẩu';
        }

        if (empty($errUser) && empty($errPass)) {
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = pdo_query_one($query);

            if ($result) {
                if ($password == $result['password'] && $username == $result['username'] && $result['role'] == 1) {
                    $_SESSION['login_success'] = true;
                    header('Location: index.php');
                    exit(); 
                } else {
                    $_SESSION['login_success'] = false;
                    $errRole = 'Bạn không phải là admin';
                }
            } else {
                $_SESSION['login_success'] = false;
                $errRole = 'Tài khoản hoặc mật khẩu không chính xác';
            }
        }
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/836af14c7c.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="style/img/movie.webp" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method = 'post'>
                                        <div class="align-items-center mb-3 pb-1">
                                            <div>
                                                <p class="h1 fw-bold mb-0 text-muted">Nature Cinema</p>
                                            </div>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập vào tài khoản của bạn</h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label">Tên đăng nhập</label>
                                            <input type="text" name="username" class="form-control form-control-lg" />
                                            <span style="color: red"><?= isset($errUser) ? $errUser : '' ?></span>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label">Mật khẩu</label>
                                            <input type="password" name="password" class="form-control form-control-lg" />
                                            <span style="color: red"><?= isset($errPass) ? $errPass : '' ?></span> 
                                        </div>

                                        <div>
                                            <p style="color: red"><?= isset($errRole) ? $errRole : '' ?></p>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Đăng nhập</button>
                                        </div>

                                        <a href="/index.php" class="text-decoration-none">
                                        <i class="fa-regular fa-hand-point-right"></i><span class="mb-5 pb-lg-2" style="color: #393f81;"> Quay lại trang User!</span>
                                        </a>
                                        <!-- <a href="#!" class="small text-muted">Điều khoản sử dụng</a>
                                        <a href="#!" class="small text-muted">Chính sách bảo mật</a> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>