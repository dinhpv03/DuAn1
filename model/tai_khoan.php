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


function insert_taikhoan_admin($name,$email,$address,$number_phone,$password,$role) {
    $sql = "INSERT INTO user (username, email,address, number_phone, password, role) 
            VALUES ('$name','$email','$address', $number_phone, '$password', $role)";
//    var_dump($sql);
//    die;
    pdo_execute($sql);
}

function delete_tai_khoan($id_user)    {
    $sql = "DELETE  FROM user WHERE id_user =" . $_GET['id_user'];
    pdo_execute($sql);
}

function load_one_tai_khoan($id_user)   {
    $sql = "SELECT * FROM user WHERE id_user =" . $id_user;
    $tk = pdo_query_one($sql);
    return $tk;
}

function update_tai_khoan_admin($id_user,$user,$pass,$email,$address,$number_phone, $role)  {
    $sql = "UPDATE user 
            SET email = '".$email."',
            username = '".$user."',
            password = '".$pass."',
            address = '".$address."',
            number_phone = '".$number_phone."',
            role = '".$role."'
            WHERE id_user =" . $id_user;
    pdo_execute($sql);
}
