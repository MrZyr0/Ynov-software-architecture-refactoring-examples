<?php


namespace App\Entities;


class Email
{
    /**
     * @var string
     */
    private string $user;
    /**
     * @var string
     */
    private string $domain;

    /**
     * Email constructor.
     * @param $user
     * @param $domain
     */
    public function __construct($user, $domain)
    {
        $this->user = $user;
        $this->domain = $domain;
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
    public function __toString(): string
    {
        return $this->user . '@' . $this->domain;
    }
}