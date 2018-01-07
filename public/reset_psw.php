<?php

    // configuration
    require("../includes/config.php");
    
     // $id = $_SESSION["id"]; 

    // echo "Hi1";

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        // echo "Hi";
        if(isset($_GET["q"]) && isset($_GET["q1"]))
            render("reset_psw_form.php", NULL, ["title" => "Reset Password", "pwd" => $_GET["q"], "email" => $_GET["q1"]]);
        else
            render("reset_psw_form.php", NULL, ["title" => "Reset Password"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["pwd_curr"]) || empty($_POST["pwd_new"]) || empty($_POST["pwd_confirm"]))
        {
            // apologize("You must provide your current password.");
            header("Location: ../reset_psw.php?reset=empty");
        }
        else
        {
        
            $id = $_SESSION["u_id"];

            // echo $id;

            $pwd_result = mysqli_query($conn,"SELECT user_pwd FROM user WHERE user_id = $id;");

            $pwd = mysqli_fetch_assoc($pwd_result);

            if (password_verify($_POST["pwd_curr"], $pwd["user_pwd"]))
            {

                if ($_POST["pwd_new"] != $_POST["pwd_confirm"])
                {
                    // apologize("Password mismatch");
                    header("Location: ../reset_psw.php?reset=mismatch");
                }
                else if ($_POST["pwd_new"] == $_POST["pwd_curr"])
                {
                    // apologize('"Current Password" and "New Password" cannot be the same.');
                    header("Location: ../reset_psw.php?reset=same");
                }
                else
                {
                    // change password in database
                    // UPDATE user SET user_pwd = '$2y$10$RjtwfbKwQy83e/lsgaivNuFJ6wSdOrjzYcdYMcYoPuGpRwgfadTAe' WHERE user_id = 5

                    $hash_pwd = password_hash($_POST["pwd_confirm"], PASSWORD_DEFAULT);
                    // $hash_pwd = 
                    // echo $hash_pwd;
                    // $sql= sprintf("UPDATE user SET user_pwd = %s WHERE user_id = %d", $hash_pwd, $id);
                    $sql = "UPDATE user SET user_pwd = '$hash_pwd' WHERE user_id = $id";
                    // UPDATE user SET user_pwd = $2y$10$kBZFgp8VXLlDgDhFd064ROxv/kGlhisgDxHcWdkrYadXGm6P9c4F2 WHERE user_id =5
                    echo $sql;

                    $result = mysqli_query($conn, $sql);

                    if($result)
                    {
                        redirect("/index.php");
                    }
                    else
                        echo "Error end";
                    
                }
            }    
            else
            {
                header("Location: ../reset_psw.php?reset=invalid");
            }
        }
        

    }

?>