<?php

require_once 'Log.php';
require_once 'public/functions.php';
require_once 'Input.php';

class Auth
{

    public static $hashedPassword = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

    public static function attempt($userName, $password)
    {
        if (!empty($_POST)){
            if ($userName == 'guest' && password_verify($password, self::$hashedPassword)) {
                $_SESSION['LOGGED_IN_USER'] = self::user('user');
                $log = new Log();
                $log->message("INFO", "User $userName logged in.");
                unset($log);
                header("Location: authorized.php");
                exit();
            } else {
                $log = new Log();
                $log->message("ERROR", "User $userName failed to log in.");
                unset($log);
                header("Location: login.php");
                exit();
            }
        } 
    }

    public static function check()
    {
        if (!isset($_SESSION['LOGGED_IN_USER'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function user()
    {
        if (!empty(inputGet('user'))) {
            return inputGet('user');
        }
    }

    public static function logout()
    {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }

}


?>