<?php

class Session
{
    public function start()
    {
        session_start();
    }

    public function setSession($name, $val)
    {
        $_SESSION[$name] = $val;
        return true;
    }

    public function getSession($name)
    {

        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return false;
    }

    public function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
            return true;
        }
        return false;
    }

    public function existSession($name)
    {
        return isset($_SESSION[$name]);
    }

    public function flashSession($name)
    {
        $temp = null;
        if (existSession($name)) {
            $temp = getSession($name);
            deleteSession($name);
        } else {
            $temp = false;
        }
        return $temp;
    }
}
