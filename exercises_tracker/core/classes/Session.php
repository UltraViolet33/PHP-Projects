<?php

class Session
{

    public static function init(): void
    {
        session_start();
    }


    public static function set(string $key, string $value): void
    {
        $_SESSION[$key] = $value;
    }


    public static function unset(string $key): void
    {
        unset($_SESSION[$key]);
    }


    public static function displayAndUnset(string $key): void
    {
        if (isset($_SESSION[$key])) {
            echo $_SESSION[$key];
            unset($_SESSION[$key]);
        }
    }


    public static function get(string $key): string|bool
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }


    public static function destroy(): void
    {
        session_destroy();
        echo "<script>window.location='login.php';</script>";
    }
}
