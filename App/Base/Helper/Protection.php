<?php
namespace App\Base\Helper;

class Protection
{
    public static function getCsrfToken()
    {
        $token = base64_encode(openssl_random_pseudo_bytes(32));
        $_SESSION['csrf_token'] = $token;

        return $token;
    }

    public static function validateCsrfToken($token)
    {
        if ($token != $_SESSION['csrf_token'])  {
            return false;
        }

        return true;
    }
}