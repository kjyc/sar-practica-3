<?
if (isset($_POST['su-email'])) {
    $name = $_POST['su-name'];
    $lastname = $_POST['su-lastname'];
    $email = $_POST['su-email'];
    $password = $_POST['su-password'];
    $password_ = $_POST['su-password_'];

    $isOk = false;

    $isValidName = preg_match('/^[a-zA-Zá-üÁ-Ü]+(\s[a-zA-Zá-üÁ-Ü]+)*$/', $name);
    $isValidLastname = preg_match('/^[a-zA-Zá-üÁ-Ü]+(\s[a-zA-Zá-üÁ-Ü]+)*$/', $lastname);
    $isValidEmail = preg_match('/^[a-z]+([0-9]{3}@ikasle\.|\.[a-z]+@|@)ehu\.(eus|es)$/', $email);
    $isValidPassword = preg_match('/^[a-zA-Z\d]{8,}$/', $password);
    $isValidPassword_ = $password_ === $password;

    if ($isValidName && $isValidLastname && $isValidEmail && $isValidPassword && $isValidPassword_) {
        $isOk = true;
    }

    $users = simplexml_load_file('../../xml/Users.xml');

    $emailExists = false;

    foreach ($users->user as $u) {
        if ($u->email == $email) {
            $emailExists = true;
            break;
        }
    }

    if (!$emailExists && $isOk) {
        $hash = hash("sha256", $password);

        $user = $users->addChild('user');
        $user->addAttribute('id', date_timestamp_get(date_create()));
        $user->addChild('name', $name);
        $user->addChild('lastname', $lastname);
        $user->addChild('email', $email);
        $user->addChild('password', $hash);
        $users->asXML('../../xml/Users.xml');
        echo 'success';
    } else {
        if ($emailExists) {
            echo 'email-exists';
        } else {
            echo 'error';
        }
    }
}
