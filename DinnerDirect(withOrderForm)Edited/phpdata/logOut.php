<?php
/**
 * Created by PhpStorm.
 * User: carla
 * Date: 3/1/2019
 * Time: 2:22 PM
 */

session_start();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

//$vars = array_keys(get_defined_vars());
//for ($i = 0; $i < sizeOf($vars); $i++) {
 //   unset($$vars[$i]);
//}
//unset($vars,$i);

// Close the connection to log out
mysqli_close($connection);

//logging out alert to notify user
echo '<script type="text/javascript"> alert("You are logged out!");  location="../index.php";</script>';

?>
