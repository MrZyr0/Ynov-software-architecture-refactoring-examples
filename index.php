<?php

require_once 'vendor/autoload.php';

use App\Factories\EmailFactory;
use App\Managers\EmailManager;
use App\Managers\QueryManager;
use App\Utils\HTMLPrinter;

if (!QueryManager::isGetParamExist('email')) {
    HTMLPrinter::printToHTMLandExit("Please provide a valid email address");
}

$email = EmailFactory::createEmailFromFulEmail($_GET['email']);

if (!EmailManager::isValidEmail($email)) {
    HTMLPrinter::printToHTMLandExit("Invalid email address");
}

if (!$email->getDomain()) {
    HTMLPrinter::printToHTMLandExit("Unable to extract domain from email address");
}


if (EmailManager::isSpammingDomain($email->getDomain())) {
    HTMLPrinter::printToHTMLandExit("Email is spam");
}

HTMLPrinter::printToHTMLandExit("Email is valid");