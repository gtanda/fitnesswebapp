<?php
require_once ('db.php');

// Index
function join_user($username, $password, $email) {
    global $conn;

    $date = date('Ymd');
    $query = "INSERT INTO user_project VALUES (NULL, '$username', '$password', '$email', $date)";
    return mysqli_query($conn,$query);
}

function username_taken($username) {
    global $conn;

    $query = "SELECT u_username FROM user_project WHERE u_username = '$username'";
    $result = mysqli_query($conn,$query);
    return mysqli_num_rows($result) > 0;
}

function valid_user($username, $password) {
    global $conn;

    $query = "SELECT u_username, u_password FROM user_project WHERE u_username = '$username' AND u_password = '$password'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;
}

function get_user_id($username) {
    global $conn;

    $query = "SELECT u_id FROM user_project WHERE u_username = '$username'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        return $row['u_id'];
    }
    return -1;
}

