<?php
require_once 'models/DB.php'; 
require_once 'models/User.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($username, $password);

    if ($user->exists()) {
        echo "<div class='alert alert-danger' role='alert'>Username already exists!</div>";
    } else {
        if ($user->save()) {
            echo "<div class='alert alert-success' role='alert'>User registered successfully!</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error registering user.</div>";
        }
    }
}