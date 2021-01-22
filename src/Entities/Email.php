<?php


namespace App\Entities;


class Email
{
    private string $user;
    private string $domain;

    public function __construct($email)
    {
        $this->domain = $this->getDomainOfEmail($email);
        $this->user = str_replace(['@', $this->domain], '', $email);
    }

    /**
     * Get email domain
     *
     * @param string $email
     * @return string email domain. Empty string on error
     */
    private function getDomainOfEmail(string $email): string
    {
        $emailParts = explode('@', $email);

        if ($emailParts === false || count($emailParts) !== 2) {
            return '';
        }

        return $emailParts[1];
    }

    /**
     * @return string $user
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return Email self
     */
    public function setUser(string $user): Email
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string $domain
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     * @return Email
     */
    public function setDomain(string $domain): Email
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Return the full email string
     * Like : john.doe@example.com
     *
     * @return string email
     */
    public function getEmail(): string
    {
        return $this->user . '@' . $this->domain;
    }
}