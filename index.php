<?php 
const SPAM_DOMAINS = ['spamming.com', 'mailinator.com', 'oneminutemail.com'];

if (!hasGetParam('email')) {
    echo "Please provide a valid email address";
    exit;
}

$email = $_GET['email'];

if (!isValidEmail($email)) {
    printToHTML("Invalid email address");
}

$emailDomain = getDomainOfEmail($email);

if (!$emailDomain) {
    printToHTML("Unable to extract domain from email address");
}


if (isSpammingDomain($emailDomain)) {
    printToHTML("Email is spam");
}

printToHTML("Email is valid");


/**
 * Check if parameter a get param is present in the request
 *
 * @param string $key get param to check
 * @return bool
 */
function hasGetParam(string $key): bool
{
    if (empty($_GET) || empty($_GET[$key])) {
        return false;
    }

    return true;
}

/**
 * Check if email is valid
 *
 * @param string $email
 * @return bool
 */
function isValidEmail(string $email): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    return true;
}

/**
 * Get email domain
 *
 * @param string $email
 * @return string email domain. Empty string on error
 */
function getDomainOfEmail(string $email): string {
    $emailParts = explode('@', $email);

    if ($emailParts === false || count($emailParts) !== 2) {
        return '';
    }

    return $emailParts[1];
}

/**
 * Test if a domain is registered has spam blacklist
 *
 * @param string $domain
 * @return bool
 */
function isSpammingDomain(string $domain): bool {
    return in_array($domain, SPAM_DOMAINS);
}

/**
 * Print string to html and exit
 *
 * @param string $data to print
 */
function printToHTML(string $data): void {
    echo $data;
    exit;
}
