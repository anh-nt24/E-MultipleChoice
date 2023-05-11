<?php
if (isset($_GET['name'])) {
    $cookie_name = "me";
    $name = $_GET['name'];
    setcookie($cookie_name, $name, time() + (86400 * 10), "/");
    echo "Cookie set: " . $cookie_name;
} else {
    unset($_COOKIE['me']);
    setcookie('me', null, -1, '/');
    echo "Cookie deleted: me";
}
?>
