<?php

function insert_tai_khoan($email,$user,$pass,$address,$number_phone)
{
    $sql = "INSERT INTO user (email, username, password, address,number_phone) 
            VALUES ('$email','$user','$pass','$address','$number_phone')";
    pdo_execute($sql);
}

function check_user($user, $pass)   {
    $sql = "SELECT * FROM user WHERE username = '".$user."' AND password = '".$pass."'";
    $check = pdo_query_one($sql);
    return $check;
}

function check_email($email)   {
    $sql = "SELECT * FROM user WHERE email='".$email."'";
    $email = pdo_query_one($sql);
    return $email;
}

function update_taikhoan($iduser,$email,$user,$address,$number_phone)  {
    $sql = "UPDATE user 
            SET email = '".$email."',
            username = '".$user."',
            address = '".$address."',
            number_phone = '".$number_phone."'  
            WHERE id_user = " . $iduser;
    pdo_execute($sql);
}

function load_all_tai_khoan() {
    $sql = "SELECT * FROM user;";
    $list = pdo_query($sql);
    return $list;
}
