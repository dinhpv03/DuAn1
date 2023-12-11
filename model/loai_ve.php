<?php
    function load_add_loai_ve() {
        $sql = "SELECT * FROM loai_ve";
        return pdo_query($sql);
    }

    function them_moi_loai_ve($loai_ve,$loai_ghe,$price) {
        $sql = "INSERT INTO loai_ve(dinh_dang_ve,hang_ghe,price) VALUES ('$loai_ve',$loai_ghe,$price)";
        pdo_execute($sql);
    }
    function delete_ve($id_loaive) {
        $sql = "DELETE FROM loai_ve WHERE id_loaive = ". $_GET['id_loaive'];
        pdo_execute($sql);
    }

    function load_one_loai_ve($id_loaive) {
        $sql = "SELECT * FROM loai_ve WHERE id_loaive = " .$id_loaive;
        return pdo_query_one($sql);
    }

    function update_loai_ve($loai_ve,$loai_ghe,$price,$id_loaive) {
        $sql = "UPDATE loai_ve 
                SET dinh_dang_ve = '$loai_ve',
                    hang_ghe = $loai_ghe, 
                    price = $price
                WHERE id_loaive = " .$id_loaive;
        pdo_execute($sql);
    }