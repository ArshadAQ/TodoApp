<?php

/**
 * HybridAuth
 * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
 * (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
 */
// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return array(
    // http://inflowapp.azurewebsites.net/
    // "base_url" => "http://localhost/hybridauth-git/hybridauth/",
    "base_url" => 'http://inflowapp.azurewebsites.net/hybridauth.php',
    // "base_url" => 'http://inflowapp.azurewebsites.net',
    "providers" => array(
        // openid providers
        "OpenID" => array(
            "enabled" => true,
        ),
        "Yahoo" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => ""),
        ),
        "AOL" => array(
            "enabled" => true,
        ),
        "Google" => array(
            "enabled" => true,
            "keys" => array("id" => "630265695543-vug1algt6jita96jo09avrmrmumabh6o.apps.googleusercontent.com", "secret" => "w0n5Q_Qlvx_yGEjlnbK9dJgE"),
            // 'callback' => 'http://inflowapp.azurewebsites.net/hybridauth.php',
            // "redirect_uri" => "http://inflowapp.azurewebsites.net/hybridauth.php/",
        ),
        "Facebook" => array(
            "enabled" => true,
            "keys" => array("id" => "944949832323104", "secret" => "763a9162b9063672592354da46e5276e"),
            "scope"   => ['email', 'public_profile'],
            "trustForwarded" => false,
        ),
        "Twitter" => array(
            "enabled" => true,
            "keys" => array("key" => "", "secret" => ""),
            "includeEmail" => false,
        ),
        // windows live
        "Live" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => ""),
        ),
        "LinkedIn" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => ""),
            "fields" => array(),
        ),
        "Foursquare" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => ""),
        ),
    ),
    // If you want to enable logging, set 'debug_mode' to true.
    // You can also set it to
    // - "error" To log only error messages. Useful in production
    // - "info" To log info and error messages (ignore debug messages)
    "debug_mode" => false,
    // Path to file writable by the web server. Required if 'debug_mode' is not false
    "debug_file" => "",
);
