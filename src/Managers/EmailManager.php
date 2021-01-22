<?php


namespace App\Managers;


use App\Entities\Email;

abstract class EmailManager
{
    const SPAM_DOMAINS = ['spamming.com', 'mailinator.com', 'oneminutemail.com'];


    /**
     * Check if email is valid
     *
     * @param Email $emailObj
     * @return bool
     */
    public static function isValidEmail(Email $emailObj): bool
    {
        if (!filter_var($emailObj->getEmail(), FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    /**
     * Test if a domain is registered has spam blacklist
     *
     * @param string $domain
     * @return bool
     */
    public static function isSpammingDomain(string $domain): bool {
        return in_array($domain, self::SPAM_DOMAINS);
    }
}