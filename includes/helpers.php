<?php
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }
    function logout()
    {
        //session_start();
        session_unset();
        session_destroy();
        /* you can also use this to destroy cookies
            // unset any session variables
            $_SESSION = [];

            // expire cookie
            if (!empty($_COOKIE[session_name()]))
            {
                setcookie(session_name(), "", time() - 42000);
            }

            // destroy session
            session_destroy();*/
    }
    function render($view, $view1, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);
            if($view != NULL)
            {
                if($view == "body.php")
                {
                    require("../views/header.php");
                    require("../views/{$view}");
                    require("../views/body_1.php");
                    require("../views/dashboard.php");
                    require("../views/check_form.php");
                    require("../views/footer.php");
                }
                else if($view == "forms.php" || $view == "reset_psw_form.php")
                {
                    require("../views/header_1.php");
                    require("../views/forms_beg.php");
                    require("../views/{$view}");
                    if($view1 != NULL)
                        require("../views/userid_form.php");
                    require("../views/footer_1.php");
                }
                else
                {
                    require("../views/header_1.php");
                    require("../views/body.php");
                    // print_r($values);
                    require("../views/{$view}");
                    require("../views/footer_1.php");
                }

            }
            else
                echo "<h2>Hello</h2>";
            
            exit;
        }
        
        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
?>