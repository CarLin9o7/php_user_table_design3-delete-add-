<?php
require_once('../connection.php');
require_once('../classes/User.php');
$user = new User($connect);

if(isset($_POST['save_btn'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $user_address = $_POST['user_address'];

    $result = $user->addUser($first_name, $last_name, $email, $gender, $user_address);

    header("Location: ../index.php");
}
if(isset($_POST['delete_btn'])){
    $user_id = $_POST['user_id'];
    $user->deleteUser($user_id);

    header("Location: ../index.php");
}
?>