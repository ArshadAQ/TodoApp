<?php


    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("dbh.inc.php");
    require("helpers.php");

    // enable sessions
    session_start();

    // require authentication for all pages except /login.php, /logout.php, and /register.php
    if (!in_array($_SERVER["PHP_SELF"], ["/login.php", "/logout.php", "/signup.php", "/index.php","/reset_psw.php"]))
    {
        if (empty($_SESSION["u_id"]))
        {
            redirect("login.php");
        }
    }

?>
