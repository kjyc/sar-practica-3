<?php
if (isset($_POST['si-email'])) {
    $email = $_POST['si-email'];
    $password = $_POST['si-password'];
    $isValidUser = false;

    $users = simplexml_load_file('../../xml/Users.xml');
    foreach ($users->user as $user) {
        if ($user->email == $_POST['si-email']) {
            if ($user->password == hash("sha256", $password)) {
                $id = $user['id'];
                $name = $user->name;
                $lastname = $user->lastname;
                $isValidUser = true;
                break;
            }
        }
    }

    if ($isValidUser) {
        session_start();
        $_SESSION['id'] = (string) $id;
        $_SESSION['name'] = (string) $name;
        $_SESSION['lastname'] = (string) $lastname;
        $_SESSION['email'] = (string) $email;
        echo 'success';
    } else {
        echo 'error';
    }
}
