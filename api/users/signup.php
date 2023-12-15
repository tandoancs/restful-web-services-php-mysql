<?php

// get database connection
include_once '../config/database.php';

// instantiate user object
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// set user property values
$user->fullname = trim($_POST['fullname']);
$user->username = trim($_POST['username']);
$user->password = base64_encode($_POST['password']);
$user->password = base64_encode($_POST['password_conf']);
$user->email = trim($_POST['email']);
$user->phone_number = trim($_POST['phone_number']);
$user->gender = trim($_POST['gender']);
$user->created = date('Y-m-d H:i:s');

// create the user
if ($user->signup()) {
    $user_arr = array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $user->id,
        "username" => $user->username
    );
} else {
    $user_arr = array(
        "status" => false,
        "message" => "Username already exists!"
    );
}
print_r(json_encode($user_arr));
