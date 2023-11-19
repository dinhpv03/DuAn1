<?php
    function load_add_loai_ve() {
        $sql = "SELECT * FROM bien_the_ve_phim";
        return pdo_query($sql);
    }