<?php


namespace App\Factories;


use App\Entities\Email;

abstract class EmailFactory
{
    /**
     * Get email domain
     *
     * @param string $email
     * @return string email domain. Empty string on error
     */
    private static function getEmailDomain(string $email): string
    {
        $emailParts = explode('@', $email);

        if ($emailParts === false || count($emailParts) !== 2) {
            return '';
        }

        return $emailParts[1];
    }

    public static function createEmailFromFulEmail(string $email): Email
    {
        $domain = self::getEmailDomain($email);
        $user = str_replace(['@', $domain], '', $email);
        return new Email($user, $domain);
    }
}