<?php
session_start();
include "../model/pdo.php";
include "../model/binh_luan.php";

$id_movie = $_REQUEST['id_movie'];
$dsbl = load_all_binhluan($id_movie);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/css.css">
    <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <div class="mb">
        <div class="box_title mt-3 text-dark fs-5 mb-2">ĐÁNH GIÁ BỘ PHIM</div>
        <div>
            <div class="list-group">
                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '
                                <div class="col-md-12">
                                    <div class="card p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user d-flex flex-row align-items-center">
                                                <span>
                                                    <p class="h6" style="color: blue">' . $user . '</p>
                                                    <small class="text-dark ">' . $noi_dung . '</small>
                                                </span>
                                            </div>
                                            <small>' . $ngay_binh_luan . '</small>
                                        </div>
                                    </div>
                                </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['user'])) {
        if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
            $noi_dung = $_POST['noi_dung'];
            $id_phim = $_POST['id_movie'];
            $user_name = $_SESSION['user']['username'];
            $iduser = $_SESSION['user']['id_user'];
            $ngay_binh_luan = date('d-m-Y');

            insert_binhluan($noi_dung, $user_name, $iduser, $id_phim, $ngay_binh_luan);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    ?>
        <div class="row">
            <div class="col-4">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <input type="hidden" name="id_movie" value="<?= $id_movie ?>">
                    <div class="mb-3">
                        <textarea type="text" name="noi_dung" class="form-control " placeholder=" Nhập bình luận ở đây!" required></textarea> <br>
                        <input class="btn btn-outline-success" type="submit" name="guibinhluan" value="Gửi bình luận">
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    <?php } else { ?>
        <p class="text-lg-center alert text-danger">Vui lòng đăng nhập để bình luận</p>
    <?php } ?>
    <!-- </div> -->
</body>

</html>